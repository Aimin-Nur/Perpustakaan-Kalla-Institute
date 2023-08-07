<div class="row">
<?php 
    if(session()->getFlashdata('pesan')){
    echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Berhasil</h5>';
    echo session()->getFlashdata('pesan');
    echo '</div>';
    }
?>

<?php 
    if(session()->getFlashdata('error')){
    echo '<div class="alert alert-danger" role="alert">';
    echo session()->getFlashdata('error');
    echo '</div>';
    }
?>
    
    <?php foreach ($buku as $key => $value) {?>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    Buku <b><?= $value['kategori_buku']?></b>
                </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b><?= $value['judul_buku']?></b></h2>
                        <p class="text-muted mb-3 text-sm"><b>Penulis / Penerbit : </b> <?= $value['nama_penulis']?> /<?= $value['nama_penerbit']?> </p>
                            
                        <ul class="ml-4 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-calendar-week"></i></span>Kode ISBN: <?= $value['isbn']?></li>
                            <li class="small mt-2"><span class="fa-li"><i class="fas fa-book-open"></i></span> Jumlah Halaman : <?=$value['jumlah_hlm']?> hlm</li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="<?= base_url('buku/' . $value['foto_buku'])?>" alt="user-avatar" class="img-fluid">
                    </div>
                </div>
            </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-buku<?= $value['id_buku']?>">
                            <i class="fas fa-book"></i> Pinjam Buku
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php };?>
</div>



<!-- Modal Jumlah  -->
<?php foreach ($buku as $key => $value) {?>
<div class="modal fade" id="modal-buku<?= $value['id_buku']?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Peminjaman Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $id_anggota = session()->get('id_anggota');
                $tgl = date('dmYHms');
                $no_pinjam = $id_anggota.$tgl;
                ?>
                <?php echo form_open(base_url('Peminjaman/AddPengajuan')) ?>
                <div class="form-group">
                    <label for="">Nomor Pinjam</label>
                    <input type="number" name="no_pinjam" class="form-control" value="<?= $no_pinjam ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Judul Buku</label>
                    <input type="hidden" class="form-control" name="judul_buku" value="<?= $value['id_buku']?>" readonly>
                    <input type="text" class="form-control" value="<?= $value['judul_buku']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Pinjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam"> 
                </div> 
                <div class="form-group">
                    <label for="">Durasi Pinjam (Hari)</label>
                    <input type="number" max="7" min="1" class="form-control" name="durasi"> 
                </div> 
            </div>
               
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>
<?php };?>