@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2 class="fs-2 fw-bold">All Orders</h2>
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

                                        @if($data->count() > 0)
                                            <table class="table table-bordered table-striped mt-4">
                                                <thead>
                                                <tr>
                                                    <th class="fw-bold">Order ID</th>
                                                    <th>User Full Name</th>
                                                    <th>User Email</th>
                                                    <th>Balance</th>
                                                    <th>Order URL</th>
                                                    <th>Order Quantity</th>
                                                    <th>Order Cost</th>
                                                    <th>Order Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $d)
                                                    <tr>
                                                        <td class="fw-bold">{{$d->order_API_id}}</td>
                                                        <td>{{$d->user->name}}</td>
                                                        <td>{{$d->user->email}}</td>
                                                        <td>${{$d->user->fund->balance}}</td>
                                                        <td>{{$d->url}}</td>
                                                        <td>{{$d->quantity}}</td>
                                                        <td class="fw-bold">${{number_format($d->cost, 2)}}</td>
                                                        <td>{{$d->created_at->diffForHumans()}}</td>
                                                        <td><a class="btn btn-primary btn-sm" href="{{route('admin.order.status', [$d->user->id, $d->id])}}"><i class="fa-solid fa-fire"></i> View order Status</a> </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p class="fw-bold fs-6">No data.</p>
                                        @endif

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


