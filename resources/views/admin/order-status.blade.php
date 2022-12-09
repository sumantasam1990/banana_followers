@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2 class="fs-2 fw-bold">Order Status ({{$order->order_API_id}})</h2>
                    <hr/>
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
                                            <tr>
                                                <th>Order URL</th>
                                                <td>
                                                    <a class="text-decoration-none text-dark fw-bold" href="{{$order->url}}" target="_blank">{{$order->url}}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Order Quantity</th>
                                                <td>
                                                    <span class="badge bg-danger">{{$order->quantity}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Order Cost</th>
                                                <td>${{number_format($order->cost, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Order date</th>
                                                <td>{{$order->created_at->diffForHumans()}}</td>
                                            </tr>
                                            <tr>
                                                <th>Order status</th>
                                                <td class="fw-bold">{{$data['error'] ?? $data['status']}}</td>
                                            </tr>
                                            <tr>
                                                <th>Start Count</th>
                                                <td>{{$data['error'] ?? $data['start_count']}}</td>
                                            </tr>
                                            <tr>
                                                <th>Remains</th>
                                                <td>{{$data['error'] ?? $data['remains']}}</td>
                                            </tr>

                                        </table>

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


