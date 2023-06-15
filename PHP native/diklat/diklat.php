<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Diklat
      <small>Data Siswa Peserta Pelatihan</small>
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
            <h3 class="box-title">Data Siswa Peserta Pelatihan</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data Siswa
              </button>
              &nbsp
            <a href="diklat_csv.php"><button type="button" class="btn btn-success btn-sm">
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
            <form action="diklat_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah diklat</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir..">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" class="form-control datepicker2" placeholder="Masukkan Tanggal Lahir..">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat..">
                      </div>
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan..">
                      </div>
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan..">
                      </div>
                      <div class="form-group">
                        <label>Jadwal Pelatihan</label>
                        <input type="text" name="jadwal_pelatihan" class="form-control datepicker2" placeholder="Masukkan Jadwal Pelatihan..">
                      </div>
                      <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" placeholder="Masukkan Angkatan..">
                      </div>
                      <div class="form-group">
                        <label>Penyaluran</label>
                        <input type="text" name="penyaluran" class="form-control" placeholder="Masukkan Penyaluran..">
                      </div>
                      <div class="form-group">
                        <label>STATUS</label>
                        <select name="status" class="form-control">
                          <option value="">- Pilih -</option>
                          <?php 
                          include 'koneksi.php';
                          $status = mysqli_query($koneksi,"SELECT * FROM master_status ORDER BY Id_status ASC");
                          while($k = mysqli_fetch_array($status)){
                            ?>
                            <option value="<?php echo $k['Id_status']; ?>"><?php echo $k['Status']; ?></option>
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
                  <th>NAMA</th>
                  <th>TEMPAT LAHIR</th>
                  <th>TANGGAL LAHIR</th>
                  <th>JURUSAN</th>
                  <th>ANGKATAN</th>
                  <th>PENYALURAN</th>
                  <th>STATUS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi, "SELECT diklat.*, master_status.Status FROM diklat LEFT JOIN master_status ON diklat.Id_status=master_status.Id_status ORDER BY Id_diklat DESC;");
                  while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>
                          <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_diklat_<?php echo $d['Id_diklat'] ?>">
                            <i class="fa fa-list"></i>
                          </button>
                          <button title="Edit" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_diklat_<?php echo $d['Id_diklat'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>
                          <button title="Hapus" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_diklat_<?php echo $d['Id_diklat'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>

                        <!-- Modal detail -->
                        <div class="modal fade" id="detail_diklat_<?php echo $d['Id_diklat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <th>NAMA</th>
                                  <td><?php echo $d['Nama']; ?></td>
                                </tr>
                                <tr>
                                  <th>TEMPAT LAHIR</th>
                                  <td><?php echo $d['Tempat_lahir']; ?></td>
                                </tr>
                                <tr>
                                  <th>TANGGAL LAHIR</th>
                                  <td><?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?></td>
                                </tr>
                                <tr>
                                  <th>ALAMAT</th>
                                  <td><?php echo $d['Alamat']; ?></td>
                                </tr>
                                <tr>
                                  <th>JURUSAN</th>
                                  <td><?php echo $d['Jurusan']; ?></td>
                                </tr>
                                <tr>
                                  <th>KETERANGAN</th>
                                  <td><?php echo $d['Keterangan']; ?></td>
                                </tr>
                                <tr>
                                  <th>JADWAL PELATIHAN</th>
                                  <td><?php echo $d['Jadwal_pelatihan']; ?></td>
                                </tr>
                                <tr>
                                  <th>ANGKATAN</th>
                                  <td><?php echo $d['Angkatan']; ?></td>
                                </tr>
                                <tr>
                                  <th>PENYALURAN</th>
                                  <td><?php echo $d['Penyaluran']; ?></td>
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
                     <form action="diklat_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_diklat_<?php echo $d['Id_diklat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit diklat</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">  
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>NAMA</label>
                                  <input type="hidden" name="id"  class="form-control" value="<?php echo $d['Id_diklat']; ?>">
                                  <input type="text" style="width:100%" name="nama"  class="form-control" value="<?php echo $d['Nama']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>TEMPAT LAHIR</label>
                                  <input type="text" style="width:100%" name="tempat_lahir"  class="form-control" value="<?php echo $d['Tempat_lahir']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>TANGGAL LAHIR</label>
                                  <input type="text" style="width:100%" name="tanggal_lahir"  class="form-control datepicker2" placeholder="Ubah Tanggal Lahir" value="<?php echo $d['Tanggal_lahir']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>ALAMAT</label>
                                  <input type="text" style="width:100%" name="alamat"  class="form-control" value="<?php echo $d['Alamat']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>JURUSAN</label>
                                  <input type="text" style="width:100%" name="jurusan"  class="form-control" value="<?php echo $d['Jurusan']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>KETERANGAN</label>
                                  <input type="text" style="width:100%" name="keterangan"  class="form-control" value="<?php echo $d['Keterangan']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>JADWAL PELATIHAN</label>
                                  <input type="text" style="width:100%" name="jadwal_pelatihan"  class="form-control datepicker2" value="<?php echo $d['Jadwal_pelatihan']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>ANGKATAN</label>
                                  <input type="text" style="width:100%" name="angkatan"  class="form-control" value="<?php echo $d['Angkatan']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>PENYALURAN</label>
                                  <input type="text" style="width:100%" name="penyaluran"  class="form-control" value="<?php echo $d['Penyaluran']; ?>">
                                </div>
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>STATUS</label>
                                    <select name="status" style="width:100%" class="form-control" >
                                      <option value="">- Pilih -</option>
                                      <?php 
                                      $status = mysqli_query($koneksi,"SELECT * FROM master_status ORDER BY Id_status ASC");
                                      while($k = mysqli_fetch_array($status)){
                                        ?>
                                        <option <?php if($d['Id_status'] == $k['Id_status']){echo "selected='selected'";} ?> value="<?php echo $k['Id_status']; ?>"><?php echo $k['Status']; ?></option>
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

                      <!-- Modal Hapus -->
                      <div class="modal fade" id="hapus_diklat_<?php echo $d['Id_diklat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="diklat_hapus.php?id=<?php echo $d['Id_diklat'] ?>" class="btn btn-primary">Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                      </td>
                      <td><?php echo $d['Nama']; ?></td>
                      <td><?php echo $d['Tempat_lahir']; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($d['Tanggal_lahir'])); ?></td>
                      <td><?php echo $d['Jurusan']; ?></td>
                      <td><?php echo $d['Angkatan']; ?></td>
                      <td><?php echo $d['Penyaluran']; ?></td>
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