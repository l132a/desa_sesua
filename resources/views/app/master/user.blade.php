@extends('layouts.app')

@section('title', 'Master User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Master Pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></div>
                <div class="breadcrumb-item">Master Pengguna</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Daftar Pengguna</h4>
                            <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success tambah-user"><i
                                    class="fas fa-plus-circle"></i> Tambah
                                Pengguna</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped datatable-users">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>Email</th>
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
    <div class="modal fade modal-user" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-user">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="hidden" name="id" />
                            <input type="text" class="form-control text-sm" name="name" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control text-sm" name="email" placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control text-sm" name="password"
                                placeholder="Masukkan password">
                        </div>
                        <div class="form-group">
                            <label for="desa">Hak Akses</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="role_id" value="1" class="selectgroup-input">
                                    <span class="selectgroup-button">Admin</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="role_id" value="2" class="selectgroup-input">
                                    <span class="selectgroup-button">Operator</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success simpan-user">Simpan</button>
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
            const table = $('.datatable-users').DataTable({
                responsive: true,
                serverSide: true,
                ajax: "{{ route('master.users') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
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
                }, {
                    targets: [0],
                    width: "5%",
                    className: 'text-right',
                    orderable: false,
                    searchable: false
                }]

            });

            $('.tambah-user').on('click', function() {
                $(".form-user")[0].reset();
                $("input[name=id]").val("");
                $(".modal-user .select-role").val(null).trigger("change");
                $('.modal-user').on("shown.bs.modal", function() {
                    $("input[name=name]").focus();
                });
                $(".modal-user").modal("show");
                $(".modal-user .modal-title").text("Tambah Pengguna");
            });

            $(".modal-user .simpan-user").on("click", function(e) {
                $(".form-user").submit();
            });

            $(".form-user").on("submit", function(e) {
                e.preventDefault();
                var form = $(this);
                if (form.valid()) {
                    $.ajax({
                        url: "{{ route('master.users.store') }}",
                        data: form.serialize(),
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            if (data.status) {
                                swal('Data berhasil disimpan', {
                                    icon: 'success',
                                });
                                table.ajax.reload(null, false);
                                $(".modal-user").modal("hide");
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

            $(document).on('click', '.user-edit', function(e) {
                $.ajax({
                    url: "{{ route('master.users.edit') }}",
                    data: {
                        id: $(this).data('id')
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            $(".form-user")[0].reset();
                            $(".form-user input[name=id]").val(data.user.id);
                            $(".form-user input[name=email]").val(data.user.email);
                            $(".form-user input[name=name]").val(data.user.name);
                            $(".form-user input[name=password]").attr("placeholder",
                                "kosongkan jika tidak diganti");
                            $(".form-user input:radio[name=role_id][value=" + data.user
                                .role_id + "]").prop('checked', true);
                            $(".simpan-user").text("Simpan");
                            $(".modal-user").on("shown.bs.modal", function() {
                                $("input[name=user]").focus();
                            });
                            $(".modal-user").modal("show");
                            $(".modal-user .modal-title").text("Ubah Pengguna");
                        }
                    }
                });
            });

            $(document).on('click', '.user-delete', function(e) {
                swal({
                    title: 'Hapus Data',
                    text: "Anda yakin ingin menghapus data?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: "{{ route('master.users.destroy') }}",
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

            // Disable Spasi
            $("input[name=username]").on({
                keydown: function(e) {
                    if (e.which === 32) return false;
                },
                change: function() {
                    this.value = this.value.replace(/\s/g, "");
                },
            });

            $(".form-user").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    role_id: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Nama tidak boleh kosong",
                    },
                    email: {
                        required: "Email tidak boleh kosong",
                    },
                    role_id: {
                        required: "Pilih salah satu hak akses",
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
