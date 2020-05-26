@extends('layouts.app')

@section('content')
<div class="container"> 

        <div class="row"> 
                <div class="col-md-6"> 
                <h1 class="text-info  text-center float-right"> All Projects</h1>
                </div>
                <div class="col-md-6"> 
                <form action="{{route('project.search')}}" method="get" class="form-inline float-right p-2">
                                <div class="form-group"> 
                                  <input type="text" class="form-control" placeholder="search projects.." name="search">
                                 <button type="submit" class="btn btn-info float-right ml-3 text-warning"> Search</button>
                                </div>
                        </form>
                </div>
        </div>

{{$projects->links()}}
        @foreach($projects as $project)

             @include('projects.templates.projectTemplate')


        @endforeach
</div>
@endsection