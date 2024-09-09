<?= $this->extend('Landing/layout/main') ?>

<?= $this->section('content') ?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Pengembangan</p>
                    <h1>Inovasi OPD</h1>
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
                <h2>Inovasi OPD</h2>
                <table id="table" class="datatables-basic table border-top">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Inovasi</th>
                            <th>Tahun</th>
                            <th>OPD</th>
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
                url: '<?= base_url() ?>/Pengembangan/InovasiOPD/table',
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
                    "data": "7",
                    "render": function(data, type, row) {
                        if (data == "Terlaksana") {
                            return '<div class="badge badge-success">Terlaksana</div>'
                        } else {
                            return '<div class="badge badge-danger">Tidak Terlaksana</div>'
                        }
                    }
                },
                {
                    "targets": [5],
                    "data": "8",
                    "render": function(data, type, row) {
                        if (data == "Ekspose Awal") {
                            return '<div class="badge badge-warning">Ekspose Awal</div>'
                        } else {
                            return '<div class="badge badge-primary">Ekspose Akhir</div>'
                        }
                    }
                },
                {
                    "targets": [6],
                    "data": "1",
                    "render": function(data, type, row) {
                        return '<a href="<?= base_url('InovasiOPD/') ?>/' + data + '" target="_blank" style="text-decoration: none"><i class="fa fa-info-circle"></i></a>'
                    },
                    "orderable": false,
                }
            ],
        });

    });
</script>
<?= $this->endSection() ?>