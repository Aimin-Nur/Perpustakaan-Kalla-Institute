<div class="col-md-12">
    <div class="card card-outline card-primary">
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

        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <div class="card-body">
        <table class="table table-striped projects">
              <thead>
                  <tr class="">
                      <th style="width: 1%">
                          No
                      </th>
                      <th style="width: 20%">
                          Nama Mahasiswa
                      </th>
                      <th style="width: 30%" class="text-center">
                          Judul Buku
                      </th>
                      <th class="me-5 text-center" style="width: 20%">
                          Keterangan
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 15%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                 foreach ($terima as $key => $value) { ?>
                  <tr>
                      <td>
                          <?= $no++?>
                      </td>
                      <td>
                          <a>
                              <?= $value['nama_mhs']?>
                          </a>
                          <br/>
                          <small>
                              <?= $value['nama_prodi']?> - <?= $value['nim']?>
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="img-fluid" width="50px" src="<?= base_url('buku/' . $value['foto_buku'])?>">
                              </li>
                              <li class="list-inline-item">
                                <small class="text-small"><?= $value['judul_buku']?></small> <br>
                                <small class="text-small">Buku <b><?= $value['kategori_buku']?></small></b>
                              </li>
                              <li class="list-inline-item">
                                
                              </li>
                          </ul>
                      </td>
                      <td class="project_progress" >
                          <h9 class="text-center">
                            <?php if ($value['status_pinjam'] === 'Diterima') : ?>
                            <small>Menunggu peminjam mengambil buku diperpustakaan.</small>
                            <?php elseif ($value['status_pinjam'] === 'Ditolak') : ?>
                            <small>Buku hanya boleh dibaca diperpsutakaan.</small>
                            <?php endif; ?>
                          </h9>
                      </td>
                      <td class="project-state">
                        <?php if ($value['status_pinjam'] === 'Diterima') : ?>
                          <span class="badge badge-success"><?= $value['status_pinjam']?></span>
                        <?php elseif ($value['status_pinjam'] === 'Ditolak') : ?>
                            <span class="badge badge-danger"><?= $value['status_pinjam']?></span>
                        <?php endif; ?>
                      </td>
                      <td class="project-actions text-right text-center">
                          <?php if ($value['status_pinjam'] === 'Diterima') : ?>
                          <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit<?= $value['id_pinjam']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                            Pengambilan
                          </a>
                          <?php elseif ($value['status_pinjam'] === 'Ditolak') : ?>
                            <a class="btn btn-outline-danger btn-sm" href="<?= base_url('Peminjaman/kirimEmailTolak/' . $value['id_pinjam']) ?>">
                            <i class="far fa-envelope me-5"></i> Kirim Email
                          <?php endif; ?>
                      </td>
                  </tr>
                <?php } ?>
              </tbody>
          </table>
        </div>
    </div>
</div>


<!--  Modal Terima -->
<?php foreach ($terima as $key => $value) {?>
<div class="modal fade" id="modal-edit<?= $value['id_pinjam']?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Peminjaman Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Admin/AmbilBuku/' . $value['id_pinjam']));?>
                <div class="form-group text-center">
                    <h5 class="text-center">Apakah Peminjam Buku sudah mengambil buku <b><?= $value['judul_buku']?> ?</b></h5>
                    <span class="text-center"><i>Durasi Peminjaman Buku sudah terhitung sejak pengajuan diterima.</i></sp>
                    <input type="hidden" name="status_pinjam" value="Dipinjam">
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










           