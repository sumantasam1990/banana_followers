@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2 class="fs-2 fw-bold">Gifts</h2>
                    <hr />
                </div>
            </div>
            <main>
                @include('layouts.alert')
                <div class="row">
                    <aside class="col-md-8">
                        <article class="card">
                            <div class="card-body p-5">

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-tab-card">

                                        <div class="mb-4">
                                            <a class="btn btn-primary mt-2" href="{{route('add.funds')}}"><i class="fa-solid fa-sack-dollar"></i> Add funds</a>
                                            <a class="btn btn-dark mt-2" href="{{route('services')}}"><i class="fa-solid fa-cart-shopping"></i> Place a order</a>
                                        </div>

                                        <ul class="list-group fs-5">
                                            <li class="list-group-item active"><i class="fa-solid fa-gift text-danger"></i> 15% welcome discount on your first 3 orders.</li>
                                            <li class="list-group-item"><i class="fa-solid fa-gift text-danger"></i> Every 20€ spent, 10% discount on the next 3 orders.</li>
                                        </ul>



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


