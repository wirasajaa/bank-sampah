@extends('admin.partials.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @error('error')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                <div class="card">
                    <div class="card-header">
                        New Trash Caregory
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.store') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Name</label>
                                <input type="text" aria-describedby="nameInfo" name="name"
                                    class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div id="nameInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="categoryDesc" class="form-label">Description</label>
                                <textarea class="form-control @error('desc')is-invalid @enderror" name="desc" id="categoryDesc"
                                    aria-describedby="descInfo" cols="10" rows="5">{{ old('desc') }}</textarea>
                                @error('desc')
                                    <div id="descInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
