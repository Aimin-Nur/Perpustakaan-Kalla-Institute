<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php if (count($peminjaman) > 0): ?>
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            Selamat pengajuan peminjaman buku Anda diterima. Silahkan download bukti validasi peminjaman berikut ini dan tunjukan kepada petugas perpustakaan.
          </div>
       

<!-- Main content -->
<div class="invoice p-3 mb-3">
  <!-- title row -->
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-globe"></i> Perpustakaan Kalla Institute
        <?php
        $timezone = new DateTimeZone('Asia/Makassar'); 
        $now = new DateTime('now', $timezone);
        ?>
        <small class="float-right">Date: <?=$now->format('d-m-Y')?></small>
      </h4>
    </div>
    <!-- /.col -->
  </div>

  <div class="row invoice-info">
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      To
      <address>
        <strong><?= $mhs['nama_mhs']?></strong><br>
        <?= $mhs['nim']?> - <?= $mhs['nama_prodi']?><br>
        Phone: <?= $mhs['no_hp']?><br>
        Email: <?= $mhs['email']?>
      </address>
    </div>
    <!-- /.col -->
   
    <!-- /.col -->
  </div>

  <!-- Table row -->
  <div class="row mt-5">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>Judul Buku</th>
            <th>Kode Pinjam</th>
            <th>Tanggal Pinjam</th>
            <th>Durasi Peminjaman</th>
            <th>Tanggal Kembali</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($peminjaman as $key => $value): ?>
            <tr>
              <td><?= $no++?></td>
              <td><?= $value['judul_buku']?></td>
              <td><?= $value['no_pinjam']?></td>
              <td><?= $value['tgl_pinjam']?></td>
              <td><?= $value['lama_pinjam']?> Hari</td>
              <td><?= $value['tgl_kembali']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row mt-5">
    <!-- /.col -->
    <div class="col-12">
      <p class="lead">Informasi Buku Pinjaman</p>

      <div class="table-responsive">
        <table class="table">
        <?php foreach ($peminjaman as $key => $value): ?>
          <tr>
            <th style="width:50%">Cover</th>
            <td><img class="img-fluid mr-3" width="60px" src="<?= base_url('buku/' . $value['foto_buku'])?>"></td>
          </tr>
          <tr>
            <th>Judul Buku</th>
            <td><?= $value['judul_buku']?></td>
          </tr>
          <tr>
            <th>Kategori Buku</th>
            <td><?= $value['kategori_buku']?></td>
          </tr>
          <tr>
            <th>Penulis</th>
            <td><?= $value['nama_penulis']?></td>
          </tr>
          <tr>
            <th>Penerbit</th>
            <td><?= $value['nama_penerbit']?></td>
          </tr>
          <tr>
            <th>Jumlah Halaman</th>
            <td><?= $value['jumlah_hlm']?> Halaman</td>
          </tr>
          <tr>
            <th>Sinopsis</th>
            <td><?= $value['sinopsis']?></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-12">
      <button type="button" class="btn btn-default btn-print"><i class="fas fa-print"></i> Print</button>
      <button type="button" class="btn btn-primary float-right btn-generate-pdf" style="margin-right: 5px;">
        <i class="fas fa-download"></i> Generate PDF
      </button>
    </div>
  </div>
</div>

<?php else: ?>
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            Belum ada pengajuan buku pinjaman yang diterima.
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>