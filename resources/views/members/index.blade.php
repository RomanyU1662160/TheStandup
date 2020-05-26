@extends('layouts.app')

@section('content')
<div class="container"> 

    <div class="row"> 
            <div class="col-md-6"> 
            <h1 class="text-info  text-center float-right"> All Users</h1>
            </div>
            <div class="col-md-6"> 
            <form action="{{route('member.search')}}" method="get" class="form-inline float-right p-2">
                        <div class="form-group"> 
                                        <input type="text" class="form-control" placeholder="search users.. " name="search">
                                            <button type="submit" class="btn btn-info float-right ml-3 text-warning"> Search</button>
                                        </div>
                    </form>
            </div>
    </div>
    {{$members->links()}}
        @foreach($members as $member)
            @include('members.templates.memberTemplate')

        @endforeach
</div>
@endsection