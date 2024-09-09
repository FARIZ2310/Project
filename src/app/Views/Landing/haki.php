<?= $this->extend('Landing/layout/main') ?>

<?= $this->section('content') ?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Pengembangan</p>
						<h1>HAKI</h1>
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
                    <h2>HAKI</h2>
                    <table id="table" class="datatables-basic table border-top">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Jenis</th>
                                <th>Nama HAKI</th>
                                <th>Pemilik</th>
                                <th>Registrasi</th>
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
                url: '<?= base_url() ?>/Pengembangan/HAKI/table',
                method: 'POST'
            },
            columnDefs: [
                { 
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
                    "data":  "3",
                }, 
                { 
                    "targets": [3],
                    "data":  "4",
                }, 
                { 
                    "targets": [4],
                    "data": "5",
                }, 
            ],
        });

    });
    </script>
<?= $this->endSection() ?>