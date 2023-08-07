<div class="col-md-12">
  <div class="row">
    <?php if (count($tolak) > 0): ?>
      <div class="col-lg-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Note:</h5>
          Pengajuan peminjaman buku Anda Ditolak. Silahkan hubungi petugas perpustakaan untuk informasi selanjutnya.
        </div>
      </div>
    <?php else: ?>
      <div class="col-lg-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Note:</h5>
          Belum ada pengajuan buku pinjaman yang ditolak.
        </div>
      </div>
    <?php endif; ?>

    <div class="col-lg-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $judul ?></h3>
        </div>
        <div class="card-body">
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
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 1%">
                  No
                </th>
                <th style="width: 20%">
                  Durasi Peminjaman
                </th>
                <th style="width: 30%">
                  Judul Buku
                </th>
                <th style="width: 18%" class="text-center">
                  Status
                </th>
                <th style="width: 20%" class="text-center">
                  Ket
                </th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($tolak as $key => $value) { ?>
                <tr>
                  <td>
                    <?= $no++ ?>
                  </td>
                  <td>
                    <a>
                      <?= $value['lama_pinjam'] ?> Hari
                    </a>
                    <br />
                    <small>
                      <?= $value['tgl_pinjam'] ?> - <?= $value['tgl_kembali'] ?>
                    </small>
                  </td>
                  <td>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <img alt="Avatar" class="img-fluid" width="50px" src="<?= base_url('buku/' . $value['foto_buku']) ?>">
                      </li>
                      <li class="list-inline-item">
                        <small class="text-small"><?= $value['judul_buku'] ?></small> <br>
                        <small class="text-small">Buku <b><?= $value['kategori_buku'] ?></small></b>
                      </li>
                      <li class="list-inline-item">

                      </li>
                    </ul>
                  </td>
                  <td class="project-state">
                    <span class="badge badge-danger"><?= $value['status_pinjam'] ?></span>
                  </td>
                  <td class="project-actions text-left">
                    <small><?= $value['ket'] ?></small>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
