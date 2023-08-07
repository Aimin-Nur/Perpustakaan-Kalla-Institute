<div class="login-logo">
    <a href="<?= base_url('Home')?>"><b>Aplikasi Perpustakaan</b></a>
    <br>
    <h3><b>Kalla Institute</b></h3>
  </div>
  
<div class="login-box">
<d class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="http://localhost/perpus/assets/adminLTE/index2.html" class="h1"><b>Perpus</b> Kallins</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login Page For Admin</p>

      <!-- Notif -->
      <?php
      $errors = session()->getFlashdata('errors');
      if(!empty($errors)){?>
        <div class="alert-danger" role="alert">
          <h4>Periksa Form</h4>
          <ul>
            <?php foreach($errors as $key => $error){?>
            <li><?= esc($error)?></li>
            <?php } ?>
          </ul>

        </div>
      <?php } ?>
      <!-- Notif -->

      <?php 
        if(session()->getFlashdata('pesan')){
          echo '<div class="alert alert-danger" role="alert">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
      ?>

<div>
      <?php echo form_open('Auth/cekLoginAdmin')?>
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="btn btn-success">
              <a class="text-white" href="<?= base_url('home')?>">
              Website
              </a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close();?>
    </div>
    <!-- /.card-body -->
  </div>
</div>

