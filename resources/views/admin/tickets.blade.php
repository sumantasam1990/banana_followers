@include('layouts.header')


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.top')
    <div class="body flex-grow-1 px-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="fs-2 fw-bold">All Tickets</h2>
                    <hr />
                </div>
            </div>
            <main>
                @include('layouts.alert')
                <div class="row">
                    <aside class="col-sm-12 mt-4">
                        <article class="card">
                            <div class="card-body p-5">

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-tab-card">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Ticket No.</th>
                                                    <th>Subject</th>
                                                    <th>Status</th>
                                                    <th>Ticket Created At</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $d)
                                                    <tr>
                                                        <td class="">
                                                            <a class="text-decoration-none text-dark" href="{{route('admin.view.ticket', [$d->id])}}">
                                                                {{$d->ticket_no}}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="fw-bold text-decoration-none text-black" href="{{route('admin.view.ticket', [$d->id])}}">
                                                                {{$d->subject}}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @if($d->status === 0)
                                                                <span class="badge bg-danger">In-progress</span>
                                                            @else
                                                                <span class="badge bg-primary">Completed</span>
                                                            @endif
                                                        </td>
                                                        <td>{{$d->created_at->diffForHumans()}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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
