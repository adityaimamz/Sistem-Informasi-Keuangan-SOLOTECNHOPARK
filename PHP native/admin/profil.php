<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Profil</a></li>
              <li><a href="#timeline" data-toggle="tab">Riwayat Jabatan</a></li>
              <li><a href="#settings" data-toggle="tab">Pendidikan</a></li>
              <li><a href="#settings" data-toggle="tab">Pelatihan</a></li>
              <li><a href="#settings" data-toggle="tab">Hukuman Disiplin</a></li>
              <li><a href="#settings" data-toggle="tab">Cuti</a></li>
              <li><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <section class="content">
                <div class="row">
                  <section class="col-lg-12">
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
                      <form action="karyawan_proses.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Tambah karyawan</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <div class="form-group">
                                    <label>KODE karyawan</label>
                                    <input type="text" name="kode_karyawan" required="required" class="form-control" placeholder="Masukkan Kode karyawan ..">
                                  </div>

                                  <div class="form-group">
                                    <label>SUMBER DANA</label>
                                    <select name="sumberdana" class="form-control" required="required">
                                      <option value="">- Pilih -</option>
                                      <?php 
                                      include 'koneksi.php';
                                      $sumberdana = mysqli_query($koneksi,"SELECT * FROM master_sumberdana ORDER BY Jenis ASC");
                                      while($k = mysqli_fetch_array($sumberdana)){
                                        ?>
                                        <option value="<?php echo $k['Id_sumberdana']; ?>"><?php echo $k['Jenis']; ?></option>
                                        <?php 
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label>DIVISI</label>
                                    <select name="divisi" class="form-control" required="required">
                                      <option value="">- Pilih -</option>
                                      <?php 
                                      include 'koneksi.php';
                                      $divisi = mysqli_query($koneksi,"SELECT * FROM master_divisi ORDER BY Nama_divisi ASC");
                                      while($k = mysqli_fetch_array($divisi)){
                                        ?>
                                        <option value="<?php echo $k['Id_divisi']; ?>"><?php echo $k['Nama_divisi']; ?></option>
                                        <?php 
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label>BULAN</label>
                                    <select name="bulan" class="form-control" required="required">
                                      <option value="">- Pilih -</option>
                                      <option value="Januari">Januari</option>
                                      <option value="Februari">Februari</option>
                                      <option value="Maret">Maret</option>
                                      <option value="April">April</option>
                                      <option value="Mei">Mei</option>
                                      <option value="Juni">Juni</option>
                                      <option value="Juli">Juli</option>
                                      <option value="Agustus">Agustus</option>
                                      <option value="September">September</option>
                                      <option value="Oktober">Oktober</option>
                                      <option value="November">November</option>
                                      <option value="Desember">Desember</option>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label>TANGGAL SPJ</label>
                                    <input type="text" name="tanggal" required="required" class="form-control datepicker2">
                                  </div>

                                  <div class="form-group">
                                    <label>JENIS BELANJA</label>
                                    <select name="jenis" class="form-control" required="required">
                                      <option value="">- Pilih -</option>
                                      <?php 
                                      include 'koneksi.php';
                                      $divisi = mysqli_query($koneksi,"SELECT * FROM master_belanja ORDER BY Jenis ASC");
                                      while($k = mysqli_fetch_array($divisi)){
                                        ?>
                                        <option value="<?php echo $k['Id_jenisbelanja']; ?>"><?php echo $k['Jenis']; ?></option>
                                        <?php 
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label>RINCIAN BELANJA</label>
                                    <input type="text" name="rincian" required="required" class="form-control" placeholder="Masukkan Rincian ..">
                                  </div>

                                  <div class="form-group">
                                    <label>JUMLAH (RUPIAH)</label>
                                    <input type="number" name="jumlah" required="required" class="form-control" placeholder="Masukkan Nominal ..">
                                  </div>

                                  <div class="form-group">
                                    <label>LINK DRIVE</label>
                                    <input type="text" name="drive" class="form-control" placeholder="Masukkan Link Drive File Anda ..">
                                  </div>

                                  <div class="form-group">
                                    <label>Upload Bukti</label>
                                    <input type="file" name="trnfoto" class="form-control">
                                    <small>File yang di perbolehkan *PDF | *JPG | *jpeg | *PNG </small>
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
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>TANGGAL LAHIR</th>
                                <th>JABATAN</th>
                                <th>UNIT KERJA</th>
                                <th>PENDIDIKAN</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php 
                                include '../koneksi.php';
                                $no=1;
                                $data = mysqli_query($koneksi,"SELECT karyawan.* FROM karyawan  ORDER BY karyawan.id_Karyawan DESC");
                                while($d = mysqli_fetch_array($data)){
                                  ?>
                                  <tr>
                                  <td class="text-center"><?php echo $no++; ?></td>
                                  <td>
                                      <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_karyawan_<?php echo $d['Id_karyawan'] ?>">
                                          <i class="fa fa-list"></i>
                                      </button>

                                      <button title="Edit" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_karyawan_<?php echo $d['Id_karyawan'] ?>">
                                        <i class="fa fa-cog"></i>
                                      </button>

                                      <button title="Hapus" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_karyawan_<?php echo $d['Id_karyawan'] ?>">
                                        <i class="fa fa-trash"></i>
                                      </button>

                                      <!-- Modal Update -->
                                      <form action="karyawan_update.php" method="post" enctype="multipart/form-data">
                                        <div class="modal fade" id="edit_karyawan_<?php echo $d['Id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit karyawan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>KODE karyawan</label>
                                                  <input type="text" style="width:100%" name="kode_karyawan"  class="form-control" value="<?php echo $d['Kode_karyawan'] ?>" >
                                                </div>
                                                
                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>SUMBER DANA</label>
                                                  <select name="sumberdana" style="width:100%" class="form-control" required="required">
                                                    <option value="">- Pilih -</option>
                                                    <?php 
                                                    $sumberdana = mysqli_query($koneksi,"SELECT * FROM master_sumberdana ORDER BY Id_sumberdana ASC");
                                                    while($k = mysqli_fetch_array($sumberdana)){
                                                      ?>
                                                      <option <?php if($d['Id_sumberdana'] == $k['Id_sumberdana']){echo "selected='selected'";} ?> value="<?php echo $k['Id_sumberdana']; ?>"><?php echo $k['Jenis']; ?></option>
                                                      <?php 
                                                    }
                                                    ?>
                                                  </select>
                                                </div>

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>DIVISI</label>
                                                  <select name="divisi" style="width:100%" class="form-control" required="required">
                                                    <option value="">- Pilih -</option>
                                                    <?php 
                                                    $divisi = mysqli_query($koneksi,"SELECT * FROM master_divisi ORDER BY Id_divisi ASC");
                                                    while($k = mysqli_fetch_array($divisi)){
                                                      ?>
                                                      <option <?php if($d['Id_divisi'] == $k['Id_divisi']){echo "selected='selected'";} ?> value="<?php echo $k['Id_divisi']; ?>"><?php echo $k['Nama_divisi']; ?></option>
                                                      <?php 
                                                    }
                                                    ?>
                                                  </select>
                                                </div>

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>BULAN</label>
                                                  <select name="bulan" style="width:100%" class="form-control" required="required">
                                                    <option value="">- Pilih -</option>
                                                    <option <?php if($d['Bulan'] == "Januari"){echo "selected='selected'";} ?> value="Januari">Januari</option>
                                                    <option <?php if($d['Bulan'] == "Februari"){echo "selected='selected'";} ?> value="Februari">Februari</option>
                                                    <option <?php if($d['Bulan'] == "Maret"){echo "selected='selected'";} ?> value="Maret">Maret</option>
                                                    <option <?php if($d['Bulan'] == "April"){echo "selected='selected'";} ?> value="April">April</option>
                                                    <option <?php if($d['Bulan'] == "Mei"){echo "selected='selected'";} ?> value="Mei">Mei</option>
                                                    <option <?php if($d['Bulan'] == "Juni"){echo "selected='selected'";} ?> value="Juni">Juni</option>
                                                    <option <?php if($d['Bulan'] == "Juli"){echo "selected='selected'";} ?> value="Juli">Juli</option>
                                                    <option <?php if($d['Bulan'] == "Agustus"){echo "selected='selected'";} ?> value="Agustus">Agustus</option>
                                                    <option <?php if($d['Bulan'] == "September"){echo "selected='selected'";} ?> value="September">September</option>
                                                    <option <?php if($d['Bulan'] == "Oktober"){echo "selected='selected'";} ?> value="Oktober">Oktober</option>
                                                    <option <?php if($d['Bulan'] == "November"){echo "selected='selected'";} ?> value="November">November</option>
                                                    <option <?php if($d['Bulan'] == "Desember"){echo "selected='selected'";} ?> value="Desember">Desember</option>
                                                  </select>
                                                </div>

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>TANGGAL</label>
                                                  <input type="text" style="width:100%" name="tanggal" required="required" class="form-control datepicker2" placeholder="Masukkan Nominal .." value="<?php echo $d['Tanggal'] ?>">
                                                </div>

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>JENIS BELANJA</label>
                                                  <select name="jenis" style="width:100%" class="form-control" required="required">
                                                    <option value="">- Pilih -</option>
                                                    <?php 
                                                    $divisi = mysqli_query($koneksi,"SELECT * FROM master_belanja ORDER BY Id_jenisbelanja ASC");
                                                    while($k = mysqli_fetch_array($divisi)){
                                                      ?>
                                                      <option <?php if($d['Id_jenis'] == $k['Id_jenisbelanja']){echo "selected='selected'";} ?> value="<?php echo $k['Id_jenisbelanja']; ?>"><?php echo $k['Jenis']; ?></option>
                                                      <?php 
                                                    }
                                                    ?>
                                                  </select>
                                                </div>

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>RINCIAN BELANJA</label>
                                                  <input type="text" style="width:100%" name="rincian" required="required" class="form-control" placeholder="Masukkan Rincian Penerimaan .." value="<?php echo $d['Rincian'] ?>">
                                                </div>

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <input type="hidden" name="id" value="<?php echo $d['Id_karyawan'] ?>">
                                                  <label>JUMLAH (RUPIAH)</label>
                                                  <input type="text" style="width:100%" name="jumlah" required="required" class="form-control" placeholder="Masukkan Nominal .." value="<?php echo $d['Jumlah']; ?>">
                                                </div>

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>LINK DRIVE</label>
                                                  <input type="text" style="width:100%" name="drive" class="form-control" placeholder="Masukkan Link Drive File Anda .." value="<?php echo $d['Drive'] ?>">
                                                </div>

                                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                                  <label>Upload File</label>
                                                  <input type="file" name="trnfoto" class="form-control"><br>
                                                  <!-- <small><?php echo $d['Bukti'] ?></small> -->
                                                  <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[Bukti_lpj]'>$d[Bukti_lpj]</a>";?> tidak dirubah kosongkan saja</p>
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

                                      <!-- Modal Lihat -->
                                      <div class="modal fade" id="lihat_karyawan_<?php echo $d['Id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="exampleModalLabel">Lihat Bukti Upload</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <embed src="../gambar/bukti/<?php echo $d['Bukti_lpj']; ?>" type="application/pdf" width="100%" height="400px" />
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- Modal detail -->
                                      <div class="modal fade" id="detail_karyawan_<?php echo $d['Id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <th>KODE karyawan</th>
                                                <td><?php echo $d['Kode_karyawan']; ?></td>
                                              </tr>
                                              <tr>
                                                <th>BULAN</th>
                                                <td><?php echo $d['Bulan']; ?></td>
                                              </tr>
                                              <tr>
                                                <th>TANGGAL</th>
                                                <td><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                                              </tr>
                                              <tr>
                                                <th>SUMBER DANA</th>
                                                <td><?php echo $d['jenisdana']; ?></td>
                                              </tr>
                                              <tr>
                                                <th>DIVISI</th>
                                                <td><?php echo $d['Nama_divisi']; ?></td>
                                              </tr>
                                              <tr>
                                                <th>JENIS BELANJA</th>
                                                <td><?php echo $d['jenisbelanja']; ?></td>
                                              </tr>
                                              <tr>
                                                <th>BESARAN</th>
                                                <td><?php echo "Rp. ".number_format($d['Jumlah'], 2, '.', ',')." ,-"; ?></td>
                                              </tr>
                                              <tr>
                                                <th>RINCIAN</th>
                                                <td><?php echo $d['Rincian']; ?></td>
                                              </tr>
                                              </table>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- modal edit verifikasi -->
                                      <div class="modal fade" id="edit_verifikasi<?php echo $d['Id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">

                                              <p>
                                              <?php 
                                              if($d['Kode_karyawan']==''){
                                                echo "Anda yakin ingin memverifikasi data ini ?";
                                              }else{
                                                echo "Anda yakin ingin memverifikasi data dengan kode". $d['Kode_karyawan']. " ?";
                                              }
                                              ?>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                              <a href="penerimaan_prosesverif.php?id=<?php echo $d['Id_karyawan'] ?>" class="btn btn-primary">Verifikasi</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- Modal Hapus -->
                                      <div class="modal fade" id="hapus_karyawan_<?php echo $d['Id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                              <a href="karyawan_hapus.php?id=<?php echo $d['Id_karyawan'] ?>" class="btn btn-primary">Hapus</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    </td>
                                    <td><?php echo $d['No_induk_karyawan']; ?></td>
                                    <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                                    <td><?php echo $d['jenisdana']; ?></td>
                                    <td><?php echo $d['Nama_divisi']; ?></td>
                                    <td><?php echo $d['jenisbelanja']; ?></td>
                                    <td><?php echo "Rp. ".number_format($d['Jumlah'], 2, '.', ',')." ,-"; ?></td>
                                    <!-- <td><?php echo $d['Rincian']; ?></td> -->
                                    <td class="text-center">
                                    <?php if($d['Keterangan']=='nonverifikasi'){ ?>
                                      <button title="Verifikasi" type="button" class="btn bg-orange btn-flat btn-xs" <?php echo $d['Id_karyawan'] ?>">Draft</button>
                                    <?php } else { ?>
                                      <button title="Sudah Terverifikasi" type="button" class="btn bg-blue btn-flat btn-xs">Terverifikasi</button>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php 
                              }
                              ?>
                            </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                    </div>
                  </section>
                </div>
              </section>


                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane" id="keluarga">
              <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#ortu" data-toggle="tab">Orang tua</a></li>
              <li><a href="#" data-toggle="tab">Pasangan</a></li>
              <li><a href="#" data-toggle="tab">Mertua</a></li>
              <li><a href="#" data-toggle="tab">Anak</a></li>
              </div>
              
              <div class="tab-pane" id="ortu">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?> 
