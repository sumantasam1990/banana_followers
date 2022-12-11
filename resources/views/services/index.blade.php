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
                                        <h2>Search</h2>
                                        <form action="{{route('services.search')}}" method="post">
                                            @csrf
                                            <div class="row mb-3 mt-3">
                                                <div class="col-10">
                                                    <input type="search" required class="form-control" placeholder="Search with service name..." name="_s" value="{{$request->_s ?? ''}}">
                                                </div>
                                                <div class="col-2">
                                                    <div class="d-grid gap-2 mx-auto col-12">
                                                        <button type="submit" class="btn btn-light"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <a class="btn btn-dark" href="{{route('services')}}"><i class="fa-sharp fa-solid fa-star"></i> All services</a>

                                        <div class="btn-group">
                                            <a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-brands fa-instagram"></i> Instagram
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('services', ['instagram', 'likes'])}}">Likes</a></li>
                                                <li><a class="dropdown-item" href="{{route('services', ['instagram', 'follow'])}}">Followers</a></li>
                                                <li><a class="dropdown-item" href="{{route('services', ['instagram', 'comment'])}}">Comments</a></li>
                                            </ul>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-brands fa-facebook"></i> Facebook
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('services', ['facebook', 'like'])}}">Likes</a></li>
                                                <li><a class="dropdown-item" href="{{route('services', ['facebook', 'follower'])}}">Followers</a></li>
                                                <li><a class="dropdown-item" href="{{route('services', ['facebook', 'comment'])}}">Comments</a></li>
                                                <li><a class="dropdown-item" href="{{route('services', ['facebook', 'reaction'])}}">Reactions</a></li>
                                            </ul>
                                        </div>


                                        <a class="btn btn-dark" href="{{route('services', ['twitter'])}}"><i class="fa-brands fa-twitter"></i> Twitter</a>
                                        <a class="btn btn-dark" href="{{route('services', ['tiktok'])}}"><i class="fa-brands fa-tiktok"></i> Tiktok</a>
                                        <a class="btn btn-dark" href="{{route('services', ['youtube'])}}"><i class="fa-brands fa-youtube"></i> YouTube</a>
                                        <a class="btn btn-dark" href="{{route('services', ['linkedin'])}}"><i class="fa-brands fa-linkedin"></i> Linkedin</a>
                                        <a class="btn btn-dark" href="{{route('services', ['telegram'])}}"><i class="fa-brands fa-telegram"></i> Telegram</a>
                                        <a class="btn btn-dark" href="{{route('services', ['spotify'])}}"><i class="fa-brands fa-spotify"></i> Spotify</a>

                                        <div class="mt-4">
                                            {{$services->links()}}
                                        </div>

                                        <table class="table table-bordered table-striped mt-2">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Service</th>
                                                <th>Rate per 1000</th>
                                                <th>Min order</th>
                                                <th>Max order</th>
                                                @if(auth()->user()->user_type === 'user')
                                                <th>Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($services as $service)
                                                <tr>
                                                    <td>{{$service['_id']}}</td>
                                                    <td>{{$service['title']}}</td>
                                                    <td>
                                                        <del class="text-danger fw-bold">${{number_format($service['cost'] * 3.5, 2)}}</del>
                                                        <span class="fw-bold text-black fs-5">${{number_format(\App\Services\GiftOffers::offerApplicable($service['cost']) * 3.5, 2)}}</span>
                                                    </td>
                                                    <td><span class="badge bg-danger">{{$service['min_order']}}</span></td>
                                                    <td><span class="badge bg-success">{{$service['max_order']}}</span></td>
                                                    @if(auth()->user()->user_type === 'user')
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="{{route('new.order', [$service['_id']])}}"><i class="fa-solid fa-fire"></i> New Order</a>
                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <div>
                                            {{$services->links()}}
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


