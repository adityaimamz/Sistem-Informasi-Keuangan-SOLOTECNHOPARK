<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      User
      <small>Data User</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data User</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah User
              </button>

              &nbsp

              <a href="user_csv.php"><button type="button" class="btn btn-success btn-sm">
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
            <form action="user_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah User</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>NAMA USER</label>
                        <input type="text" name="nama" required="required" class="form-control" placeholder="Masukkan Nama ..">
                      </div>

                      <div class="form-group">
                        <label>ALAMAT</label>
                        <input type="text" name="alamat" required="required" class="form-control" placeholder="Masukkan Alamat ..">
                      </div>

                      <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" name="username" required="required" class="form-control" placeholder="Masukkan Username ..">
                      </div>

                      <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="text" name="password" required="required" class="form-control" placeholder="Masukkan Password ..">
                      </div>

                      <div class="form-group">
                        <label>LEVEL</label>
                        <input type="text" name="level" required="required" class="form-control" placeholder="Masukkan Level ..">
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
                    <th>NAMA USER</th>
                    <th>ALAMAT</th>
                    <th>USERNAME</th>
                    <th>LEVEL</th>
                    <th>OPSI</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM master_user order by Id_user desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['Nama']; ?></td>
                      <td><?php echo $d['Alamat']; ?></td>
                      <td><?php echo $d['Username']; ?></td>
                      <td><?php echo $d['Level']; ?></td>
                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_user_<?php echo $d['Id_user'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <?php if($d['Id_user'] != 1){ ?>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_user_<?php echo $d['Id_user'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>
                        <?php } ?>

                        <form action="user_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_user_<?php echo $d['Id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>NAMA</label>
                                    <input type="hidden" name="id" value="<?php echo $d['Id_user'] ?>">
                                    <input type="text" style="width:100%" name="nama" required="required" class="form-control" placeholder="Masukkan Nama .." value="<?php echo $d['Nama'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>ALAMAT</label>
                                    <input type="text" style="width:100%" name="alamat" required="required" class="form-control" placeholder="Masukkan Nama .." value="<?php echo $d['Alamat'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>USERNAME</label>
                                    <input type="text" style="width:100%" name="username" required="required" class="form-control" placeholder="Masukkan Nama .." value="<?php echo $d['Username'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>PASSWORD</label>
                                    <input type="text" style="width:100%" name="password" required="required" class="form-control" placeholder="Masukkan Nama .." value="<?php echo $d['Password'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>LEVEL</label>
                                    <input type="text" style="width:100%" name="level" required="required" class="form-control" placeholder="Masukkan Nama .." value="<?php echo $d['Level'] ?>">
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
                        <div class="modal fade" id="hapus_user_<?php echo $d['Id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="user_hapus.php?id=<?php echo $d['Id_user'] ?>" class="btn btn-primary">Hapus</a>
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