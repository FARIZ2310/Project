<?= $this->extend('Dashboard/layout/main') ?>

<!-- TODO: change Title to 'Penelitian/Kajian/Publikasi/Desiminasi/Fasilitasi -->
<!-- TODO: add attribute 'waktu_pelaksanaan', 'status', 'progress' -->

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
        <span class="text-muted fw-light">Penelitian /</span> Penelitian/Kajian/Publikasi/Desiminasi/Fasilitasi
    </h4>

    <div class="card">
        <div class="card-header flex-column flex-md-row">
            <div class="head-label text-center">
                <h5 class="card-title mb-0">Penelitian/Kajian/Publikasi/Desiminasi/Fasilitasi</h5>
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
                        <th>Jenis</th>
                        <th>Judul</th>
                        <th>Tahun</th>
                        <th>Abstrak</th>
                        <th>Peneliti</th>
                        <th>Lembaga</th>
                        <th>Waktu Pelaksanaan</th>
                        <th>Status</th>
                        <th>Progress</th>
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
                <form action="<?= base_url('Penelitian/Penelitian/add') ?>" method="post" id="formTambah">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahTitle">Tambah Penelitian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="jenis_penelitian" class="form-label">Jenis Penelitian</label>
                            <select id="jenis_penelitian" name="jenis_penelitian" class="form-select">
                                <option value="">Pilih Jenis Penelitian</option>
                                <option value="Penelitian">Penelitian</option>
                                <option value="Publikasi">Publikasi</option>
                                <option value="Kajian">Kajian</option>
                                <option value="Desiminasi">Desiminasi</option>
                                <option value="Fasilitasi">Fasilitasi</option>
                            </select>
                            <span class="text-danger error-text jenis_penelitian_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="judul_penelitian" class="form-label">Judul Penelitian</label>
                            <input type="text" name="judul_penelitian" id="judul_penelitian" class="form-control" placeholder="Judul Penelitian">
                            <span class="text-danger error-text judul_penelitian_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="tahun_penelitian" class="form-label">Tahun</label>
                            <input type="text" name="tahun_penelitian" id="tahun_penelitian" class="form-control" placeholder="Tahun Penelitian">
                            <span class="text-danger error-text tahun_penelitian_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="abstrak_penelitian" class="form-label">Abstrak</label>
                            <input type="text" name="abstrak_penelitian" id="abstrak_penelitian" class="form-control" placeholder="Abstrak Penelitian">
                            <span class="text-danger error-text abstrak_penelitian_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="peneliti" class="form-label">Peneliti</label>
                            <textarea id="peneliti" name="peneliti" class="form-control" placeholder="Peneliti"></textarea>
                            <span class="text-danger error-text peneliti_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="id_lembaga_penelitian" class="form-label">Lembaga</label>
                            <select id="id_lembaga_penelitian" name="id_lembaga_penelitian" class="form-select">
                                <option value="">Pilih Lembaga</option>
                            </select>
                            <span class="text-danger error-text id_lembaga_penelitian_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
                            <textarea id="waktu_pelaksanaan" name="waktu_pelaksanaan" class="form-control" placeholder="Waktu Pelaksanaan"></textarea>
                            <span class="text-danger error-text waktu_pelaksanaan_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option value="">Pilih Status</option>
                                <option value="Terlaksana">Terlaksana</option>
                                <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                            </select>
                            <span class="text-danger error-text status_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="progress" class="form-label">Progress</label>
                            <select id="progress" name="progress" class="form-select">
                                <option value="">Pilih Progress</option>
                                <option value="Ekspose Awal">Ekspose Awal</option>
                                <option value="Ekspose Akhir">Ekspose Akhir</option>
                            </select>
                            <span class="text-danger error-text progress_error"></span>
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
                <form action="<?= base_url('Penelitian/Penelitian/update') ?>" method="post" id="formEdit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditTitle">Edit Peneliti</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_edit" id="id_edit" value="">
                        <div class="row mb-3">
                            <label for="jenis_penelitian_edit" class="form-label">Jenis Penelitian</label>
                            <select id="jenis_penelitian_edit" name="jenis_penelitian_edit" class="form-select">
                                <option value="">Pilih Jenis Penelitian</option>
                                <option value="Penelitian">Penelitian</option>
                                <option value="Publikasi">Publikasi</option>
                                <option value="Kajian">Kajian</option>
                                <option value="Desiminasi">Desiminasi</option>
                                <option value="Fasilitasi">Fasilitasi</option>
                            </select>
                            <span class="text-danger error-text jenis_penelitian_edit_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="judul_penelitian_edit" class="form-label">Judul Penelitian</label>
                            <input type="text" name="judul_penelitian_edit" id="judul_penelitian_edit" class="form-control" placeholder="Judul Penelitian">
                            <span class="text-danger error-text judul_penelitian_edit_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="tahun_penelitian_edit" class="form-label">Tahun</label>
                            <input type="text" name="tahun_penelitian_edit" id="tahun_penelitian_edit" class="form-control" placeholder="Tahun Penelitian">
                            <span class="text-danger error-text tahun_penelitian_edit_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="abstrak_penelitian_edit" class="form-label">Abstrak</label>
                            <input type="text" name="abstrak_penelitian_edit" id="abstrak_penelitian_edit" class="form-control" placeholder="Abstrak Penelitian">
                            <span class="text-danger error-text abstrak_penelitian_edit_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="peneliti_edit" class="form-label">Peneliti</label>
                            <textarea id="peneliti_edit" name="peneliti_edit" class="form-control" placeholder="Peneliti"></textarea>
                            <span class="text-danger error-text peneliti_edit_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="id_lembaga_penelitian_edit" class="form-label">Lembaga</label>
                            <select id="id_lembaga_penelitian_edit" name="id_lembaga_penelitian_edit" class="form-select">
                                <option value="">Pilih Lembaga</option>
                            </select>
                            <span class="text-danger error-text id_lembaga_penelitian_edit_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="waktu_pelaksanaan_edit" class="form-label">Waktu Pelaksanaan</label>
                            <textarea id="waktu_pelaksanaan_edit" name="waktu_pelaksanaan_edit" class="form-control" placeholder="Waktu Pelaksanaan"></textarea>
                            <span class="text-danger error-text waktu_pelaksanaan_edit_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="status_edit" class="form-label">Status</label>
                            <select id="status_edit" name="status_edit" class="form-select">
                                <option value="">Pilih Status</option>
                                <option value="Terlaksana">Terlaksana</option>
                                <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                            </select>
                            <span class="text-danger error-text status_edit_error"></span>
                        </div>
                        <div class="row mb-3">
                            <label for="progress_edit" class="form-label">Progress</label>
                            <select id="progress_edit" name="progress_edit" class="form-select">
                                <option value="">Pilih Progress</option>
                                <option value="Ekspose Awal">Ekspose Awal</option>
                                <option value="Ekspose Akhir">Ekspose Akhir</option>
                            </select>
                            <span class="text-danger error-text progress_edit_error"></span>
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
        $('#id_lembaga_penelitian').load("<?= base_url('Penelitian/Lembaga/getAll') ?>");
        $('#id_lembaga_penelitian_edit').load("<?= base_url('Penelitian/Lembaga/getAll') ?>");

        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url() ?>/Penelitian/Penelitian/table',
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
                    "render": function(data, type, row) {
                        if (data == "Penelitian") {
                            return '<div class="badge bg-primary">Penelitian</div>'
                        } else if (data == "Publikasi") {
                            return '<div class="badge bg-info">Publikasi</div>'
                        } else if (data == "Desiminasi") {
                            return '<div class="badge bg-warning">Desiminasi</div>'
                        } else if (data == "Fasilitasi") {
                            return '<div class="badge bg-danger">Fasilitasi</div>'
                        } else {
                            return '<div class="badge bg-success">Kajian</div>'
                        }
                    }
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
                },
                {
                    "targets": [8],
                    "data": "9",
                    "render": function(data, type, row) {
                        if (data == "Terlaksana") {
                            return '<div class="badge bg-success">Terlaksana</div>'
                        } else {
                            return '<div class="badge bg-danger">Tidak Terlaksana</div>'
                        }
                    }
                },
                {
                    "targets": [9],
                    "data": "10",
                    "render": function(data, type, row) {
                        if (data == "Ekspose Awal") {
                            return '<div class="badge bg-warning">Ekspose Awal</div>'
                        } else {
                            return '<div class="badge bg-primary">Ekspose Akhir</div>'
                        }
                    }
                },
                {
                    "targets": [10],
                    "data": "11",
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
                url: '<?php echo base_url("Penelitian/Penelitian/get") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                }
            })
            .done(function(data) {
                if (data) {
                    $('#id_edit').val(data.id_penelitian);
                    $('#jenis_penelitian_edit').val(data.jenis_penelitian);
                    $('#judul_penelitian_edit').val(data.judul_penelitian);
                    $('#tahun_penelitian_edit').val(data.tahun_penelitian);
                    $('#abstrak_penelitian_edit').val(data.abstrak_penelitian);
                    $('#peneliti_edit').val(data.peneliti);
                    $('#id_lembaga_penelitian_edit').val(data.id_lembaga_penelitian);
                    $('#waktu_pelaksanaan_edit').val(data.waktu_pelaksanaan);
                    $('#status_edit').val(data.status);
                    $('#progress_edit').val(data.progress);
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
                        url: "<?php echo base_url('Penelitian/Penelitian/delete') ?>",
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