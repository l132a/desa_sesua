@extends('layouts.app')

@section('title', 'Master Jabatan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Master Jabatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></div>
                <div class="breadcrumb-item">Master Jabatan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Daftar Jabatan</h4>
                            <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success tambah-jabatan"><i
                                    class="fas fa-plus-circle"></i> Tambah
                                Jabatan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped datatable-jabatan">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
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

    {{-- Modal Form --}}
    <div class="modal fade modal-jabatan" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-jabatan">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="hidden" name="id" />
                            <input type="text" class="form-control text-sm" name="nama" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control text-sm" name="jabatan" placeholder="Masukkan jabatan">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success simpan-jabatan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('stylesheet')
    
@endpush

@push('javascript')
    <script>
        $.fn.dataTable.ext.errMode = 'none';
        $(document).ready(function() {
            const table = $('.datatable-jabatan').DataTable({
                responsive: true,
                serverSide: true,
                ajax: "{{ route('master.jabatan') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'jabatan'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                    targets: [3],
                    width: "15%",
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },{
                    targets: [0],
                    width: "5%",
                    className: 'text-right',
                    orderable: false,
                    searchable: false
                }]

            });

            $('.tambah-jabatan').on('click', function() {
                $(".form-jabatan")[0].reset();
                $("input[name=id]").val("");
                $('.modal-jabatan').on("shown.bs.modal", function() {
                    $("input[name=name]").focus();
                });
                $(".modal-jabatan").modal("show");
                $(".modal-title").text("Tambah Jabatan");
            });

            $(".modal-jabatan .simpan-jabatan").on("click", function(e) {
                $(".form-jabatan").submit();
            });

            $(".form-jabatan").on("submit", function(e) {
                e.preventDefault();
                var form = $(this);
                if (form.valid()) {
                    $.ajax({
                        url: "{{ route('master.jabatan.store') }}",
                        data: form.serialize(),
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            if (data.status) {
                                swal('Data berhasil disimpan', {
                                    icon: 'success',
                                });
                                table.ajax.reload(null, false);
                                $(".modal-jabatan").modal("hide");
                            } else {
                                swal(JSON.stringify(data.message), {
                                    icon: 'error',
                                });
                            }
                        },
                        error: function(jqXHR, status, error) {
                            swal('Ada kesalahan, hubungi admin', {
                                icon: 'error',
                            });
                        }
                    });
                }
            });

            $(document).on('click', '.jabatan-edit', function(e) {
                $.ajax({
                    url: "{{ route('master.jabatan.edit') }}",
                    data: {
                        id: $(this).data('id')
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            $(".form-jabatan")[0].reset();
                            $("input[name=id]").val(data.data.id);
                            $("input[name=jabatan]").val(data.data.jabatan);
                            $("input[name=nama]").val(data.data.nama);
                            $(".simpan-jabatan").text("Ubah");
                            $(".modal-jabatan").on("shown.bs.modal", function() {
                                $("input[name=jabatan]").focus();
                            });
                            $(".modal-jabatan").modal("show");
                            $(".modal-title").text("Ubah Jabatan");
                        }
                    }
                });
            });

            $(document).on('click', '.jabatan-delete', function(e) {
                swal({
                    title: 'Hapus Data',
                    text: "Anda yakin ingin menghapus data?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: "{{ route('master.jabatan.destroy') }}",
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

            $(".form-jabatan").validate({
                rules: {
                    nama: {
                        required: true,
                    },
                    jabatan: {
                        required: true,
                    },
                },
                messages: {
                    nama: {
                        required: "Nama tidak boleh kosong",
                    },
                    jabatan: {
                        required: "Jabatan tidak boleh kosong",
                    },
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    element.closest(".form-group").append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
            });

        });
    </script>
@endpush
