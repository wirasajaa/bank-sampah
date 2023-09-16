@extends('client.partials.app')
@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                <h3 class="fw-bold text-center">
                    Trend Trash
                </h3>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="my-5">
            <h3 class="">Populer Trash</h3>
            <hr>
            <div class="row gy-2">
                @for ($i = 0; $i < 8; $i++)
                    <div class="col-md-3">
                        <a href="#"
                            class="d-flex items-center justify-content-center rounded bg-secondary-subtle p-4 text-decoration-none">
                            <h5 class="text-uppercase text-secondary m-0">Beling</h5>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('/js/dashboardChart.js') }}"></script>
@endpush
