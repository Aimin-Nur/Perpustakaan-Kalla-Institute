<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
    <!-- /.card-header -->
    <!-- form start -->
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
            echo '<div class="alert alert-danger" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
    ?>

    <?php echo form_open_multipart('User/SimpanData')?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="pos_nama" class="form-control" value="<?= old('pos_nama')?>"  placeholder="Nama User">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="pos_email" class="form-control" value="<?= old('pos_email')?>" placeholder="Enter email">
                    </div>
                </div>
           
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pos_password" class="form-control" value="<?= old('pos_password')?>" placeholder="Password">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Level Akses User</label>
                    <select name="pos_level" value="<?= old('pos_level')?>" class="form-control">
                        <i><option>Pilih Level</option></i>
                        <option value="1">Petugas</option>
                        <option value="0">Admin</option>
                    </select>
                    </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                        <label>Upload Foto Profil</label>
                        
                            <input type="file" name="foto" value="<?= old('foto')?>" class="form-control" accept="image/*">
                           
                    </div>
                </div>
                    
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Nomor Hp</label>
                    <input type="number" name="pos_hp" class="form-control" value="<?= old('pos_hp')?>"  placeholder="NomorHp">
                    </div>
                </div>
                </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"> Submit </i></button>
                  <a href="<?= base_url('User')?>" class="btn btn-warning"><i class="fas fa-share"> Kembali</i></a>
                </div>
              <?php echo form_close() ?>
            </div>
        </div>
            <!-- /.card -->
