<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('#/#')?>" type="button" class="btn btn-white">
                   
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
                
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>NIM</th>
                        <th width="750px">Nama Anggota</th>
                        <th>Email</th>
                        <th>Nomor Telpon</th>
                        <th>Gender</th>
                        <th>Foto</th>
                        <th width="250px">Jurusan</th>
                        <th width="400px">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($agt as $key => $value){?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nim'] ?></td>
                            <td><?= $value['nama_mhs'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['no_hp'] ?></td>
                            <td><?= $value['gender'] ?></td>
                            <td class="text-center"><img src="<?= base_url('foto/' . $value['foto_mhs'])?>" width="125px" height="125px" alt=""></td>
                            <td class="text-center"><?= $value['nama_prodi']?></td>
                            <td>
                                <a class="btn btn-danger" href="<?= base_url('User/HapusData/' .$value['id_anggota'])?>" data-toggle="modal" data-target="#modal-hapus<?= $value['id_anggota']?>"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        



        </div>
    </div>
</div>


<!-- Hapus User -->
<?php foreach ($agt as $key => $value) {?>
<div class="modal fade" id="modal-hapus<?= $value['id_anggota']?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('User/HapusData/' . $value['id_anggota']));?>
                <div class="form-group">
                    Anda yakin ingin menghapus Data Anggota <b><?= $value['nama_mhs']?> ?
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