<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Inkubator dan Bisnis
      <small>Data Peserta</small>
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
            <h3 class="box-title">Data Peserta Solocorn dan Smeska</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah
              </button>
              &nbsp
            <a href="inkubator_csv.php"><button type="button" class="btn btn-success btn-sm">
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

          <!-- Modal Tambah-->
            <form action="inkubator_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah inkubator</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label>NAMA PERUSAHAAN</label>
                        <input type="text" name="nama_startup" class="form-control" placeholder="Masukkan Nama..">
                      </div>
                      <div class="form-group">
                        <label>NAMA PENGUSUL</label>
                        <input type="text" name="nama_pengusul" class="form-control" placeholder="Masukkan Tempat Lahir..">
                      </div>
                      <div class="form-group">
                        <label>ALAMAT</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Tanggal Lahir..">
                      </div>
                      <div class="form-group">
                        <label>TAHUN ANGKATAN</label>
                        <input type="number" name="tahun_angkatan" class="form-control" placeholder="Masukkan Jurusan..">
                      </div>
                      <div class="form-group">
                        <label>STATUS</label>
                        <select name="status" class="form-control">
                          <option value="">- Pilih -</option>
                          <?php 
                          include 'koneksi.php';
                          $status = mysqli_query($koneksi,"SELECT * FROM status_inkubator ORDER BY Id_statusinkubator ASC");
                          while($k = mysqli_fetch_array($status)){
                            ?>
                            <option value="<?php echo $k['Id_statusinkubator']; ?>"><?php echo $k['Status']; ?></option>
                            <?php 
                          }
                          ?>
                        </select>
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
                  <th>NAMA PERUSAHAAN</th>
                  <th>NAMA PENGUSUL</th>
                  <th>ALAMAT</th>
                  <th>TAHUN ANGKATAN</th>
                  <th>STATUS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi, "SELECT inkubator.*, status_inkubator.Status FROM inkubator LEFT JOIN status_inkubator ON inkubator.Id_statusinkubator=status_inkubator.Id_statusinkubator ORDER BY Id_inkubator DESC;");
                  while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>
                          <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_inkubator_<?php echo $d['Id_inkubator'] ?>">
                            <i class="fa fa-list"></i>
                          </button>
                          <button title="Edit" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_inkubator_<?php echo $d['Id_inkubator'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>
                          <button title="Hapus" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_inkubator_<?php echo $d['Id_inkubator'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>

                        <!-- Modal detail -->
                        <div class="modal fade" id="detail_inkubator_<?php echo $d['Id_inkubator'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <th>NAMA PERUSAHAAN</th>
                                <td><?php echo $d['Nama_startup']; ?></td>
                              </tr>
                              <tr>
                                <th>NAMA PENGUSUL</th>
                                <td><?php echo $d['Nama_pengusul']; ?></td>
                              </tr>
                              <tr>
                                <th>ALAMAT</th>
                                <td><?php echo $d['Alamat']; ?></td>
                              </tr>
                              <tr>
                                <th>TAHUN ANGKATAN</th>
                                <td><?php echo $d['Tahun_angkatan']; ?></td>
                              </tr>
                              <tr>
                                <th>STATUS</th>
                                <td><?php echo $d['Status']; ?></td>
                              </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                     <!-- Modal Update -->
                  <form action="inkubator_update.php" method="post" enctype="multipart/form-data">
                      <div class="modal fade" id="edit_inkubator_<?php echo $d['Id_inkubator'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel">Edit inkubator</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">  
                              <div class="form-group">
                                <label for="nama_startup">NAMA PERUSAHAAN</label>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $d['Id_inkubator']; ?>">
                                <input type="text" name="nama_startup" class="form-control" value="<?php echo $d['Nama_startup']; ?>">
                              </div>
                    
                              <div class="form-group">
                                <label for="nama_pengusul">NAMA PENGUSUL</label>
                                <input type="text" name="nama_pengusul" class="form-control" value="<?php echo $d['Nama_pengusul']; ?>">
                              </div>
                    
                              <div class="form-group">
                                <label for="alamat">ALAMAT</label>
                                <input type="text" name="alamat" class="form-control" value="<?php echo $d['Alamat']; ?>">
                              </div>
                    
                              <div class="form-group">
                                <label for="tahun_angkatan">TAHUN ANGKATAN</label>
                                <input type="text" name="tahun_angkatan" class="form-control" value="<?php echo $d['Tahun_angkatan']; ?>">
                              </div>
                    
                              <div class="form-group">
                                <label for="status">STATUS</label>
                                <select name="status" class="form-control">
                                  <option value="">- Pilih -</option>
                                  <?php 
                                  $status = mysqli_query($koneksi, "SELECT * FROM status_inkubator ORDER BY Id_statusinkubator ASC");
                                  while ($k = mysqli_fetch_array($status)) {
                                    $selected = ($d['Id_statusinkubator'] == $k['Id_statusinkubator']) ? 'selected="selected"' : '';
                                    echo '<option ' . $selected . ' value="' . $k['Id_statusinkubator'] . '">' . $k['Status'] . '</option>';
                                  }
                                  ?>
                                </select>
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


                      <!-- Modal Hapus -->
                      <div class="modal fade" id="hapus_inkubator_<?php echo $d['Id_inkubator'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="inkubator_hapus.php?id=<?php echo $d['Id_inkubator'] ?>" class="btn btn-primary">Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                      </td>
                      <td><?php echo $d['Nama_startup']; ?></td>
                      <td><?php echo $d['Nama_pengusul']; ?></td>
                      <td><?php echo $d['Alamat']; ?></td>
                      <td><?php echo $d['Tahun_angkatan']; ?></td>
                      <td><?php echo $d['Status']; ?></td>
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
                </div>
        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?> 