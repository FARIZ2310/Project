<?= $this->extend('Landing/layout/main') ?>

<?= $this->section('content') ?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Layanan</p>
                    <h1>Info Kerja Nyata</h1>
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
                <h2>Info Kerja Nyata</h2>
                <table id="table" class="datatables-basic table border-top">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Intansi</th>
                            <th>Pelaksanaan</th>
                            <th>Lokasi</th>
                            <th>Hasil</th>
                            <th>Peserta</th>
                            <th>Masa Magang</th>
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
                url: '<?= base_url() ?>/Layanan/InfoKerjaNyata/table',
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
                        return '<a href="' + row[4] + '" target="_blank" style="text-decoration: none">' + row[2] + '</a>'
                    },
                },
                {
                    "targets": [2],
                    "data": "5",
                },
                {
                    "targets": [4],
                    "data": "6",
                },
                {
                    "targets": [5],
                    "data": "7",
                },
                {
                    "targets": [6],
                    "data": "8",
                },
            ],
        });

    });
</script>
<?= $this->endSection() ?>