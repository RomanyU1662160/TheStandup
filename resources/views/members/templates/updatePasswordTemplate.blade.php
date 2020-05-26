<form action="{{route('dashboard.user.updatePassword', Auth::user())}}" method="post">
    @csrf
    <div class="form-group">
        <label for="old-password"> Old Password</label>
        <input type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" id="old-password" value="{{old('old-password') ? old('old-password'): ''}}">

        @error('old-password')
        <span class=" invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password"> New Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{old('password') ? old('password'): ''}}">

        @error('password')
        <span class=" invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class=" form-group">
        <label for="password_confirmation"> Confirm New Password</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">


        @error('password_confirmation')
        <span class=" invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="alert">
        <button type="submit" class="btn btn-info float-right">
            Update Password
        </button>
    </div>
</form>
