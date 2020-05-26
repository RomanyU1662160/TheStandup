@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Complete your details') }}
                    <p> Your email : {{$newUser->email}} </p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('socialite.completeRegister') }}">
                        @csrf

                        <input id="fname" type="text" class="form-control" name="fname" value="{{$newUser->fname}}" hidden>

                        <input id="lname" type="text" class="form-control" name="lname" value="{{ $newUser->lname }}" hidden>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Your login email ') }}</label>

                            <div class="col-md-6">
                                <p class="text-info text-center"> {{$newUser->email}}</p>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $newUser->email }}" hidden autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        {{-- Roles  field  --}}
                        @if($roles ?? '')
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Your Role') }}</label>

                            <div class="input-group col-md-6">

                                <select class="custom-select" id="role" name="role">
                                    <option value=''>Choose...</option>
                                    @if($roles->count())
                                    @foreach( $roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}} </option>
                                    @endforeach
                                    @else
                                    <option value="1">Admin </option>
                                    <option value="2">Other </option>
                                    @endif
                                </select>

                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @endif


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
