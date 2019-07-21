<div class="left side-menu">
    <div class="user-details">
        <div class="pull-left">
            <img src="{{asset('/storage/avatars')}}/{{ Auth::user()->image }}" alt="" class="thumb-md rounded-circle">
        </div>
        <div class="user-info">
            <a href="{{route('users.view', ['id' => Auth::user()->id])}}">{{ Auth::user()->name }}</a>
            <p class="text-muted m-0">{{ Auth::user()->first_role }}</p>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu" id="side-menu">
            <li class="menu-title">Меню навигации</li>
            <li>
                <a href="/">
                    <i class="ti-home"></i><span> Рабочая область </span>
                </a>
            </li>

            <li>
                <a href="{{route('users.list')}}">
                    <i class="fa fa-user"></i> <span> Пользователи </span>
                </a>
            </li>

            <li>
                <a href="{{route('phones.index')}}">
                    <i class="ti-paint-bucket"></i><span> Заблокированные номера </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="ti-light-bulb"></i> <span> Components </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="components-range-slider.html">Range Slider</a></li>
                    <li><a href="components-alerts.html">Alerts</a></li>
                    <li><a href="components-icons.html">Icons</a></li>
                    <li><a href="components-widgets.html">Widgets</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('payers.index')}}">
                    <i class="ti-spray"></i> <span> Реестр пайщиков </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="ti-pencil-alt"></i><span> Forms </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="forms-general.html">General Elements</a></li>
                    <li><a href="forms-advanced.html">Advanced Form</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="ti-menu-alt"></i><span> Tables </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="tables-basic.html">Basic tables</a></li>
                    <li><a href="tables-advanced.html">Advanced tables</a></li>
                </ul>
            </li>

            <li>
                <a href="charts.html">
                    <i class="ti-pie-chart"></i><span class="badge badge-custom pull-right">5</span> <span> Charts </span>
                </a>
            </li>

            <li>
                <a href="maps.html">
                    <i class="ti-location-pin"></i> <span> Maps </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="ti-files"></i><span> Pages </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="pages-login.html">Login</a></li>
                    <li><a href="pages-register.html">Register</a></li>
                    <li><a href="pages-forget-password.html">Forget Password</a></li>
                    <li><a href="pages-lock-screen.html">Lock-screen</a></li>
                    <li><a href="pages-blank.html">Blank page</a></li>
                    <li><a href="pages-404.html">Error 404</a></li>
                    <li><a href="pages-confirm-mail.html">Confirm Mail</a></li>
                    <li><a href="pages-session-expired.html">Session Expired</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('configs.index')}}">
                    <i class="ti-widget"></i> <span> Конфигурации </span>
                </a>
            </li>

 {{--           <li>
                <a href="javascript: void(0);"><i class="ti-widget"></i><span> Extra Pages </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="extras-timeline.html">Timeline</a></li>
                    <li><a href="extras-invoice.html">Invoice</a></li>
                    <li><a href="extras-profile.html">Profile</a></li>
                    <li><a href="extras-calendar.html">Calendar</a></li>
                    <li><a href="extras-faqs.html">FAQs</a></li>
                    <li><a href="extras-pricing.html">Pricing</a></li>
                    <li><a href="extras-contacts.html">Contacts</a></li>
                </ul>
            </li>--}}

            <li>
                <a href="javascript: void(0);"><i class="ti-share"></i> <span> Multi Level </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level nav" aria-expanded="false">
                    <li><a href="javascript: void(0);">Level 1.1</a></li>
                    <li><a href="javascript: void(0);" aria-expanded="false">Level 1.2 <span class="menu-arrow"></span></a>
                        <ul class="nav-third-level nav" aria-expanded="false">
                            <li><a href="javascript: void(0);">Level 2.1</a></li>
                            <li><a href="javascript: void(0);">Level 2.2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>