<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                    <i class="fas fa-plus"></i> Tambah prodi
                </button>
            </div>

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

            <table class="table table-bordered">
                <th>
                    <tr>
                        <th width="50px">No</th>
                        <th>Nama Prodi</th>
                        <th width="200px">Edit</th>
                    </tr>
                </th>
                <tbody>
                    <?php $no = 1;
                    foreach($prodi as $key => $value){?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_prodi'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#modal-edit<?= $value['id_prodi']?>"><i class="fas fa-edit"></i>Edit</a>
                                <a class="btn btn-danger" href="" data-toggle="modal" data-target="#modal-hapus<?= $value['id_prodi']?>"><i class="fas fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- tambah prodi -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Prodi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('prodi/Tambah/' . $value['id_prodi'] ));?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Prodi</label>
                    <input type="text" class="form-control" name="post_prodi" placeholder="Nama Prodi" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

<!-- edit prodi -->
<?php foreach ($prodi as $key => $value) {?>
<div class="modal fade" id="modal-edit<?=$value['id_prodi'];?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('prodi/Editprodi/' . $value['id_prodi'] ));?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Prodi</label>
                    <input type="text" class="form-control" value="<?= $value['nama_prodi'];?>" name="post_prodi" placeholder="Nama Prodi" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php };?>


<!-- hapus prodi -->
<?php foreach ($prodi as $key => $value) {?>
<div class="modal fade" id="modal-hapus<?= $value['id_prodi']?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data prodi Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('prodi/Hapusprodi/' . $value['id_prodi']));?>
                <div class="form-group">
                    Anda yakin ingin menghapus kategori <b><?= $value['nama_prodi']?></b> ?
                    </div>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus prodi</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php };?>