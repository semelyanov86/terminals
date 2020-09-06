<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="/" class="logo">
                        <span>
                            <img src="{{asset('assets/images/logo.png')}}" alt="">
                        </span>
            <i>
                <img src="{{asset('assets/images/logo_sm.png')}}" alt="">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-unstyled topbar-right-menu float-right mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('/storage/avatars')}}/{{ Auth::user()->image }}" alt="user" class="rounded-circle"> <span class="ml-1"> {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h6 class="text-overflow m-0">Добро пожаловать !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('users.view', ['id' => Auth::user()->id])}}" class="dropdown-item notify-item">
                        <i class="ti-user"></i> <span>Мой профиль</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('users.edit', ['id' => Auth::user()->id])}}" class="dropdown-item notify-item">
                        <i class="ti-settings"></i> <span>Мои настройки</span>
                    </a>


                    <!-- item-->
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <i class="ti-power-off"></i><span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hide-phone app-search">
                <form action="{{route('search')}}" method="post" role="search" class="">
                    @csrf
                    <input id="search" name="search" type="text" placeholder="Search..." class="form-control">
                    <a><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul>

    </nav>

</div>