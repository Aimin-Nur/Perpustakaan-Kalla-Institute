<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card card-solid">
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

  <div class="container card-tools mt-3">
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-lg">
          <i class="fas fa-plus"></i> Tambah Buku
      </button>
    </div>
  <div class="card-body pb-0">
  <div class="row">
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
              <a href="#" data-toggle="modal" data-target="#modal-danger<?= $value['id_buku']?>" class="btn btn-sm bg-danger">
              <i class="fas fa-trash"></i>
              </a>
              <a href="#" data-toggle="modal" data-target="#modal-warning<?= $value['id_buku']?>" class="btn btn-sm bg-warning">
              <i class="fas fa-edit"></i>
              </a>
              <a href="<?= base_url('Cbuku/DetailBuku/' . $value['id_buku'])?>" class="btn btn-sm btn-success">
               Lihat Detail <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php };?>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
  <?php if (isset($pager)) : ?>
        <?= $pager->links('default', 'bootstrap_pagination') ?>
    <?php endif ?>
    <nav aria-label="Contacts Page Navigation">
      <ul class="pagination justify-content-center m-0">
        <li class="page-item active"><a class="page-link" href="<? base_url()?>">1</a></li>
        <li class="page-item"><a class="page-link" href="<? base_url('halaman-2')?>">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item"><a class="page-link" href="#">6</a></li>
        <li class="page-item"><a class="page-link" href="#">7</a></li>
        <li class="page-item"><a class="page-link" href="#">8</a></li>
      </ul>
    </nav>
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->




