<?= $this->extend('layouts/admin') ?>
<?=$this->section('title')?>
Pengaduan
<?=$this->endSection()?>
<?= $this->section('content') ?>
 <div class="row">
 <div class="col-lg-12">
    <div class="card-header bg-primary">
    <a href="#" data-pengaduan="" class="btn btn-outline-light" data-target="#modalPengaduan" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Pengaduan Baru</a>
    </div>
      <?php
        if(session()->get('level')=='masyarakat'){
          ?> 
          <a href="#" data-toggle="modal" data-target="#modalPengaduan" class="btn btn-primary">Tambah Pengaduan</a>
       <?php }  ?>
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <tr>
          <th>No</th>
          <th>Tanggal Pengaduan</th>
          <th>Isi Laporan</th>
          <th>Foto</th>
        </tr>
        <?php
        $no = 0;
        foreach ($pengaduan as $row) {
          $data=$row['tgl_pengaduan'].",".$row['foto'].",".$row['status'].",".base_url('pengaduan/edit/'.$row['id_pengaduan']);
          $no++;
          ?>
          <tr>
            <td><?= $no?></td>
            <td><?= $row['tgl_pengaduan']?></td>
            <td><?= $row['isi_laporan']?></td>
            <td><?= $row['foto']?></td>
            <td>
              <?php
              if(session('level')=='masyarakat') {
                if($row['status']=='0'){
                  ?>

                  <a onclick="return confrim('Yakin Mau Hapus Data');" class="btn btn-danger" href="/pengaduan/hapus/<?=$row['id_pengaduan']?>"><i class="fa fa-trash"></i></a>
                  <?php
                }else{
                  
                }
              }
                if(!empty(session('level')) && session('level')  !='masyarakat'){
                  if($row['status']== '0'){
                    ?>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalTanggapan" data-Pengaduan="<?=$row['id_Pengaduan']?>">Tanggapi</a>
                    <?php
                  }else{
                    ?>
                    <a class="btn btn-danger" href="#" data-target="#modalTanggapan" data-Pengaduan="<?=$row['id_pengaduan']?>" data-aduan="selesai">Lihat Tanggapan</a>
                    <?php
                  }
                }
                ?>
            </td>
          </tr>
          <?php
        }
        ?>
      </table>
    </div>
  </div>
</div>

          <div class="modal fade" id="modalPengaduan" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5>Tambah Pengaduan</h5>
                </div>
                <form action="/tambahPengaduan" method="post" id="sahara" enctype="multipart/form-data">
                  <div class="modal-body">
                  <div class="form-group">
                        <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                        <input type="text" name="tanggal_pengaduan" class="form-control" id="tanggal_pengaduan">  
                </div>
                    <div class="form-group">
                      <label>Isi Laporan</label>
                      <textarea class="form-control" name="isi_laporan" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="">Foto</label>
                      <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i></i>Simpan</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="Modal">Close</button>
                </div>

          <div class="modal fade" id="modalTanggapan" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <form action="/tanggapi" method="post">
                    <input type="text" name="id_pengaduan" id="id_pengaduan">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="">Tanggapan</label>
                        <textarea name="tanggapan" id="tanggapans" cols="30" rows="10"></textarea>
                      </div>
                    </div>
                   
<?=$this->endsection()?>
<?=$this->section('script')?>
        <script>
          $(document).ready(function(){
            $('#modalTanggapan').on('show.bs.modal',function(e){
              var button = $(e.relatedTarget);
              var data = button.data('pengaduan');
              var aduan = button.data('aduan');
              $('#id_pengaduan').val(data);
              if(aduan=="selesai"){
                var query="id_pengaduan="+data;
                // alert(query);

                $('#btstanggapan').hide();
                $.ajax({
                  url:"/getTanggapan",
                  type:"GET",
                  data:query,
                  dataType:"json",
                  succes:function(data){
                    // alert(data);
                    $('#tanggapans').val(data[0].tanggapan);
                  },
                });

                $('#tanggapans').val();
              }else{
                $('#abstanggapan').show();
                $('#tanggapans').val("");
              }
            })
          })
          </script>
<?=$this->endSection()?>


