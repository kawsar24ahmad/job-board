@extends('layouts.admin-layout')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome {{auth()->guard('admin')->name}}</h3>
          <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
              <a class="dropdown-item" href="#">January - March</a>
              <a class="dropdown-item" href="#">March - June</a>
              <a class="dropdown-item" href="#">June - August</a>
              <a class="dropdown-item" href="#">August - November</a>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-4 text-center">Company List</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless text-center">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Contract Number</th>
                  <th>Website</th>
                  <th>Description</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Approved / Rejected By</th>
                  <th>Action</th>
                </tr>  
              </thead>
              <tbody>
                @foreach ($companies as $company)
                  <tr>
                    <td>{{$company->name}}</td>
                    <td class="font-weight-bold">{{$company->email}}</td>
                    <td>{{$company->contact_number}}</td>
                    <td>{{$company->website_link}}</td>
                    <td>{{ substr($company->description, 0, 5) }}</td>
                    <td>{{$company->address}}</td>
                    <td class="font-weight-medium"><div class="badge badge-success">{{$company->status}}</div></td>
                    <td>
                      @if($company->approvedBy)
                          {{ $company->approvedBy->name }}
                      @else
                          Not approved
                      @endif
                    </td>
                    <td class="d-flex align-items-center gap-3">
<form action="{{ route('admin.approve', $company->id) }}" method="post">
    @csrf
    @method('PUT')
  
    <button
        type="submit"
        {{$company->status== "approved" ? "disabled" : ""}}
        class="btn btn-success btn-sm rounded-pill px-3 shadow-sm d-flex align-items-center"
    >
        <i class="bi bi-check-lg me-2"></i>
    </button>
</form>

<form action="{{route('admin.reject', $company->id)}}" method="post">
  @csrf
  @method('PUT')
<button
                        type="submit" 
                        {{$company->status== "rejected" ? "disabled" : ""}}
                        class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm d-flex align-items-center"
                      >
                        <i class="bi bi-x-lg me-2"></i> 
                      </button>
</form>
                      
                    </td>


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
