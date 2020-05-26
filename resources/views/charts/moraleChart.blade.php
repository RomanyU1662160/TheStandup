@extends('layouts.app')

@section('content')
<div class="container">

    {!! $chart->container() !!}
</div>

@endsection


@section('scripts')

{!! $chart->script() !!}
@endsection
