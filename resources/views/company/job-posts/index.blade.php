@extends('layouts.company-layout')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-4 text-center">Job Posts List</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless text-center">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Tags</th>
                  <th>Location</th>
                  <th>Salary</th>
                  <th>Application Link</th>
                  <th>Expire Date</th>
                  <th>Views</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>  
              </thead>
              <tbody>
                @forelse ($jobPosts as $jobPost)
                  <tr>
                    <td>{{ $jobPost->title }}</td>
                    <td class="font-weight-bold">{{ $jobPost->description }}</td>
                    <td>
                        @foreach (json_decode($jobPost->tags) as $tag)
                            <span class="badge badge-info">{{ $tag }}</span>
                        @endforeach
                    </td>
                    <td>{{ $jobPost->location }}</td>
                    <td>{{ $jobPost->salary_range }}</td>
                    <td class="font-weight-medium">
                      <a href="{{ $jobPost->application_link }}" target="_blank" class="badge badge-success">Apply</a>
                    </td>
                    <td>{{ $jobPost->expire_date->diffForHumans() }}</td>
                    <td>{{ $jobPost->views }}</td>
                    <td>{{ $jobPost->status }}</td>
                    <td class="d-flex align-items-center gap-3">
                      <a href="{{ route('job-posts.edit', $jobPost->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      <form action="{{ route('job-posts.destroy', $jobPost->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="10" class="text-center">No job posts available.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
