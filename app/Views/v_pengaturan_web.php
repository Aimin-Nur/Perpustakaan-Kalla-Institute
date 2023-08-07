<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pengaturan Web</h3>
        </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php
    $errors = session()->getFlashdata('errors');
    if (!empty($errors)) { ?>
        <div class="alert alert-danger">
            <h5>Periksa Setiap Kolom Data Pengaturan</h5>
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

    <?php echo form_open_multipart('WebSetting')?>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-12">
                        <label>Logo Perpustakaan Kampus</label>
                            <div class="form-group">    
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Kampus</label>
                        <input type="text" name="pos_nama" class="form-control" value="<?= $web('nama_kampus')?>"  placeholder="Nama Kampus">
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat Kampus</label>
                        <input type="text" name="pos_alamat" class="form-control" value="<?= $web('alamat')?>" placeholder="Alamat">
                    </div>
                </div>
        

                <div class="col-sm-6">
                <div class="form-group">
                        <label>Upload Logo Perpustakaan Kampus</label>
                        
                            <input type="file" name="foto" value="<?= $web('logo')?>" class="form-control" accept="image/*">
                           
                    </div>
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
