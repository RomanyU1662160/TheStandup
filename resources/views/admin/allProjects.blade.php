@extends('admin.layouts.default')

@section('admin.content')
<h1> All Projects</h1>
{{$projects->links()}}
@foreach($projects as $project)

@include('projects.templates.projectTemplate')


@endforeach
@endsection