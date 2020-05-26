<div class="row  card">
    <ul class="nav flex-column nav-pills text-center">
        <li class="nav-item bg-info text-center card-heading  p-2 rounded border">
            <h3 class="text-white "> User options </h3>
        </li>
</div>

<div class="row mt-3 card ">
    <ul class="nav flex-column nav-pills text-center ">

        <div class="col-md-10 offset-md-1">

            <li class=" nav-item border-bottom ">
                <a class=" nav-link text-info border mt-2 {{request()->is('dashboard/moral/*')? ' bg-secondary text-warning' : ' '}}" href="{{route('dashboard.moral.index', $user)}}"> Moral History </a>
            </li>
            <li class=" nav-item border-bottom ">
                <a class=" nav-link text-info border mt-2 {{request()->is('dashboard/standup/addNew')? ' bg-secondary text-warning' : ' '}}" href="{{route('dashboard.user.newStandup')}}"> New Standup </a>
            </li>

            <li class="nav-item border-bottom ">
                <a class="nav-link text-info border mt-2{{request()->is('dashboard/updatePassword/*')? ' bg-secondary text-warning' : ' '}} " href="{{route('dashboard.user.updatePassword' , $user)}}"> Update Password </a>
            </li>

            <li class="nav-item border-bottom ">
                <a class="nav-link text-info border mt-2{{request()->is('dashboard/*/data')? ' bg-secondary text-warning' : ' '}} " href="{{route('dashboard.user.data' , $user)}}"> Your data </a>
            </li>



            <li class="nav-item border-bottom ">

                <a class="nav-link text-info border mt-2{{request()->is('member/page/*')? ' bg-secondary text-warning' : ' '}} " href="{{route('member.page', $user->id) }}"> More about you </a>
            </li>


            <li class="nav-item ">
                <a class=" nav-link text-info border mt-2 {{request()->is('*/issues')? ' bg-secondary text-warning' : ' '}}" href="{{route('dashboard.user.issues', $user)}}"> Issues You Reported </a>
            </li>

        </div>
    </ul>
</div>
