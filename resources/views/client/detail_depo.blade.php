@extends('client.partials.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
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
                @if ($order)
                    <div class="my-3">
                        <table class="table align-middle">
                            <tr>
                                <td>Status</td>
                                <td>
                                    <span class="btn btn-sm btn-success">Stored</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Type Sampah</td>
                                <td>: {{ $order->type->name }}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>: {{ $order->type->price }}</td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>: {{ $order->qty }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>
                                    <h3>: Rp. {{ number_format($order->qty * $order->type->price, 0, '', '.') }}-,</h3>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('/js/dashboardChart.js') }}"></script>
@endpush
