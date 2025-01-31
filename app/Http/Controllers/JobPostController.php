<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Notifications\NewJobPostNotification;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyId = auth()->guard('company')->id();
        $jobPosts=JobPost::where('company_id', $companyId )->get();
       

        return view('company.job-posts.index', compact('jobPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('company.job-posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $companyId = auth()->guard('company')->user()->id;
        $jobCount = JobPost::where('company_id', $companyId)->where('status', 'active')->count();


        if ($jobCount >= 3) {
            flash()
            ->options([
                'position' => 'bottom-right',
            ])
            ->warning('You have already 3 active posts!');
            return back();
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required',
            'category' =>  'required',
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
            'category_id' => $request->category,
            'salary_range' => $request->salary_range,
            'location' => $request->location,
            'job_type' => $request->job_type,
            'application_link' => $request->application_link,
            'expire_date' => $request->expire_date,
            'status' => 'active',
        ]);

        $categoryId = $request->category;
        $category = Category::find($categoryId);
        
        if (!$category) {
            return back()->with('error', 'Category not found');
        }

        if ($category->users->isNotEmpty()) {
            foreach ($category->users as $user) {
                $user->notify(new NewJobPostNotification($jobPost));
            }
        }
        flash()
        ->options([
            'position' => 'bottom-right',
        ])
        ->success('The Job post has been created');
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

        $jobPostCount = JobPost::where('company_id', $companyId)
            ->where('status', 'active')
            ->where('id', '!=', $id) // Excluding the current post
            ->count();


        if ($jobPostCount >= 3) {
            flash()
            ->options([
                'position' => 'bottom-right',
            ])
            ->error('You have already 3 active posts!');
            return back();
        }

        if ($jobPost->status == 'active' || $jobPost->status == 'expired') {
            flash()
            ->options([
                'position' => 'bottom-right',
            ])
            ->error('This is already an active post!');
            return back();
        }

        $jobPost->status = 'active';
        $jobPost->save();

        flash()
        ->options([
            'position' => 'bottom-right',
        ])
        ->success('Your post is activated');

        return to_route('job-posts.index');
    }

    public function deactivatePost(string $id)
    {
        $jobPost = JobPost::findOrFail($id);
    
        if ($jobPost->status == 'inactive' || $jobPost->status == 'expired') {
            flash()
            ->options([
                'position' => 'bottom-right',
            ])
            ->info('This is already inactive post!');
            return back();
        }
        $jobPost->status = 'inactive';
        $jobPost->save();
        flash()
        ->options([
            'position' => 'bottom-right',
        ])
        ->info('your post is deactivated');
        return to_route('job-posts.index');

    }
    public function search(Request $request)
    {
        // Start query with active job posts
        $query = JobPost::where('status', 'active');

        if ($request->filled('search')) {
            $searchTerm = '%' . trim($request->search) . '%';

            $query->where(function ($q) use ($searchTerm, $request) {
                $q->where('title', 'LIKE', $searchTerm)
                    ->orWhere('location', 'LIKE', $searchTerm)
                    ->orWhere('tags', 'LIKE', $searchTerm)
                    ->orWhere('job_type', 'LIKE', $searchTerm);

                // Search within related category name
                $q->orWhereHas('category', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', $searchTerm);
                });

                // Search by salary range only if it's numeric
                if (is_numeric($request->search)) {
                    $q->orWhere('salary_range', '<=', (int)$request->search);
                }
            });
        }

        // Paginate results
        $jobPosts = $query->latest()->paginate(4);

        return view('home', [
            'results' => $jobPosts,
            'jobPosts' => $jobPosts,
        ]);
    }


    
    



}
