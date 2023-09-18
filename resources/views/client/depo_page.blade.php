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
                        @if ($trash->picture)
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <img src="{{ $trash->picture }}" alt="image-trash" style="height: 8rem">
                            </div>
                        @endif
                        <form action="{{ route('depo.store', ['trash' => $trash->id]) }}" method="post">
                            @csrf
                            @method('post')
                            @error('error')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Trash Type</label>
                                <input type="text" name="inputType" list="items" class="form-control" id="inputType"
                                    value="{{ $trash->name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity</label>
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <input type="number" name="qty"
                                            class="form-control @error('qty')
                                            is-invalid
                                        @enderror"
                                            id="qty" value="{{ old('qty') }}">
                                        @error('qty')
                                            <div id="descInfo" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-auto">
                                        <h5 class="m-0">Kg x Rp. {{ number_format($trash->price, 0, '', '.') }}-,</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 d-flex">
                                <button type="submit" class="btn-lg btn btn-success w-100">Deposite</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
