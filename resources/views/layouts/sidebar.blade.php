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
            @can('view statistics')
            <li>
                <a href="/">
                    <i class="ti-home"></i><span> Рабочая область </span>
                </a>
            </li>
            @endcan
            @can('view users')
            <li>
                <a href="{{route('users.list')}}">
                    <i class="fa fa-user"></i><span class="badge badge-custom pull-right">{{config('app.users-count')}}</span> <span> Пользователи </span>
                </a>
            </li>
            @endcan
            @can('view phones')
            <li>
                <a href="{{route('phones.index')}}">
                    <i class="ti-paint-bucket"></i><span> Заблокированные номера </span>
                </a>
            </li>
            @endcan
            @can('view filials')
            <li>
                <a href="{{route('filials.index')}}">
                    <i class="ti-light-bulb"></i><span class="badge badge-custom pull-right">{{config('app.filials-count')}}</span><span> Филиалы </span>
                </a>
            </li>
            @endcan
            @can('view payer')
            <li>
                <a href="{{route('payers.index')}}">
                    <i class="ti-spray"></i><span class="badge badge-custom pull-right">{{config('app.payers-count')}}</span> <span> Реестр пайщиков </span>
                </a>
            </li>
            @endcan
            @can('view loans')
            <li>
                <a href="{{route('loans.index')}}">
                    <i class="ti-pencil-alt"></i><span class="badge badge-custom pull-right">{{config('app.loans-count')}}</span> <span> Заявки на займ </span>
                </a>
            </li>
            @endcan
{{--            <li>
                <a href="javascript: void(0);"><i class="ti-pencil-alt"></i><span> Forms </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="forms-general.html">General Elements</a></li>
                    <li><a href="forms-advanced.html">Advanced Form</a></li>
                </ul>
            </li>--}}
            @can('view incassations')
            <li>
                <a href="{{route('incassations.index')}}">
                    <i class="ti-menu-alt"></i><span class="badge badge-custom pull-right">{{config('app.incassations-count')}}</span> <span> Инкассации </span>
                </a>
            </li>
            @endcan
            @can('view payments')
            <li>
                <a href="{{route('payments.index')}}">
                    <i class="ti-files"></i><span class="badge badge-custom pull-right">{{config('app.payments-count')}}</span> <span> Платежи </span>
                </a>
            </li>
            @endcan

{{--            <li>
                <a href="javascript: void(0);"><i class="ti-menu-alt"></i><span> Tables </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="tables-basic.html">Basic tables</a></li>
                    <li><a href="tables-advanced.html">Advanced tables</a></li>
                </ul>
            </li>--}}

            <li>
                    <a href="javascript: void(0);"><i class="ti-pie-chart"></i><span> Отчёты </span><span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('view incassation report')
                        <li><a href="{{route('report.incassation')}}">Отчёт по инкассациям</a></li>
                        @endcan
                        @can('view terminals report')
                        <li><a href="{{route('report.terminals')}}">Статистика по терминалам</a></li>
                         @endcan
                            @can('view payments report')
                        <li><a href="{{route('report.payments')}}">Отчёт по платежам</a></li>
                            @endcan
                            @can('view filials report')
                        <li><a href="{{route('report.filials')}}">Отчёт по филиалам</a></li>
                            @endcan
                            @can('view payers report')
                                <li><a href="{{route('report.payers')}}">Отчёт по пайщикам</a></li>
                            @endcan

                    </ul>
            </li>
            @can('view terminals')
            <li>
                <a href="{{route('terminals.index')}}">
                    <i class="ti-location-pin"></i> <span class="badge badge-custom pull-right">{{config('app.terminals-count')}}</span><span> Терминалы </span>
                </a>
            </li>
            @endcan

{{--            <li>
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
            </li>--}}
            @can('view configs')
            <li>
                <a href="{{route('configs.index')}}">
                    <i class="ti-widget"></i> <span> Конфигурации </span>
                </a>
            </li>
            @endcan

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

{{--            <li>
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
            </li>--}}

        </ul>

    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>