
    <form action="{{route('admin.updateRoles',$member)}}" method="post">
    @csrf
    <div class="row p-1">

        @foreach( $roles as $role)
        <div class="custom-control custom-checkbox col-md-6  border-bottom">
            <input type="checkbox" class="custom-control-input" id="{{$member->id.$role->id}}" name="{{$role->id}}" value="{{$role->id}}" {{ $member->roles->contains($role) ? " checked " : "" }}/>
            <label class="custom-control-label" for="{{$member->id.$role->id}}">{{$role->name}} </label>
        </div>
        @endforeach


    </div>
    <div class="mt-2">
        <button class="btn btn-info float-right" type="">Update Roles </button>
    </div>

</form>
