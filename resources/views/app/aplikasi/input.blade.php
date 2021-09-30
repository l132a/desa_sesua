@extends('layouts.app')

@section('title', 'Input Aplikasi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="title-header">Input Aplikasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('aplikasi') }}">Aplikasi</a></div>
                <div class="breadcrumb-item">Input</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="title-header">Input Data Aplikasi</h4>
                        </div>
                        <form class="form-aplikasi" enctype="multipart/form-data" method="POST">
                            <div class="card-body">
                                <div class="section-title">Data Desa</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npwz">No Berita Acara</label>
                                            <input type="hidden" name="id" />
                                            <input type="text" class="numeric form-control text-sm" name="no_berita_acara"
                                                required placeholder="Masukkan No Berita Acara">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npwz">No Surat Keterangan</label>
                                            <input type="text" class="numeric form-control text-sm" required
                                                name="no_surat_keterangan" placeholder="Masukkan No Surat Keterangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="tanggal_lahir">Tanggal Berita Acara</label>
                                                <input type="text" class="form-control text-sm datepicker" required
                                                    name="tanggal_berita_acara" placeholder="Masukkan Tanggal Berita Acara">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tanggal_lahir">Tanggal Surat Keterangan</label>
                                                <input type="text" class="form-control text-sm datepicker" required
                                                    name="tanggal_surat_keterangan"
                                                    placeholder="Masukkan Tanggal Surat Keterangan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="desa">Kepala Desa</label>
                                        <select class="form-control text-sm select-kepala-desa" name="kepala_desa_id"
                                            required style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="desa">Aparat Desa</label>
                                        <select class="form-control text-sm select-aparat-desa" name="aparat_desa_id"
                                            required style="width: 100%;">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="desa">Aparat RT</label>
                                        <select class="form-control text-sm select-aparat-rt" name="aparat_rt_id" required
                                            style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                                <div class="section-title">Informasi Tanah</div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="desa">Pemilik</label>
                                        <select class="form-control text-sm select-penduduk" name="penduduk_id" required
                                            style="width: 100%;">
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="desa">Asal Usul</label>
                                                <input type="text" class="numeric form-control text-sm" name="asal_usul"
                                                    required placeholder="Masukkan Asal Usul tanah">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="desa">Tahun Penguasaan</label>
                                                <input type="text" class="numeric form-control text-sm tahunpicker"
                                                    name="tahun_penguasaan" required
                                                    placeholder="Masukkan tahun penguasaan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control text-sm" name="alamat" required
                                            style="resize: vertical;height: 136px;"
                                            placeholder="Masukkan alamat"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="alamat">Denah Lokasi</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file_denah"
                                                    accept=".jpg,.jpeg,.png">
                                                <label class="custom-file-label" for="upload_bukti_setoran">Pilih File
                                                    Denah</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="desa">Keadaan Tanah</label>
                                            <input type="text" class="numeric form-control text-sm" name="keadaan_tanah"
                                                required placeholder="Masukkan Keadaan tanah">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="desa">Provinsi</label>
                                        <select class="form-control text-sm select-province" name="provinsi_id" required
                                            style="width: 100%;">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="desa">Kota/Kab</label>
                                        <select class="form-control text-sm select-regency" name="kota_id" required
                                            style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="desa">Kecamatan</label>
                                        <select class="form-control text-sm select-district" name="kecamatan_id" required
                                            style="width: 100%;">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="desa">Desa</label>
                                        <select class="form-control text-sm select-village" name="desa_id" required
                                            style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                                <div class="section-title">Ukuran Tanah</div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="npwz">Panjang</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">&#177;</div>
                                                </div>
                                                <input type="text" class="numeric form-control text-sm text-right"
                                                    name="panjang" required placeholder="Masukkan Panjang">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="npwz">Lebar</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">&#177;</div>
                                                </div>
                                                <input type="text" class="numeric form-control text-sm text-right" required
                                                    name="lebar" placeholder="Masukkan Lebar">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="npwz">Luas</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">&#177;</div>
                                                </div>
                                                <input type="text" class="numeric form-control text-sm text-right" required
                                                    name="luas" placeholder="Masukkan Luas">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-title">Batas Tanah</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npwz">Utara</label>
                                            <input type="text" class="numeric form-control text-sm" name="batas_utara"
                                                placeholder="Masukkan Batas Utara">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npwz">Timur</label>
                                            <input type="text" class="numeric form-control text-sm" required
                                                name="batas_timur" placeholder="Masukkan Batas Timur">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npwz">Selatan</label>
                                            <input type="text" class="numeric form-control text-sm" required
                                                name="batas_selatan" placeholder="Masukkan Batas Selatan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npwz">Barat</label>
                                            <input type="text" class="numeric form-control text-sm" required
                                                name="batas_barat" placeholder="Masukkan Batas Barat">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="section-title">Saksi</div>
                                        <div class="div-saksi"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="section-title">Bukti</div>
                                        <div class="div-bukti"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer d-flex justify-content-between bg-whitesmoke br">
                            <button type="button" class="btn btn-danger reset-aplikasi">Reset</button>
                            <button type="button" class="btn btn-success simpan-aplikasi">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('modules/daterangepicker.css') }}">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet" />
