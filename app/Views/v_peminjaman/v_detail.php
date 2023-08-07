
  
<div class="col-md-3">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
            <?php 
            foreach ($detailData['buku'] as $bukuItem) : ?>
                <img class="img-fluid" id="gambar_load"
                        src="<?= base_url('buku/' . $bukuItem['foto_buku'])?>"
                       alt="User profile picture" width="150px">
            </div>
            <div class="form-group">   
                <h5 class="text-center mt-3"><i><?= $bukuItem['judul_buku']?></i></h5>
            </div>  
            
        </div>              
    </div>
   

    
    <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <div class="widget-user-image">
                  <img class="img-fluid" src="<?= base_url('foto/' . $bukuItem['foto_mhs'])?>" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h5 class="widget-user-username"><?= $bukuItem['nama_mhs']?></h5>
                <h6 class="widget-user-desc"><?= $bukuItem['nama_prodi']?> - <?= $bukuItem['nim']?></h6>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <h6 class="nav-link">
                        Tanggal Pengajuan <span class="float-right badge bg-primary"><?= $bukuItem['tgl_pengajuan']?></span>
                    </h6>            
                  </li>
                  <li class="nav-item">
                    <h6 href="#" class="nav-link">
                      Tanggal Pinjam<span class="float-right badge bg-info"><?= $bukuItem['tgl_pinjam']?></span>
                    </h6>
                  </li>
                  <li class="nav-item">
                    <h6 href="#" class="nav-link">
                      Durasi Peminjaman <span class="float-right badge bg-success"><?= $bukuItem['lama_pinjam']?> Hari</span>
                    </h6>
                  </li>
                  <li class="nav-item">
                    <h6 href="#" class="nav-link">
                      Tanggal Kembali <span class="float-right badge bg-danger"><?= $bukuItem['tgl_kembali']?></span>
                    </h6>
                  </li>
                </ul>
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
                    <td><?= $bukuItem['judul_buku']?></td>
                </tr>
                <tr>
                    <th width="150px">Sinopsis</th>
                    <th width="50px">:</th>
                    <td><?= $bukuItem['sinopsis']?></td>
                </tr>
                <tr>
                    <th width="150px">Kategori Buku </th>
                    <th width="50px">:</th>
                    <td>Buku <?= $detailData['kategori']['kategori_buku']?></th>
                </tr>
                <tr>
                    <th width="150px">ISBN  </th>
                    <th width="50px">:</th>
                    <td><?= $bukuItem['isbn']?></td>
                </tr>
                <tr>
                    <th width="150px">Penulis  </th>
                    <th width="50px">:</th>
                    <td><?= $detailData['kategori']['nama_penulis'] ?></td>
                </tr>
                <tr>
                    <th width="150px">Penerbit </th>
                    <th width="50px">:</th>
                    <td><?= $detailData['kategori']['nama_penerbit'] ?></td>
                </tr>
                <tr>
                    <th width="150px">Jumlah Halaman</th>
                    <th width="50px">:</th>
                    <td><?= $bukuItem['jumlah_hlm']?> hlm</td>
                </tr>
                <tr>
                    <th width="150px">Dipinjam</th>
                    <th width="50px">:</th>
                    <td><?= $bukuItem['dipinjam']?></td>
                </tr>
                <tr>
                    <th width="150px">Tersedia</th>
                    <th width="50px">:</th>
                    <td><?= $bukuItem['tersedia']?></td>
                </tr>
                <tr>
                    <th width="150px">Rak Buku</th>
                    <th width="50px">:</th>
                    <td><?= $detailData['kategori']['rak_buku']?>-<?= $detailData['kategori']['posisi_lantai']?></td>
                </tr>     
            </table>     
            <div class="d-flex justify-content-end">
                <button data-toggle="modal" data-target="#modal-hapus<?= $bukuItem['id_pinjam']?>" class="btn btn-danger mr-3">Tolak</button>
                <?php echo form_open(base_url('Admin/TerimaPeminjaman/' . $bukuItem['id_pinjam']));?>
                <input type="hidden" name="post_prodi" value="<?= $bukuItem['id_prodi']?>">
                <button type="submit" class="btn btn-success">Terima</button>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>


<!-- Modal Penolakan -->
<div class="modal fade" id="modal-hapus<?= $bukuItem['id_pinjam']?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Penolakan Pengajuan Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Admin/TolakPeminjaman/' . $bukuItem['id_pinjam']));?>
                <div class="form-group">
                    Alasan Penolakan Peminjaman Buku <b><?= $bukuItem['judul_buku']?></b>
                    <textarea class="form-control" rows="5" id="kategori" name="post_tolak"></textarea>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Kirim</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

