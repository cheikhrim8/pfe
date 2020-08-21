@extends('layouts.app')
@section('content')

    <section class="my-5">

    </section>

    <section class="container">
        <h1 class="display-3">stocks index</h1>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Charts</b></div>
                    <div class="panel-body">
                        <canvas class="bg-white" id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>



@endsection

@push('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>

        let url = "{{url('stock/chart')}}";
        let Years = [];
        let Labels = [];
        let Prices = [];
        $(document).ready(function(){
            $.get(url, function(response){
                response.forEach(function(data){
                    Years.push(data.stockYear);
                    Labels.push(data.stockName);
                    Prices.push(data.stockPrice);
                });
                let ctx = document.getElementById("canvas").getContext('2d');
                let myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:Years,
                        datasets: [{
                            label: 'Infosys Price',
                            data: Prices,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            });
        });
    </script>

@endpush