<!-- Modal Add Buku -->
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?= $judul ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart(base_url('CBuku/TambahBuku'))?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid" id="gambar_load" src="<?= base_url('buku/sampel.jpg')?>" alt="sampel buku" width="250px">
                </div>
                <div class="form-group">
                  <label for="">Cover Buku</label>
                  <input type="file" id="preview_gambar" name="foto" class="form-control"></input>
                  <button type="submit" class="mt-3 btn btn-primary btn-block"><i class="fas fa-camera"></i> Tambah Foto Buku</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Kode Buku</label>
              <input type="text" name="post_kode" class="form-control" id="exampleInputEmail1" placeholder="kode buku">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Judul Buku</label>
              <input type="text" name="post_judul" class="form-control" id="exampleInputEmail1" placeholder="judul buku">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kategori Buku</label>
              <select class="form-control" name="post_kategori" id="">
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategori as $key => $value) { ?>
                <option value="<?= $value['id_kategori']?>"><?= $value['kategori_buku']?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Penerbit</label>
              <select class="form-control" name="post_penerbit" id="">
                <option value="">Pilih Penerbit</option>
                <?php foreach ($penerbit as $key => $value) { ?>
                <option value="<?= $value['id_penerbit']?>"><?= $value['nama_penerbit']?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Penulis</label>
              <select class="form-control" name="post_penulis" id="">
                <option value="">Pilih Penulis</option>
                <?php foreach ($penulis as $key => $value) { ?>
                <option value="<?= $value['id_penulis']?>"><?= $value['nama_penulis']?></option>
                <?php }?>
              </select>
            </div>
          </div>
          <div class="col-md-4">        
            <div class="form-group">
              <label for="exampleInputPassword1">Sinopsis</label>
              <input type="text" name="post_sinopsis" class="form-control" id="exampleInputPassword1" placeholder="sinopsis buku">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kode ISBN</label>
              <input type="text" name="post_isbn" class="form-control" id="exampleInputPassword1" placeholder="nomor ISBN">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Jumlah halaman</label>
              <input type="text" class="form-control" name="post_hlm" id="exampleInputPassword1" placeholder="jumlah halaman">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Qty</label>
              <input type="text" class="form-control"name="post_qty" id="exampleInputPassword1" placeholder="kuantitas">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Rak Buku</label>
              <select class="form-control" name="post_rak" id="">
                <option value="">Pilih Rak Buku</option>
                <?php foreach ($rak as $key => $value) { ?>
                <option value="<?= $value['id_rak']?>"><?= $value['rak_buku']?>-<?= $value['posisi_lantai']?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>  
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<!-- Modal hapus -->
<?php foreach ($buku as $key => $value) {?>
<div class="modal fade" id="modal-danger<?= $value['id_buku']?>">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <?php echo form_open_multipart(base_url('CBuku/HapusBuku/' . $value['id_buku']))?>
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data Buku</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <img width="150px" class="img-fluid ms-5" src="<?= base_url('buku/' . $value['foto_buku'])?>" alt="">
          </div>
          <div class="col-md-8"> 
            <p class="mt-5">Apakah anda yakin ingin menghapus buku <b><?= $value['judul_buku']?></b>?</p>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Hapus</button>
      </div>
      <?php echo form_close()?>
    </div>
  </div>
</div>
<?php }?>

<!-- Modal edit -->
<?php foreach ($buku as $key => $value) {?>
<div class="modal fade" id="modal-warning<?= $value['id_buku']?>">
  <div class="modal-dialog modal-xl">
    <div class="modal-content bg-white">
      <?php echo form_open_multipart(base_url('CBuku/EditBuku/' . $value['id_buku']))?>
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Buku</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid" id="gambar_load" src="<?= base_url('buku/' . $value['foto_buku'])?>" alt="sampel buku" width="250px">
                </div>
                <div class="form-group text-center text-muted mt-3">
                  <i><label for="" class="tetx-center"><?= $value['judul_buku']?></label></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label for="exampleInputEmail1">Kode Buku</label>
              <input type="readonly" name="post_kode" class="form-control" id="exampleInputEmail1" placeholder="kode buku" value="<?= $value['kode_buku']?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Judul Buku</label>
              <input type="text" name="post_judul" class="form-control" id="exampleInputEmail1" placeholder="judul buku" value="<?= $value['judul_buku']?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Sinopsis</label>
              <input type="text" name="post_sinopsis" class="form-control" id="exampleInputPassword1" placeholder="sinopsis buku" value="<?= $value['sinopsis']?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kode ISBN</label>
              <input type="text" name="post_isbn" class="form-control" id="exampleInputPassword1" placeholder="nomor ISBN" value="<?= $value['isbn']?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Jumlah halaman</label>
              <input type="text" class="form-control" name="post_hlm" id="exampleInputPassword1" placeholder="jumlah halaman" value="<?= $value['jumlah_hlm']?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Qty</label>
              <input type="text" class="form-control" name="post_qty" id="exampleInputPassword1" placeholder="kuantitas" value="<?= $value['tersedia']?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Penulis</label>
              <select class="form-control" name="post_penulis" id="">
                <option value="">Penulis</option>
                <?php foreach ($penulis as $key => $penulis_value) { ?>
                <option value="<?= $penulis_value['id_penulis']?>"><?= $penulis_value['nama_penulis']?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Penerbit</label>
              <select class="form-control" name="post_penerbit" id="">
                <option value="">Penerbit</option>
                <?php foreach ($penerbit as $key => $penerbit_value) { ?>
                <option value="<?= $penerbit_value['id_penerbit']?>"><?= $penerbit_value['nama_penerbit']?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Rak Buku</label>
              <select class="form-control" name="post_rak" id="">
                <option value="">Posisi Rak Buku</option>
                <?php foreach ($rak as $key => $rak_value) { ?>
                <option value="<?= $rak_value['id_rak']?>"><?= $rak_value['rak_buku']?>-<?= $rak_value['posisi_lantai']?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kategori Buku</label>
              <select class="form-control" name="post_kategori" id="">
                <option value=""><?= $value['kategori_buku']?></option>
                <?php foreach ($kategori as $key => $kategori_value) { ?>
                <option value="<?= $kategori_value['id_kategori']?>"><?= $kategori_value['kategori_buku']?></option>
                <?php }?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-success">Edit</button>
      </div>
      <?php echo form_close()?>
    </div>
  </div>
</div>
<?php } ?>































            






  