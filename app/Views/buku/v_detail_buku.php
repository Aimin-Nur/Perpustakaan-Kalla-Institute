
<div class="col-md-3">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class=" img-fluid" id="gambar_load"
                       src="<?= base_url('buku/' . $buku['foto_buku'])?>"
                       alt="User profile picture" width="200px">
            </div>
            <div class="form-group">   
                <h5 class="text-center mt-3"><i><?= $buku['judul_buku']?></i></h5>
            </div>  
        </div>              
    </div>
</div>

<div class="col-md-9">
<?php 
                if(session()->getFlashdata('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Berhasil</h5>';
                // echo $info;
                echo session()->getFlashdata('pesan');
                echo '</div>';
                }
                ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <div class="card-tools">
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <tr>
                    <th width="150px">Judul Buku  </th>
                    <th width="50px">:</th>
                    <th><?= $buku['judul_buku']?></th>
                </tr>
                <tr>
                    <th width="150px">Sinopsis</th>
                    <th width="50px">:</th>
                    <td><?= $buku['sinopsis']?></td>
                </tr>
                <tr>
                    <th width="150px">Kategori Buku </th>
                    <th width="50px">:</th>
                    <td>Buku <?= $buku['kategori_buku']?></td>
                </tr>
                <tr>
                    <th width="150px">ISBN  </th>
                    <th width="50px">:</th>
                    <td><?= $buku['isbn']?></td>
                </tr>
                <tr>
                    <th width="150px">Penulis  </th>
                    <th width="50px">:</th>
                    <td><?= $buku['nama_penulis']?></td>
                </tr>
                <tr>
                    <th width="150px">Penerbit </th>
                    <th width="50px">:</th>
                    <td><?= $buku['nama_penerbit']?></td>
                </tr>
                <tr>
                    <th width="150px">Jumlah Halaman</th>
                    <th width="50px">:</th>
                    <td><?= $buku['jumlah_hlm']?> hlm</td>
                </tr>
                <tr>
                    <th width="150px">Dipinjam</th>
                    <th width="50px">:</th>
                    <td><?= $buku['dipinjam']?> Buku sedang dipinjam</td>
                </tr>
                <tr>
                    <th width="150px">Tersedia</th>
                    <th width="50px">:</th>
                    <td><?= $buku['tersedia']?> Buku</td>
                </tr>
                <tr>
                    <th width="150px">Rak Buku</th>
                    <th width="50px">:</th>
                    <td><?= $buku['rak_buku']?>-<?= $buku['posisi_lantai']?></td>
                </tr>
            </table>
        </div>
        
    </div>
</div>
