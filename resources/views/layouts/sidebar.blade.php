<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar" @if(auth()->user()->user_type === 'admin') style="background-color: #000000 !important;" @endif>
    <div class="sidebar-brand d-none d-md-flex">
        <h1 class="fs-4">
            @if(auth()->user()->user_type === 'admin')
                Admin Panel
            @else
                Banana Followers
            @endif
        </h1>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    @if(auth()->user()->user_type === 'admin')
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{route('services')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-gem')}}"></use>
                </svg> All Services</a></li>

        <li class="nav-item"><a class="nav-link" href="{{route('admin.subscribers')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                </svg> All Subscribers</a></li>
{{--        <li class="nav-item"><a class="nav-link" href="{{route('new.order')}}">--}}
{{--                <svg class="nav-icon">--}}
{{--                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>--}}
{{--                </svg> New order</a></li>--}}
        <li class="nav-item"><a class="nav-link" href="{{route('admin.tickets')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-bullhorn')}}"></use>
                </svg> Tickets</a></li>

        </li>

    </ul>
    @else
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="{{route('services')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-gem')}}"></use>
                    </svg> Services</a></li>

            <li class="nav-item"><a class="nav-link" href="{{route('add.funds')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-wallet')}}"></use>
                    </svg> Add funds <span class="badge badge-sm bg-info ms-auto">${{!$balance ? 0.00 : number_format($balance->balance, 2)}}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('new.order')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                    </svg> New order</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('my.orders')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-basket')}}"></use>
                    </svg> My orders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('gifts')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-gift')}}"></use>
                    </svg> Gifts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('new.ticket')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-plus')}}"></use>
                    </svg> New Ticket</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('tickets')}}">
                    <svg class="nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-bullhorn')}}"></use>
                    </svg> My Tickets</a></li>

            </li>

        </ul>
    @endif
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
