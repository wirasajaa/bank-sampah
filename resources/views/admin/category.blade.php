@extends('admin.partials.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @error('error')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Trash Category Data</h3>
                            <a href="{{ route('admin.category.new') }}" class="btn btn-sm btn-outline-success">Add
                                New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Desc</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <form
                                                    action="{{ route('admin.category.delete', ['category' => $item->category_id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('admin.category.edit', ['category' => $item->category_id]) }}"
                                                    class="btn btn-sm btn-info">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
