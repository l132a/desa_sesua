@extends('layouts.app')

@section('title', 'Master Penduduk')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Master Penduduk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></div>
                <div class="breadcrumb-item">Master Penduduk</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Daftar Penduduk</h4>
                            <a href="javascript:void(0)" class="btn btn-icon icon-left btn-success tambah-penduduk"><i
                                    class="fas fa-plus-circle"></i> Tambah
                                Penduduk</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped datatable-penduduk">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Desa</th>
                                            <th>Kecamatan</th>
                                            <th>Kab/Kota</th>
                                            <th>Provinsi</th>
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
    <div class="modal fade modal-penduduk" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-penduduk">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nik">Nik</label>
                                <input type="hidden" name="id" />
                                <input type="text" class="form-control text-sm"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                    name="nik" placeholder="Masukkan NIK">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control text-sm" name="nama" placeholder="Masukkan nama">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control text-sm" name="tempat_lahir"
                                    placeholder="Masukkan tempat lahir">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control text-sm datepicker" name="tanggal_lahir"
                                    placeholder="Masukkan tanggal lahir">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="desa">Jenis Kelamin</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="gender_id" value="1" class="selectgroup-input">
                                                <span class="selectgroup-button">L</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="gender_id" value="2" class="selectgroup-input">
                                                <span class="selectgroup-button">P</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="desa">Warga Negara</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="warga_negara" value="wni"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">WNI</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="warga_negara" value="wna"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">WNA</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="desa">Agama</label>
                                <select class="form-control text-sm select-agama" name="agama_id" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="desa">Pendidikan</label>
                                    <select class="form-control text-sm select-pendidikan" name="pendidikan_id"
                                        style="width: 100%;">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="desa">Pekerjaan</label>
                                    <select class="form-control text-sm select-pekerjaan" name="pekerjaan_id"
                                        style="width: 100%;">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control text-sm" name="alamat" style="resize: vertical;height: 110px;"
                                    placeholder="Masukkan alamat"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="provinsi">Provinsi</label>
                                <select class="form-control text-sm select-province" name="provinsi_id"
                                    style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kota">Kab/Kota</label>
                                <select class="form-control text-sm select-regency" name="kota_id" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control text-sm select-district" name="kecamatan_id"
                                    style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="desa">Desa</label>
                                <select class="form-control text-sm select-village" name="desa_id" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success simpan-penduduk">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('modules/daterangepicker.css') }}">
    <style>
        .px50 {
            width: 50px;
            max-width: 100px;
            word-wrap: break-word;
        }

    </style>
@endpush

