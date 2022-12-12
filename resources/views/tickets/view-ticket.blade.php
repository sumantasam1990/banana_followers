@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="fs-2 fw-bold">View Ticket ({{$data[0]->ticket->ticket_no}})</h2>
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

                                        <ol class="list-group mb-4">
                                            @foreach($data as $d)
                                                <li class="mb-2 list-group-item @if(auth()->user()->id === $d->user_id) list-group-item-secondary @else '' @endif d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">{{$d->user->name}}</div>
                                                        {{$d->message}}
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill">{{$d->created_at->diffForHumans()}}</span>
                                                </li>
                                            @endforeach
                                        </ol>

                                        @foreach (['danger', 'success'] as $status)
                                            @if(Session::has($status))
                                                <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
                                            @endif
                                        @endforeach
                                        <form role="form" method="POST" id="paymentForm" action="{{route('add.ticket.reply')}}">
                                            @csrf

                                            <input type="hidden" name="ticket_id" value="{{$tid}}">
                                            <div class="form-group">
                                                <label for="username">Message*</label>
                                                <textarea {{$data[0]->ticket->status === 1 ? 'disabled' : ''}} class="form-control" name="msg" rows="8"></textarea>
                                            </div>

                                            <div class="d-grid gap-2 mx-auto col-12">
                                                <button {{$data[0]->ticket->status === 1 ? 'disabled' : ''}} class="subscribe btn btn-primary btn-lg" type="submit"> Submit </button>
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
