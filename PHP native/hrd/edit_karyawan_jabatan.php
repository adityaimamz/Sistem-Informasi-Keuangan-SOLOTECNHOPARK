<?php 
include 'header.php'; 
$id_karyawan = $_GET['id'];
$karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan.Id_karyawan = '$id_karyawan'");
$profil = mysqli_fetch_assoc($karyawan);
?>

<link rel="stylesheet" href="../assets/css/style2.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="database_karyawan.php">Database Karyawan</a></li>
        <li class="active">Edit Data Karyawan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#profil" data-toggle="tab">Profil</a></li>
              <li class="active"><a href="#jabatan" data-toggle="tab">Riwayat Jabatan</a></li>
              <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
              <li><a href="#pelatihan" data-toggle="tab">Pelatihan</a></li>
              <li><a href="#hukuman" data-toggle="tab">Hukuman Disiplin</a></li>
              <li><a href="#cuti" data-toggle="tab">Cuti</a></li>
              <li><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
              <li><a href="#akun" data-toggle="tab">Akun</a></li>
            </ul>
            <div class="tab-content">
              <!--Profile -->
              <div class="tab-pane" id="profil">
                <form class="form-horizontal" action="edit_profil_proses.php" method="POST" enctype="multipart/form-data">
                    
                  <div class="form-group">
                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $profil['Id_karyawan']; ?>">
                    <label for="inputName" class="col-sm-2 control-label">Nomor Induk Karyawan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan nomor induk Karyawan" required="required" value="<?php echo $profil['No_induk_karyawan'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Karyawan" required="required" value="<?php echo $profil['Nama'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukan Tempat Lahir Karyawan" required="required" value="<?php echo $profil['Tempat_lahir'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control datepicker2" id="tgllahir" name="tgllahir" placeholder="Masukan Tanggal Lahir Karyawan" required="required" value="<?php echo $profil['Tgl_lahir'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-10">
                      <select name="jabatan" style="width:100%" class="form-control" required="required">
                        <option value="">- Pilih -</option>
                        <?php 
                        $jabatan = mysqli_query($koneksi,"SELECT * FROM jabatan ORDER BY Id_jabatan ASC");
                        while($k = mysqli_fetch_array($jabatan)){
                          ?>
                          <option <?php if($profil['Id_jabatan'] == $k['Id_jabatan']){echo "selected='selected'";} ?> value="<?php echo $k['Id_jabatan']; ?>"><?php echo $k['Nama_jabatan']; ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Unit Kerja</label>
                    <div class="col-sm-10">
                      <select name="unit" class="form-control" required="required">
                        <option value="">- Pilih -</option>
                          <?php 
                          $unit = mysqli_query($koneksi,"SELECT * FROM Unit_kerja ORDER BY Id_unit_kerja ASC");
                          while($k = mysqli_fetch_array($unit)){
                            ?>
                            <option <?php if($profil['Id_unit_kerja'] == $k['Id_unit_kerja']){echo "selected='selected'";} ?> value="<?php echo $k['Id_unit_kerja']; ?>"><?php echo $k['Nama_unit_kerja']; ?></option>
                            <?php 
                          }
                          ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                      <input type="file" name="trnfoto" class="form-control">
                      <small>File yang di perbolehkan *JPG | *jpeg | *PNG</small>
                      <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$profil[Foto]'>$profil[Foto]</a>";?> tidak dirubah kosongkan saja</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                    
                </form>
              </div>
              <!-- /Profile -->

              <!--.Jabatan -->
              <div class="active tab-pane" id="jabatan">
                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-striped">
                      <tr>
                        <th>TMT SK</th>
                        <th>JABATAN</th>
                        <th>UNIT KERJA</th>
                        <th>AKSI</th>
                      </tr>
                      <?php 
                        $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_jabatan WHERE karyawan.Id_karyawan = riwayat_jabatan.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                        while($jabatan = mysqli_fetch_assoc($d)){
                      ?>
                      <tr>
                        <td><?php echo isset($jabatan['TMT']) ? $jabatan['TMT'] : ''; ?></td>
                        <td><?php echo isset($jabatan['Jabatan']) ? $jabatan['Jabatan'] : ''; ?></td>
                        <td><?php echo isset($jabatan['Unit_kerja']) ? $jabatan['Unit_kerja'] : ''; ?></td>
                        <td>    
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_riwayat_jabatan_<?php echo $jabatan['Id_riwayat_jabatan'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_riwayat_jabatan_<?php echo $jabatan['Id_riwayat_jabatan'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>

                          <form action="riwayat_jabatan_update.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="edit_riwayat_jabatan_<?php echo $jabatan['Id_riwayat_jabatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Riwayat Jabatan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TMT</label>
                                      <input type="hidden" name="id" value="<?php echo $jabatan['Id_riwayat_jabatan'] ?>">
                                      <input type="hidden" name="idk" value="<?php echo $jabatan['Id_karyawan'] ?>">
                                      <input type="text" style="width:100%" name="tmt" required="required" class="form-control" placeholder="Ubah TMT .." value="<?php echo $jabatan['TMT'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>JABATAN</label>
                                      <input type="text" style="width:100%" name="jabatan" required="required" class="form-control" placeholder="Ubah Jabatan .." value="<?php echo $jabatan['Jabatan'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>UNIT KERJA</label>
                                      <input type="text" style="width:100%" name="unit" required="required" class="form-control" placeholder="Ubah Unit Kerja .." value="<?php echo $jabatan['Unit_kerja'] ?>">
                                    </div>
                                
                                    <div class="form-group">
                                      <div class="col-sm-offset-2 col-sm-10">
                                      </div>
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
                          <div class="modal fade" id="hapus_riwayat_jabatan_<?php echo $jabatan['Id_riwayat_jabatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Yakin ingin menghapus data ini ? <?php echo $jabatan['Id_karyawan'] ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <a href="riwayat_jabatan_hapus.php?id=<?php echo $jabatan['Id_riwayat_jabatan'] ?>&idk=<?php echo $jabatan['Id_karyawan'] ?>" class="btn btn-primary">Hapus</a>
                                </div>
                              </div>
                            </div>
                          </div>

                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <!-- /.Jabatan -->

               <!--.Pendidikan -->
               <div class="tab-pane" id="pendidikan">
               <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-striped">
                      <tr>
                        <th>TINGKAT PENDIDIKAN</th>
                        <th>JURUSAN</th>
                        <th>NAMA INSTANSI</th>
                        <th>GELAR</th>
                        <th>TAHUN LULUS</th>
                      </tr>
                      <?php 
                        $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_pendidikan WHERE karyawan.Id_karyawan = riwayat_pendidikan.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                        while($pendidikan = mysqli_fetch_assoc($d)){
                      ?>
                      <tr>
                        <td><?php echo isset($pendidikan['Tingkat']) ? $pendidikan['Tingkat'] : ''; ?></td>
                        <td><?php echo isset($pendidikan['Jurusan']) ? $pendidikan['Jurusan'] : ''; ?></td>
                        <td><?php echo isset($pendidikan['Nama_instansi']) ? $pendidikan['Nama_instansi'] : ''; ?></td>
                        <td><?php echo isset($pendidikan['Gelar']) ? $pendidikan['Gelar'] : ''; ?></td>
                        <td><?php echo isset($pendidikan['Tahun_lulus']) ? $pendidikan['Tahun_lulus'] : ''; ?></td>
                        <td>    
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_riwayat_pendidikan_<?php echo $pendidikan['Id_pendidikan'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_riwayat_pendidikan_<?php echo $pendidikan['Id_pendidikan'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>

                      <form action="riwayat_pendidikan_update.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="edit_riwayat_pendidikan_<?php echo $pendidikan['Id_pendidikan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit Riwayat Pendidikan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tingkat</label>
                                  <input type="hidden" name="id" value="<?php echo $pendidikan['Id_pendidikan'] ?>">
                                  <input type="hidden" name="idk" value="<?php echo $pendidikan['Id_karyawan'] ?>">
                                  <input type="text" style="width:100%" name="tmt" required="required" class="form-control" placeholder="Ubah TMT .." value="<?php echo $pendidikan['Tingkat'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Jurusan</label>
                                  <input type="text" style="width:100%" name="jurusan" required="required" class="form-control" placeholder="Ubah Jurusan .." value="<?php echo $pendidikan['Jurusan'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Nama Instansi</label>
                                  <input type="text" style="width:100%" name="instansi" required="required" class="form-control" placeholder="Ubah Nama Instansi .." value="<?php echo $pendidikan['Nama_instansi'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Gelar</label>
                                  <input type="text" style="width:100%" name="gelar" required="required" class="form-control" placeholder="Ubah Gelar .." value="<?php echo $pendidikan['Gelar'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tahun lulus</label>
                                  <input type="text" style="width:100%" name="tahunlulus" required="required" class="form-control" placeholder="Ubah Tahun lulus .." value="<?php echo $pendidikan['Tahun_lulus'] ?>">
                                </div>
                            
                                <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                  </div>
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
                      <div class="modal fade" id="hapus_riwayat_pendidikan_<?php echo $pendidikan['Id_pendidikan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Yakin ingin menghapus data ini ? <?php echo $pendidikan['Id_karyawan'] ?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <a href="riwayat_pendidikan_hapus.php?id=<?php echo $pendidikan['Id_pendidikan'] ?>&idk=<?php echo $pendidikan['Id_karyawan'] ?>" class="btn btn-primary">Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>

                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
              </div>
              <!-- /.Pendidikan -->

               <!-- .Pelatihan -->
              <div class="tab-pane" id="pelatihan">
                <form class="form-horizontal" action="tambah_riwayat_diklat_proses.php" method="POST" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                      <select name="karyawan" class="form-control" required="required">
                        <option value="">- Pilih -</option>
                        <?php 
                        include 'koneksi.php';
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan ORDER BY Id_karyawan ASC");
                        while($k = mysqli_fetch_array($karyawan)){
                          ?>
                          <option value="<?php echo $k['Id_karyawan']; ?>"><?php echo $k['Nama']; ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Diklat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Diklat" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Tipe Diklat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Masukan Tipe Diklat" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Penyelenggara</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Masukan Penyelenggara">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Tanggal Lulus</label>
                    <div class="col-sm-10">
                      <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lulus" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>

                </form>
              </div>
              <!-- /.Pelatihan -->

              <!-- .Hukuman -->
              <div class="tab-pane" id="hukuman">
                <form class="form-horizontal" action="tambah_riwayat_hukuman_proses.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                      <select name="karyawan" class="form-control" required="required">
                        <option value="">- Pilih -</option>
                        <?php 
                        include 'koneksi.php';
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan ORDER BY Id_karyawan ASC");
                        while($k = mysqli_fetch_array($karyawan)){
                          ?>
                          <option value="<?php echo $k['Id_karyawan']; ?>"><?php echo $k['Nama']; ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPelanggaran" class="col-sm-2 control-label">Pelanggaran</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pelanggaran" name="pelanggaran" placeholder="Masukkan Pelanggaran">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputHukuman" class="col-sm-2 control-label">Hukuman</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="hukuman" name="hukuman" placeholder="Masukkan Hukuman">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTingkatHukuman" class="col-sm-2 control-label">Tingkat Hukuman</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Masukkan Tingkat Hukuman">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTanggalSK" class="col-sm-2 control-label">Tanggal SK</label>
                    <div class="col-sm-10">
                      <input type="text" id="tanggal" name="tanggal" class="form-control datepicker2" placeholder="Tanggal SK">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.Hukuman -->

              <!-- .Cuti -->
              <div class="tab-pane" id="cuti">
                <form class="form-horizontal" action="tambah_riwayat_cuti_proses.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                      <select name="karyawan" class="form-control" required="required">
                        <option value="">- Pilih -</option>
                        <?php 
                        include 'koneksi.php';
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan ORDER BY Id_karyawan ASC");
                        while($k = mysqli_fetch_array($karyawan)){
                          ?>
                          <option value="<?php echo $k['Id_karyawan']; ?>"><?php echo $k['Nama']; ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTanggalSK" class="col-sm-2 control-label">Tanggal SK</label>
                    <div class="col-sm-10">
                      <input type="text" id="tanggal" name="tanggal" class="form-control datepicker2"  placeholder="Tanggal SK">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputKeperluan" class="col-sm-2 control-label">Jenis Cuti</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Jenis Cuti yang di ambil">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputKeperluan" class="col-sm-2 control-label">Keperluan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Masukkan Keperluan">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTanggalMulaiCuti" class="col-sm-2 control-label">Tanggal Mulai Cuti</label>
                    <div class="col-sm-10">
                      <input type="text" name="tglmulai" id="tglmulai" class="form-control datepicker2"  placeholder="Tanggal Mulai Cuti">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTanggalSelesaiCuti" class="col-sm-2 control-label">Tanggal Selesai Cuti</label>
                    <div class="col-sm-10">
                      <input type="text" name="tglselesai" id="tglselesai" class="form-control datepicker2"  placeholder="Tanggal Selesai Cuti">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.Cuti -->

              <!-- Akun -->
              <div class="tab-pane" id="akun">
                <form class="form-horizontal" action="tambah_akun_proses.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                      <select name="karyawan" class="form-control" required="required">
                        <option value="">- Pilih -</option>
                        <?php 
                        include 'koneksi.php';
                        $karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan ORDER BY Id_karyawan ASC");
                        while($k = mysqli_fetch_array($karyawan)){
                          ?>
                          <option value="<?php echo $k['Nama']; ?>"><?php echo $k['Nama']; ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                    </div>
                  </div><div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                      <div class="input-group-append">
                    </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.Akun -->

              <div class="tab-pane" id="keluarga">
                <div class="tab-pane" id="ortu">
                  <div class="tab-content">
                  <form class="form-horizontal" action="tambah_riwayat_keluarga_proses.php" method="POST" enctype="multipart/form-data">
                    <div class="active tab-pane" id="ortu">
                      <!-- <form class="form-horizontal"> -->

                        <div class="form-group">
                          <label for="inputEmail" class="col-sm-2 control-label">Nama Pegawai</label>
                          <div class="col-sm-10">
                            <select name="karyawan" class="form-control" required="required">
                              <option value="">- Pilih -</option>
                              <?php 
                              include 'koneksi.php';
                              $karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan ORDER BY Id_karyawan ASC");
                              while($k = mysqli_fetch_array($karyawan)){
                                ?>
                                <option value="<?php echo $k['Nama']; ?>"><?php echo $k['Nama']; ?></option>
                                <?php 
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <h4 class="keluarga_title">
                        Data Orang Tua
                        </h4>
                        <div class="form-group">
                          <label for="inputNamaAyah" class="col-sm-2 control-label">Nama Ayah</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaayah" name="namayah" placeholder="Masukkan Nama Ayah">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirAyah" class="col-sm-2 control-label">Tempat Lahir Ayah</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahirayah" name="tempatlahirayah" placeholder="Masukkan Tempat Lahir Ayah">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirAyah" class="col-sm-2 control-label">Tanggal Lahir Ayah</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahirayah" class="form-control datepicker2" placeholder="Tanggal Lahir Ayah">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaIbu" class="col-sm-2 control-label">Nama Ibu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaibu" name="namaibu" placeholder="Masukkan Nama Ibu">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirIbu" class="col-sm-2 control-label">Tempat Lahir Ibu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahiribu" name="tempatlahiribu" placeholder="Masukkan Tempat Lahir Ibu">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirIbu" class="col-sm-2 control-label">Tanggal Lahir Ibu</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahiribu" class="form-control datepicker2" placeholder="Tanggal Lahir Ibu">
                          </div>
                        </div>
                      <!-- </form> -->
                    </div>
                    
                    <div class="tab-pane" id="pasangan">
                      <!-- <form class="form-horizontal"> -->
                      <h4 class="keluarga_title">
                        Data Pasangan
                        </h4>
                        <div class="form-group">
                          <label for="inputNamaPasangan" class="col-sm-2 control-label">Nama Pasangan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namapasangan" name="namapasangan" placeholder="Masukkan Nama Pasangan">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirPasangan" class="col-sm-2 control-label">Tempat Lahir Pasangan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahirpasangan" name="tempatlahirpasangan" placeholder="Masukkan Tempat Lahir Pasangan">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirPasangan" class="col-sm-2 control-label">Tanggal Lahir Pasangan</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahirpasangan" class="form-control datepicker2" placeholder="Tanggal Lahir Pasangan">
                          </div>
                        </div>
                      <!-- </form> -->
                    </div>

                    <div class="tab-pane" id="mertua">
                      <!-- <form class="form-horizontal"> -->
                      <h4 class="keluarga_title">
                        Data Mertua
                        </h4>
                        <div class="form-group">
                          <label for="inputNamaMertua" class="col-sm-2 control-label">Nama Ayah Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaayahmertua" name="namaayahmertua" placeholder="Masukkan Nama Mertua">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirMertua" class="col-sm-2 control-label">Tempat Lahir Ayah Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahirayahmertua" name="tempatlahirayahmertua" placeholder="Masukkan Tempat Lahir Mertua">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirMertua" class="col-sm-2 control-label">Tanggal Lahir Ayah Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahirayahmertua" class="form-control datepicker2" placeholder="Tanggal Lahir Mertua">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaMertua" class="col-sm-2 control-label">Nama Ibu Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaibumertua" name="namaibumertua" placeholder="Masukkan Nama Mertua">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirMertua" class="col-sm-2 control-label">Tempat Lahir Ibu Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahiribumertua" name="tempatlahiribumertua" placeholder="Masukkan Tempat Lahir Mertua">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirMertua" class="col-sm-2 control-label">Tanggal Lahir Ibu Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahiribumertua" class="form-control datepicker2" placeholder="Tanggal Lahir Mertua">
                          </div>
                        </div>
                      <!-- </form> -->
                    </div>

                    <div class="tab-pane" id="anak">
                      <!-- <form class="form-horizontal"> -->
                      <h4 class="keluarga_title">
                        Data Anak ke-1
                        </h4>
                        <div class="form-group">
                          <label for="inputAnak1" class="col-sm-2 control-label">Anak ke-1</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaanak1" name="namaanak1" placeholder="Masukkan Nama Anak ke-1">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirAnak1" class="col-sm-2 control-label">Tempat Lahir Anak ke-1</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahiranak1" name="tempatlahiranak1" placeholder="Masukkan Tempat Lahir Anak ke-1">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirAnak1" class="col-sm-2 control-label">Tanggal Lahir Anak ke-1</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahiranak1" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-1">
                          </div>
                        </div>
                        <h4 class="keluarga_title">
                        Data Anak ke-2
                        </h4>
                        <div class="form-group">
                          <label for="inputAnak2" class="col-sm-2 control-label">Anak ke-2</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaanak2" name="namaanak2" placeholder="Masukkan Nama Anak ke-2">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirAnak2" class="col-sm-2 control-label">Tempat Lahir Anak ke-2</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahiranak2" name="tempatlahiranak2" placeholder="Masukkan Tempat Lahir Anak ke-2">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirAnak2" class="col-sm-2 control-label">Tanggal Lahir Anak ke-2</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahiranak2" namae="tgllahiranak2" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-2">
                          </div>
                        </div>
                        <h4 class="keluarga_title">
                        Data Anak ke-3
                        </h4>
                        <div class="form-group">
                          <label for="inputAnak3" class="col-sm-2 control-label">Anak ke-3</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaanak3"  name="namaanak3" placeholder="Masukkan Nama Anak ke-3">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirAnak3" class="col-sm-2 control-label">Tempat Lahir Anak ke-3</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahiranak3" name="tempatlahiranak3" placeholder="Masukkan Tempat Lahir Anak ke-3">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirAnak3" class="col-sm-2 control-label">Tanggal Lahir Anak ke-3</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahiranak3" name="tgllahiranak3" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-3">
                          </div>
                        </div>
                        <h4 class="keluarga_title">
                        Data Anak ke-4
                        </h4>
                        <div class="form-group">
                          <label for="inputAnak4" class="col-sm-2 control-label">Anak ke-4</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaanak4" name="namaanak4" placeholder="Masukkan Nama Anak ke-4">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirAnak4" class="col-sm-2 control-label">Tempat Lahir Anak ke-4</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahiranak4" name="tempatlahiranak4" placeholder="Masukkan Tempat Lahir Anak ke-4">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirAnak4" class="col-sm-2 control-label">Tanggal Lahir Anak ke-4</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahiranak4" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-4">
                          </div>
                        </div>
                        <h4 class="keluarga_title">
                        Data Anak ke-5
                        </h4>
                        <div class="form-group">
                          <label for="inputAnak5" class="col-sm-2 control-label">Anak ke-5</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaanak5" name="namaanak5" placeholder="Masukkan Nama Anak ke-5">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirAnak5" class="col-sm-2 control-label">Tempat Lahir Anak ke-5</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahiranak5" name="tempatlahiranak5" placeholder="Masukkan Tempat Lahir Anak ke-5">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirAnak5" class="col-sm-2 control-label">Tanggal Lahir Anak ke-5</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahiranak5" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-5">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      <!-- </form> -->
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


  <script>
  var passwordInput = document.getElementById("inputPassword");
  var showPasswordBtn = document.getElementById("showPasswordBtn");
  var isPasswordShown = false;

  showPasswordBtn.addEventListener("click", function () {
    if (isPasswordShown) {
      passwordInput.type = "password";
      showPasswordBtn.textContent = "Tampilkan";
    } else {
      passwordInput.type = "text";
      showPasswordBtn.textContent = "Sembunyikan";
    }
    isPasswordShown = !isPasswordShown;
  });
</script>
<?php include 'footer.php'; ?>