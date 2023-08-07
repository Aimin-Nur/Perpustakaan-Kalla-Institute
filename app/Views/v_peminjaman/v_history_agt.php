<?php
if (empty($hstagt)) {
} else {

?>
<div class="container-fluid">
    <div class="row">
        <?php foreach ($hstagt as $key => $data) {?>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <blockquote>
                                 <?php if ($data['status_pinjam'] === 'Belum Kembali') : ?>
                                    <p>Anda belum mengembalikan buku sampai hari ini, tanggal akhir peminjaman buku <b><?= $data['tgl_kembali']?></b></p>
                                    <small><a class="text-danger">Segera hubungi petugas perpustakaan untuk mengembalikan buku <cite title="Source Title"><?= $data['judul_buku']?>.</cite></a></small>
                                <?php endif; ?>
                                 <?php if ($data['status_pinjam'] === 'Dikembalikan') : ?>
                                    <p>Anda telah mengembalikan buku sesuai dengan tanggal akhir peminjaman <?= $data['tgl_kembali']?>.</p>
                                    <small>Durasi peminjaman buku <cite title="Source Title"><?= $data['judul_buku']?></cite> selama <?= $data['lama_pinjam']?> hari.</small>
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
<?php if (!empty($hstagt)) { ?>
<?php foreach ($hstagt as $key => $data) { ?>
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
                    <input type="readonly" name="tgl_terlambat" value="<?= $now->format('Y-m-d') ?>">
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

<?php } else { // Jika $hstagt kosong, tampilkan pesan informasi ?>
    <div class="row">
        <div class="col-12">
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Anda belum memiliki data history peminjaman buku.
            </div>
        </div>
    </div>
<?php } ?>





