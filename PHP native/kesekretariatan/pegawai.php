<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Pegawai
      <small>Data Pegawai</small>
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
            <h3 class="box-title">Data Pegawai</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Pegawai
              </button>
              &nbsp

              <a href="pegawai_csv.php"><button type="button" class="btn btn-success btn-sm">
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
          <div class="box-body">

            <!-- Modal -->
            <form action="pegawai_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah pegawai</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>NAMA PEGAWAI</label>
                        <input type="text" name="nama" required="required" class="form-control" placeholder="Masukkan Nama pegawai ..">
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


            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA PEGAWAI</th>
                    <th>OPSI</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM master_pegawai order by Id_pegawai desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['Nama_pegawai']; ?></td>
                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_pegawai_<?php echo $d['Id_pegawai'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pegawai_<?php echo $d['Id_pegawai'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <form action="pegawai_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_pegawai_<?php echo $d['Id_pegawai'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit pegawai</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>NAMA</label>
                                    <input type="hidden" name="id" value="<?php echo $d['Id_pegawai'] ?>">
                                    <input type="text" style="width:100%" name="nama" required="required" class="form-control" placeholder="Masukkan Nama .." value="<?php echo $d['Nama_pegawai'] ?>">
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

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_pegawai_<?php echo $d['Id_pegawai'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="pegawai_hapus.php?id=<?php echo $d['Id_pegawai'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>