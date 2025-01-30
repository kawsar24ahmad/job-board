@extends('layouts.admin-layout')

@section('content')
<div class="container-fluid mt-4 mb-4">
    <h2>Create a new Category</h2>
    <form action="{{ route('category.store') }}" method="POST" novalidate>
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="title" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
