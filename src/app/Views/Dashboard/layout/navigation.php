<?php
$session = session();
?>
<ul class="menu-inner py-1">
  <!-- Dashboard -->
  <li class="menu-item <?= uri_string() == 'Dashboard' ? 'active' : '' ?>">
    <a href="<?= base_url('Dashboard') ?>" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div>Dashboard</div>
    </a>
  </li>
  <?php if ($session->get('role') == 'Bappeda') : ?>
    <li class="menu-item <?= current_url(true)->getSegment(2) == 'Penelitian' ? 'active open' : '' ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-book"></i>
        <div>Penelitian / Kajian</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item <?= uri_string() == 'Penelitian/Lembaga' ? 'active' : '' ?>">
          <a href="<?= base_url('Penelitian/Lembaga') ?>" class="menu-link">
            <div>Lembaga Penelitian</div>
          </a>
        </li>
        <li class="menu-item <?= uri_string() == 'Penelitian/Peneliti' ? 'active' : '' ?>">
          <a href="<?= base_url('Penelitian/Peneliti') ?>" class="menu-link">
            <div>Peneliti</div>
          </a>
        </li>
        <li class="menu-item <?= uri_string() == 'Penelitian/Penelitian' ? 'active' : '' ?>">
          <a href="<?= base_url('Penelitian/Penelitian') ?>" class="menu-link">
            <div>Penelitian</div>
          </a>
        </li>
      </ul>
    </li>
  <?php endif; ?>
  <li class="menu-item <?= current_url(true)->getSegment(2) == 'Pengembangan' ? 'active open' : '' ?>">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-buildings"></i>
      <div>Pengembangan</div>
    </a>


    <ul class="menu-sub ">
      <?php if ($session->get('role') == 'Bappeda') : ?>
        <li class="menu-item <?= uri_string() == 'Pengembangan/HAKI' ? 'active' : '' ?>">
          <a href="<?= base_url('Pengembangan/HAKI') ?>" class="menu-link">
            <div>HAKI</div>
          </a>
        </li>

      <?php endif; ?>
      <li class="menu-item <?= uri_string() == 'Pengembangan/InovasiSKPD' ? 'active' : '' ?>">
        <a href="<?= base_url('Pengembangan/InovasiSKPD') ?>" class="menu-link">
          <div>Inovasi SKPD</div>
        </a>
      </li>
      <?php if ($session->get('role') == 'Bappeda') : ?>
        <li class="menu-item <?= uri_string() == 'Pengembangan/KreativitasMasyarakat' ? 'active' : '' ?>">
          <a href="<?= base_url('Pengembangan/KreativitasMasyarakat') ?>" class="menu-link">
            <div>Kreativitas Masyarakat</div>
          </a>
        </li>
        <li class="menu-item <?= uri_string() == 'Pengembangan/KebutuhanRiset' ? 'active' : '' ?>">
          <a href="<?= base_url('Pengembangan/KebutuhanRiset') ?>" class="menu-link">
            <div>Kebutuhan Riset</div>
          </a>
        </li>
    </ul>
  <li class="menu-item <?= current_url(true)->getSegment(2) == 'Layanan' ? 'active open' : '' ?>">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-info-circle"></i>
      <div>Layanan</div>
    </a>

    <ul class="menu-sub">
      <li class="menu-item <?= uri_string() == 'Layanan/InfoKerjaNyata' ? 'active' : '' ?>">
        <a href="<?= base_url('Layanan/InfoKerjaNyata') ?>" class="menu-link">
          <div>Info Kerja Nyata</div>
        </a>
      </li>
      <li class="menu-item <?= uri_string() == 'Layanan/BlogSaran' ? 'active' : '' ?>">
        <a href="<?= base_url('Layanan/BlogSaran') ?>" class="menu-link">
          <div>Blog Saran</div>
        </a>
      </li>
    </ul>
  </li>
  <li class="menu-item <?= uri_string() == 'SKPD' ? 'active' : '' ?>">
    <a href="<?= base_url('SKPD') ?>" class="menu-link">
      <i class="menu-icon tf-icons bx bx-user"></i>
      <div>SKPD</div>
    </a>
  </li>

<?php endif; ?>
</ul>