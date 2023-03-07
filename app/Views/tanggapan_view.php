<?= $this->extend('layouts/admin') ?>
<?=$this->section('title')?>
Tanggapan
<?=$this->endSection()?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-header bg-primary">
             <a href="#" data-tanggapan="" class="btn btn-outline-light" data-target="#modalTanggapan" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tanggapan Baru</a>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="tanggapan">
            <thead>
            <tr>
                <th>NO.</th>
                <th>id_pengaduan</th>
                <th>tgl_tanggapan</th>
                <th>tanggapan</th>
                
             </tr>
            </thead>
            <tbody>
            <?php
            $no = 0;
            foreach ($tanggapan as $row) {
                $no++;
                $data = $row['id_pengaduan'].",".$row['tgl_tanggapan'] .",".$row['tanggapan'].",".$row['id_petugas'].",".base_url('tanggapan/edit/'.$row['id_tanggapan']);
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['id_pengaduan'] ?></td>
                    <td><?= $row['tgl_tanggapan'] ?></td>
                    <td><?= $row['tanggapan'] ?></td>
                    <td><?= $row['id_petugas'] ?></td>
                    <td>
                        <a href="" data-tanggapan="<?=$data?>" data-target="#modalTanggapan" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                        <a href="<?=base_url('tanggapan/delete/'.$row["id_tanggapan"])?>" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalTanggapan" tabindex="-1" aria-labelledby="modalTanggapanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModelLabel">Data Tanggapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmtanggapan" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_pengaduan">id_pengaduan</label>
                        <input type="text" name="id_pengaduan" class="form-control" id="id_pengaduan">
                </div>
                <div class="form-group">
                        <label for="tgl_tanggapan">tgl_tanggapan</label>
                        <input type="text" name="tgl_tanggapan" class="form-control" id="tgl_tanggapan">
                </div>
                <div class="form-group">
                        <label for="tanggapan">tanggapan</label>
                        <input type="text" name="tanggapan" class="form-control" id="tanggapan">  
                </div>
               
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i ></i>Simpan</button>
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
            $("#modalTanggapan").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                    var data = button.data('tanggapan');
                    alert(data);
                    if(data != ""){
                        const barisdata = data.split(",");
                        $('#id_pengaduan').val(barisdata[0]);
                        $('#tgl_tanggapan').val(barisdata[1]);
                        $('#tanggapan').val(barisdata[2]);
                        $('#id_petugas').val(barisdata[3]).change();
                        $('#frmtanggapan').attr('action', barisdata[4]);
                    }else{
                        $('#id_pengaduan').val('');
                        $('#tgl_tanggapan').val('');
                        $('#tanggapan').val('');
                        $('#id_petugas').val('').change();
                        $('#frmtanggapan').attr('action','/stanggapan');

                    }

            });
            $('#tanggapan').dataTable();
        })
    </script>
    <?=$this->endSection()?>