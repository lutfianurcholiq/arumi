<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Info -->
    <meta name="description" content="Diedit oleh Muhammad Balyan">
    <!-- Media Sosial meta-->
    <meta property="whatsapp" content="083821898003">
    <meta property="instagram" content="haibilll">
    <meta property="line" content="@kabayan98">
    <meta property="e-mail" content="mmbalyann@gmail.com">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title><?= "Desa"; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/font-awesome.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- validasi css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrapvalidator.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrapvalidator.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Aimtop</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?= site_url('login/logout/'.$username['no'].'');?>"><i class="fa fa-sign-out fa-lg"></i> Keluar</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= base_url();?>assets/img/user.jpg" alt="User Image" width="63" height="58">
        <div>
          <p class="app-sidebar__user-name">billys</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= site_url('beranda');?>"><i class="app-menu__icon fa fa-slack"></i><span class="app-menu__label">Beranda</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cubes"></i><span class="app-menu__label">Master Data</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= site_url('pegawai');?>"><i class="icon fa fa-cube"></i> Pegawai</a></li>
            <li><a class="treeview-item" href="<?= site_url('proyek');?>"><i class="icon fa fa-cube"></i> Proyek Aktif</a></li>
            <li><a class="treeview-item" href="<?= site_url('proyek/nonaktif');?>"><i class="icon fa fa-cube"></i> Proyek Non-Aktif</a></li>
            <li><a class="treeview-item" href="<?= site_url('posisi');?>"><i class="icon fa fa-cube"></i> Posisi</a></li>
            <li><a class="treeview-item" href="<?= site_url('departemen');?>"><i class="icon fa fa-cube"></i> Departemen</a></li>
            <li><a class="treeview-item" href="<?= site_url('operator');?>"><i class="icon fa fa-cube"></i> Operator</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-television"></i><span class="app-menu__label">Transaksi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= site_url('penempatan');?>"><i class="icon fa fa-suitcase"></i> Penempatan</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <main class="app-content">
      <?= $contents;?>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url();?>assets/js/popper.min.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/main.js"></script>
    <script src="<?= base_url();?>assets/js/onclick.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url();?>assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery-ui.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Select 2 plugin -->
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/field.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/chart.js"></script>
    
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrapvalidator.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrapvalidator.min.js"></script>
    <!-- Form error-->
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/examples.validation.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/error-validation.js"></script>
    <!-- Rupiah currency 2 plugin -->
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/rupiah-currency.js"></script>

    <script type="text/javascript">
        var date = new Date();
        date.setDate(date.getDate());

        $('#mulai').datepicker({ 
            format: "yyyy/mm/dd",
            startDate: date
        });

      $('select').select2();
    </script>
  </body>
</html>