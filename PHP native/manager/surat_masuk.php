<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Surat Masuk
      <small>Data Surat Masuk UPT Solo Technopark</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Daftar Surat Masuk</h3>
            <div class="btn-group pull-right">            
              &nbsp
              <a href="Suratmasuk_csv.php"><button type="button" class="btn btn-success btn-sm">
                <i class="fa fa-file-excel-o"></i> &nbsp CSV
              </button></a>

            </div><hr>
            <?php 
                if(isset($_GET['alert'])){
                  if($_GET['alert']=='gagal'){
                    ?>
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                      Ekstensi Tidak Diperbolehkan
                    </div>                
                    <?php
                  }elseif($_GET['alert']=="berhasil"){
                    ?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Success</h4>
                      Berhasil Disimpan
                    </div>                
                    <?php
                  }elseif($_GET['alert']=="berhasilupdate"){
                    ?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Success</h4>
                      Berhasil Update
                    </div>                
                    <?php
                  }
                }
                ?>
          </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>OPSI</th>
                    <th>NO SURAT MASUK</th>
                    <th>NOMOR SURAT</th>
                    <th>TANGGAL</th>
                    <th>PERIHAL</th>
                    <th>TERIMA DARI</th>
                    <th>ISI</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT surat_masuk.* FROM surat_masuk  ORDER BY surat_masuk.Id_Suratmasuk DESC");
                  while($d = mysqli_fetch_array($data)){
                      ?>
  
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    
                      <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_Suratmasuk_<?php echo $d['Id_Suratmasuk'] ?>">
                            <i class="fa fa-list"></i>
                        </button>
                        <!-- Modal detail -->
                        <div class="modal fade" id="detail_Suratmasuk_<?php echo $d['Id_Suratmasuk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <table class="table table-condensed">
                                <tr>
                                  <th>TANGGAL DITERUSKAN</th>
                                  <td><?php echo $d['Tanggal_diteruskan']; ?></td>
                                </tr>
                                <tr>
                                  <th>CATATAN</th>
                                  <td><?php echo $d['Catatan']; ?></td>
                                </tr>
                                <tr>
                                  <th>KATEGORI</th>
                                  <td><?php echo $d['Kategori']; ?></td>
                                </tr>
                                <tr>
                                  <th>TANGGAL PELAKSANAAN</th>
                                  <td><?php echo $d['Tanggal_pelaksanaan']; ?></td>
                                </tr>
                                <tr>
                                  <th>WAKTU PELAKSANAAN</th>
                                  <td><?php echo $d['Waktu_pelaksanaan']; ?></td>
                                </tr>
                                <tr>
                                  <th>TEMPAT PELAKSANAAN</th>
                                  <td><?php echo $d['Tempat_pelaksanaan']; ?></td>
                                </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td><?php echo $d['No_Suratmasuk']; ?></td>
                      <td><?php echo $d['Nomor_surat']; ?></td>
                      <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                      <td><?php echo $d['Perihal']; ?></td>
                      <td><?php echo $d['Terima_dari']; ?></td>
                      <td><?php echo $d['Isi']; ?></td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?> 
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>