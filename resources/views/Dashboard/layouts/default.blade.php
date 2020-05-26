@extends('layouts.app')

@section('title', 'user_Dashboard')
@section('content')
@include('dashboard.layouts.Info')

<div class="row">
    <div class="col-md-3">
        @include('dashboard.layouts.sideNav')
    </div>
    <div class="col-md-9 ">
        @yield('dashboard.content')
    </div>

</div>



@endsection
