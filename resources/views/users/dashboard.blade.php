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
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post">
                        @csrf
                        <label class="form-label">Fund*</label>
                        <input type="number" required name="_fund" class="form-control" placeholder="eg. $100" min="10">
                        <div class="mt-3 d-grid gap-2 col-5">
                            <button type="submit" class="btn btn-primary btn-lg">Pay now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

