<div class="jumbotron  bg-light text-warning">

    <div class="row">

        <div class="col-md-2 bg-info p-4 ">
            <h3 class="text-warning  text-center"> Issues: <span class="text-white"> {{ $user->issues->count()}} </span>
            </h3>
        </div>
        <div class="col-md-2 bg-info offset-md-1  p-4">
            <h3 class="text-warning text-center"> Pending : <span class="text-white">
                    {{ $user->issues()->where('status', 0)->get()->count()}} </h3>
        </div>

        <div class="col-md-2 bg-info p-4 offset-md-1 p-4">
            <h3 class="text-warning text-center  "> Standups: <span class="text-white"> {{ $user->standups->count()}}
                </span>
            </h3>
        </div>
        <div class="col-md-2 bg-info offset-md-1  p-4">
            <span class="text-white text-center">
                <h5 class="text-warning text-center  ">
                    {{ $user->hasRole('Admin') ? " You have admin rights" :" No admin rights "}} </h5>
            </span>
        </div>

    </div>
</div>
