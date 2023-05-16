<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Peraturan
      <small>Data Peraturan</small>
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
            <h3 class="box-title">Peraturan</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Barang
              </button>
              &nbsp
            <a href="barang_csv.php"><button type="button" class="btn btn-success btn-sm">
              <i class="fa fa-file-excel-o"></i> &nbsp CSV
            </button></a>
            </div><hr>
            <?php 
                 $alert = '';
                 if(isset($_GET['alert'])){
                     $pesan = '';
                     if($_GET['alert']=='gagal'){
                         $pesan = 'Ekstensi Tidak Diperbolehkan';
                         $alert = '<div class="alert alert-warning alert-dismissible">
                                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                       <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                                       '.$pesan.'
                                   </div>';
                     }elseif($_GET['alert']=="berhasil"){
                         $pesan = 'Berhasil Disimpan';
                         $alert = '<div class="alert alert-success alert-dismissible">
                                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                       <h4><i class="icon fa fa-check"></i> Success</h4>
                                       '.$pesan.'
                                   </div>';
                     }elseif($_GET['alert']=="berhasilupdate"){
                         $pesan = 'Berhasil Update';
                         $alert = '<div class="alert alert-success alert-dismissible">
                                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                       <h4><i class="icon fa fa-check"></i> Success</h4>
                                       '.$pesan.'
                                   </div>';
                     }
                 }
                ?>
          </div>

          <div class="box-body">

            <!-- Modal Tambah-->
            <form action="barang_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Peraturan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                              <div class="form-group">
                                  <label>PERATURAN</label>
                                  <input type="text" name="peraturan" class="form-control" placeholder="Tambahkan peraturan baru ..">
                              </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>NO</th>
                    <th>OPSI</th>
                    <th>PERATURAN</th>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($koneksi, "SELECT * FROM master_jenis_peraturan ORDER BY Id_jenisperaturan DESC;");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    

                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          
                          <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-eye"></i>
                          </button> -->

                          <!-- Modal Update -->
                          <form action="barang_update.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="edit_barang_<?php echo $d['Id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Edit barang</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                     <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>PERATURAN</label>
                                          <input type="text" style="width:100%" name="peraturan" class="form-control" value="<?php echo $d['Jenis_peraturan'] ?>">
                                    
                                  </div>
                                  <div class="modal-footer">  
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>

                          <!-- Modal Lihat -->
                          <div class="modal fade" id="lihat_barang_<?php echo $d['Id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Bukti Upload</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['Gambar']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Modal Hapus -->
                          <div class="modal fade" id="hapus_barang_<?php echo $d['Id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <a href="barang_hapus.php?id=<?php echo $d['Id_barang'] ?>" class="btn btn-primary">Hapus</a>
                                </div>
                              </div>
                            </div>
                          </div>

                      </td>
                      <td><?php echo $d['Jenis_peraturan']; ?></td>
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