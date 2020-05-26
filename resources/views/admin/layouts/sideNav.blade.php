<div class="row  card">
    <ul class="nav flex-column nav-pills text-center">
        <li class="nav-item bg-info text-center card-heading  p-2 rounded border">
            <h3 class="text-white "> Admin options </h3>
        </li>
</div>
<div class="row mt-3 card ">
    <ul class="nav flex-column nav-pills text-center ">
        <li class="nav-item bg-secondary text-center card-heading  p-2 rounded border">
            <h3 class="text-white "> Projects </h3>
        </li>
        <div class="col-md-10 offset-md-1">
            <li class="nav-item border-bottom ">
                <a class="nav-link text-info {{request()->is('admin/allprojects')? ' bg-info text-warning  ' : ' '}} " href="{{route('admin.allProjects')}}">All Projects</a>
            </li>
            <li class=" nav-item border-bottom ">
                <a class=" nav-link text-info {{request()->is('admin/newProject')? ' bg-info text-warning  ' : ' '}}" href="{{route('admin.newProject')}}"> Add New Project </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link  text-info  " href="#"> </a>
            </li>

        </div>
    </ul>
</div>

<div class="row mt-3 card">
    <ul class="nav flex-column nav-pills text-center ">
        <li class="nav-item bg-secondary text-center card-heading  p-2 rounded border">
            <h3 class="text-white "> Teams </h3>
        </li>
        <div class="col-md-10 offset-md-1">
            <li class="nav-item border-bottom ">
                <a class="nav-link text-info {{request()->is('admin/allteams')? ' bg-info text-warning  ' : ' '}} " href="{{route('admin.allTeams')}}">All Teams</a>
            </li>
            <li class="nav-item border-bottom ">
                <a class="nav-link text-info {{request()->is('admin/newTeam')? ' bg-info text-warning ' : ' '}}" href="{{route('admin.newTeam')}}"> Add New Team </a>
            </li>

            <li class="nav-item  ">
                <a class="nav-link  text-info  " href="#"> </a>
            </li>

        </div>
    </ul>
</div>

<div class="row  card mt-3">
    <ul class="nav flex-column nav-pills text-center">
        <li class="nav-item bg-secondary text-center card-heading  p-2 rounded border">
            <h3 class="text-white "> Members </h3>
        </li>
        <div class="col-md-10 offset-md-1">
            <li class="nav-item border-bottom ">
            <a class="nav-link text-info {{request()->is('admin/allmembers')? ' bg-info text-warning  ' : ' '}} " href="{{route('admin.allMembers')}}">All members</a>
            </li>
         

          

        </div>
    </ul>
</div>
