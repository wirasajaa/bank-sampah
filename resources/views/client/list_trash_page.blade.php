@extends('client.partials.app')
@section('content')
    <div class="container" style="height:90vh;">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-2 fw-bold text-center text-uppercase">
                            Trash Deposite
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Desc</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trash as $key => $item)
                                    <tr class="align-middle">
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td><img src="{{ $item->picture }}" alt="image-trash" style="height: 50px"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('depo', ['trash' => $item->id]) }}"
                                                    class="btn btn-sm btn-success">Deposite</a>
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
@push('script')
    <script></script>
@endpush
