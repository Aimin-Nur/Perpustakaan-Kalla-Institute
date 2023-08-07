<?php

$db = \Config\Database::connect();

if (count($pengajuanbuku) == 0) {
  echo '<div class="row">
          <div class="col-12">
              <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Belum ada pengajuan buku pinjaman yang masuk.
              </div>
          </div>
        </div>';
} else 
  foreach ($pengajuanbuku as $key => $value) { 
  
  
  $buku = $db->table('tbl_peminjaman')
  ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
  ->where('id_anggota', $value['id_anggota'])
  ->where('status_pinjam', 'Diajukan')
  ->get()->getResultArray(); 
  
  ?>

<div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <div class="widget-user-image">
                <img class=" img-fluid" id="gambar_load"
                       src="<?= base_url('foto/' . $value['foto_mhs'])?>"
                       alt="User profile picture" width="150px">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?= $value['nama_mhs']?></h3>
                <h5 class="widget-user-desc"><?= $value['nim'] ?> - <?= $value['nama_prodi']?></h5>
              </div>
              <div class="card-footer p-0">
                <table class="text-center table table-striped">
                  <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pengajuan</th>
                    <th></th>
                  </tr>
                  <?php $no = 1; 
                  foreach ($buku as $key => $data) {?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><?= $data['judul_buku']?></td>
                    <td><?= $data['tgl_pengajuan'] ?></td>
                    <td><a href="<?= base_url('Admin/DetailPinjam/' . $data['id_pinjam'])?>" class="badge bg-success">Detail</a></td>
                  </tr>
                  <?php } ?>
                </table> 
              </div>
            </div>
        </div>


<?php } ?>