@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="fs-2 fw-bold">New Order</h2>
                    <p class="fw-bold text-info">
                        15% welcome discount on your first 3 orders.
                        Every 20€ spent, 10% discount on the next 3 orders.
                    </p>
                    <hr />
                </div>
            </div>
            <main>
                @include('layouts.alert')
                <div class="row">
                    <aside class="col-sm-6">
                        <article class="card">
                            <div class="card-body p-5">

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-tab-card">

                                        @foreach (['danger', 'success'] as $status)
                                            @if(Session::has($status))
                                                <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
                                            @endif
                                        @endforeach
                                        <form role="form" method="POST" id="paymentForm" action="{{route('new.order.post')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="username">Service*</label>
                                                <select class="form-control" name="service" onchange="getServiceCost(this.value);">
                                                    <option selected>--Choose a service--</option>
                                                    @foreach($data as $d)
                                                        <option {{$d['_id'] == $id ? 'selected' : ''}} value="{{$d['_id']}}-{{$d['cost']}}">{{$d['type']}} - {{$d['title']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="username">Link to page*</label>
                                                <input type="url" class="form-control" name="url" placeholder="URL of your page">
                                            </div>

                                            <div class="form-group">
                                                <label for="username">Quantity*</label>
                                                <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                                            </div>

                                            <div class="form-group">
                                                <label for="username">Charge*</label>
                                                <p class="mb-1 fw-bold text-primary fs-5" id="rate_charge">{{$idRate ? '$' . number_format($idRate, 2) : ''}}</p>
                                                <del class="fw-bold text-danger"> ${{number_format($prevRate, 2)}}</del>
                                            </div>

                                            <div class="d-grid gap-2 mx-auto col-12">
                                                <button class="subscribe btn btn-primary btn-lg" type="submit"> Place Order </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </aside>
                    <aside class="col-md-6">

                    </aside>
                </div>
            </main>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    function getServiceCost(cost) {
        fetch('/u/service/cost/' + cost)
            .then((response) => response.json())
            .then((data) => document.getElementById('rate_charge').innerHTML = '$' + data.rate);
    }
</script>
