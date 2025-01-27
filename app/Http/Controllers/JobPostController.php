<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required',
            'salary_range' => 'required|string',
            'location' => 'required|string|max:255',
            'application_link' => 'required|url',
            'expire_date' => 'required|date|after:today',
        ]);

        $jobPost = JobPost::create([
            'title' => $request->title,
            'company_id' => auth()->guard('company')->user()->id,
            'description' => $request->description,
            'tags' => json_encode(explode(',', $request->tags)),
            'salary_range' => $request->salary_range,
            'location' => $request->location,
            'application_link' => $request->application_link,
            'expire_date' => $request->expire_date,
        ]);

        return to_route('job-posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
