
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('adminLTE')?>/plugins/fontawesome-free/css/all.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('adminLTE')?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('adminLTE')?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('adminLTE')?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        <a href="index3.html" class="nav-link">Home</a>
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
        <a class="nav-link" href="<?= base_url('Auth/LoginAnggota')?>"> 
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
      <img src="http://localhost/perpus/assets/adminLTE/dist/img/kampus.png" alt="Logo Kampus" width="200px" class="img-fluid" style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>

    <style>
      .hijau-kalla{
          background-color: #28854c ;
      }
    </style>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://localhost/perpus/assets/adminLTE/dist/img/admin1.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin123</a>
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
            <a href="<?= base_url('Admin')?>" class="nav-link <?= $submenu == 'dashboard' ? 'active': '' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p class="fw-white">Dashboard</p>
            </a>
          </li>
          <!-- Menu Peminjaman -->
          <li class="nav-item <?php if($menu == 'pengajuan'){echo 'menu-open';}?>">
            <a href="" class="nav-link <?php if($menu == 'pengajuanmasuk'){echo 'active';}?>">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p class="fw-white">
                Peminjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Admin/PengajuanMasuk')?>" class="nav-link <?= $submenu == 'pengajuanmasuk' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/PengajuanDiterima')?>" class="nav-link <?= $submenu == 'pengajuanterima' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validasi Peminjam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/InfoPinjam')?>" class="nav-link <?= $submenu == 'pinjambuku' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/PengajuanDitolak')?>" class="nav-link <?= $submenu == 'pengajuantolak' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Denda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Admin/History')?>" class="nav-link <?= $submenu == 'history' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Menu Buku -->
          <li class="nav-item <?php if($menu == 'masterdata'){echo 'menu-open';}?>">
            <a href="" class="nav-link <?php if($menu == 'masterdata'){echo 'active';}?>">
              <i class="nav-icon fas fa-book"></i>
              <p class="fw-white">
                Master Buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Kategori')?>" class="nav-link <?= $submenu == 'kategori' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Cbuku')?>" class="nav-link <?= $submenu == 'buku' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Rak')?>" class="nav-link <?= $submenu == 'rak' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Penerbit')?>" class="nav-link <?= $submenu == 'penerbit' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerbit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Penulis')?>" class="nav-link <?= $submenu == 'penulis' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penulis</p>
                </a>
              </li>
            </ul>
          </li>


          <!-- Menu Anggota -->
          <li class="nav-item <?php if($menu == 'masteranggota'){echo 'menu-open';}?>">
            <a href="" class="nav-link <?php if($menu == 'masteranggota'){echo 'active';}?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Master Anggota
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Anggota')?>" class="nav-link <?= $submenu == 'anggota' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Prodi')?>" class="nav-link <?= $submenu == 'Prodi' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prodi</p>
                </a>
              </li>
            </ul>
          </li>


        <!-- Menu Pengaturan -->
          <li class="nav-item <?php if($menu == 'pengaturan'){echo 'menu-open';}?>">
            <a href="" class="nav-link <?php if($menu == 'pengaturan'){echo 'active';}?>">
              <i class="fas fa-cogs"></i>
              <p>
                  Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('User')?>" class="nav-link <?= $submenu == 'Kelola User' ? 'active': '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola User</p>
                </a>
              </li>
            </ul>
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

<!-- DataTables  & Plugins -->
<script src="<?= base_url('adminLTE')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('adminLTE')?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('adminLTE')?>/dist/js/adminlte.min.js"></script>





<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>

<script>
  function loadGambar(input) {
    if (input.files && input.files[0]) {
       var reader = new FileReader();
        reader.onload = function (e) {
        $('#gambar_load').attr('src', e.target.result);
        }
      reader.readAsDataURL(input.files[0]);
      }
       }

      $('#preview_gambar').change(function () {
        loadGambar(this);
      });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi kalender
        $('#calendar').fullCalendar({
            // Konfigurasi opsi kalender di sini
            // Contoh: menampilkan kalender dengan bulan dan minggu sebagai tampilan default
            defaultView: 'month',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek'
            },
            events: [
                // Contoh data acara dummy
                {
                    title: 'Event 1',
                    start: '2023-07-28'
                },
                {
                    title: 'Event 2',
                    start: '2023-07-29'
                },
                {
                    title: 'Event 3',
                    start: '2023-07-30'
                }
            ]
        });
    });
</script>






</body>

</html>
