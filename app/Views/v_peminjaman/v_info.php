<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>
        <?php 
                if(session()->getFlashdata('success')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Berhasil</h5>';
                // echo $info;
                echo session()->getFlashdata('success');
                echo '</div>';
                }
                ?>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped projects">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 1%">No</th>
                            <th style="width: 20%">Nama Mahasiswa</th>
                            <th style="width: 30%">Judul Buku</th>
                            <th>Durasi Peminjaman</th>
                            <th style="width: 8%" class="text-center">Status</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($info as $key => $value) { ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td>
                                    <a><?= $value['nama_mhs']?></a>
                                    <br>
                                    <small><?= $value['nama_prodi']?> - <?= $value['nim']?></small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="img-fluid" width="50px" src="<?= base_url('buku/' . $value['foto_buku'])?>">
                                        </li>
                                        <li class="list-inline-item">
                                            <small class="text-small"><?= $value['judul_buku']?></small> <br>
                                            <small class="text-small">Buku <b><?= $value['kategori_buku']?></b></small>
                                        </li>
                                    </ul>
                                </td>
                                <td class="project_progress">
                                    <?php
                                        $startDate = new \DateTime($value['tgl_pinjam']);
                                        $endDate = new \DateTime($value['tgl_kembali']);
                                        $currentDate = new \DateTime();
                                        $diff = $endDate->diff($currentDate);
                                    ?>
                                    <h6>
                                        <?php if ($currentDate < $endDate) : ?>
                                            <small id="countdown<?= $value['id_pinjam'] ?>">
                                                <?= $diff->format('%h Jam, %i Menit, %s Detik') ?>
                                            </small>
                                        <?php else : ?>
                                            <small class="text-danger">Waktu Peminjaman Telah Berakhir</small>
                                        <?php endif; ?>
                                    </h6>
                                </td>
                                <td class="project-state">
                                    <?php if ($value['status_pinjam'] === 'Dipinjam') : ?>
                                        <span class="badge badge-warning"><?= $value['status_pinjam'] ?></span>
                                    <?php elseif ($value['status_pinjam'] === 'Waiting') : ?>
                                        <span class="badge badge-warning"><?= $value['status_pinjam'] ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-secondary"><?= $value['status_pinjam'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-primary btn-sm" href="<?= base_url('Peminjaman/kirimEmail/' . $value['id_pinjam']) ?>">
                                    <i class="far fa-envelope me-5"></i> Kirim Email
                                    </a>
                                    <?php if ($currentDate < $endDate) : ?>
                                    <button class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#modal-ontime<?= $value['id_pinjam']?>">
                                        <i class="fas fa-edit"></i> Ontime
                                    </button>
                                    <?php else : ?>
                                    <button class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modal-edit<?= $value['id_pinjam']?>">
                                        <i class="fas fa-edit"></i> Oftime
                                    </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

   


<!--  Modal Telat -->
<?php foreach ($info as $key => $value) {?>
<div class="modal fade" id="modal-edit<?= $value['id_pinjam']?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Keterlambatan Pengembalian Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Admin/BelumKembali/' . $value['id_pinjam']));?>
                <div class="form-group text-center">
                    <h5 class="text-center">Apakah Peminjam Buku sudah mengembalikan buku <b><?= $value['judul_buku']?> ?</b></h5>
                    <span class="text-center"><i>Peminjam buku terlambat mengembalikan buku dari tanggal <?= $value['tgl_kembali']?>.</i></sp>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
</div>
<?php }; ?>


<!--  Modal Ontime -->
<?php foreach ($info as $key => $value) {?>
<div class="modal fade" id="modal-ontime<?= $value['id_pinjam']?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pengembalian Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Admin/PengembalianOntime/' . $value['id_pinjam']));?>
                <div class="form-group text-center">
                    <h5 class="text-center">Apakah Peminjam Buku sudah mengembalikan buku <b><?= $value['judul_buku']?> ?</b></h5>
                    <input type="hidden" name="post_keterlambatan" value="0">
                    <span class="text-center"><i>Peminjam tepat waktu mengembalikan buku.</i></sp>
                    <input type="hidden" name="status_pinjam" value="Dikembalikan">
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
</div>
<?php }; ?>


<script>
  function updateCountdown(endDate, elementId) {
    var currentDate = new Date();
    var diff = Math.max(0, endDate - currentDate);

    var seconds = Math.floor(diff / 1000) % 60;
    var minutes = Math.floor(diff / (1000 * 60)) % 60;
    var hours = Math.floor(diff / (1000 * 60 * 60)) % 24;
    var days = Math.floor(diff / (1000 * 60 * 60 * 24));

    var countdownText = days + ' Hari : ' + hours + ' Jam : ' + minutes + ' Menit : ' + seconds + ' Detik';
    document.getElementById(elementId).innerHTML = countdownText;
  }

  function startCountdowns() {
    <?php foreach ($info as $value) : ?>
      var endDate<?= $value['id_pinjam'] ?> = new Date('<?= $value['tgl_kembali'] ?>');
      setInterval(function() {
        updateCountdown(endDate<?= $value['id_pinjam'] ?>, 'countdown<?= $value['id_pinjam'] ?>');
      }, 1000);
    <?php endforeach; ?>
  }

  // Start the countdowns when the page loads
  window.onload = startCountdowns;
</script>