<?= $this->extend('Landing/layout/main') ?>

<?= $this->section('content') ?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Penelitian</p>
                    <h1>Penelitian / Kajian / Publikasi / Desiminasi / Fasilitasi</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="card-datatable table-responsive">
                <h2>Penelitian / Kajian / Publikasi / Desiminasi / Fasilitasi</h2>
                <table id="table" class="datatables-basic table border-top">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Jenis</th>
                            <th>Judul</th>
                            <th>Lembaga</th>
                            <th>Tahun</th>
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
    </div>
</div>
<!-- end check out section -->



<?= $this->endSection() ?>

<?= $this->section('js') ?>

<script>
    $(document).ready(function() {
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
                    "data": "7",
                },
                {
                    "targets": [4],
                    "data": "4",
                },
                {
                    "targets": [5],
                    "data": "8",
                },
                {
                    "targets": [6],
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
                    "targets": [7],
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
                    "targets": [8],
                    "data": "1",
                    "render": function(data, type, row) {
                        return '<a href="<?= base_url('Penelitian/') ?>/' + data + '" target="_blank" style="text-decoration: none"><i class="fa fa-info-circle"></i></a>'
                    },
                    "orderable": false,
                }
            ],
        });

    });
</script>
<?= $this->endSection() ?>