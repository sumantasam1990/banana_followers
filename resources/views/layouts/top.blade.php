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
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Welcome to <span class="fw-bold">{{auth()->user()->name}}</span>
                    <div class="avatar avatar-md"><img class="avatar-img" src="{{asset('images/user.png')}}" alt="{{auth()->user()->email}}"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div>

                    <a class="dropdown-item" href="{{route('add.funds')}}">
                        <svg class="icon me-2">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-wallet')}}"></use>
                        </svg> Add fund</a><a class="dropdown-item" href="{{route('my.orders')}}">
                        <svg class="icon me-2">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-basket')}}"></use>
                        </svg> My orders</a>
                    <a class="dropdown-item" href="{{route('services')}}">
                        <svg class="icon me-2">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-gem')}}"></use>
                        </svg> Services</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('auth.logout')}}">
                        <svg class="icon me-2">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                        </svg> Logout</a>
                </div>
            </li>
        </ul>
    </div>

</header>
