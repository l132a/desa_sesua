@extends('layouts.app')

@section('title', 'Dafatar Aplikasi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Aplikasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></div>
                <div class="breadcrumb-item">Daftar Aplikasi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Daftar Aplikasi</h4>
                            <a href="{{ route('aplikasi.input') }}" class="btn btn-icon icon-left btn-success"><i
                                    class="fas fa-plus-circle"></i> Tambah
                                Aplikasi</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped datatable-aplikasi">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>No Berita Acara</th>
                                            <th>No Surat Keterangan</th>
                                            <th>Nama Pemeilik Tanah</th>
                                            <th>Alamat</th>
                                            <th>Desa</th>
                                            <th>Kecamatan</th>
                                            <th class="text-center" style="width: 150px">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('stylesheet')
    <style>
        .px50 {
            width: 50px;
            max-width: 100px;
            word-wrap: break-word;
        }

    </style>
@endpush

@push('javascript')
    <script>
        $.fn.dataTable.ext.errMode = 'none';
        $(document).ready(function() {
            const table = $('.datatable-aplikasi').DataTable({
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ route('aplikasi') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'no_berita_acara',
                    },
                    {
                        data: 'no_surat_keterangan'
                    },
                    {
                        data: 'nama',
                        name: 'penduduks.nama'
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        data: 'desa',
                        name: 'villages.name'
                    },
                    {
                        data: 'kecamatan',
                        name: 'districts.name'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                    targets: [7],
                    width: "20%",
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                }, {
                    targets: [0],
                    width: "5%",
                    className: 'text-right',
                    orderable: false,
                    searchable: false
                }, {
                    targets: [1, 2],
                    width: "5%",
                    className: 'text-left px50'
                }]
            });

            $(document).on('click', '.aplikasi-edit', function(e) {
                swal({
                    title: 'Edit Data',
                    text: "Anda yakin ingin edit data ini?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((result) => {
                    if (result) {
                        const id = $(this).data('id');
                        const url = "{{ route('aplikasi.edit', '/:id') }}";
                        if (id) {
                            window.location.href = url.replace('?', '').replace(':id', id);
                        }
                    }
                })
            });

            $(document).on('click', '.aplikasi-print', function(e) {
                swal({
                    title: 'Cetak Aplikasi',
                    text: "Anda yakin ingin cetak data ini?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((result) => {
                    if (result) {
                        const id = $(this).data('id');
                        const url = "{{ route('aplikasi.print', ':id') }}";
                        if (id) {
                            window.open(url.replace(':id', id), "_blank");
                        }
                    }
                })
            });

            $(document).on('click', '.aplikasi-delete', function(e) {
                swal({
                    title: 'Hapus Data',
                    text: "Anda yakin ingin menghapus data?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: "{{ route('aplikasi.destroy') }}",
                            type: 'POST',
                            data: {
                                id: $(this).data('id')
                            },
                            dataType: 'json',
                            success: function(data) {
                                if (data.status == true) {
                                    swal('Data berhasil dihapus', {
                                        icon: 'success',
                                    });
                                    table.ajax.reload(null, false);
                                } else {
                                    swal('Ada kesalahan, hubungi admin', {
                                        icon: 'success',
                                    });
                                }
                            }
                        });
                    }
                })
            });
            $('.export-aplikasi').on('click', function(e) {
                $.ajax({
                    url: "{{ route('aplikasi.export') }}",
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {}
                    }
                });
            });
        });
    </script>
@endpush
