<div class="card bg-light mb-3  ">
    <div class="card-header bg-secondary ">
        <div class="">
            <p class="card-title text-warning"> {{ $project->name}}

                <span class="float-right badge badge-{{ $project->isActive() ? 'success' : 'secondary text-warning'}}">
                    {{ $project->isActive() ? "Active" : "Not Active"}}</span> </p>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 row">
                <div class="col-md-3"><strong> Teams:</strong> </div>
                <div class="col-md-9">
                    @if(!$project->teams->count())
                    <p class="text-warning"> No team is assigned this project </p>
                    @endif
                    @foreach($project->teams as $team )
                    <p class="text-info">- {{ $team->name }}
                        @if(Auth::user()->hasRole('admin'))
                        <a href="{{route('admin.dissociateTeam',$team)}}" class="text-danger  " data-toggle="tooltip"
                            data-placement="top" title="Remove team form project ">
                            <i class=" icon ion-md-trash m-4"> remove</i>
                        </a>
                        @endif
                    </p>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6 row">
                <div class="col-md-4 float-right "><strong class=" float-right"> Start date: </strong> </div>
                <div class="col-md-8  ">
                    <span> {{ $project->start_date->format('d M Y')}}</span>
                    <small> ({{ $project->start_date->diffForHumans()}}) </small>
                </div>
                <div class="col-md-4 "><strong class=" float-right">Ending : </strong> </div>
                <div class="col-md-8  ">
                    <span> {{ $project->end_date->format('d M Y')}}</span>
                    <small> ({{ $project->end_date->diffForHumans()}}) </small>
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        @if(Auth::user()->hasRole('admin'))
        <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#update{{$project->id}}"> Edit
            Project </button>
        @else
        <span class="text-info text-center"> You don't have access to admin options </span>
        @endif
    </div>

</div>

<!-- Update Modal -->
<div class="modal fade" id="update{{$project->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('projects.templates.editTemplate')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>