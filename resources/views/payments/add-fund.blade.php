@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="fs-2 fw-bold">Add Fund</h2>
                    <hr />
                </div>
            </div>
            <main>
                <div class="row">
                    <aside class="col-sm-6">
                        <article class="card">
                            <div class="card-body p-5">
                                <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                            <i class="fa-solid fa-credit-card"></i> Credit Card</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-tab-card">
                                        @foreach (['danger', 'success'] as $status)
                                            @if(Session::has($status))
                                                <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
                                            @endif
                                        @endforeach
                                        <form role="form" method="POST" id="paymentForm" action="{{route('add.fund.payment')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="username">Amount*</label>
                                                <input type="number" class="form-control" name="_amount" placeholder="Amount">
                                            </div>

                                            <div class="form-group">
                                                <label for="username">Full name (on the card)</label>
                                                <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                            </div>
{{--                                            <div class="form-group">--}}
{{--                                                <label for="cardNumber">Card number</label>--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <input type="text" class="form-control" name="cardNumber" placeholder="Card Number">--}}
{{--                                                    <div class="input-group-append">--}}
{{--                                            <span class="input-group-text">--}}
{{--                                            <i class="fab fa-cc-visa fa-lg pr-1"></i>--}}
{{--                                            <i class="fab fa-cc-amex fa-lg pr-1"></i>--}}
{{--                                            <i class="fab fa-cc-mastercard fa-lg"></i>--}}
{{--                                            </span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            <div class="form-group">
                                                <label for="cardNumber">Card number</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="cardNumber" placeholder="Card Number" aria-label="Card Number" aria-describedby="basic-addon2">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="fab fa-cc-visa fa-lg me-1"></i>
                                                        <i class="fab fa-cc-amex fa-lg me-1"></i>
                                                        <i class="fab fa-cc-mastercard fa-lg me-1"></i>
                                                    </span>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label><span class="hidden-xs">Expiration</span> </label>
                                                        <div class="input-group">
                                                            <select class="form-control" name="month">
                                                                <option value="">MM</option>
                                                                @foreach(range(1, 12) as $month)
                                                                    <option value="{{$month}}">{{$month}}</option>
                                                                @endforeach
                                                            </select>
                                                            <select class="form-control" name="year">
                                                                <option value="">YYYY</option>
                                                                @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                                    <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label data-toggle="tooltip" title=""
                                                               data-original-title="3 digits code on back side of the card">CVV <i
                                                                class="fa fa-question-circle"></i></label>
                                                        <input type="number" class="form-control" placeholder="CVV" name="cvv">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 mx-auto col-12">
                                                <button class="subscribe btn btn-primary btn-lg" type="submit"> Confirm </button>
                                            </div>
                                        </form>
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

