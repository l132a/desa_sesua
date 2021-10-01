@extends('layouts.app')

@section('title', 'Master Pekerjaan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Master Pekerjaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></div>
                <div class="breadcrumb-item">Master Pekerjaan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Daftar Pekerjaan</h4>
                            <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success tambah-pekerjaan"><i
                                    class="fas fa-plus-circle"></i> Tambah
                                Pekerjaan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped datatable-pekerjaan">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Pekerjaan</th>
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
    <div class="modal fade modal-pekerjaan" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-pekerjaan">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" />
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control text-sm" name="pekerjaan"
                                placeholder="Masukkan pekerjaan">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success simpan-pekerjaan">Simpan</button>
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
            const table = $('.datatable-pekerjaan').DataTable({
                responsive: true,
                serverSide: true,
                ajax: "{{ route('master.pekerjaan') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'pekerjaan'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                    targets: [2],
                    width: "15%",
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                }, {
                    targets: [0],
                    width: "5%",
                    className: 'text-right',
                    orderable: false,
                    searchable: false
                }]

            });

            $('.tambah-pekerjaan').on('click', function() {
                $(".form-pekerjaan")[0].reset();
                $("input[name=id]").val("");
                $('.modal-pekerjaan').on("shown.bs.modal", function() {
                    $("input[name=pekerjaan]").focus();
                });
                $(".modal-pekerjaan").modal("show");
                $(".modal-title").text("Tambah Pekerjaan");
            });

            $(".modal-pekerjaan .simpan-pekerjaan").on("click", function(e) {
                $(".form-pekerjaan").submit();
            });

            $(".form-pekerjaan").on("submit", function(e) {
                e.preventDefault();
                var form = $(this);
                if (form.valid()) {
                    $.ajax({
                        url: "{{ route('master.pekerjaan.store') }}",
                        data: form.serialize(),
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            if (data.status) {
                                swal('Data berhasil disimpan', {
                                    icon: 'success',
                                });
                                table.ajax.reload(null, false);
                                $(".modal-pekerjaan").modal("hide");
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

            $(document).on('click', '.pekerjaan-edit', function(e) {
                $.ajax({
                    url: "{{ route('master.pekerjaan.edit') }}",
                    data: {
                        id: $(this).data('id')
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            $(".form-pekerjaan")[0].reset();
                            $("input[name=id]").val(data.data.id);
                            $("input[name=pekerjaan]").val(data.data.pekerjaan);
                            $(".simpan-pekerjaan").text("Ubah");
                            $(".modal-pekerjaan").on("shown.bs.modal", function() {
                                $("input[name=pekerjaan]").focus();
                            });
                            $(".modal-pekerjaan").modal("show");
                            $(".modal-title").text("Ubah Pekerjaan");
                        }
                    }
                });
            });

            $(document).on('click', '.pekerjaan-delete', function(e) {
                swal({
                    title: 'Hapus Data',
                    text: "Anda yakin ingin menghapus data?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: "{{ route('master.pekerjaan.destroy') }}",
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

            $(".form-pekerjaan").validate({
                rules: {
                    pekerjaan: {
                        required: true,
                    },
                },
                messages: {
                    pekerjaan: {
                        required: "Pekerjaan tidak boleh kosong",
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
