<div class="row">
    <div class="col-md-5">
        <!-- <img src="{{asset('assets/avatar.png')}}" alt="user avatar" class="rounded"> -->
        <img src="{{$member->getAvatar()}}" alt="user avatar" class="rounded">
        <h3 class=" text-info"> {{$member->getFullName()? $member->getFullName() : asset('assets/avatar.png') }}'s page </h3>

        <div class="row">
            <a href="{{URL::previous()}}" class=" btn btn-outline-info float-left">
                <<- Back </a> </div> </div> <div class="col-md-7">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>
                                    <strong> Full Name: </strong>
                                </td>
                                <td> {{ $member->getFullName()}} </td>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <strong> Email: </strong>
                            </td>
                            <td> {{ $member->email}} </td>

                        </tr>
                        <tr>
                            <td> <strong> Roles </strong> </td>
                            <td>
                                @foreach($member->roles as $role )

                                <span class="badge badge-secondary ml-1"> {{$role->name}}</span>
                                @endforeach
                                @if(Auth::user()->hasRole('Admin'))

                                <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#update{{$member->id}}"> Update roles </button>
                            </td>
                            @endif
                            </td>
                        </tr>

                        <tr>
                            <td> <strong>In Team </strong> </td>
                            <td> @if(($member->team))
                                Belongs to <a href=" {{route('team.page' , $member->team->id)}}">
                                    {{ $member->team->name}}</a>
                                @else
                                <p class="text-warning"> Not assigned to any team </p>
                                @endif



                        </tr>

                        <tr>
                            <td> <strong> Working on project </strong> </td>
                            <td> @if(!$member->team)
                                <p class="text-warning"> NOT working on any project </p>

                                @elseif($member->team && !$member->team->project)
                                <p class="text-warning"> not working on any project </p>

                                @else
                                {{$member->team->project->name}}
                                @endif </td>

                        </tr>

                        <tr>
                            <td> <strong> Working on Days </strong> </td>
                            <td>
                                @foreach($member->days as $day )
                                <span class="badge badge-secondary ml-1"> {{ucfirst($day->name)}}</span>
                                @endforeach
                                @if(Auth::user()->hasRole('admin'))



                                <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#updateDays{{$member->id}}"> Update working days </button>
                                @else

                                @can('updateWorkingDays', $member)
                                <button class="btn btn-outline-info float-left" data-toggle="modal" data-target="#updateDays{{$member->id}}"> Update my working days </button>
                                @endcan
                                @endif
                            </td>

                        </tr>

                    </table>
        </div>



    </div>
    <!-- Update roles  Modal -->
    @include('modals.UpdateRolesModal')

    <!-- Update working days   Modal -->

    @include('modals.UpdateWorkingDaysModal')