@endpush

@push('javascript')
    <script src="{{ asset('modules/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('modules/daterangepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
            const href = window.location.href;
            const id = href.substring(href.lastIndexOf('/') + 1);

            function add_saksi(e, o) {
                const container = $('.div-saksi');
                const count = container.children().length;
                let html = '<div class="input-group mb-2">';
                if (e == 0) {
                    html += '<input type="hidden" name="saksi_id[]" />';
                } else {
                    html += '<input type="hidden" name="saksi_id[]" value="' + e + '"/>';
                }
                if (o == 0) {
                    html +=
                        '<input type="text" class="form-control text-sm saksi" name="saksi[]" required placeholder="Masukkan Nama Saksi"/>';
                } else {
                    html +=
                        '<input type="text" class="form-control text-sm saksi" name="saksi[]" value="' + o +
                        '" required placeholder="Masukkan Nama Saksi"/>';
                }

                html += '<div class="input-group-append">';
                if (count == 0) {
                    html += '<i class="fa fa-2x fa-plus-circle text-success mt-1 ml-2 add-saksi"></i>';
                } else {
                    html += '<i class="fa fa-2x fa-minus-circle text-danger mt-1 ml-2 remove-saksi"></i>';
                }
                html += '</div>';
                html += '</div>';
                container.prepend(html);
            }

            function add_bukti(e, o) {
                const container = $('.div-bukti');
                const count = container.children().length;
                let html = '<div class="input-group mb-2">';
                if (e == 0) {
                    html += '<input type="hidden" name="bukti_id[]" />';
                } else {
                    html += '<input type="hidden" name="bukti_id[]" value="' + e + '"/>';
                }
                if (o == 0) {
                    html +=
                        '<input type="text" class="form-control text-sm bukti" name="bukti[]" required placeholder="Masukkan Bukti"/>';
                } else {
                    html +=
                        '<input type="text" class="form-control text-sm bukti" name="bukti[]" value="' + o +
                        '" required placeholder="Masukkan Bukti"/>';
                }
                html += '<div class="input-group-append">';
                if (count == 0) {
                    html += '<i class="fa fa-2x fa-plus-circle text-success mt-1 ml-2 add-bukti"></i>';
                } else {
                    html += '<i class="fa fa-2x fa-minus-circle text-danger mt-1 ml-2 remove-bukti"></i>';
                }
                html += '</div>';
                html += '</div>';
                container.prepend(html);
            }

            $(document).on('click', '.add-saksi', function(e) {
                e.preventDefault();
                add_saksi(0, 0);
            });

            $(document).on('click', '.remove-saksi', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
            });

            $(document).on('click', '.add-bukti', function(e) {
                e.preventDefault();
                add_bukti(0, 0);
            });

            $(document).on('click', '.remove-bukti', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
            });

            $('.reset-aplikasi').on('click', function(e) {
                swal({
                    title: 'Reset Inputan Aplikasi',
                    text: "Apakah anda yakin, lanjutkan?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        $('.form-aplikasi')[0].reset();
                        $(".form-aplikasi .select-penduduk").val(null).trigger(
                            "change");
                        $(".form-aplikasi .select-kepala-desa").val(null).trigger(
                            "change");
                        $(".form-aplikasi .select-aparat-desa").val(null).trigger(
                            "change");
                        $(".form-aplikasi .select-aparat-rt").val(null).trigger(
                            "change");
                        $(".form-aplikasi .select-village").val(null).trigger(
                            "change");
                        $(".form-aplikasi .select-district").val(null).trigger(
                            "change");
                        $(".form-aplikasi .select-regency").val(null).trigger(
                            "change");
                        $(".form-aplikasi .select-province").val(null).trigger(
                            "change");
                        $('.div-saksi').html('');
                        $('.div-bukti').html('');
                        add_bukti(0, 0);
                        add_saksi(0, 0);
                        $(".form-aplikasi input[name=no_berita_acara]").focus();
                    }
                });
            });

            $('.simpan-aplikasi').on('click', function(e) {
                swal({
                    title: 'Simpan Data',
                    text: "Pastikan data yang di input benar, lanjutkan?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        $(".form-aplikasi").submit();
                    }
                });
            });

            if (window.location.pathname.indexOf('/edit/') === 9) {
                $('.title-header').html('Ubah Aplikasi');
                const url = "{{ route('aplikasi.edit', ':id') }}";
                url.replace(':id', id)
                $.ajax({
                    url: url,
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status) {
                            $('.form-aplikasi')[0].reset();
                            $('.form-aplikasi input[name=id').val(data.data.id);
                            $('.form-aplikasi input[name=no_berita_acara').val(data.data
                                .no_berita_acara);
                            $('.form-aplikasi input[name=no_surat_keterangan').val(data.data
                                .no_surat_keterangan);
                            $('.form-aplikasi input[name=tanggal_berita_acara').val(formatDate(data.data
                                .tanggal_berita_acara));
                            $('.form-aplikasi input[name=tanggal_surat_keterangan').val(formatDate(data
                                .data.tanggal_surat_keterangan));
                            $('.form-aplikasi input[name=asal_usul').val(data.data.asal_usul);
                            $('.form-aplikasi input[name=tahun_penguasaan').datepicker('setDate', data
                                .data.tahun_penguasaan);
                            $('.form-aplikasi textarea[name=alamat').val(data.data.alamat);
                            $('.form-aplikasi input[name=keadaan_tanah').val(data.data.keadaan_tanah);
                            $('.form-aplikasi input[name=panjang').val(data.data.panjang);
                            $('.form-aplikasi input[name=lebar').val(data.data.lebar);
                            $('.form-aplikasi input[name=luas').val(data.data.luas);
                            $('.form-aplikasi input[name=batas_utara').val(data.data.batas_utara);
                            $('.form-aplikasi input[name=batas_timur').val(data.data.batas_timur);
                            $('.form-aplikasi input[name=batas_selatan').val(data.data.batas_selatan);
                            $('.form-aplikasi input[name=batas_barat').val(data.data.batas_barat);
                            if (data.data.penduduk_id) {
                                $('.form-aplikasi .select-penduduk').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.penduduk_id,
                                            text: data.data.nama + " - " + data.data.nik
                                        }
                                    });
                            }
                            if (data.data.provinsi_id) {
                                $('.form-aplikasi .select-province').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.provinsi_id,
                                            text: data.data.provinsi
                                        }
                                    });
                            }
                            if (data.data.kota_id) {
                                $('.form-aplikasi .select-regency').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.kota_id,
                                            text: data.data.kota
                                        }
                                    });
                            }
                            if (data.data.kecamatan_id) {
                                $('.form-aplikasi .select-district').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.kecamatan_id,
                                            text: data.data.kecamatan
                                        }
                                    });
                            }
                            if (data.data.desa_id) {
                                $('.form-aplikasi .select-village').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.desa_id,
                                            text: data.data.desa
                                        }
                                    });
                            }
                            if (data.data.kepala_desa_id) {
                                $('.form-aplikasi .select-kepala-desa').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.kepala_desa_id,
                                            text: data.data.kepala_desa + " - " + data.data
                                                .jabatan_kepala_desa
                                        }
                                    });
                            }
                            if (data.data.aparat_desa_id) {
                                $('.form-aplikasi .select-aparat-desa').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.aparat_desa_id,
                                            text: data.data.aparat_desa + " - " + data.data
                                                .jabatan_desa
                                        }
                                    });
                            }
                            if (data.data.aparat_rt_id) {
                                $('.form-aplikasi .select-aparat-rt').select2("trigger",
                                    "select", {
                                        data: {
                                            id: data.data.aparat_rt_id,
                                            text: data.data.aparat_rt + " - " + data.data.jabatan_rt
                                        }
                                    });
                            }

                            $.each(data.data.saksis, function(key, val) {
                                add_saksi(val.id, val.saksi);
                            });

                            $.each(data.data.buktis, function(key, val) {
                                add_bukti(val.id, val.bukti);
                            });

                            if (data.data.saksis.length == 0) {
                                add_saksi(0, 0);
                            }

                            if (data.data.buktis.length == 0) {
                                add_bukti(0, 0);
                            }

                            $('.form-aplikasi input[name=no_berita_acara').focus();
                        }
                    }
                });
            } else {
                add_saksi(0, 0);
                add_bukti(0, 0);
            }

            $(".form-aplikasi").on("submit", function(e) {
                e.preventDefault();
                var form = $(this);
                if (form.valid()) {
                    $.ajax({
                        url: "{{ route('aplikasi.store') }}",
                        data: new FormData(this),
                        type: "POST",
                        dataType: "JSON",
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (data.status) {
                                swal('Data berhasil disimpan', {
                                    icon: 'success',
                                });
                                if (window.location.pathname.indexOf('/edit/') === 9) {
                                    const url = "{{ route('aplikasi') }}";
                                    window.location = url;
                                } else {
                                    $('.form-aplikasi')[0].reset();
                                    $(".form-aplikasi .select-penduduk").val(null).trigger(
                                        "change");
                                    $(".form-aplikasi .select-kepala-desa").val(null).trigger(
                                        "change");
                                    $(".form-aplikasi .select-aparat-desa").val(null).trigger(
                                        "change");
                                    $(".form-aplikasi .select-aparat-rt").val(null).trigger(
                                        "change");
                                    $(".form-aplikasi .select-village").val(null).trigger(
                                        "change");
                                    $(".form-aplikasi .select-district").val(null).trigger(
                                        "change");
                                    $(".form-aplikasi .select-regency").val(null).trigger(
                                        "change");
                                    $(".form-aplikasi .select-province").val(null).trigger(
                                        "change");
                                    cetak();
                                }
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

            function cetak(e) {
                const id = $('.form-aplikasi input[name=id]').val();
                const url = "{{ route('aplikasi.print', ':id') }}";
                if (id) {
                    window.open(url.replace(':id', id), "_blank");
                }
            }

            $('.form-aplikasi .select-penduduk').select2({
                placeholder: "Pilih Penduduk",
                ajax: {
                    url: "{{ route('helper.penduduk') }}",
                    dataType: "json",
                    processResults: function(data) {
                        if (data.status) {
                            var results = [];
                            $.each(data.data, function(index, item) {
                                results.push({
                                    id: item.id,
                                    text: item.name + ' - ' +
                                        item.nik
                                });
                            });
                            return {
                                results: results
                            };
                        }
                    }
                }
            });

            $('.form-aplikasi .select-kepala-desa').select2({
                placeholder: "Pilih Kepala Desa",
                ajax: {
                    url: "{{ route('helper.aparat') }}",
                    dataType: "json",
                    processResults: function(data) {
                        if (data.status) {
                            var results = [];
                            $.each(data.data, function(index, item) {
                                results.push({
                                    id: item.id,
                                    text: item.name + ' - ' +
                                        item.jabatan
                                });
                            });
                            return {
                                results: results
                            };
                        }
                    }
                }
            });

            $('.form-aplikasi .select-aparat-desa').select2({
                placeholder: "Pilih Aparat Desa",
                ajax: {
                    url: "{{ route('helper.aparat') }}",
                    dataType: "json",
                    processResults: function(data) {
                        if (data.status) {
                            var results = [];
                            $.each(data.data, function(index, item) {
                                results.push({
                                    id: item.id,
                                    text: item.name + ' - ' +
                                        item.jabatan
                                });
                            });
                            return {
                                results: results
                            };
                        }
                    }
                }
            });

            $('.form-aplikasi .select-aparat-rt').select2({
                placeholder: "Pilih Aparat RT",
                ajax: {
                    url: "{{ route('helper.aparat') }}",
                    dataType: "json",
                    processResults: function(data) {
                        if (data.status) {
                            var results = [];
                            $.each(data.data, function(index, item) {
                                results.push({
                                    id: item.id,
                                    text: item.name + ' - ' +
                                        item.jabatan
                                });
                            });
                            return {
                                results: results
                            };
                        }
                    }
                }
            });

            $('.form-aplikasi .select-province').select2({
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

            $(".form-aplikasi .select-province").on("change", function() {
                $(".form-aplikasi .select-regency").val(null).trigger("change");
                $(".form-aplikasi .select-district").val(null).trigger("change");
                $(".form-aplikasi .select-village").val(null).trigger("change");
                regency($(this).val());
            });

            function regency(e) {
                $('.form-aplikasi .select-regency').select2({
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

            $(".form-aplikasi .select-regency").on("change", function() {
                $(".form-aplikasi .select-district").val(null).trigger("change");
                $(".form-aplikasi .select-village").val(null).trigger("change");
                district($(this).val());
            });

            function district(e) {
                $('.form-aplikasi .select-district').select2({
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

            $(".form-aplikasi .select-district").on("change", function() {
                $(".form-aplikasi .select-village").val(null).trigger("change");
                village($(this).val());
            });

            function village(e) {
                $('.form-aplikasi .select-village').select2({
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

            $('.form-aplikasi .select-regency').select2({
                placeholder: "Pilih Kab/Kota"
            });

            $('.form-aplikasi .select-district').select2({
                placeholder: "Pilih Kecamatan"
            });

            $('.form-aplikasi .select-village').select2({
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

            $('.tahunpicker').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });

            $(".form-aplikasi").validate({
                rules: {
                    no_berita_acara: {
                        required: true,
                    },
                    no_surat_keterangan: {
                        required: true,
                    },
                    tanggal_berita_acara: {
                        required: true,
                    },
                    tanggal_surat_keterangan: {
                        required: true,
                    },
                    aparat_desa_id: {
                        required: true,
                    },
                    aparat_rt_id: {
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
                    penduduk_id: {
                        required: true,
                    },
                    asal_usul: {
                        required: true,
                    },
                    alamat: {
                        required: true,
                    },
                    keadaan_tanah: {
                        required: true,
                    },
                    panjang: {
                        required: true,
                    },
                    lebar: {
                        required: true,
                    },
                    luas: {
                        required: true,
                    },
                    batas_utara: {
                        required: true,
                    },
                    batas_timur: {
                        required: true,
                    },
                    batas_selatan: {
                        required: true,
                    },
                    batas_barat: {
                        required: true,
                    },
                    saksi: {
                        required: true,
                    },
                    bukti: {
                        required: true,
                    },
                },
                messages: {
                    no_berita_acara: {
                        required: 'No berita acara tidak boleh kosong',
                    },
                    no_surat_keterangan: {
                        required: 'No surat keterangan tidak boleh kosong',
                    },
                    tanggal_berita_acara: {
                        required: 'Tanggal berita acara tidak boleh kosong',
                    },
                    tanggal_surat_keterangan: {
                        required: 'Tanggal surat keterangan tidak boleh kosong',
                    },
                    aparat_desa_id: {
                        required: 'Pilih salah satu aparat desa',
                    },
                    aparat_rt_id: {
                        required: 'Pilih salah satu aparat rt',
                    },
                    penduduk_id: {
                        required: 'Pilih salah satu penduduk',
                    },
                    asal_usul: {
                        required: 'Asal usul tidak boleh kosong',
                    },
                    alamat: {
                        required: 'Alamat tidak boleh kosong',
                    },
                    keadaan_tanah: {
                        required: 'Keadaan tanah tidak boleh kosong',
                    },
                    panjang: {
                        required: 'Panajang tidak boleh kosong',
                    },
                    lebar: {
                        required: 'Lebar tidak boleh kosong',
                    },
                    luas: {
                        required: 'Luas tidak boleh kosong',
                    },
                    batas_utara: {
                        required: 'Batas utara tidak boleh kosong',
                    },
                    batas_timur: {
                        required: 'Batas timur tidak boleh kosong',
                    },
                    batas_selatan: {
                        required: 'Batas selatan tidak boleh kosong',
                    },
                    batas_barat: {
                        required: 'Batas barat tidak boleh kosong',
                    },
                    saksi: {
                        required: 'Saksi tidak boleh kosong',
                    },
                    bukti: {
                        required: 'Bukti tidak boleh kosong',
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
