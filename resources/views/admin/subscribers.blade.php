@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2 class="fs-2 fw-bold">All Subscribers</h2>
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
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped mt-4">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>User Full Name</th>
                                                        <th>User Email</th>
                                                        <th>User Registered At</th>
                                                        <th>Balance</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data as $d)
                                                        <tr>
                                                            <td class="fw-bold">{{$d->id}}</td>
                                                            <td>{{$d->name}}</td>
                                                            <td>{{$d->email}}</td>
                                                            <td>{{$d->created_at->diffForHumans()}}</td>
                                                            <td class="fw-bold">${{$d->fund->balance}}</td>
                                                            <td><a class="btn btn-primary btn-sm" href="{{route('subs.orders', [$d->id])}}"><i class="fa-solid fa-fire"></i> View orders</a> </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

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


