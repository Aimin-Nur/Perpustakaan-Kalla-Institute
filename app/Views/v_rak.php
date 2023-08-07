<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                    <i class="fas fa-plus"></i> Tambah Data Rak
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
                        <th>Rak Buku</th>
                        <th width="200px" class="text-center">Edit</th>
                    </tr>
                </th>
                <tbody>
                    <?php $no = 1;
                    foreach($rak as $key => $value){?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['rak_buku'] ?> - Baris <?= $value['posisi_lantai'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#modal-edit<?= $value['id_rak']?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="" data-toggle="modal" data-target="#modal-hapus<?= $value['id_rak']?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        



        </div>
    </div>
</div>


<!-- tambah rak -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Rak Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Rak/Tambah/' . $value['id_rak'] ));?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rak Buku</label>
                    <input type="text" class="form-control" name="bku_rak" placeholder="Rak Buku" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Baris Rak</label>
                    <input type="number" class="form-control" name="lantai_rak" placeholder="Lantai Rak" required>
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

<!-- edit rak -->
<?php foreach ($rak as $key => $value) {?>
<div class="modal fade" id="modal-edit<?=$value['id_rak'];?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Rak Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Rak/EditRak/' . $value['id_rak'] ));?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rak Buku</label>
                    <input type="text" class="form-control" value="<?= $value['rak_buku'];?>" name="bku_rak" placeholder="Rak Buku" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Baris Rak</label>
                    <input type="number" class="form-control" value="<?= $value['posisi_lantai'];?>" name="lantai_rak" placeholder="Lantai Rak" required>
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


<!-- hapus rak -->
<?php foreach ($rak as $key => $value) {?>
<div class="modal fade" id="modal-hapus<?= $value['id_rak']?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Rak Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Rak/HapusRak/' . $value['id_rak']));?>
                <div class="form-group">
                    Anda yakin ingin menghapus Rak <b><?= $value['rak_buku']?></b> lantai <?= $value['posisi_lantai'];?> ?
                    </div>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus Rak</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php };?>