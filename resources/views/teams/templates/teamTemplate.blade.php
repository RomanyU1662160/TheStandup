<div class="card  mb-3  ">
    <div class="card-header  bg-secondary">
        <div class="">
            <h5 class="card-title text-warning"> {{ $team->name}} <span class="float-right"> <a
                        class="btn btn-link text-warning " href="{{route('team.page', $team->id)}} "> More details</a>
                </span></h5>
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <table class="table ">
                <tbody>
                    <tr class="">
                        <th class="text-info "> Work on Project: </th>
                        @if(!$team->project()->count())
                        <td class="text-warning"> not assigned to any project </td>
                        @else
                        <td class="text-info "> {{ $team->project->name }} </td>
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
                </tbody>
            </table>
        </div>

        <div class="row">

            <table class="table">
                <tbody>
                    <tr class="border">
                        <th scope="col" class="text-info ">Members: </th>

                        @if(!$team->members()->count())
                        <td class="text-warning">{{$team->name }} has no members yet. </td>
                    </tr>
                    @else
                    @foreach($team->members as $member)
                    <tr>
                        <td class="text-info "> <a href="{{route('member.page', $member->id)}} ">
                                {{$member->getFullName()}} </a></td>
                        <td class="text-info ">
                            @if(Auth::user()->hasRole('admin'))
                            <a href="{{route('team.removeMember', [$team, $member])}}" class="text-danger"
                                data-toggle="tooltip" data-placement="top" title="Remove memberfrom this team ">
                                <i class=" icon ion-md-trash "> remove</i>
                            </a>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                    @endif
                <tbody>
            </table>
        </div>




    </div>

    <div class="card-footer">
        @if(Auth::user()->hasRole('admin'))
        <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#update{{$team->id}}"> Edit
            Team details </button>
        <button class="btn btn-outline-info float-left" data-toggle="modal" data-target="#member{{$team->id}}"> Edit
            Team members </button>
        @else

        <span class="text-info text-center"> You don't have access to admin options </span>
        @endif
    </div>

</div>

<!-- Update Team details Modal -->

@include('modals.UpdateTeamDetailsModal')

<!-- Update team memders  modal -->
@include('modals.UpdateTeamMembersModal')
</div>