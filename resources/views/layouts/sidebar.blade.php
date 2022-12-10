<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <h1 class="fs-4">Bananafollowers</h1>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
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
        <li class="nav-item"><a class="nav-link" href="">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-gift')}}"></use>
                </svg> Gifts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('tickets')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-bullhorn')}}"></use>
                </svg> Tickets</a></li>

        </li>

    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
