@extends('layouts.app')


@section('content')

<div class="container mt-5">
    <div class=" pt-5">
        <h1 class="text-secondary text-center"> {{__('The StandUp')}}</h1>
    </div>
    <div class=" p-5">
        <search-component> </search-component>
    </div>
</div>
@endsection
