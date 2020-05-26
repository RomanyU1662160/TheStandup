<form action="{{ route('standup.addNew')}}" method="post" class="">
    @csrf
    <div class="form-group ">

        <label for="yesterday" class="font-weight-bolder text-info  col-form-label ">What I did {{$lastWorkingDay == $yesterday? "yesterday" : "on" }} <span class="text-secondary"> {{$lastWorkingDay->format('D d-m-Y')}} </span> </label>
        <textarea class="form-control @error('yesterday') is-invalid @enderror" name="yesterday" id="yesterday" cols="30" rows="2" autofocus>{{old('yesterday')}}</textarea>
        @error('yesterday')

        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>

        @enderror
    </div>


    <div class="form-group ">
        <label for="today" class="font-weight-bolder text-info  col-form-label">What I will do {{ $nextWorkingDay == $today? 'today ' : 'on'}} <span class="text-secondary"> {{$nextWorkingDay->format('D d-m-Y')}}</span> </label>
        <textarea class="form-control  @error('today') is-invalid @enderror" name="today" id="today" cols="30" rows="2">{{old('today')}}</textarea>
        @error('today')

        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>

        @enderror
    </div>


    <div class="form-group ">
        <label for="issues" class="font-weight-bolder text-info col-form-label">Issues I am facing </label>
        <textarea class="form-control @error('issues') is-invalid @enderror" name="issues" id="issues" cols="30" rows="3"> {{old('issues')}}</textarea>
        @error('issues')
        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group ">
        <label for="morale" class="font-weight-bolder text-info  col-form-label">
            How do you feel today? </label>
        <div class="input-group">
            <div class="form-check form-check-inline col">
                <input class="form-check-input  @error('morale') is-invalid @enderror " type="radio" name="morale" id="inlineRadio1" value="-1">
                <label class="form-check-label text-info font-weight-bolder" for="inlineRadio1"> Sad <i class="icon ion-md-sad  pl-2"></i> </label>

            </div>
            <div class="form-check form-check-inline col">
                <input class="form-check-input @error('morale') is-invalid @enderror" type="radio" name="morale" id="inlineRadio2" value="0">
                <label class="form-check-label text-info font-weight-bolder" for="inlineRadio2">Normal<i class="icon ion-md-ribbon  pl-2"></i></i></label>
            </div>
            <div class="form-check form-check-inline col">
                <input class="form-check-input  @error('morale') is-invalid @enderror" type="radio" name="morale" id="inlineRadio3" value="1">
                <label class="form-check-label text-info font-weight-bolder" for="inlineRadio3"> Happy <i class="icon ion-md-happy pl-2"></i> </label>
            </div>
        </div>
        @error('morale')
        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group ">
        <button class="btn  btn-info float-right"> Update Standup ->>></button>
    </div>
</form>
