@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2 class="fs-2 fw-bold">All Services</h2>
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

                                        <a class="btn btn-dark" href=""><i class="fa-brands fa-instagram"></i> Instagram</a>
                                        <a class="btn btn-dark" href=""><i class="fa-brands fa-facebook"></i> Facebook</a>
                                        <a class="btn btn-dark" href=""><i class="fa-brands fa-twitter"></i> Twitter</a>
                                        <a class="btn btn-dark" href=""><i class="fa-brands fa-tiktok"></i> Tiktok</a>
                                        <a class="btn btn-dark" href=""><i class="fa-brands fa-youtube"></i> YouTube</a>
                                        <a class="btn btn-dark" href=""><i class="fa-brands fa-linkedin"></i> Linkedin</a>
                                        <a class="btn btn-dark" href=""><i class="fa-brands fa-telegram"></i> Telegram</a>
                                        <a class="btn btn-dark" href=""><i class="fa-brands fa-spotify"></i> Spotify</a>


                                        <table class="table table-bordered table-striped mt-4">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Service</th>
                                                <th>Rate per 1000</th>
                                                <th>Min order</th>
                                                <th>Max order</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($services as $service)
                                                <tr>
                                                    <td>{{$service['service']}}</td>
                                                    <td>{{$service['name']}}</td>
                                                    <td>{{$service['rate']}}</td>
                                                    <td><span class="badge bg-danger">{{$service['min']}}</span></td>
                                                    <td><span class="badge bg-success">{{$service['max']}}</span></td>
                                                    <td><a class="btn btn-primary btn-sm" href="{{route('new.order')}}">New Order</a> </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
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


