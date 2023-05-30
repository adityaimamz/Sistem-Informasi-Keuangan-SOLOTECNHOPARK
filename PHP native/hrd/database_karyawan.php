<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Karyawan
      <small>Data Karyawan UPT Solo Technopark</small>
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
            <h3 class="box-title">Daftar Karyawan</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" href="#tambah_karyawan.php
              ">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Karyawan
              </button>
              &nbsp

              <a href="data_karyawan_csv.php"><button type="button" class="btn btn-success btn-sm">
                <i class="fa fa-file-excel-o"></i> &nbsp CSV
              </button></a>

            </div><hr>
          </div>

          <div class="box-body">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>OPSI</th>
                    <th>NO INDUK KARYAWAN</th>
                    <th>NAMA</th>
                    <th>TANGGAL LAHIR</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT Karyawan_masuk.* FROM Karyawan_masuk  ORDER BY Karyawan_masuk.Id_Karyawanmasuk DESC LIMIT 100");
                  while($d = mysqli_fetch_array($data)){
                      ?>
  
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    
                      <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_Karyawanmasuk_<?php echo $d['Id_Karyawanmasuk'] ?>">
                            <i class="fa fa-list"></i>
                        </button>

                        <?php if($d['Bukti']==''){ ?> 
                        <?php } else { ?> 
                            <button title="View" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_penerimaan_<?php echo $d['Id_penerimaan'] ?>">
                              <i class="fa fa-eye"></i>
                            </button>
                        <?php } ?>

                        <button title="Delete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_Karyawanmasuk_<?php echo $d['Id_Karyawanmasuk'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_Karyawanmasuk_<?php echo $d['Id_Karyawanmasuk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="Karyawan_masuk_hapus.php?id=<?php echo $d['Id_Karyawanmasuk'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td><?php echo $d['No_induk_karyawan']; ?></td>
                      <td><?php echo $d['Nama']; ?></td>
                      <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?></td>
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