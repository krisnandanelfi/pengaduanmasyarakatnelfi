<?= $this->extend('layouts/admin') ?>
<?=$this->section('title')?>
Petugas
<?=$this->endSection()?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-header bg-primary">
             <a href="#" data-petugas="" class="btn btn-outline-light" data-target="#modalPetugas" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Petugas Baru</a>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="petugas">
            <thead>
            <tr>
                <th>NO.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Passsword</th>
                <th>Telp</th>
                <th>Level</th>
                
            </tr>
            </thead>
            <tbody>
            <?php
            
            $no = 0;
            foreach ($petugas as $row) {
                $no++;
                $data = $row['nama_petugas'].",".$row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . $row['level'].",".base_url('petugas/edit/'.$row['id_petugas']);
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['nama_petugas'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['password'] ?></td>
                    <td><?= $row['telp'] ?></td>
                    <td><?= $row['level'] ?></td>
                    <td>
                        <a href="" data-petugas="<?=$data?>" data-target="#modalPetugas" data-toggle="modal" class="btn btn-warning"><i ></i>Edit</a>
                        <a href="<?=base_url('petugas/delete/'.$row["id_petugas"])?>" class="btn btn-danger"><i ></i>Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalPetugas" tabindex="-1" aria-labelledby="modalPetugasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModelLabel">Data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmpetugas" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">  
                </div>
                <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="text" name="telp" class="form-control" id="telp">
                 </div>
                 <div class="form-group">
                        <label for="level">level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">pilih level</option>
                            <option value="admin">admin</option>
                            <option value="petugas">petugas</option>
                            
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="ubahpassword">Ubah Password</label>
                        <input type="checkbox" name="ubahpassword" class="form-control" aria-label="yakin mau diubah" id="ubahpassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i></i>Simpan</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="Modal">Close</button>
                </div>
            </form> 
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->Section("script")?>
    <script>
        $(document).ready(function(){
            $("#modalPetugas").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                    var data = button.data('petugas');
                    alert(data);
                    if(data != ""){
                        const barisdata = data.split(",");
                        $('#nama_petugas').val(barisdata[0]);
                        $('#username').val(barisdata[1]);
                        $('#telp').val(barisdata[2]);
                        $('#level').val(barisdata[3]).change();
                        $('#frmpetugas').attr('action', barisdata[4]);
                    }else{
                        $('#nama_petugas').val('');
                        $('#username').val('');
                        $('#telp').val('');
                        $('#level').val('').change();
                        $('#frmpetugas').attr('action','/spetugas');

                    }

            });
            $('#petugas').dataTable();
        })
    </script>
    <?=$this->endSection()?>