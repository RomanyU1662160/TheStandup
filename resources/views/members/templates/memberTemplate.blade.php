<div class="card  mb-3  ">
    <div class="card-header bg-secondary">
        <div class="">
            <h5 class="card-title text-warning"> <a href="{{route('member.page', $member->id) }}" class="text-warning">
                    {{ $member->getFullName()}} </a>
                @if(Auth::user()->hasRole('admin'))
                <span class="float-right "> <a href="{{route('admin.delete.user', $member)}}" class="btn btn-outline-danger">Delete</a> </span> </h5>
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="row border-bottom  p-1">
            <div class="col-md-6 row">
                <div class="col-md-4"><strong> Name :</strong> </div>
                <div class="col-md-8">
                    <a href="{{route('member.page', $member->id) }}"> {{ $member->getFullName()}}</a>

                </div>
            </div>

            <div class="col-md-6 row">
                <div class="col-md-4"><strong class=" float-left"> Roles : </strong> </div>
                <div class="col-md-8 "> @foreach($member->roles as $role )
                    <span class="badge badge-secondary ml-1"> {{$role->name}}</span>
                    @endforeach
                </div>
            </div>


        </div>

        <div class="row border-bottom  p-1">

            <div class="col-md-3"><strong class=" float-left"> Working days : </strong> </div>
            <div class="col-md-8 "> @foreach($member->days as $day )
                <span class="badge badge-secondary ml-1"> {{ucfirst($day->name)}}</span>
                {{-- upser case using pure PHP  --}}
                {{-- <span class="badge badge-secondary ml-1"> {{Str::title($day->name)}}</span> --}}
                {{-- uper case using laravel Str helpers --}}
                @endforeach

            </div>
        </div>

        <div class="row pt-1">
            <div class="col-md-6 row ">
                <div class="col-md-4 float-right"><strong> Team:</strong> </div>
                <div class="col-md-8">
                    @if(($member->team))
                    Belongs to <a href="{{route('team.page', $member->team->id)}}"> {{ $member->team->name}} </a>
                    @else
                    <p class="text-warning"> Not assigned to any team

                        @if(Auth::user()->hasRole('Admin'))
                        <button href="" class="btn btn-link text-info" data-toggle="modal" data-target="#team{{$member->id}}"> Assign to team </button>
                        @endif
                    </p>
                    <p></p>
                    @endif

                </div>
            </div>

            <div class="col-md-6 row">
                <div class="col-md-4  "><strong class=" float-left"> Project : </strong> </div>
                <div class="col-md-8 ">
                    @if(!$member->team)
                    <p class="text-warning"> NOT working on any project </p>

                    @elseif($member->team && !$member->team->project)
                    <p class="text-warning"> {{ $member->team->name}} not working on any project </p>

                    @else
                    <a href="{{route('member.page', $member->id)}}"> {{$member->getFullName()}} </a> is working on
                    {{$member->team->project->name}}
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        @if(Auth::user()->hasRole('admin'))

        <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#update{{$member->id}}">
            Update roles </button>

        <button class="btn btn-outline-info float-left" data-toggle="modal" data-target="#updateDays{{$member->id}}">
            Update working days </button>
        @else

        @can('updateWorkingDays', $member)
        <button class="btn btn-outline-info float-left" data-toggle="modal" data-target="#updateDays{{$member->id}}">
            Update my working days </button>
        @endcan
        @endif
    </div>

</div>

<!-- Update roles  Modal -->
@include('modals.UpdateRolesModal')

<!-- Update working days   Modal -->

@include('modals.UpdateWorkingDaysModal')

<!-- Assign to team  Modal -->


@include('modals.AssignToTeamModal')
