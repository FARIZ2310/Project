<?= $this->extend('Dashboard/layout/main') ?>

<!-- TODO: change attribute 'status' to 'status' -->

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
        <span class="text-muted fw-light">Pengembangan /</span> Kreativitas Masyarakat
    </h4>

    <div class="card">
        <div class="card-header flex-column flex-md-row">
            <div class="head-label text-center">
                <h5 class="card-title mb-0">Kreativitas Masyarakat</h5>
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
                        <th>Nama Kreativitas</th>
                        <th>Kreator</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
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
                <form action="<?= base_url('Pengembangan/KreativitasMasyarakat/add') ?>" method="post" id="formTambah">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahTitle">Tambah Kreativitas Masyarakat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="row mb-3">
                                <label for="nama_kreativitas" class="form-label">Nama Kreativitas Masyarakat</label>
                                <textarea id="nama_kreativitas" name="nama_kreativitas" class="form-control" placeholder="Nama Kreativitas Masyarakat"></textarea>
                                <span class="text-danger error-text nama_kreativitas_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="kreator" class="form-label">Kreator</label>
                                <textarea id="kreator" name="kreator" class="form-control" placeholder="Kreator Kreativitas Masyarakat"></textarea>
                                <span class="text-danger error-text kreator_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Kreativitas Masyarakat</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi Kreativitas Masyarakat"></textarea>
                                <span class="text-danger error-text deskripsi_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="">Pilih Status Kreativitas Masyarakat</option>
                                    <option value="Terlaksana">Terlaksana</option>
                                    <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
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
                <form action="<?= base_url('Pengembangan/KreativitasMasyarakat/update') ?>" method="post" id="formEdit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditTitle">Edit Kreativitas Masyarakat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id_edit" id="id_edit" value="">
                            <div class="row mb-3">
                                <label for="nama_kreativitas_edit" class="form-label">Nama Kreativitas Masyarakat</label>
                                <textarea id="nama_kreativitas_edit" name="nama_kreativitas_edit" class="form-control" placeholder="Nama Kreativitas Masyarakat"></textarea>
                                <span class="text-danger error-text nama_kreativitas_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="kreator_edit" class="form-label">Kreator</label>
                                <textarea id="kreator_edit" name="kreator_edit" class="form-control" placeholder="Kreator Kreativitas Masyarakat"></textarea>
                                <span class="text-danger error-text kreator_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="deskripsi_edit" class="form-label">Deskripsi Kreativitas Masyarakat</label>
                                <textarea id="deskripsi_edit" name="deskripsi_edit" class="form-control" placeholder="Deskripsi Kreativitas Masyarakat"></textarea>
                                <span class="text-danger error-text deskripsi_edit_error"></span>
                            </div>
                            <div class="row mb-3">
                                <label for="status_edit" class="form-label">Status</label>
                                <select id="status_edit" name="status_edit" class="form-select">
                                    <option value="">Pilih Status Kreativitas Masyarakat</option>
                                    <option value="Terlaksana">Terlaksana</option>
                                    <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                                </select>
                                <span class="text-danger error-text status_edit_error"></span>
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
                url: '<?= base_url() ?>/Pengembangan/KreativitasMasyarakat/table',
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
                    "render": function(data, type, row) {
                        if (data == "Terlaksana") {
                            return '<div class="badge bg-success">Terlaksana</div>'
                        } else {
                            return '<div class="badge bg-danger">Tidak Terlaksana</div>'
                        }
                    }
                },
                {
                    "targets": [5],
                    "data": "6",
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
                url: '<?php echo base_url("Pengembangan/KreativitasMasyarakat/get") ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id,
                }
            })
            .done(function(data) {
                if (data) {
                    $('#id_edit').val(data.id_kreativitas);
                    $('#nama_kreativitas_edit').val(data.nama_kreativitas);
                    $('#kreator_edit').val(data.kreator);
                    $('#deskripsi_edit').val(data.deskripsi);
                    $('#status_edit').val(data.status);
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
                        url: "<?php echo base_url('Pengembangan/KreativitasMasyarakat/delete') ?>",
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