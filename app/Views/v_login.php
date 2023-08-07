<div class="login-logo">
    <a href="<?= base_url('Home')?>"><b>Aplikasi Perpustakaan</b></a>
    <br>
    <h3><b>Kalla Institute</b></h3>
  </div>
<div class="row">
    <div class="login-box">
        <div class="col-lg-12 col-12">
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>Pustakawan</h3>
                    
                    <p>Akses login admin</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <a href="<?= base_url('Auth/loginAdmin')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
    </div>
    <div class="login-box">
        <div class="col-lg-12 col-12">
                    <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>Mahasiswa</h3>

                        <p>Akses login anggota perpus</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= base_url('Auth/loginAnggota')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
            </div>
    </div>    
</div>