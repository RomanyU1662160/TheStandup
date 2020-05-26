<nav class="navbar navbar-expand-md navbar-light bg-info text-white shadow-sm pb-4 pt-4">
    <div class="container-fluid ">
        <a class="navbar-brand  text-warning " href="{{ url('/') }}"> <img src="{{asset('assets/logo.png')}}" width='120px' height="100px" alt="">

            {{-- {{ config('app.name', 'Laravel') }} --}}

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item ml-4">
                    <a class="nav-link text-white" href="{{route('standup.addNew')}}">New Standup </a>
                </li>
                {{--Check if user has admin role  to access the adminDashboard --}}

                <li class="nav-item ml-4">
                    <a class="nav-link text-white" href="{{route('project.all')}}">All Projects </a>
                </li>
                <li class="nav-item ml-4 ">
                    <a class="nav-link text-white" href="{{route('team.all')}}">All Teams </a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link text-white" href="{{route('member.all')}}"> All Users </a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link text-white" href="{{route('home')}}"> Filter Search </a>
                </li>

                @endauth
            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">

                </li>

                <li class="nav-item">
                </li>
                <!-- Authentication Links -->

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else

                @auth

                @if(Auth::user()->hasRole('admin'))
                <li class="nav-item ml-4">
                    <a class="nav-link text-warning mr-4 border" href="{{route('admin.dashboard')}}"> Admin Dashboard
                    </a>
                </li>

                {{-- End checking the Admin role --}}

                @endif

                @endauth
                <a class="nav-link border text-warning mr-4" href="{{ route('dashboard.moral.index', Auth::user()) }}">
                    My Dashboard
                </a>


                <li class="nav-item ml-4">
                    <a class="nav-link text-warning mr-4 border" href="{{route('admin.dashboard')}}"> <span class="text-white"> Welcome : </span> <span class=" text-warning">
                            {{ Auth::user()->fname." ".Auth::user()->lname }}</span>
                    </a>
                </li>

                <li class="nav-item ml-4">

                    <a class="btn btn-outline-danger text-warning mr-4 border" href="{{route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest

            </ul>
            @if(App::isLocale('en'))
            <a class="btn btn-link text-warning mr-4 " href="{{route('locale',$locale='ar')}}"> Ar</a>
            @else
            <a class=" btn btn-link text-warning mr-4 " href="{{route('locale',$locale='en')}}"> En</a>
            @endif
        </div>

    </div>

</nav>
