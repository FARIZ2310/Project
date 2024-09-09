<?= $this->extend('Landing/layout/main') ?>

<?= $this->section('content') ?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Pengembangan</p>
					<h1>Kreativitas Inovasi Masyarakat</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-30 mb-150">
	<div class="container">
		<div class="row">
			<h4 style="text-align: center !important; color: #fff"><strong>Detail Inovasi</strong></h4>
			<div class="alert alert-default alert-md" style="width: 80%">
				<hr class="short invisible">
				<hr class="short solid">
				<hr class="short invisible">
				<h4 style="text-align: center !important;" class="center"><b><?= $nama_kreativitas ?></b></h4>
				<hr class="short invisible">
				<hr class="short solid">
				<div class="row">
					<div class="col-md-3">
						<p><b>Info Inovasi</b></p>
						<small>
							<i>Kreator :</i><br>
							<?= $kreator ?>
						</small><br><br>
						<small>
							<i>Status :</i><br>
							<div class="badge badge-<?= $status == "Terlaksana" ? "success" : "danger" ?>"><?= $status ?></div>
						</small><br><br>
					</div>
					<div class="col-md-9">
						<p><b>Deskripsi</b></p>
						<small>
							<p><?= $deskripsi ?></p>
						</small><br>
						<div class="row">
							<div class="col-md-6">
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>
<!-- end check out section -->



<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>