<div class="modal fade" id="team{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="daysModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Select a team </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('admin.user.assignToTeam', $member)}}" method="post">
                    @csrf
                <div class="form-group">
                    <select class="form-control" name="team">
                        <option value=""> Select a team </option>
    
                        @foreach($teams as $team )
                            <option value="{{$team->id}}">  {{$team->name}}</option>
    
                        @endforeach
                     </select>
                     @error('team')
                        <span class="text-danger"> {{$message}} </span>
                     @enderror
                </div>
             
                   <button type="submit" class="float-right  btn btn-info"> Assign to this team </button>
               
                     </form>
                </div>
    
            </div>
        </div>
    </div>