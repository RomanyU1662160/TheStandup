@extends('layouts.app')

@section('content')


<div class="container">
        <div class="row"> 
                <div class="col-md-6"> 
                <h1 class="text-info  text-center float-right"> All Teams</h1>
                </div>
                <div class="col-md-6"> 
                <form action="{{route('team.search')}}" method="get" class="form-inline float-right p-2">
                                <div class="form-group"> 
                                                <input type="text" class="form-control" placeholder="search teams.." name="search">
                                                    <button type="submit" class="btn btn-info float-right ml-3 text-warning"> Search</button>
                                                </div>
                        </form>
                </div>
        </div>
        {{$teams->links()}}
        @foreach($teams as $team)
            @include('teams.templates.teamTemplate')
        @endforeach
 </div>
@endsection