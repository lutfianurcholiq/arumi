
  <!-- Start Left menu area -->
  <div class="left-sidebar-pro">
    <nav id="sidebar" class="">
      <div class="sidebar-header">
        <a href=""><img class="main-logo" src="<?= base_url('assets/img/logo/logo.png') ?>" alt="" /></a>
        <strong><a href=""><img src="<?= base_url('assets/img/logo/logosn.png') ?>" alt="" /></a></strong>
      </div>
      <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
          <ul class="metismenu" id="menu1">
            <li>
              <a title="Landing Page" href="<?php echo site_url('beranda') ?>" aria-expanded="false"><span class="fas fa-store-alt icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Beranda</span></a>
            </li>

            <?php if($this->session->userdata('level') == "Owner" OR $this->session->userdata('level') == "Produksi" OR $this->session->userdata('level') == "Karyawan"): ?>
            <li>
              <a class="has-arrow" href="">
                <span class="far fa-folder-open icon-wrap"></span>
                <span class="mini-click-non">Master Data</span>
              </a>
              <ul class="submenu-angle" aria-expanded="true">
                <li><a title="COA" href="<?php echo site_url('coa'); ?>"><span class="mini-sub-pro">COA</span></a></li>
                  <?php if($this->session->userdata('level') == "Owner"): ?>
                    <li><a title="Kelompok Biaya" href="<?php echo site_url('biaya'); ?>"><span class="mini-sub-pro">Kelompok Biaya</span></a></li>
                  <?php elseif($this->session->userdata('level') == "Produksi"): ?>
                    <li><a title="Bahan" href="<?php echo site_url('bahan'); ?>"><span class="mini-sub-pro">Bahan</span></a></li>
                    <li><a title="Karyawan" href="<?php echo site_url('karyawan'); ?>"><span class="mini-sub-pro">Karyawan</span></a></li>
                    <li><a title="Komunitas" href="<?php echo site_url('komunitas'); ?>"><span class="mini-sub-pro">Komunitas</span></a></li>
                    <li><a title="Bill of Material" href="<?php echo site_url('bom'); ?>"><span class="mini-sub-pro">Bill of Material</span></a></li>
                  <?php elseif($this->session->userdata('level') == "Karyawan"): ?>
                    <li><a title="Produk" href="<?php echo site_url('produk'); ?>"><span class="mini-sub-pro">Produk</span></a></li>
                    <li><a title="Pelanggan" href="<?php echo site_url('pelanggan'); ?>"><span class="mini-sub-pro">Pelanggan</span></a></li>
                  <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if($this->session->userdata('level') == "Owner" OR $this->session->userdata('level') == "Produksi" OR $this->session->userdata('level') == "Karyawan"): ?>
            <li>
              <a class="has-arrow" href="">
                <span class="far fa-handshake icon-wrap"></span>
                <span class="mini-click-non">Transaksi</span>
              </a>
              <ul class="submenu-angle" aria-expanded="true">
                <?php if($this->session->userdata('level') == "Produksi" OR $this->session->userdata('level') == "Karyawan"): ?>
                  <li><a title="Pesanan" href="<?php echo site_url('pesanan'); ?>"><span class="mini-sub-pro">Pesanan</span></a></li>
                  <?php if($this->session->userdata('level') == "Produksi"): ?>
                    <li><a title="Jadwal Produksi" href="<?php echo site_url('produksi'); ?>"><span class="mini-sub-pro">Jadwal Produksi</span></a></li>
                  <?php endif; ?>
                <?php elseif($this->session->userdata('level') == "Owner"): ?>
                  <li><a title="Pembayaran" href="<?php echo site_url('pembayaran'); ?>"><span class="mini-sub-pro">Pembayaran</span></a></li>
                  <li><a title="Setoran Modal" href="<?php echo site_url('modal'); ?>"><span class="mini-sub-pro">Setoran Modal</span></a></li>
                  <li><a title="HPPenjualan" href="<?php echo site_url('hpp'); ?>"><span class="mini-sub-pro">HPPenjualan</span></a></li>
                  <li><a title="Prive" href="<?php echo site_url('prive'); ?>"><span class="mini-sub-pro">Prive</span></a></li>
                  <li><a title="Operasional" href="<?php echo site_url('addOperasional'); ?>"><span class="mini-sub-pro">Operasional</span></a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if($this->session->userdata('level') == "Owner" OR $this->session->userdata('level') == "Produksi" OR $this->session->userdata('level') == "Karyawan"): ?>
            <li>
              <a class="has-arrow" href="">
                <span class="far fa-clipboard icon-wrap"></span>
                <span class="mini-click-non">Laporan</span>
              </a>
              <ul class="submenu-angle" aria-expanded="true">
                <li><a title="Jurnal Umum" href="<?php echo site_url('jurnal'); ?>"><span class="mini-sub-pro">Jurnal Umum</span></a></li>
                <li><a title="Buku Besar" href="<?php echo site_url('buku'); ?>"><span class="mini-sub-pro">Buku Besar</span></a></li>
                <?php if($this->session->userdata('level') == "Karyawan"): ?>
                  <li><a title="Penjualan" href="<?php echo site_url(''); ?>"><span class="mini-sub-pro">Penjualan</span></a></li>
                <?php elseif($this->session->userdata('level') == "Produksi"): ?>
                  <li><a title="Biaya Produksi" href="<?php echo site_url('biayaProduksi'); ?>"><span class="mini-sub-pro">Biaya Produksi</span></a></li>
                <?php elseif($this->session->userdata('level') == "Owner"): ?>
                  <li><a title="Laba Rugi" href="<?php echo site_url('labaRugi'); ?>"><span class="mini-sub-pro">Laba Rugi</span></a></li>
                  <li><a title="Perubahan Modal" href=""><span class="mini-sub-pro">Perubahan Modal</span></a></li>
                  <li><a title="Arus Kas" href=""><span class="mini-sub-pro">Arus Kas</span></a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </nav>
  </div>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="logo-pro">
            <a href=""><img class="main-logo" src="<?= base_url('assets/img/logo/logo.png') ?>" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
    <div class="header-advance-area">
      <div class="header-top-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header-top-wraper">
                <div class="row">
                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                    <div class="menu-switcher-pro">
                      <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <i class="educate-icon educate-nav"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                    <div class="header-top-menu tabl-d-n">
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="header-right-info">
                      <ul class="nav navbar-nav mai-top-nav header-right-menu">
                        <li class="nav-item">
                          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                            <img src="<?= base_url('assets/img/product/pro4.jpg') ?>" alt="" />
                            <span class="admin-name"><?php echo $this->session->userdata('nama'); ?></span>
                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                          </a>
                          <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                            <li><a href="<?php echo site_url('welcome/logout') ?>"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $this->libs->tittleMenu($judul, $menu); ?>
    </div>
    <!-- Contents Start -->
    <div class="data-table-area mg-b-15">
      <div class="container-fluid">
        <div class="row">
          <?php echo $contents; ?>
        </div>
      </div>
    </div>
    <!-- Contents End -->
    <div class="footer-copyright-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-copy-right">
              <p>Arumi © <?php echo date('Y'); ?>. Template by <a href="https://www.instagram.com/haibilll/">Colorlib</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>