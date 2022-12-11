@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="fs-2 fw-bold">New Ticket</h2>
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
                                        <form role="form" method="POST" id="paymentForm" action="{{route('add.ticket.post')}}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="username">Subject*</label>
                                                <input required type="text" class="form-control" name="subject">
                                            </div>

                                            <div class="form-group">
                                                <label for="username">Message*</label>
                                                <textarea required class="form-control" name="msg" rows="6"></textarea>
                                            </div>

                                            <div class="d-grid gap-2 mx-auto col-12">
                                                <button class="subscribe btn btn-primary btn-lg" type="submit"> Submit </button>
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
