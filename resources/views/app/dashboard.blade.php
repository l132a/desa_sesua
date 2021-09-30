@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></div>
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pengguna</h4>
                        </div>
                        <div class="card-body"><a href="{{ route('master.users') }}">{{ $param['user'] ?? '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jabatan</h4>
                        </div>
                        <div class="card-body"><a
                                href="{{ route('master.jabatan') }}">{{ $param['jabatan'] ?? '' }}</a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Penduduk</h4>
                        </div>
                        <div class="card-body"><a
                                href="{{ route('master.penduduk') }}">{{ $param['penduduk'] ?? '' }}</a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Aplikasi</h4>
                        </div>
                        <div class="card-body"><a href="{{ route('aplikasi') }}">{{ $param['aplikasi'] ?? '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistics</h4>
                        <div class="card-header-action">
                            <div class="btn-group button-group">
                                <a href="javascript:void(0)" class="btn btn-outline-primary button-week active">Week</a>
                                <a href="javascript:void(0)" class="btn btn-outline-primary button-month">Month</a>
                                <a href="javascript:void(0)" class="btn btn-outline-primary button-year">Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas class="myChart" height="80"></canvas>
                        <div class="statistic-details mt-sm-4 footer-legend">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
        </div>
    </section>
@endsection

@push('javascript')
    <script src="{{ asset('modules/chart.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            getChart(0);

            $('.button-group').click(function() {
                $('.button-week').removeClass('active');
            });

            $('.button-week').on('click', function(e) {
                getChart(0);
            });

            $('.button-month').on('click', function(e) {
                getChart(1);
            });

            $('.button-year').on('click', function(e) {
                getChart(2);
            });

            function getChart(e) {
                $.ajax({
                    url: "{{ route('dashboard') }}",
                    data: {
                        type: e
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        renderChart(data.data);
                        $('.footer-legend').html('');
                        $.each(data.data[0].footer, function(key, val) {
                            if ($('.footer-legend').children().length <= 4) {
                                $('.footer-legend').append(
                                    '<div class="statistic-details-item">' +
                                    '<div class="detail-value">'+data.data[0].legend[key]+'</div>' +
                                    '<div class="detail-name">' + val + '</div>' +
                                    '</div>'
                                )
                            }
                        });

                    }
                });
            }

            function renderChart(data) {
                var statistics_chart = $(".myChart")[0].getContext("2d");
                var myChart = new Chart(statistics_chart, {
                    type: "line",
                    data: {
                        labels: data[0].label,
                        datasets: [{
                            label: "Data Aplikasi",
                            data: data[0].count,
                            borderWidth: 5,
                            borderColor: "#6777ef",
                            backgroundColor: "transparent",
                            pointBackgroundColor: "#fff",
                            pointBorderColor: "#6777ef",
                            pointRadius: 4,
                        }, ],
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    stepSize: parseInt(data[0].step),
                                },
                            }, ],
                            xAxes: [{
                                gridLines: {
                                    color: "#fbfbfb",
                                    lineWidth: 2,
                                },
                            }, ],
                        },
                    },
                });
            }
        });
    </script>
@endpush
