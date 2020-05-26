@extends('layouts.app')

@section('content')
<div class="row">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      You are {{Auth::user()->roles->first()->name}}
                    <hr>
                      <p>   Your last working day :: {{Auth::user()->lastWorkingDay()->format('D d-m-y')}}</p>
                      <p> Your next working day :: {{Auth::user()->nextWorkingDay()->format('D d-m-y')}}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
