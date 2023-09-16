@extends('admin.partials.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        New Trash Type
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.type.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="typename" class="form-label">Name</label>
                                <input type="text" id="typename" aria-describedby="nameInfo" name="name"
                                    class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div id="nameInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="typeSlug" class="form-label">Slug</label>
                                <input type="text" readonly id="typeSlug" aria-describedby="slugInfo" name="slug"
                                    class="form-control @error('slug')is-invalid @enderror" value="{{ old('slug') }}">
                                @error('slug')
                                    <div id="slugInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category</label>
                                <select class="form-select @error('category_id')is-invalid @enderror" name="category_id"
                                    aria-describedby="categoryInfo" id="categoryName">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->category_id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div id="categoryInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" aria-describedby="priceInfo" id="price" name="price"
                                    class="form-control @error('price')is-invalid @enderror" value="{{ old('price') }}">
                                @error('price')
                                    <div id="priceInfo" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="picture" class="form-label">picture</label>
                                <input type="file" aria-describedby="pictureInfo" id="picture" name="picture"
                                    class="form-control @error('picture')is-invalid @enderror"
                                    value="{{ old('picture') }}">
                                @error('picture')
                                    <div id="pictureInfo" class="invalid-feedback">
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
@push('script')
    <script>
        const name = document.getElementById('typename');
        const slug = document.getElementById('typeSlug');
        name.addEventListener('change', () => {
            slug.value = name.value.replaceAll(' ', '_').toLowerCase();
        })
    </script>
@endpush
