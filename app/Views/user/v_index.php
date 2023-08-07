<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('User/TambahUser')?>" type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i>Tambah User
                </a>
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
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Nomor Telpon</th>
                        <th>Password</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Level</th>
                        <th width="200px" class="text-center">Edit</th>
                    </tr>
                </th>
                <tbody>
                    <?php $no = 1;
                    foreach($user as $key => $value){?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td><?= $value['email_user'] ?></td>
                            <td><?= $value['no_hp'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td class="text-center"><img src="<?= base_url('foto/' . $value['foto'])?>" width="125px" height="125px" alt=""></td>
                            <td class="text-center"><?= $value['level'] == '0'?'<span class="badge badge-success">Admin</span>' : '<span class="badge badge-primary">Petugas</span>'?></td>
                            <td>
                                <a class="btn btn-warning" href="<?= base_url('User/EditData/' . $value['id_user'])?>" data-toggle="modal" data-target="#modal-edit<?= $value['id_user']?>"><i class="fas fa-edit"></i> Edit</a>
                                <a class="btn btn-danger" href="<?= base_url('User/HapusData/' .$value['id_user'])?>" data-toggle="modal" data-target="#modal-hapus<?= $value['id_user']?>"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        



        </div>
    </div>
</div>


<!-- Hapus User -->
<?php foreach ($user as $key => $value) {?>
<div class="modal fade" id="modal-hapus<?= $value['id_user']?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('User/HapusData/' . $value['id_user']));?>
                <div class="form-group">
                    Anda yakin ingin menghapus Data User <b><?= $value['nama_user']?></b> level <?= $value['level'] == '0'?'<span class="badge badge-success">Admin</span>' : '<span class="badge badge-primary">Petugas</span>'?> ?
                    </div>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus User</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php };?>