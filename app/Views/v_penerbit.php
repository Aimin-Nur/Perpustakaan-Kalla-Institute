<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                    <i class="fas fa-plus"></i> Tambah penerbit
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
                        <th>Nama Penerbit</th>
                        <th width="200px" class="text-center">Edit</th>
                    </tr>
                </th>
                <tbody>
                    <?php $no = 1;
                    foreach($penerbit as $key => $value){?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_penerbit'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#modal-edit<?= $value['id_penerbit']?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="" data-toggle="modal" data-target="#modal-hapus<?= $value['id_penerbit']?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        



        </div>
    </div>
</div>

<!-- tambah ktgori -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah penerbit Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Penerbit/Tambah'));?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama penerbit</label>
                    <input type="text" class="form-control" name="nama_penerbit" placeholder="penerbit Buku" required>
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

<!-- hapus penerbit -->
<?php foreach ($penerbit as $key => $value) {?>
<div class="modal fade" id="modal-hapus<?= $value['id_penerbit']?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Penerbit Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Penerbit/HapusPenerbit/' . $value['id_penerbit']));?>
                <div class="form-group">
                    Anda yakin ingin menghapus Penerbit <b><?= $value['nama_penerbit']?></b> ?
                    </div>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus penerbit</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php };?>

<!-- edit penerbit -->
<?php foreach ($penerbit as $key => $value) {?>
<div class="modal fade" id="modal-edit<?=$value['id_penerbit'];?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data penerbit Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Penerbit/EditPenerbit/' . $value['id_penerbit'] ));?>
                <div class="form-group">
                    <label for="exampleInputEmail1">penerbit Buku</label>
                    <input type="text" class="form-control" value="<?= $value['nama_penerbit'];?>" name="nama_penerbit" placeholder="penerbit Buku" required>
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