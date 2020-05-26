<form action="{{route('admin.newProject')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name" class="text-info">Project name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="project name" value="{{old('name')}}">
        @error('name')
        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="team" class="text-info">Assign a team</label>
        <select name="team" id="team" class="form-control">
            <option value=""> select</option>
            @if(!$teams->count())
            <option value="" disabled class="text-danger">No active teams, please add a team first </option>
            @endif
            @foreach($teams as $team )
            <option value="{{$team->id}}" {{old('team') ==$team->id ? 'selected' : ''}}> {{ucfirst($team->name)}} </option>
            @endforeach
            <option value="null" {{old('team') == "null" ? 'selected' : ''}}> Do this later </option>
        </select>
        @error('team')
        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row">
        <div class="form-group col">
            <label for="start_date" class="text-info">Estimated start date </label>
            <input type="date" class="form-control" name="start_date" id="start_date" value="{{old('start_date')}}">
            @error('start_date')
            <span class="text-danger" role="alert">
                <strong class="">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col">
            <label for="end_date" class="text-info"> Estimated end date </label>
            <input type="date" class="form-control" name="end_date" id="end_date" value="{{old('end_date')}}">
            @error('end_date')
            <span class="text-danger" role="alert">
                <strong class="">{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="about" class="text-info">About this project </label>
        <textarea class="form-control" name="about" id="about" cols="30" rows="4" class="text-info" placeholder="write a short brief....">{{old('about')}}</textarea>
        @error('about')
        <span class="text-danger" role="alert">
            <strong class="">{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mt-2">
        <button class="btn btn-info float-right">Add Project</button>
    </div>


</form>