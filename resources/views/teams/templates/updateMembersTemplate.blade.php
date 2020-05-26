<form action="{{route('team.associateMember',$team)}}" method="post">
    @csrf
    <div class="row p-1">

        @foreach( $members as $member)
        <div class="custom-control custom-checkbox col-md-6  border-bottom">
            <input type="checkbox" class="custom-control-input" id="{{$team->id.$member->id}}" name="{{$member->id}}" value="{{$member->id}}" {{ $team->members->contains($member) ? " checked disabled" : "" }}>
            <label class="custom-control-label" for="{{$team->id.$member->id}}">{{$member->getFullName()}}
            </label>
        </div>
        <div class="col-md-6   border-bottom">
            @if( $member->roles)

            @foreach($member->roles as $role)
            [<span class="text-info"> {{$role->name}}</span> ]
            @endforeach
            @endif

        </div>
        @endforeach


    </div>
    <div class="mt-2">
        <button class="btn btn-info float-right" type="">Update members </button>
    </div>

</form>
