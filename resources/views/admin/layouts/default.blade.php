@extends('layouts.app')

@section('title' , 'Admin dashboard')

@section('content')
<div class="row">

    <div class="col-md-3 ">
        @include('admin.layouts.sideNav')
    </div>
   
    <div class="col-md-6 offset-md-1">
        @yield('admin.content')
</div>
</div>

@endsection