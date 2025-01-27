@extends('layouts.admin-layout')

@section('auth_name')
{{auth()->guard('company')->user()->name}}
@endsection

@section('logout')
<a class="dropdown-item" href="{{route('company.logout')}}">
    <i class="ti-power-off text-primary"></i>
    Logout
</a>
@endsection