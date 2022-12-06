@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2 class="fs-2 fw-bold">My Orders</h2>
                    <hr />
                </div>
            </div>
            <main>
                @include('layouts.alert')
                <div class="row">
                    <aside class="col-sm-12">
                        <article class="card">
                            <div class="card-body p-5">

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-tab-card">

                                        <table class="table table-bordered table-striped mt-4">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Order URL</th>
                                                <th>Order Quantity</th>
                                                <th>Order Cost</th>
                                                <th>Order date</th>
                                                <th>Order status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $d)
                                                <tr>
                                                    <td class="fw-bold">{{$d->order_API_id}}</td>
                                                    <td>
                                                        <a class="text-decoration-none text-dark fw-bold" href="{{$d->url}}" target="_blank">{{$d->url}}</a>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-danger">{{$d->quantity}}</span>
                                                    </td>
                                                    <td>${{number_format($d->cost, 2)}}</td>
                                                    <td>{{$d->created_at->diffForHumans()}}</td>
                                                    <td><a class="btn btn-primary btn-sm" href="{{route('order.status', [$d['order_API_id']])}}"><i class="fa-solid fa-fire"></i> Order Status</a> </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <div>
                                            {{ $data->links() }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>
                    </aside>
                </div>
            </main>
        </div>
    </div>
</div>

@include('layouts.footer')


