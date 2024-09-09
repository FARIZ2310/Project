<?= $this->extend('Dashboard/layout/main') ?>

<!-- Refactoring SKPD to SKPD -->

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">


    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Pengembangan /</span> Inovasi SKPD
    </h4>

    <div class="card">
        <div class="card-header flex-column flex-md-row">
            <div class="head-label text-center">
                <h5 class="card-title mb-0">Inovasi SKPD</h5>
            </div>
            <div class="buttonAdd text-end pt-3 pt-md-0">
                <button class="btn btn-primary" tabindex="0" id="btn_tambah" data-bs-toggle="modal" data-bs-target="#modalTambah" type="button">
                    <span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                </button>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table id="table" class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Judul</th>
                        <th>Jenis</th>
                        <th>Tahun</th>
                        <th>Latar Belakang</th>
                        <th>Tujuan</th>
                        <th>Manfaat</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>SKPD</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url('Pengembangan/InovasiSKPD/add') ?>" method="post" id="formTambah">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahTitle">Tambah Inovasi SKPD</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="row mb-3">
                                <label for="judul_inovasi" class="form-label">Judul Inovasi SKPD</label>
                                <textarea id="judul_inovasi" name="judul_inovasi" class="form-control" placeholder="Judul Inovasi SKPD"></textarea>
                                <span class="text-danger error-text judul_inovasi_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_inovasi" class="form-label">Jenis</label>
                                <select id="jenis_inovasi" name="jenis_inovasi" class="form-select">
                                    <option value="">Pilih Jenis Inovasi SKPD</option>
                                    <option value="-">-</option>
                                    <option value="TTG (Teknologi Tepat Guna)">TTG (Teknologi Tepat Guna)</option>
                                </select>
                                <span class="text-danger error-text jenis_inovasi_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="tahun_inovasi" class="form-label">Tahun</label>
                                <input type="text" name="tahun_inovasi" id="tahun_inovasi" class="form-control" placeholder="Tahun Inovasi">
                                <span class="text-danger error-text tahun_inovasi_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="latar_belakang" class="form-label">Latar Belakang Inovasi SKPD</label>
                                <textarea id="latar_belakang" name="latar_belakang" class="form-control" placeholder="Latar Belakang Inovasi SKPD"></textarea>
                                <span class="text-danger error-text latar_belakang_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="tujuan" class="form-label">Tujuan Inovasi SKPD</label>
                                <textarea id="tujuan" name="tujuan" class="form-control" placeholder="Tujuan Inovasi SKPD"></textarea>
                                <span class="text-danger error-text tujuan_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="manfaat" class="form-label">Manfaat Inovasi SKPD</label>
                                <textarea id="manfaat" name="manfaat" class="form-control" placeholder="Manfaat Inovasi SKPD"></textarea>
                                <span class="text-danger error-text manfaat_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="">Pilih Status Inovasi SKPD</option>
                                    <option value="Terlaksana">Terlaksana</option>
                                    <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="progress" class="form-label">Progress</label>
                                <select id="progress" name="progress" class="form-select">
                                    <option value="">Pilih Progress Inovasi SKPD</option>
                                    <option value="Ekspose Awal">Ekspose Awal</option>
                                    <option value="Ekspose Akhir">Ekspose Akhir</option>
                                </select>
                                <span class="text-danger error-text progress_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="id_skpd" class="form-label">SKPD</label>
                                <select id="id_skpd" name="id_skpd" class="form-select">
                                    <option value="">Pilih SKPD</option>
                                    <?php foreach ($skpd as $v) : ?>
                                        <option value="<?= $v->id_skpd ?>"><?= $v->nama_skpd ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="text-danger error-text id_skpd_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url('Pengembangan/InovasiSKPD/update') ?>" method="post" id="formEdit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditTitle">Edit Inovasi SKPD</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id_edit" id="id_edit" value="">
                            <div class="row mb-3">
                                <label for="judul_inovasi_edit" class="form-label">Judul Inovasi SKPD</label>
                                <textarea id="judul_inovasi_edit" name="judul_inovasi_edit" class="form-control" placeholder="Judul Inovasi SKPD"></textarea>
                                <span class="text-danger error-text judul_inovasi_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_inovasi_edit" class="form-label">Jenis</label>
                                <select id="jenis_inovasi_edit" name="jenis_inovasi_edit" class="form-select">
                                    <option value="">Pilih Jenis Inovasi SKPD</option>
                                    <option value="-">-</option>
                                    <option value="TTG (Teknologi Tepat Guna)">TTG (Teknologi Tepat Guna)</option>
                                </select>
                                <span class="text-danger error-text jenis_inovasi_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="tahun_inovasi_edit" class="form-label">Tahun</label>
                                <input type="text" name="tahun_inovasi_edit" id="tahun_inovasi_edit" class="form-control" placeholder="Tahun Inovasi">
                                <span class="text-danger error-text tahun_inovasi_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="latar_belakang_edit" class="form-label">Latar Belakang Inovasi SKPD</label>
                                <textarea id="latar_belakang_edit" name="latar_belakang_edit" class="form-control" placeholder="Latar Belakang Inovasi SKPD"></textarea>
                                <span class="text-danger error-text latar_belakang_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="tujuan_edit" class="form-label">Tujuan Inovasi SKPD</label>
                                <textarea id="tujuan_edit" name="tujuan_edit" class="form-control" placeholder="Tujuan Inovasi SKPD"></textarea>
                                <span class="text-danger error-text tujuan_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="manfaat_edit" class="form-label">Manfaat Inovasi SKPD</label>
                                <textarea id="manfaat_edit" name="manfaat_edit" class="form-control" placeholder="Manfaat Inovasi SKPD"></textarea>
                                <span class="text-danger error-text manfaat_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="status_edit" class="form-label">Status</label>
                                <select id="status_edit" name="status_edit" class="form-select">
                                    <option value="">Pilih Status Inovasi SKPD</option>
                                    <option value="Terlaksana">Terlaksana</option>
                                    <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                                </select>
                                <span class="text-danger error-text status_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="progress_edit" class="form-label">Progress</label>
                                <select id="progress_edit" name="progress_edit" class="form-select">
                                    <option value="">Pilih Progress Inovasi SKPD</option>
                                    <option value="Ekspose Awal">Ekspose Awal</option>
                                    <option value="Ekspose Akhir">Ekspose Akhir</option>
                                </select>
                                <span class="text-danger error-text progress_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="id_skpd_edit" class="form-label">SKPD</label>
                                <select id="id_skpd_edit" name="id_skpd_edit" class="form-select">
                                    <option value="">Pilih SKPD</option>
                                    <?php foreach ($skpd as $v) : ?>
                                        <option value="<?= $v->id_skpd ?>"><?= $v->nama_skpd ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="text-danger error-text id_skpd_edit_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</div>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script src="<?= base_url() ?>/assets/dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

