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
<div class="checkout-section mt-30 mb-150">
	<div class="container">
		<div class="row">
			<h4 style="text-align: center !important; color: #fff"><strong>Detail Inovasi</strong></h4>
			<div class="alert alert-default alert-md" style="width: 80%">
				<hr class="short invisible">
				<hr class="short solid">
				<hr class="short invisible">
				<h4 style="text-align: center !important;" class="center"><b><?= $judul_penelitian ?></b></h4>
				<hr class="short invisible">
				<hr class="short solid">
				<div class="row">
					<div class="col-md-3">
						<p><b>Info Penelitian</b></p>
						<small>
							<i>Tahun :</i><br>
							<?= $tahun_penelitian ?>
						</small><br><br>
						<small>
							<i>Lembaga :</i><br>
							<?= $nama_lembaga ?>
						</small><br><br>
						<small>
							<i>Jenis :</i><br>
							<?php if ($jenis_penelitian == "Penelitian") : ?>
								<div class="badge badge-primary"><?= $jenis_penelitian ?></div>
							<?php endif; ?>
							<?php if ($jenis_penelitian == "Publikasi") : ?>
								<div class="badge badge-info"><?= $jenis_penelitian ?></div>
							<?php endif; ?>
							<?php if ($jenis_penelitian == "Desiminasi") : ?>
								<div class="badge badge-warning"><?= $jenis_penelitian ?></div>
							<?php endif; ?>
							<?php if ($jenis_penelitian == "Fasilitasi") : ?>
								<div class="badge badge-danger"><?= $jenis_penelitian ?></div>
							<?php endif; ?>
							<?php if ($jenis_penelitian == "Kajian") : ?>
								<div class="badge badge-success"><?= $jenis_penelitian ?></div>
							<?php endif; ?>

						</small><br><br>
						<small>
							<i>Status :</i><br>
							<div class="badge badge-<?= $status == "Terlaksana" ? "success" : "danger" ?>"><?= $status ?></div>
						</small><br><br>
						<small>
							<i>Progress :</i><br>
							<div class="badge badge-<?= $progress == "Ekspose Akhir" ? "primary" : "warning" ?>"><?= $progress ?></div>
						</small>
					</div>
					<div class="col-md-9">
						<p><b>Abstrak</b></p>
						<small>
							<p><?= $abstrak_penelitian ?></p>
						</small><br>
						<p><b>Peneliti</b></p>
						<small>
							<p><?= $peneliti ?></p>
						</small><br>
						<p><b>Waktu Pelaksanaan</b></p>
						<small>
							<p><?= $waktu_pelaksanaan ?></p>
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