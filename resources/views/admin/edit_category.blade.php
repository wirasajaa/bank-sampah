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
                        Edit Trash Caregory
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.update', ['category' => $category->category_id]) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Name</label>
                                <input type="text" aria-describedby="nameInfo" name="name"
                                    class="form-control @error('name')is-invalid @enderror"
                                    value="{{ old('name', $category->name) }}" id="categoryName">
                                @error('name')
                                    <div id="nameInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="categoryDesc" class="form-label">Description</label>
                                <textarea class="form-control @error('desc')is-invalid @enderror" name="desc" id="categoryDesc"
                                    aria-describedby="descInfo" cols="10" rows="5">{{ old('desc', $category->desc) }}</textarea>
                                @error('desc')
                                    <div id="descInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
