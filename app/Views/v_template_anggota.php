
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('adminLTE')?>/plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('adminLTE')?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('Anggota')?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Auth/LoginAdmin')?>"> 
        <i class="fas fa-sign-out"></i>Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-white">
      <img src="http://localhost/perpus/assets/adminLTE/dist/img/kampus.png" alt="AdminLTE Logo" width="200px" class="img-fluid" style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('foto/' . $mhs['foto_mhs'])?>" class="img-circle elevation-3"  alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $mhs['nama_mhs']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
          <a href="<?= base_url('DashboardAnggota')?>" class="nav-link <?= $submenu == 'dashboard_anggota' ? 'active': '' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item <?php if($menu == 'peminjaman'){echo 'menu-open';}?>">
            <a href="" class="nav-link <?php if($menu == 'peminjaman'){echo 'active';}?>">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p class="fw-white">
                Peminjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Peminjaman/Pengajuan')?>" class="nav-link <?= $submenu == 'pengajuan' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Peminjaman/TerimaAgt')?>" class="nav-link <?= $submenu == 'diterima' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diterima</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Peminjaman/PengajuanDitolakAgt')?>" class="nav-link <?= $submenu == 'ditolak' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ditolak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Peminjaman/HistoryAgt/' . $mhs['id_anggota'])?>" class="nav-link <?= $submenu == 'history' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          <a href="<?= base_url('Peminjaman/ShowBukuAll')?>" class="nav-link <?= $submenu == 'showbuku' ? 'active': '' ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>Etalse Buku</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $judul?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
        <?php 
        if($page){
            echo view($page);
        }
        ?>  

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <a href="https://kallabs.ac.id">Perpustakaan Kalla Institute</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('adminLTE')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('adminLTE')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('adminLTE')?>/dist/js/adminlte.min.js"></script>



<!-- Load html2pdf library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
  $(document).ready(function() {
    // Print Button
    $('.btn-print').on('click', function() {
      window.print();
    });

    // Generate PDF Button
    $('.btn-generate-pdf').on('click', function() {
      const element = document.querySelector('.invoice');
      const opt = {
        margin: 10,
        filename: 'invoice.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
      };

      html2pdf()
        .set(opt)
        .from(element)
        .save();
    });
  });
</script>



<!-- JS Load Foto Profil Anggota -->
<script>
  function loadGambar(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
      $('#gambar_load').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    }
  }

  $('#preview_gambar').change(function () {
    loadGambar(this);
  });
</script>
</body>
</html>
