

    <div class="col-lg-12">
    <?php 
    if(session()->getFlashdata('pesan')){
      echo '<div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Berhasil</h5>';
                          // echo $info;
      echo session()->getFlashdata('pesan');
      echo '</div>';
    }
  ?>

    </div>


<?php
if (count($hst) == 0) {
  echo '<div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Belum ada pengajuan buku pinjaman yang masuk.
                </div>
            </div>
        </div>';
} else {

  
?>

<div class="container-fluid">
    <div class="row">
        <?php foreach ($hst as $key => $data) {?>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?= base_url('foto/' . $data['foto_mhs'])?>" alt="user image">
                            <span class="username">
                                <a href="#"><?= $data['nama_mhs']?></a>
                            </span>
                            <span class="description">Prodi <?= $data['nama_prodi']?> - <?= $data['nim']?> </span>
                    </div>
                    <?php if ($data['status_pinjam'] === 'Belum Kembali') : ?>
                    <div class="user-block float-right">
                        <a class="btn btn-outline-danger mt-2 btn-sm" href="<?= base_url('Admin/EmailTelat/' . $data['id_pinjam']) ?>">
                        <i class="far fa-envelope me-5"></i> Kirim Email
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <blockquote>
                                 <?php if ($data['status_pinjam'] === 'Belum Kembali') : ?>
                                    <p>Peminjam belum mengembalikan buku, tanggal akhir peminjaman buku <?= $data['tgl_kembali']?></p>
                                    <small><a href="" data-toggle="modal" data-target="#modal-edit<?= $data['id_pinjam']?>">Apakah Peminjam sudah mengembalikan buku <cite title="Source Title"><?= $data['judul_buku']?> ?</cite></a></small>
                                <?php endif; ?>
                                 <?php if ($data['status_pinjam'] === 'Dikembalikan') : ?>
                                    <?php if ($data['denda'] === NULL ) : ?>
                                    <p>Peminjam sudah mengembalikan buku sesuai dengan tanggal akhir peminjaman <?= $data['tgl_kembali']?>.</p>
                                    <small>Durasi peminjaman buku <cite title="Source Title"><?= $data['judul_buku']?></cite> selama <?= $data['lama_pinjam']?> hari.</small>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($data['status_pinjam'] === 'Dikembalikan') : ?>
                                        <?php if ($data['denda'] === '30') : ?>
                                    <p>Peminjam <span class="text-danger">terlambat</span> mengembalikan buku, masa tanggal akhir peminjaman <b><?= $data['tgl_kembali']?></b>.</p>
                                    <small>Peminjam terlambat <cite title="Source Title"><?= $data['keterlambatan']?></cite> hari dan telah membayar denda sebesar Rp 30.000.</small>
                                <?php endif; ?>
                                <?php endif; ?>
                            </blockquote>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative">
                                <img src="<?= base_url('buku/' . $data['foto_buku'])?>" width="125px" alt="Photo 1" class="img-fluid">
                                <div class="ribbon-wrapper ribbon-lg">
                                <?php if ($data['status_pinjam'] === 'Dikembalikan') : ?>
                                    <div class="ribbon bg-success text-sm">
                                    <?= $data['status_pinjam'] ?>
                                    </div>
                                <?php elseif ($data['status_pinjam'] === 'Belum Kembali') : ?>
                                    <div class="ribbon bg-danger text-sm">
                                    <?= $data['status_pinjam'] ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
       

        


   
        <!-- /.row -->



<?php } ?>


<!--  Modal Telat -->
<?php foreach ($hst as $key => $data) {?>
<div class="modal fade" id="modal-edit<?= $data['id_pinjam']?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Keterlambatan Pengembalian Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Admin/SimpanPengembalian/' . $data['id_pinjam']));?>
                <div class="form-group text-center">
                    <h5 class="text-center">Apakah Peminjam Buku sudah mengembalikan buku <b><?= $data['judul_buku']?> ?</b></h5>
                    <?php
                    $timezone = new DateTimeZone('Asia/Makassar'); 
                    $now = new DateTime('now', $timezone);
                    ?>
                    <input type="hidden" name="tgl_terlambat" value="<?= $now->format('Y-m-d') ?>">
                    <span class="text-center"><i>Peminjam buku terlambat mengembalikan buku dari tanggal <?= $data['tgl_kembali']?>.</i></sp>
                    <input type="hidden" name="status_pinjam" value="Belum Kembali">
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
</div>
<?php }; ?>