@push('javascript')
    <script src="{{ asset('modules/daterangepicker.js') }}"></script>
    <script>
        $.fn.dataTable.ext.errMode = 'none';
        $(document).ready(function() {
            const table = $('.datatable-penduduk').DataTable({
                responsive: true,
                serverSide: true,
                ajax: "{{ route('master.penduduk') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nik'
                    },
                    {
                        data: 'nama'
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
                        data: 'kota',
                        name: 'regencies.name'
                    },
                    {
                        data: 'provinsi',
                        name: 'provinces.name'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                    targets: [8],
                    className: 'text-center',
                    width: "25%",
                    orderable: false,
                    searchable: false
                }, {
                    targets: [0],
                    width: "5%",
                    className: 'text-right',
                    orderable: false,
                    searchable: false
                },{
                    targets: [1, 2],
                    width: "5%",
                    className: 'text-left px50'
                }]

            });

            $('.tambah-penduduk').on('click', function() {
                $(".form-penduduk")[0].reset();
                $("input[name=id]").val("");
                $(".form-penduduk .select-pekerjaan").val(null).trigger(
                    "change");
                $(".form-penduduk .select-pendidikan").val(null).trigger(
                    "change");
                $(".form-penduduk .select-agama").val(null).trigger("change");
                $(".form-penduduk .select-village").val(null).trigger("change");
                $(".form-penduduk .select-district").val(null).trigger(
                    "change");
                $(".form-penduduk .select-regency").val(null).trigger("change");
                $(".form-penduduk .select-province").val(null).trigger(
                    "change");
                $('.modal-penduduk').on("shown.bs.modal", function() {
                    $("input[name=nik]").focus();
                });
                $(".modal-penduduk").modal("show");
                $(".modal-penduduk .modal-title").text("Tambah Penduduk");
            });

            $(".modal-penduduk .simpan-penduduk").on("click", function(e) {
                $(".form-penduduk").submit();
            });

            $(".form-penduduk").on("submit", function(e) {
                e.preventDefault();
                var form = $(this);
                if (form.valid()) {
                    $.ajax({
                        url: "{{ route('master.penduduk.store') }}",
                        data: form.serialize(),
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            if (data.status) {

                                swal('Data berhasil disimpan', {
                                    icon: 'success',
                                });
                                table.ajax.reload(null, false);
                                $(".modal-penduduk").modal("hide");

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

            $(document).on('click', '.penduduk-edit', function(e) {
                $.ajax({
                    url: "{{ route('master.penduduk.edit') }}",
                    data: {
                        id: $(this).data('id')
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            $(".form-penduduk")[0].reset();
                            $(".form-penduduk input[name=id]").val(data.data.id);
                            $(".form-penduduk input[name=nik]").val(data.data.nik);
                            $(".form-penduduk input[name=tempat_lahir]").val(data.data
                                .tempat_lahir);
                            $(".form-penduduk input[name=nama]").val(data.data.nama);
                            $(".form-penduduk input[name=tanggal_lahir]").val(formatDate(data
                                .data
                                .tanggal_lahir));
                            $(".form-penduduk textarea[name=alamat]").val(data.data.alamat);
                            $(".form-penduduk input:radio[name=gender_id][value=" + data.data
                                .gender_id + "]").prop('checked', true);
                            $(".form-penduduk input:radio[name=warga_negara][value=" + data.data
                                .warga_negara + "]").prop('checked', true);
                            if (data.data.agama_id) {
                                $('.modal-penduduk .select-agama').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.agama_id,
                                            text: data.data.agama
                                        }
                                    });
                            }
                            if (data.data.pekerjaan_id) {
                                $('.modal-penduduk .select-pekerjaan').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.pekerjaan_id,
                                            text: data.data.pekerjaan
                                        }
                                    });
                            }
                            if (data.data.pendidikan_id) {
                                $('.modal-penduduk .select-pendidikan').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.pendidikan_id,
                                            text: data.data.pendidikan
                                        }
                                    });
                            }
                            if (data.data.provinsi_id) {
                                $('.modal-penduduk .select-province').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.provinsi_id,
                                            text: data.data.provinsi
                                        }
                                    });
                            }
                            if (data.data.kota_id) {
                                $('.modal-penduduk .select-regency').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.kota_id,
                                            text: data.data.kota
                                        }
                                    });
                            }
                            if (data.data.kecamatan_id) {
                                $('.modal-penduduk .select-district').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.kecamatan_id,
                                            text: data.data.kecamatan
                                        }
                                    });
                            }
                            if (data.data.desa_id) {
                                $('.modal-penduduk .select-village').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.desa_id,
                                            text: data.data.desa
                                        }
                                    });
                            }
                            $(".simpan-penduduk").text("Ubah");
                            $(".modal-penduduk").on("shown.bs.modal", function() {
                                $(".modal-penduduk input[name=nik]").focus();
                            });
                            $(".modal-penduduk").modal("show");
                            $(".modal-penduduk .modal-title").text("Ubah Penduduk");
                        }
                    }
                });
            });

            $(document).on('click', '.penduduk-delete', function(e) {
                swal({
                    title: 'Hapus Data',
                    text: "Anda yakin ingin menghapus data?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: "{{ route('master.penduduk.destroy') }}",
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

            $('.modal-penduduk .select-agama').select2({
                placeholder: "Pilih Agama",
                ajax: {
                    url: "{{ route('helper.agama') }}",
                    dataType: "json",
                    processResults: function(data) {
                        if (data.status) {
                            var results = [];
                            $.each(data.data, function(index, item) {
                                results.push({
                                    id: item.id,
                                    text: item.name
                                });
                            });
                            return {
                                results: results
                            };
                        }
                    }
                }
            });

            $('.modal-penduduk .select-pekerjaan').select2({
                placeholder: "Pilih Pekerjaan",
                ajax: {
                    url: "{{ route('helper.pekerjaan') }}",
                    dataType: "json",
                    processResults: function(data) {
                        if (data.status) {
                            var results = [];
                            $.each(data.data, function(index, item) {
                                results.push({
                                    id: item.id,
                                    text: item.name
                                });
                            });
                            return {
                                results: results
                            };
                        }
                    }
                }
            });

            $('.modal-penduduk .select-pendidikan').select2({
                placeholder: "Pilih Pendidikan",
                ajax: {
                    url: "{{ route('helper.pendidikan') }}",
                    dataType: "json",
                    processResults: function(data) {
                        if (data.status) {
                            var results = [];
                            $.each(data.data, function(index, item) {
                                results.push({
                                    id: item.id,
                                    text: item.name
                                });
                            });
                            return {
                                results: results
                            };
                        }
                    }
                }
            });

            $('.modal-penduduk .select-province').select2({
                placeholder: "Pilih Provinsi",
                ajax: {
                    url: "{{ route('helper.province') }}",
                    dataType: "json",
                    processResults: function(data) {
                        if (data.status) {
                            var results = [];
                            $.each(data.data, function(index, item) {
                                results.push({
                                    id: item.id,
                                    text: item.name
                                });
                            });
                            return {
                                results: results
                            };
                        }
                    }
                }
            });

            $(".modal-penduduk .select-province").on("change", function() {
                $(".modal-penduduk .select-regency").val(null).trigger("change");
                $(".modal-penduduk .select-district").val(null).trigger("change");
                $(".modal-penduduk .select-village").val(null).trigger("change");
                regency($(this).val());
            });

            function regency(e) {
                $('.modal-penduduk .select-regency').select2({
                    placeholder: "Pilih Kab/Kota",
                    ajax: {
                        url: "{{ route('helper.regency') }}",
                        dataType: "json",
                        data: function(params) {
                            return {
                                id: e,
                                q: params.term
                            }
                        },
                        processResults: function(data) {
                            if (data.status) {
                                var results = [];
                                $.each(data.data, function(index, item) {
                                    results.push({
                                        id: item.id,
                                        text: item.name
                                    });
                                });
                                return {
                                    results: results
                                };
                            }
                        }
                    }
                });
            }

            $(".modal-penduduk .select-regency").on("change", function() {
                $(".modal-penduduk .select-district").val(null).trigger("change");
                $(".modal-penduduk .select-village").val(null).trigger("change");
                district($(this).val());
            });

            function district(e) {
                $('.modal-penduduk .select-district').select2({
                    placeholder: "Pilih Kecamatan",
                    ajax: {
                        url: "{{ route('helper.district') }}",
                        dataType: "json",
                        data: function(params) {
                            return {
                                id: e,
                                q: params.term
                            }
                        },
                        processResults: function(data) {
                            if (data.status) {
                                var results = [];
                                $.each(data.data, function(index, item) {
                                    results.push({
                                        id: item.id,
                                        text: item.name
                                    });
                                });
                                return {
                                    results: results
                                };
                            }
                        }
                    }
                });
            }

            $(".modal-penduduk .select-district").on("change", function() {
                $(".modal-penduduk .select-village").val(null).trigger("change");
                village($(this).val());
            });

            function village(e) {
                $('.modal-penduduk .select-village').select2({
                    placeholder: "Pilih Desa",
                    ajax: {
                        url: "{{ route('helper.village') }}",
                        dataType: "json",
                        data: function(params) {
                            return {
                                id: e,
                                q: params.term
                            }
                        },
                        processResults: function(data) {
                            if (data.status) {
                                var results = [];
                                $.each(data.data, function(index, item) {
                                    results.push({
                                        id: item.id,
                                        text: item.name
                                    });
                                });
                                return {
                                    results: results
                                };
                            }
                        }
                    }
                });
            }

            $('.modal-penduduk .select-regency').select2({
                placeholder: "Pilih Kab/Kota"
            });

            $('.modal-penduduk .select-district').select2({
                placeholder: "Pilih Kecamatan"
            });

            $('.modal-penduduk .select-village').select2({
                placeholder: "Pilih Desa"
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

            $(".form-penduduk").validate({
                rules: {
                    nama: {
                        required: true,
                    },
                    nik: {
                        required: true,
                    },
                    tempat_lahir: {
                        required: true,
                    },
                    tanggal_lahir: {
                        required: true,
                    },
                    pekerjaan_id: {
                        required: true,
                    },
                    alamat: {
                        required: true,
                    },
                    desa_id: {
                        required: true,
                    },
                    kecamatan_id: {
                        required: true,
                    },
                    kota_id: {
                        required: true,
                    },
                    provinsi_id: {
                        required: true,
                    },
                    agama_id: {
                        required: true,
                    },
                    gender_id: {
                        required: true,
                    },
                    warga_negara: {
                        required: true,
                    },
                },
                messages: {
                    nama: {
                        required: "Nama tidak boleh kosong",
                    },
                    nik: {
                        required: "Nik tidak boleh kosong",
                    },
                    tempat_lahir: {
                        required: "Tempat lahir tidak boleh kosong",
                    },
                    tanggal_lahir: {
                        required: "Tanggal lahir tidak boleh kosong",
                    },
                    pekerjaan_id: {
                        required: "Pilih salah satu pekerjaan",
                    },
                    alamat: {
                        required: "Alamat tidak boleh kosongn",
                    },
                    agama_id: {
                        required: "Pilih salah satu agama",
                    },
                    desa_id: {
                        required: "Pilih salah satu desa",
                    },
                    kecamatan_id: {
                        required: "Pilih salah satu kecamatan",
                    },
                    kota_id: {
                        required: "Pilih salah satu kota",
                    },
                    provinsi_id: {
                        required: "Pilih salah satu provinsi",
                    },
                    gender_id: {
                        required: "Pilih salah satu jenis kelamin",
                    },
                    warga_negara: {
                        required: "Pilih salah satu warga negara",
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
