@extends('layouts.admin-layout')

@section('content')
<div class="content-wrapper">
  

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-4 text-center">Category List</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless text-center">
              <thead>
                <tr><form action="{{ route('category.create') }}" method="get">
    
  
    <button
        type="submit"
        
        class="btn btn-success btn-sm rounded-pill px-3 shadow-sm d-flex align-items-center"
    >
        Add new Category
    </button>
</form></tr>
              </thead>
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Posts Count</th>
                  <th>Created By</th>
                  <th>Action</th>
                  <!-- <th>Action</th> -->
                </tr>  
              </thead>
              <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td class="font-weight-bold">{{$category->name}}</td>
                    <td class="font-weight-bold">{{$category->jobPosts->count()}}</td>
                    <td class="font-weight-bold">{{$category->admin->name}}</td>
                    <td><form action="{{ route('category.delete', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to Delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form></td>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
