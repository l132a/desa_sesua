@extends('layouts.app')

@section('title', 'Laporan Aplikasi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan Aplikasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></div>
                <div class="breadcrumb-item">Laporan Aplikasi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Laporan Aplikasi</h4>
                        </div>
                        <form class="form-report">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="tanggal_lahir">Tanggal Mulai</label>
                                                <input type="text" class="form-control text-sm datepicker" required
                                                    name="start_date" placeholder="Masukkan Tanggal Berita Acara">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggal_lahir">Tanggal Akhir</label>
                                                <input type="text" class="form-control text-sm datepicker" required
                                                    name="finish_date"
                                                    placeholder="Masukkan Tanggal Surat Keterangan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer d-flex justify-content-end bg-whitesmoke br">
                            <button type="button" class="btn btn-success report-aplikasi">Unduh</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('modules/daterangepicker.css') }}">
@endpush

@push('javascript')
    <script src="{{ asset('modules/daterangepicker.js') }}"></script>
    <script src="{{ asset('modules/jquery.fileDownload.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.report-aplikasi').on('click', function(e) {
                $.ajax({
                    url: "{{ route('aplikasi.export') }}",
                    data: {
                        start_date: $('input[name=start_date]').val(),
                        finish_date: $('input[name=finish_date]').val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        if (data.status) {
                            var file = data.file.split('/').pop();
                            $.fileDownload(window.location.origin + "/" + file)
                                .done(function() {
                                    alert('File berhasil diunduh!');
                                })
                                .fail(function() {
                                    alert('File gagal diunduh!');
                                });
                        }else{
                            swal(data.message, {
                                icon: 'error',
                            });
                        }
                    }
                });
            });

            $('.datepicker').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY'
                },
                startDate: moment(),
                showDropdowns: true,
                autoUpdateInput: true,
                singleDatePicker: true,
            });
        });
    </script>
@endpush
