

<div class="row">
<div class="col-md-5">
<img src="{{asset('assets/team.png')}}" alt="user avatar" class="" width="250px" height="225px">
 <h3 class=" text-info"> {{$team->name}}'s page </h3>
</div>
<div class="col-md-7">
    <table class="table table-hover">
        <thead>
         <tr>
              <td> <strong class="text-info">   Team :  </strong> 
             </td>
           <td>  {{ $team->name}} </td>
          
          </tr>
       </thead>  

   
        <tr class="">
            <th class="text-info "> Work on Project: </th>
              @if(!$team->project()->count())
                 <td class="text-warning"> not assigned to any project </td>
               @else
            <td class=" "> {{ $team->project->name }}</td>
             <td>  </td>
           <td>  </td>
        </tr>
        <tr class="">
            <th class="text-info ">Project start on : </th>
            <td>
                <p> {{ $team->project->start_date->format('d M Y')}} </p>
                <small> ({{ $team->project->start_date->diffForHumans()}}) </small>
            </td>
            <th class="text-info "> Project end on : </th>
            <td>

                <p>{{ $team->project->end_date->format('d M Y')}} </p>
                <small> ({{ $team->project->end_date->diffForHumans()}}) </small>
            </td>
        </tr>
            
         @endif
   

        <tr>
           <td> <strong class="text-info"> Members  </strong>  </td>
             @if(!$team->members()->count())
               <td class="text-warning">{{$team->name }} has no members yet. </td>
              @else
           <td> 
             @foreach($team->members as $member)
                <p class=" "> -  <a href="{{route('member.page', $member->id)}} ">   {{$member->getFullName()}} </a>
                    @if(Auth::user()->hasRole('admin'))
                        <span>  <a href="{{route('team.removeMember', [$team, $member])}}" class="text-danger  btn-sm  btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Remove memberfrom this team ">
                        <i class=" icon ion-md-trash  "> </i>
                        </a> 
                        </span>
                   @endif
                </p>
                   
            @endforeach
           
            </td>

             @endif
              <td>  </td>
           <td>  </td>
    </tr>
    </table>
</div>



</div>


