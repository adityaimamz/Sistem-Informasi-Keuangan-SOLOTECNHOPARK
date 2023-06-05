<?php include 'header.php'; ?>
<link rel="stylesheet" href="../assets/css/style2.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="database_karyawan.php">Database Karyawan</a></li>
        <li class="active">Tambah Data Karyawan</li>
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
              <li><a href="#jabatan" data-toggle="tab">Riwayat Jabatan</a></li>
              <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
              <li><a href="#pelatihan" data-toggle="tab">Pelatihan</a></li>
              <li><a href="#hukuman" data-toggle="tab">Hukuman Disiplin</a></li>
              <li  class="active"><a href="#cuti" data-toggle="tab">Cuti</a></li>
              <li><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
              <li><a href="#akun" data-toggle="tab">Akun</a></li>
            </ul>
            <div class="tab-content">
              <!--Profile -->
              <div class="tab-pane" id="profil">
                <form class="form-horizontal" action="tambah_profile_proses.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Namor Induk Karyawan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan nomor induk Karyawan" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Karyawan" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Tempat Lahir</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukan Tempat Lahir Karyawan" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control datepicker2" id="tgllahir" name="tgllahir" placeholder="Masukan Tanggal Lahir Karyawan" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-10">
                        <select name="jabatan" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <?php 
                          include 'koneksi.php';
                          $jabatan = mysqli_query($koneksi,"SELECT * FROM jabatan ORDER BY Id_jabatan ASC");
                          while($k = mysqli_fetch_array($jabatan)){
                            ?>
                            <option value="<?php echo $k['Id_jabatan']; ?>"><?php echo $k['Nama_jabatan']; ?></option>
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
                          include 'koneksi.php';
                          $unit = mysqli_query($koneksi,"SELECT * FROM unit_kerja ORDER BY Id_unit_kerja ASC");
                          while($k = mysqli_fetch_array($unit)){
                            ?>
                            <option value="<?php echo $k['Id_unit_kerja']; ?>"><?php echo $k['Nama_unit_kerja']; ?></option>
                            <?php 
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-10">
                        <input type="file" name="trnfoto" class="form-control" required="required">
                        <small>File yang di perbolehkan *JPG | *jpeg | *PNG</small>
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
              <div class="tab-pane" id="jabatan">
                <form class="form-horizontal" action="tambah_riwayat_jabatan_proses.php" method="POST" enctype="multipart/form-data">
                  
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
                    <label for="inputName" class="col-sm-2 control-label">TMT</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tmt" name="tmt" placeholder="Masukan TMT" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Riwayat Jabatan Kerja Karyawan" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Unit Kerja</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="unit" name="unit" placeholder="Riwayat Unit Kerja Karyawan" required="required">
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
              <!-- /.Jabatan -->

               <!--.Pendidikan -->
               <div class="tab-pane" id="pendidikan">
                 <form class="form-horizontal" action="tambah_riwayat_pendidikan_proses.php" method="POST" enctype="multipart/form-data">
                  
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
                    <label for="inputName" class="col-sm-2 control-label">Tingkat Pendidikan</label>
                    <div class="col-sm-10">
                      <input type="teks" class="form-control" id="tingkat" name="tingkat" placeholder="Masukan Tingkat Pendidikan" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Jurusan</label>
                    <div class="col-sm-10">
                      <input type="teks" class="form-control" id="jurusan" placeholder="Masukan Jurusan" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Instansi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Masukan Nama Instansi" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Gelar</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="gelar" name="gelar" placeholder="Masukan Gelar" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukan Tahun Lulus" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>

                </form>
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
              <div class="active tab-pane" id="cuti">
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
                          <label for="inputNamaMertua" class="col-sm-2 control-label">Nama Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="namamertua" name="namamertua" placeholder="Masukkan Nama Mertua">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTempatLahirMertua" class="col-sm-2 control-label">Tempat Lahir Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempatlahirmertua" name="tempatlahirmertua" placeholder="Masukkan Tempat Lahir Mertua">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalLahirMertua" class="col-sm-2 control-label">Tanggal Lahir Mertua</label>
                          <div class="col-sm-10">
                            <input type="text" name="tgllahirmertua" class="form-control datepicker2" placeholder="Tanggal Lahir Mertua">
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
                            <button type="submit" class="btn btn-danger">Finish Submit</button>
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