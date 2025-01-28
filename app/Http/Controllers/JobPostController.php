<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyId = auth()->guard('company')->id();
        $jobPosts=JobPost::where('company_id', $companyId )->get();
        // dd($jobPosts);

        return view('company.job-posts.index', compact('jobPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.job-posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $companyId = auth()->guard('company')->user()->id;
        $jobCount = JobPost::where('company_id', $companyId)->where('status', 'active')->count();


        if ($jobCount >= 3) {
            return back()->with('error', 'You have already 3 active posts!');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required',
            'salary_range' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => ['required', Rule::in(['Full Time', 'Remote', 'Contract', 'Freelance'])],
            'application_link' => 'required|url',
            'expire_date' => 'required|date',
        ]);

        

        $jobPost = JobPost::create([
            'title' => $request->title,
            'company_id' => $companyId,
            'description' => $request->description,
            'tags' => json_encode(explode(',', $request->tags)),
            'salary_range' => $request->salary_range,
            'location' => $request->location,
            'job_type' => $request->job_type,
            'application_link' => $request->application_link,
            'expire_date' => $request->expire_date,
            'status' => 'active',
        ]);

        return to_route('job-posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobPost = JobPost::find($id);
        return view('job-details', compact('jobPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function activatePost(string $id)
    {
        $jobPost = JobPost::findOrFail($id);
        $companyId = auth()->guard('company')->user()->id;
        $jobPostCount = JobPost::where('company_id', $companyId)->where('status', 'active')->count();

        // dd($jobPostCount);
        if ($jobPostCount >= 3) {
            return back()->with('error', 'You have already 3 active posts!');
        }
        if ($jobPost->status == 'active' || $jobPost->status == 'expired') {
            return back()->with('error', 'This is already active post!');
        }
        $jobPost->status = 'active';
        $jobPost->save();

        return to_route('job-posts.index')->with('success', 'your post is activated');

    }
    public function deactivatePost(string $id)
    {
        $jobPost = JobPost::findOrFail($id);
    
        if ($jobPost->status == 'inactive' || $jobPost->status == 'expired') {
            return back()->with('error', 'This is already inactive post!');
        }
        $jobPost->status = 'inactive';
        $jobPost->save();

        return to_route('job-posts.index')->with('success', 'your post is deactivated');

    }


}
