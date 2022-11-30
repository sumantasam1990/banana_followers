<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
            </svg>
        </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{asset('assets/brand/coreui.svg#full')}}"></use>
            </svg></a>
{{--        <ul class="header-nav d-none d-md-flex">--}}
{{--            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>--}}
{{--        </ul>--}}
        <ul class="header-nav ms-auto">
{{--            <li class="nav-item"><a class="nav-link" href="#">--}}
{{--                    <svg class="icon icon-lg">--}}
{{--                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>--}}
{{--                    </svg></a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="#">--}}
{{--                    <svg class="icon icon-lg">--}}
{{--                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>--}}
{{--                    </svg></a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="#">--}}
{{--                    <svg class="icon icon-lg">--}}
{{--                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>--}}
{{--                    </svg></a></li>--}}
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img" src="{{asset('assets/img/avatars/8.jpg')}}" alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div>

                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-settings')}}"></use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-credit-card')}}"></use>
                        </svg> Payments</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('auth.logout')}}">
                        <svg class="icon me-2">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                        </svg> Logout</a>
                </div>
            </li>
        </ul>
    </div>

</header>
