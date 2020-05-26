
    <form action="{{route('member.updateWorkingDays',$member)}}" method="post">
    @csrf
    <div class="row p-1">

        @foreach( $days as $day)
        <div class="custom-control custom-checkbox col-md-6  border-bottom">
            <input type="checkbox" class="custom-control-input" id="{{$member->id.$day->name}}" name="{{$day->id}}" value="{{$day->id}}" {{ $member->days->contains($day) ? " checked " : "" }}/>
            <label class="custom-control-label" for="{{$member->id.$day->name}}">{{ucfirst($day->name)}} </label>
        </div>
        @endforeach


    </div>
    <div class="mt-2">
        <button class="btn btn-info float-right" type="">Update working days </button>
    </div>

</form>
