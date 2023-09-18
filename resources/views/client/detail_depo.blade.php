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
    {{-- <script src="{{ asset('/js/dashboardChart.js') }}"></script> --}}
    <script>
        const trend = {!! json_encode($trend) !!};
        const labels = [];
        // const labels = ["January", "February", "March", "April", "May", "June", "July"];
        let trends = [];
        trend.forEach(item => {
            labels.push(item.name)
            trends.push(item.jumlah)
        });
        console.log(trend.length);

        const data = {
            labels: labels,
            datasets: [{
                label: "QTY",
                data: trends,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
            }],
        };

        const config = {
            type: "bar",
            data: data,
            options: {
                plugins: {
                    legend: false,
                },
            },
        };

        new Chart(document.getElementById("myChart"), config);
    </script>
@endpush
