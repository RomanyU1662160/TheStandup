@extends('admin.layouts.default')

@section('admin.content')
<h3 class="text-info text-center"> All members </h3>

{{$members->links()}}
@foreach($members as $member)

@include('members.templates.memberTemplate')

@endforeach
@endsection
