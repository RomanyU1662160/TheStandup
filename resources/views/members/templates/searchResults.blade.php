@extends('layouts.app')

@section('content')
<h3 class="text-info text-center"> Results of <span class="text-warning"> {{$query}}</span></h3>
<div class="container">
    <div class="row"> <a class="btn btn-outline-info float-left" href="{{ URL::previous() }}">
            << Back </a> </div> @if(! $results->count())
                <div class="alert">
                    <h3 class="text-info text-center"> No results found for <span class="text-warning">
                            {{$query}}</span> </h3>


                </div>
                @else

                @foreach ($results as $member)
                @if($member instanceof App\Models\User )
                @include('members.templates.memberTemplate')
                @endif
                @endforeach
                @endif

    </div>
    @endsection