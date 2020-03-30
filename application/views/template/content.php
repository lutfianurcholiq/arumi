
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
              <a title="Landing Page" href="" aria-expanded="false"><span class="educate-icon educate-home icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Beranda</span></a>
            </li>

            <?php #if($this->session->userdata('level') == "Kepala Cabang" || $this->session->userdata('level') == "Karyawan"): ?>
            <li>
              <a class="has-arrow" href="">
                <span class="educate-icon educate-course icon-wrap"></span>
                <span class="mini-click-non">Master Data</span>
              </a>
              <ul class="submenu-angle" aria-expanded="true">
                <?php #if($this->session->userdata('level') == "Kepala Cabang"): ?>
                  <li><a title="COA" href="<?php echo site_url('coa'); ?>"><span class="mini-sub-pro">COA</span></a></li>
                  <li><a title="Bahan" href=""><span class="mini-sub-pro">Bahan</span></a></li>
                <?php #elseif($this->session->userdata('level') == "Karyawan"): ?>
                  <li><a title="Pelanggan" href="<?php echo site_url('pelanggan'); ?>"><span class="mini-sub-pro">Pelanggan</span></a></li>
                <?php #endif; ?>
              </ul>
            </li>
            <?php #endif; ?>

            <?php #if($this->session->userdata('level') == "Kepala Cabang" || $this->session->userdata('level') == "Karyawan" || $this->session->userdata('level') == "Produksi"): ?>
            <li>
              <a class="has-arrow" href="">
                <span class="educate-icon educate-landing icon-wrap"></span>
                <span class="mini-click-non">Transaksi</span>
              </a>
              <ul class="submenu-angle" aria-expanded="true">
                <?php #if($this->session->userdata('level') == "Kepala Cabang"): ?>
                  <li><a title="Pembelian" href=""><span class="mini-sub-pro">Pembelian</span></a></li>
                <?php #elseif($this->session->userdata('level') == "Produksi"): ?>
                  <li><a title="Pemesanan" href=""><span class="mini-sub-pro">Pemesanan</span></a></li>
                <?php #elseif($this->session->userdata('level') == "Karyawan"): ?>
                  <li><a title="Penjualan" href=""><span class="mini-sub-pro">Penjualan</span></a></li>
                <?php #endif; ?>
              </ul>
            </li>
            <?php #endif; ?>

            <?php #if($this->session->userdata('level') == "Kepala Cabang" || $this->session->userdata('level') == "Produksi"): ?>
            <li>
              <a class="has-arrow" href="">
                <span class="educate-icon educate-event icon-wrap"></span>
                <span class="mini-click-non">Laporan</span>
              </a>
              <ul class="submenu-angle" aria-expanded="true">
                <li><a title="Jurnal Umum" href=""><span class="mini-sub-pro">Jurnal Umum</span></a></li>
                <li><a title="Buku Besar" href=""><span class="mini-sub-pro">Buku Besar</span></a></li>
                <li><a title="Kartu Stok" href=""><span class="mini-sub-pro">Kartu Stok</span></a></li>
              </ul>
            </li>
            <?php #endif; ?>
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

      <div class="breadcome-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="breadcome-list single-page-breadcome">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcome-heading">

                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="breadcome-menu">
                      <li>
                        <a href="#">Beranda</a> <span class="bread-slash">/</span>
                      </li>
                      <li>
                        <?php echo $menu; ?> <span class="bread-slash">/</span>
                      </li>
                      <li>
                        <span class="bread-blod"><?php echo $judul; ?></span>
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
              <p>Copyright © <?php echo date('Y'); ?>. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>