<script src="../../assets/js/tables-datatables-basic.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url() ?>/Pengembangan/InovasiSKPD/table',
                method: 'POST'
            },
            columnDefs: [{
                    "targets": [0],
                    "data": "0",
                    "orderable": false,
                },
                {
                    "targets": [1],
                    "data": "2",
                },
                {
                    "targets": [2],
                    "data": "3",
                },
                {
                    "targets": [3],
                    "data": "4",
                },
                {
                    "targets": [4],
                    "data": "5",
                },
                {
                    "targets": [5],
                    "data": "6",
                },
                {
                    "targets": [6],
                    "data": "7",
                },
                {
                    "targets": [7],
                    "data": "8",
                    "render": function(data, type, row) {
                        if (data == "Terlaksana") {
                            return '<div class="badge bg-success">Terlaksana</div>'
                        } else {
                            return '<div class="badge bg-danger">Tidak Terlaksana</div>'
                        }
                    }
                },
                {
                    "targets": [8],
                    "data": "9",
                    "render": function(data, type, row) {
                        if (data == "Ekspose Awal") {
                            return '<div class="badge bg-warning">Ekspose Awal</div>'
                        } else {
                            return '<div class="badge bg-primary">Ekspose Akhir</div>'
                        }
                    }
                },
                {
                    "targets": [9],
                    "data": "11",
                },
                {
                    "targets": [10],
                    "data": "12",
                    "orderable": false,
                },
            ],
        });

    });

    $("#formTambah").submit(function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    if (data.code == 1) {
                        $(form)[0].reset();
                        $('#table').DataTable().ajax.reload(null, false);
                        $('#modalTambah').modal('hide');

                        swal('Berhasil tambah data!', {
                            icon: 'success',
                        })
                    } else {
                        alert(data.msg);
                    }
                } else {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });
    });

    $("#formEdit").submit(function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    if (data.code == 1) {
                        $(form)[0].reset();
                        $('#table').DataTable().ajax.reload(null, false);
                        $('#modalEdit').modal('hide');
                        swal('Berhasil edit data!', {
                            icon: 'success',
                        })
                    } else {
                        alert(data.msg);
                    }
                } else {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });
    });

    $(document).on('click', '#btn_edit', function(e) {
        e.preventDefault();
        id = $(this).data('kode');
        $.ajax({
                url: '<?php echo base_url("Pengembangan/InovasiSKPD/get") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                }
            })
            .done(function(data) {
                if (data) {
                    $('#id_edit').val(data.id_inovasi_skpd);
                    $('#judul_inovasi_edit').val(data.judul_inovasi);
                    $('#jenis_inovasi_edit').val(data.jenis_inovasi);
                    $('#tahun_inovasi_edit').val(data.tahun_inovasi);
                    $('#latar_belakang_edit').val(data.latar_belakang);
                    $('#tujuan_edit').val(data.tujuan);
                    $('#manfaat_edit').val(data.manfaat);
                    $('#status_edit').val(data.status);
                    $('#progress_edit').val(data.progress);
                    $('#id_skpd_edit').val(data.id_skpd);
                    $('#modalEdit').modal('show');
                } else {
                    toastConfig(data.status, data.message);
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
    });

    $(document).on('click', '#btn_hapus', function(e) {
        e.preventDefault();
        id = $(this).data('kode');
        hapus(id);
    });

    function hapus(kdKode) {
        swal({
                title: 'Yakin Ingin Hapus Data?',
                text: 'Setelah dihapus, anda tidak akan bisa mengembalikan data ini.',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url('Pengembangan/InovasiSKPD/delete') ?>",
                        data: {
                            id: id,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            $('#table').DataTable().ajax.reload(null, false);
                            swal('Data berhasil dihapus!', {
                                icon: 'success',
                            })
                        }
                    });
                } else {
                    swal('Tidak jadi menghapus data!');
                }
            });
    }
</script>
<?= $this->endSection() ?>