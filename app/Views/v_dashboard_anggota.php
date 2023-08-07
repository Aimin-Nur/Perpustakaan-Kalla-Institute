<div class="col-md-3">
<div class="card card-primary card-outline">
<?php echo form_open_multipart(base_url('/DashboardAnggota/Edit/') . $mhs['id_anggota'])?>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class=" img-fluid" id="gambar_load"
                       src="<?= base_url('foto/' . $mhs['foto_mhs'])?>"
                       alt="User profile picture" width="250px">
                </div>
                <div class="form-group">
                    <input type="file" id="preview_gambar" name="foto"  class="form-control"></input>
                    <button type="submit" class="mt-3 btn btn-primary btn-block"><i class="fas fa-camera"></i> Ganti Foto Profil</button>
                    <?php echo form_close() ?>
                </div>
                
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
                    <th width="150px">NIM  </th>
                    <th width="50px">:</th>
                    <th><?= $mhs['nim']?></th>
                </tr>
                <tr>
                    <th width="150px">Nama  </th>
                    <th width="50px">:</th>
                    <th><?= $mhs['nama_mhs']?></th>
                </tr>
                <tr>
                    <th width="150px">Gender  </th>
                    <th width="50px">:</th>
                    <th><?= $mhs['gender']?></th>
                </tr>
                <tr>
                    <th width="150px">Prodi  </th>
                    <th width="50px">:</th>
                    <th><?= $mhs['nama_prodi']?></th>
                </tr>
                <tr>
                    <th width="150px">Alamat Email </th>
                    <th width="50px">:</th>
                    <th><?= $mhs['email']?></th>
                </tr>
                <tr>
                    <th width="150px">Nomor Hp  </th>
                    <th width="50px">:</th>
                    <th><?= $mhs['no_hp']?></th>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <?php foreach ($bkpjm as $key => $data) {?>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <blockquote>
                                    <p>Anda sedang meminjam buku <b><?=$data['judul_buku']?></b> dan harus mengembalikan buku pada tanggal <?= $data['tgl_kembali']?>.</p>
                                    <b><span id="sisaWaktu<?= $key ?>"></span></b>
                            </blockquote>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative">
                                <img src="<?= base_url('buku/' . $data['foto_buku'])?>" width="125px" alt="Photo 1" class="img-fluid">
                                <div class="ribbon-wrapper ribbon-lg">
                                <?php if ($data['status_pinjam'] === 'Dikembalikan') : ?>
                                    <div class="ribbon bg-success text-sm">
                                    <?= $data['status_pinjam'] ?>
                                    </div>
                                <?php elseif ($data['status_pinjam'] === 'Belum Kembali') : ?>
                                    <div class="ribbon bg-danger text-sm">
                                    <?= $data['status_pinjam'] ?>
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Ambil tanggal kembali dari PHP dan konversi menjadi objek Date di JavaScript
            var tglKembali = new Date('<?= $data['tgl_kembali'] ?>');
            
            // Fungsi untuk menghitung selisih antara tanggal kembali dengan tanggal saat ini
            function hitungSisaWaktu() {
                var saatIni = new Date();
                var selisih = tglKembali - saatIni;

                // Konversi selisih waktu menjadi hari, jam, menit, dan detik
                var sisaHari = Math.floor(selisih / (1000 * 60 * 60 * 24));
                var sisaJam = Math.floor((selisih % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var sisaMenit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
                var sisaDetik = Math.floor((selisih % (1000 * 60)) / 1000);

                // Tampilkan sisa waktu dalam elemen dengan ID yang sesuai
                document.getElementById('sisaWaktu<?= $key ?>').innerHTML = + sisaHari + ' hari, ' + sisaJam + ' jam, ' + sisaMenit + ' menit, ' + sisaDetik + ' detik';
            }

            // Panggil fungsi untuk pertama kali saat halaman dimuat
            hitungSisaWaktu();

            // Jalankan fungsi setiap detik agar sisa waktu terus diperbarui
            setInterval(hitungSisaWaktu, 1000);
        </script>
        <?php } ?>
    </div>
</div>
