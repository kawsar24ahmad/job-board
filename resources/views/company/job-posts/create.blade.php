@extends('layouts.company-layout')

@section('content')
<div class="container-fluid mt-4 mb-4">
    <h2>Create a Job Post</h2>
    <form action="{{ route('job-posts.store') }}" method="POST" novalidate>
        @csrf
        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" required>{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" id="tags" value="{{ old('tags') }}" required>
            @error('tags')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="salary_range">Salary Range</label>
            <input type="text" name="salary_range" class="form-control @error('salary_range') is-invalid @enderror" id="salary_range" value="{{ old('salary_range') }}" required>
            @error('salary_range')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" value="{{ old('location') }}" required>
            @error('location')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="application_link">Application Link</label>
            <input type="url" name="application_link" class="form-control @error('application_link') is-invalid @enderror" id="application_link" value="{{ old('application_link') }}" required>
            @error('application_link')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="expire_date">Expire Date</label>
            <input type="date" name="expire_date" class="form-control @error('expire_date') is-invalid @enderror" id="expire_date" value="{{ old('expire_date') }}" required>
            @error('expire_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
