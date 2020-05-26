<form action="{{route('admin.newTeam')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name" class="text-info">Team name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="a fancy name for your new team " value="{{old('name')}}">
        @error('name')
        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="team" class="text-info">Assign to a project</label>
        <select name="project" id="project" class="form-control">
            <option value="" inactive> select project</option>
            @if(!$projects->count())
            <option value="" disabled class="text-danger">No active projects, please add a project first </option>

            @endif
            @foreach($projects as $project )
            <option value="{{$project->id}}" {{old('project') == $project->id ? 'selected' : ''}}> {{ucfirst($project->name)}} </option>
            @endforeach
            <option value="null" {{old('project') == "null" ? 'selected' : ''}}> Do this later </option>
        </select>
        @error('project')
        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="about" class="text-info">About this team </label>
        <textarea class="form-control" name="about" id="about" cols="30" rows="4" class="text-info" placeholder="write a short brief....">{{old('about')}}</textarea>
        @error('about')
        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mt-2">
        <button class="btn btn-info float-right">Add new team </button>
    </div>


</form>