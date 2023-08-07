<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="login-logo">
        <a href="<?= base_url('Home')?>"><b>Aplikasi Perpustakaan</b></a>

        <h3><b>Kalla Institute</b></h3>
      </div>
    </div>
  </div>
</div>


<div class="login-box">
<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="http://localhost/perpus/assets/adminLTE/index2.html" class="h1"><b>Perpus</b> Kallins</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?= $judul ?></p>
        <!-- Notif Validasi -->
        <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <h5>Periksa Setiap Kolom Data User</h5>
                    <ul>
                        <?php foreach ($errors as $key => $error) {?>
                            <li><?= esc($error) ?></li>
                        <?php }?>
                    </ul>
                </div>
            <?php }?>
            <?php 
                if(session()->getFlashdata('pesan')){
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
        ?>
      <?php echo form_open_multipart('Auth/Register')?>
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="post_nama" value="<?= old('post_nama')?>" placeholder="Nama Mahasiswa">
          </div>
        </div>
      <div class="col-12">
        <div class="form-group">
          <label for="">Nim</label>
          <input type="text" class="form-control" name="post_nim" value="<?= old('post_nim')?>" placeholder="Nomor Induk Mahasiswa">
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <select class="form-control" name="post_gender" value="<?= old('post_gender')?>">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Prodi</label>
          <select class="form-control" name="post_prodi" id="" value="<?= old('post_prodi')?>">
            <option value="">Pilih Prodi</option>
            <?php foreach ($prodi as $key => $value) { ?>
            <option value="<?= $value['id_prodi']?>"><?= $value['nama_prodi']?></option>
            <?php }?>
          </select>
        </div>
      </div>

      <div class="col-12">
        <div class="form-group">
          <label for="">Nomor Hp</label>
          <input type="text" class="form-control" name="post_hp" value="<?= old('post_hp')?>" placeholder="Nomor Hp">
        </div>
      </div>

      <div class="col-12">
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" name="post_email" value="<?= old('post_email')?>" placeholder="Alamat Email @kallabs">
        </div>
      </div>

      <div class="col-12">
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" name="post_sandi" placeholder="Kata Sandi">
        </div>
      </div>

      </div>
      
        <div class="row">
          <div class="col-6">
            <div class="btn btn-success btn-block">
              <a class="text-white" href="<?= base_url('home')?>">
              Website
              </a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close()?>
      <div class="social-auth-links text-center mb-3">
        <p>- Atau -</p>
          <a href="<?= base_url('Auth/LoginAnggota')?>" class="btn btn-block btn-warning">
            <i class="fas fa-sign-in-alt mr-2"></i> Kembali Login
          </a>
        </div>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>
