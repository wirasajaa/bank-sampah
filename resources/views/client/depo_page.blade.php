@extends('client.partials.app')
@section('content')
    <div class="container" style="height:90vh;">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-2 fw-bold text-center text-uppercase">
                            Trash Deposite
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Trash Type</label>
                                <input type="text" name="inputType" list="items" class="form-control" id="inputType">
                                <datalist id="items">
                                    @foreach ($types as $item)
                                        <option value="{{ $item->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity</label>
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <input type="number" name="qty" class="form-control" id="qty">
                                    </div>
                                    <div class="col-auto">
                                        <h5 class="m-0">Kg x Rp. 4000-,</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 d-flex">
                                <button type="submit" class="btn-lg btn btn-success w-100">Deposite</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
