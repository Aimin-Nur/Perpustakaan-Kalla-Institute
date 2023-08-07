<div class="col-md-12">
    <?php
        $errors = session()->getFlashdata('errors');
        if(!empty($errors)) {?>
            <div class="alert alert-danger">
                <h4>Periksa Form</h4>
                <ul>
                <?php foreach ($errors as $key => $errors) { ?>
                    <li><?= esc($errors) ?></li>
                <?php } ?>
                </ul>
            </div>
        <?php } ?>

    <?php 
        if(session()->getFlashdata('pesan')){
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil</h5>';
        echo session()->getFlashdata('pesan');
        echo '</div>';
        }
    ?>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-12">
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Silahkan tunggu konfirmasi peminjaman buku dari petugas perpustakaan.
            </div>
        </div>
    </div>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('Peminjaman/ShowBuku')?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Peminjaman
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table text-center table-responsive">
                <th>
                    <tr>
                        <th width="80px">No</th>
                        <th width="250px">Tgl Pengajuan</th>
                        <th width="350px">Judul Buku</th>
                        <th width="300px">Kategori Buku</th>
                        <th width="250px">Cover Buku</th>
                        <th width="100px">Status</th>
                    </tr>
                <?php $no = 1;
                 foreach ($pengajuanbuku as $key => $value) { ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $value['tgl_pengajuan'] ?></td>
                        <td><?= $value['judul_buku']?></td>
                        <td><?= $value['kategori_buku'] ?></td>
                        <td><img src="<?= base_url('buku/' . $value['foto_buku'])?>" alt="cover-buku" class="img-fluid" width="70px" height="70px"></td>
                        <td><span class="badge badge-warning"><?= $value['status_pinjam'] ?></span></td>
                    </tr>
                <?php } ?>
                </th>
            </table>
        </div>
    </div>
</div>
        








<!-- Peminajaman Modal Add -->






<!-- Detail pengajuan -->

