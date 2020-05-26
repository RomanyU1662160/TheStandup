@extends('admin.layouts.default')

@section('admin.content')
<h1> All Teams</h1>
{{$teams->links()}}
@if(!$teams->count())
<p class="text-warning  text-center"> To teams to show </p>
@else
@foreach($teams as $team)

@include('teams.templates.teamTemplate')

@endforeach
@endif
@endsection