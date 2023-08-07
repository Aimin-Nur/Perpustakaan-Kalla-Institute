<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $jumlah;?></h3>
                    <p>Jumlah Buku</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $anggota;?><sup style="font-size: 20px"></sup></h3>
                    <p>Jumlah Anggota</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $pinjam ?></h3>
                    <p>Buku yang dipinjam</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $terlambat?></h3>
                    <p>Buku belum dikembalikan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book-reader"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Jumlah Buku berdasarkan Kategori Buku</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>



        <div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Peminjaman Buku Mahasiswa berdasarkan prodi</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <canvas id="pieChart" width="400" height="250"></canvas>
        </div>
        <!-- /.card-body -->
    </div>
</div>



        
    </div>
</div>



<script src="<?= base_url('adminLTE') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('adminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('adminLTE') ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url('adminLTE') ?>/plugins/flot/jquery.flot.js"></script>
<script src="<?= base_url('adminLTE') ?>/plugins/flot/plugins/jquery.flot.resize.js"></script>
<script src="<?= base_url('adminLTE') ?>/plugins/flot/plugins/jquery.flot.pie.js"></script>
<script src="<?= base_url('adminLTE') ?>/plugins/chart.js/Chart.min.js"></script>




<script>
    // Donut
    var bukuData = <?= json_encode($donut); ?>;
    var donutLabels = [];
    var donutData = [];
    var donutColors = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];

    for (var i = 0; i < bukuData.length; i++) {
        donutLabels.push(bukuData[i].kategori_buku);
        donutData.push(bukuData[i].jumlah_buku);
    }

    var donutChartCanvas = document.getElementById('donutChart').getContext('2d');
    var donutChartData = {
        labels: donutLabels,
        datasets: [{
            data: donutData,
            backgroundColor: donutColors,
        }]
    };

    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    };

    new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutChartData,
        options: donutOptions
    });
    
//    BAr Data
    var pieData = {
        labels: <?= json_encode(array_column($bookCounts, 'nama_prodi')); ?>,
        datasets: [{
            data: <?= json_encode(array_column($bookCounts, 'jumlah_buku')); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true
    };

    // Create pie chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });
   
</script>

