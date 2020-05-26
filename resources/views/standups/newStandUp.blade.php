@extends('layouts.app')

@section('title', 'New Standup')

@section('content')
<div class="alert">
    <h3 class="text-secondary text-center"> Update standup of my next working day <small class="text-info"> {{$nextWorkingDay->format('D d-m-Y')}}</small></h3>
</div>
<div class="alert container">
    @include('standups.templates.standupFormTemplate')
</div>
@endsection
