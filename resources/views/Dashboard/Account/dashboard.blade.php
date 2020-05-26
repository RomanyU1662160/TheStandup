@extends('dashboard.layouts.default')


@section('dashboard.content')




<div class="card">
    <h3 class="text-info card-header text-center "> Welcome {{ucfirst($user->fname)}}</h3>
    <h5 class=" text-info">Your moral history </h5>
    <div class="card-body">
        {!! $chart->container() !!}
    </div>
    <div class="card-footer">

    </div>
</div>



@endsection
@section('scripts')

{!! $chart->script() !!}
@endsection
