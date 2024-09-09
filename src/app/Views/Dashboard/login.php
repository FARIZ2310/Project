<?php
$validation = \Config\Services::validation();
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>/assets/dashboard/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


  <title>Sistem Informasi, Riset & Inovasi Daerah</title>


  <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
  <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">



  <!-- Favicon -->
  <link rel="shortcut icon" href="https://bappeda.banjarbarukota.go.id/media/2023/01/cropped-Logo-Kota-Banjarbaru-3-32x32.webp">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/fonts/boxicons.css" />


  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />


  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dashboard/vendor/css/pages/page-auth.css">

  <!-- Helpers -->
  <script src="<?= base_url() ?>/assets/dashboard/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= base_url() ?>/assets/dashboard/js/config.js"></script>

</head>

<body>

  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">


                </span>
                <span class="demo text-body fw-bold">SIRINADA</span>
              </a>
            </div>
            <!-- /Logo -->

            <form id="formLogin" class="mb-3" action="<?= base_url('login') ?>" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
              </div>
              <div class="invalid-feedback" style="display: block">
                <?= $validation->getError('username') ?>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                </div>
              </div>
              <div class="invalid-feedback" style="display: block">
                <?= $validation->getError('password') ?>
              </div>
              <div class="invalid-feedback" style="display: block">
                <?= $validation->getError('password') ?>
                <?php if (session()->getFlashData('error')) : ?>
                  <?= session()->getFlashData('error') ?>
                <?php endif; ?>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="http://localhost/farizkdbsngoding/assets/dashboard/vendor/libs/jquery/jquery.js"></script>
  <script src="http://localhost/farizkdbsngoding/assets/dashboard/vendor/libs/popper/popper.js"></script>
  <script src="http://localhost/farizkdbsngoding/assets/dashboard/vendor/js/bootstrap.js"></script>
  <script src="http://localhost/farizkdbsngoding/assets/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="http://localhost/farizkdbsngoding/assets/dashboard/vendor/js/menu.js"></script>

  <script src="http://localhost/farizkdbsngoding/assets/dashboard/js/main.js"></script>


  <!-- Page JS -->



  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>

<!-- beautify ignore:end -->