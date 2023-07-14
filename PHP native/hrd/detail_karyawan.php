<?php 
include 'header.php'; 
$id_karyawan = $_GET['id'];
$karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan.Id_karyawan = '$id_karyawan'");
$profil = mysqli_fetch_assoc($karyawan);
?>
<link rel="stylesheet" href="../assets/css/style2.css">
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail Data Karyawan
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="database_karyawan.php">Database Karyawan</a></li>
      <li class="active">Detail Data Karyawan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <?php if($profil['Foto']==NULL){?>
            <img class="profile-user-img img-responsive img-circle" src="../gambar/user.png" alt="User profile picture">
            <?php }else{?>
            <img class="profile-user-img img-responsive img-circle" src="../gambar/bukti/<?php echo $profil['Foto']; ?>" alt="User profile picture">
            <?php } ?>

            <h3 align="center"><b><?php echo $profil['Nama'];?></b></h4>
            <h4 align="center"><?php echo $profil['Nama_jabatan']; ?></h6>
            <!-- <h6 align="center"><i class="fa fa-circle text-success"></i> Online</h6> -->

            <ul class="list-group list-group-unbordered">
              </li>
            </ul>

            <a href="edit_karyawan.php?id=<?php echo $profil['Id_karyawan'] ?>" class="btn btn-primary btn-block"><b>Edit Data Karyawan</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active tabdetail"><a href="#profil" data-toggle="tab">Profil</a></li>
            <li><a class="tabdetail" href="#jabatan" data-toggle="tab">Riwayat Jabatan</a></li>
            <li><a class="tabdetail" href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
            <li><a class="tabdetail" href="#pelatihan" data-toggle="tab">Pelatihan</a></li>
            <li><a class="tabdetail" href="#hukuman" data-toggle="tab">Hukuman Disiplin</a></li>
            <li><a class="tabdetail" href="#cuti" data-toggle="tab">Cuti</a></li>
            <li><a class="tabdetail" href="#keluarga" data-toggle="tab">Keluarga</a></li>
            <!-- <li><a class="tabdetail" href="#akun" data-toggle="tab">Akun</a></li> -->
          </ul>
          
          <div class="tab-content">
            <!--Profile -->
            <div class="active tab-pane" id="profil">
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-condensed">
                  <tr>
                    <td>No Induk Karyawan</td>
                    <td><?php echo $profil['No_induk_karyawan']; ?></td>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td><?php echo $profil['Nama']; ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Lahir</td>
                    <td><?php echo $profil['Tempat_lahir']; ?></td>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td><?php echo $profil['Tgl_lahir']; ?></td>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <td>Jabatan</td>
                    <td><?php echo $profil['Nama_jabatan']; ?></td>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <td>Unit Kerja</td>
                    <td><?php echo $profil['Nama_unit_kerja']; ?></td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /Profile -->

            <!--.Jabatan -->
            <div class="tab-pane" id="jabatan">
              <div class="box-body no-padding">
                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-striped">
                      <tr>
                        <th>TMT SK</th>
                        <th>JABATAN</th>
                        <th>UNIT KERJA</th>
                      </tr>
                      <?php 
                        $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_jabatan WHERE karyawan.Id_karyawan = riwayat_jabatan.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                        while($jabatan = mysqli_fetch_assoc($d)){
                      ?>
                      <tr>
                        <td><?php echo isset($jabatan['TMT']) ? $jabatan['TMT'] : ''; ?></td>
                        <td><?php echo isset($jabatan['Jabatan']) ? $jabatan['Jabatan'] : ''; ?></td>
                        <td><?php echo isset($jabatan['Unit_kerja']) ? $jabatan['Unit_kerja'] : ''; ?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
            </div>
            <!-- /.Jabatan -->

            <!--.Pendidikan -->
            <div class="tab-pane" id="pendidikan">
              <div class="box-body no-padding">
                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-striped">
                      <tr>
                        <th>TINGKAT</th>
                        <th>JURUSAN</th>
                        <th>SEKOLAH/KAMPUS</th>
                        <th>GELAR</th>
                        <th>TANGGAL LULUS</th>
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
                      </tr>
                      <?php
                        }
                      ?>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
            </div>
            <!-- /.Pendidikan -->

            <!-- .Pelatihan -->
            <div class="tab-pane" id="pelatihan">
              <div class="box-body no-padding">
                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-striped">
                      <tr>
                        <th>NAMA DIKLAT</th>
                        <th>TIPE DIKLAT</th>
                        <th>PENYELENGGARA</th>
                        <th>TANGGAL LULUS</th>
                      </tr>
                      <?php 
                        $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_pelatihan WHERE karyawan.Id_karyawan = riwayat_pelatihan.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                        while($pelatihan = mysqli_fetch_assoc($d)){
                        ?>
                        <tr>
                          <td><?php echo isset($pelatihan['Nama_diklat']) ? $pelatihan['Nama_diklat'] : ''; ?></td>
                          <td><?php echo isset($pelatihan['Tipe_diklat']) ? $pelatihan['Tipe_diklat'] : ''; ?></td>
                          <td><?php echo isset($pelatihan['Penyelenggara']) ? $pelatihan['Penyelenggara'] : ''; ?></td>
                          <td><?php echo isset($pelatihan['Tgl_lulus']) ? $pelatihan['Tgl_lulus'] : ''; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                  </div>
                <!-- /.box-body -->
                </div>
                </div>
              </div>
            <!-- /.Pelatihan -->

            <!-- .Hukuman -->
            <div class="tab-pane" id="hukuman">
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <tr>
                    <th>PELANGGARAN</th>
                    <th>HUKUMAN</th>
                    <th>TINGKAT HUKUMAN</th>
                    <th>TANGGAL SK</th>
                  </tr>
                  <?php 
                    $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_hukuman WHERE karyawan.Id_karyawan = riwayat_hukuman.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                    while($hukuman = mysqli_fetch_assoc($d)){
                    ?>
                    <tr>
                      <td><?php echo isset($hukuman['Pelanggaran']) ? $hukuman['Pelanggaran'] : ''; ?></td>
                      <td><?php echo isset($hukuman['Hukuman']) ? $hukuman['Hukuman'] : ''; ?></td>
                      <td><?php echo isset($hukuman['Tingkat_hukuman']) ? $hukuman['Tingkat_hukuman'] : ''; ?></td>
                      <td><?php echo isset($hukuman['Tgl_sk']) ? $hukuman['Tgl_sk'] : ''; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
              </div>
            </div>
            <!-- /.Hukuman -->

            <!-- .Cuti -->
            <div class="tab-pane" id="cuti">
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <tr>
                    <th>TANGGAL SK</th>
                    <th>JENIS CUTI</th>
                    <th>KEPERLUAN</th>
                    <th>MULAI CUTI</th>
                    <th>SELESAI CUTI</th>
                  </tr>
                  <?php 
                    $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_cuti WHERE karyawan.Id_karyawan = riwayat_cuti.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                    while($cuti = mysqli_fetch_assoc($d)){
                    ?>
                    <tr>
                      <td><?php echo isset($cuti['tgl_SK']) ? $cuti['tgl_SK'] : ''; ?></td>
                      <td><?php echo isset($cuti['jenis_cuti']) ? $cuti['jenis_cuti'] : ''; ?></td>
                      <td><?php echo isset($cuti['Keperluan']) ? $cuti['Keperluan'] : ''; ?></td>
                      <td><?php echo isset($cuti['mulai_cuti']) ? $cuti['mulai_cuti'] : ''; ?></td>
                      <td><?php echo isset($cuti['selesai_cuti']) ? $cuti['selesai_cuti'] : ''; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
              </div>
            </div>
            <!-- /.Cuti -->

            <!-- .Akun -->
            <div class="tab-pane" id="akun">
              <div class="box-body no-padding">
                <?php 
                  $d = mysqli_query($koneksi,"SELECT * FROM karyawan, master_user WHERE karyawan.Id_karyawan = master_user.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                  $akun = mysqli_fetch_assoc($d)
                ?>
                <table class="table table-condensed">
                  <tr>
                    <td>Nama</td>
                    <td><?php echo isset($akun['Nama']) ? $akun['Nama'] : ''; ?></td>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo isset($akun['Alamat']) ? $akun['Alamat'] : ''; ?></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td><?php echo isset($akun['Username']) ? $akun['Username'] : ''; ?></td>
                    <td>
                    </td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td><?php echo isset($akun['Password']) ? $akun['Password'] : ''; ?></td>
                    <td>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.Akun -->

            <div class="tab-pane" id="keluarga">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active tabdetail"><a href="#ortu" data-toggle="tab">Orang tua</a></li>
                  <li><a class="tabdetail" href="#pasangan" data-toggle="tab">Pasangan</a></li>
                  <li><a class="tabdetail"href="#mertua" data-toggle="tab">Mertua</a></li>
                  <li><a class="tabdetail"href="#anak" data-toggle="tab">Anak</a></li>
              </div>
  
              <div class="tab-content">       
                <div class="active tab-pane" id="ortu">
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <?php 
                      $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_keluarga WHERE karyawan.Id_karyawan = riwayat_keluarga.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                      $keluarga = mysqli_fetch_assoc($d)
                      ?>
                      <tr>
                        <td>Nama Ayah</td>
                        <td><?php echo isset($keluarga['nama_ayah']) ? $keluarga['nama_ayah'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Ayah</td>
                        <td><?php echo isset($keluarga['tempatlahir_ayah']) ? $keluarga['tempatlahir_ayah'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Ayah</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_ayah'])){
                                if($keluarga['tgllahir_ayah'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_ayah']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Ibu</td>
                        <td><?php echo isset($keluarga['nama_ibu']) ? $keluarga['nama_ibu'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Ibu</td>
                        <td><?php echo isset($keluarga['tempatlahir_ibu']) ? $keluarga['tempatlahir_ibu'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Ibu</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_ibu'])){
                                if($keluarga['tgllahir_ibu'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_ibu']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="tab-pane" id="pasangan">
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tr>
                        <td>Nama Pasangan</td>
                        <td><?php echo isset($keluarga['nama_pasangan']) ? $keluarga['nama_pasangan'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Pasangan</td>
                        <td><?php echo isset($keluarga['tempatlahir_pasangan']) ? $keluarga['tempatlahir_pasangan'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Pasangan</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_pasangan'])){
                                if($keluarga['tgllahir_pasangan'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_pasangan']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="tab-pane" id="mertua">
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tr>
                        <td>Nama Ayah Mertua</td>
                        <td><?php echo isset($keluarga['nama_ayahmertua']) ? $keluarga['nama_ayahmertua'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Ayah Mertua</td>
                        <td><?php echo isset($keluarga['tempatlahir_ayahmertua']) ? $keluarga['tempatlahir_ayahmertua'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Ayah Mertua</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_ayahmertua'])){
                                if($keluarga['tgllahir_ayahmertua'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_ayahmertua']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Ibu Mertua</td>
                        <td><?php echo isset($keluarga['nama_ibumertua']) ? $keluarga['nama_ibumertua'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Ibu Mertua</td>
                        <td><?php echo isset($keluarga['tempatlahir_ibumertua']) ? $keluarga['tempatlahir_ibumertua'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Ibu Mertua</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_ibumertua'])){
                                if($keluarga['tgllahir_ibumertua'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_ibumertua']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="tab-pane" id="anak">
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tr>
                        <td>Nama Anak ke-1</td>
                        <td><?php echo isset($keluarga['nama_anak1']) ? $keluarga['nama_anak1'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Anak ke-1</td>
                        <td><?php echo isset($keluarga['tempatlahir_anak1']) ? $keluarga['tempatlahir_anak1'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Anak ke-1</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_anak1'])){
                                if($keluarga['tgllahir_anak1'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_anak1']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Anak ke-2</td>
                        <td><?php echo isset($keluarga['nama_anak2']) ? $keluarga['nama_anak2'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Anak ke-2</td>
                        <td><?php echo isset($keluarga['tempatlahir_anak2']) ? $keluarga['tempatlahir_anak2'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Anak ke-2</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_anak2'])){
                                if($keluarga['tgllahir_anak2'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_anak2']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Anak ke-3</td>
                        <td><?php echo isset($keluarga['nama_anak3']) ? $keluarga['nama_anak3'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Anak ke-3</td>
                        <td><?php echo isset($keluarga['tempatlahir_anak3']) ? $keluarga['tempatlahir_anak3'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Anak ke-3</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_anak3'])){
                                if($keluarga['tgllahir_anak3'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_anak3']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Anak ke-4</td>
                        <td><?php echo isset($keluarga['nama_anak4']) ? $keluarga['nama_anak4'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Anak ke-4</td>
                        <td><?php echo isset($keluarga['tempatlahir_anak4']) ? $keluarga['tempatlahir_anak4'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Anak ke-4</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_anak4'])){
                                if($keluarga['tgllahir_anak4'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_anak4']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Anak ke-5</td>
                        <td><?php echo isset($keluarga['nama_anak5']) ? $keluarga['nama_anak5'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Anak ke-5</td>
                        <td><?php echo isset($keluarga['tempatlahir_anak5']) ? $keluarga['tempatlahir_anak5'] : ''; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Anak ke-5</td>
                        <td>
                          <?php
                            if(isset($keluarga['tgllahir_anak5'])){
                                if($keluarga['tgllahir_anak5'] == '0000-00-00'){
                                    echo "";
                                } else {
                                    echo date('d-m-Y', strtotime($keluarga['tgllahir_anak5']));
                                }
                            } else {
                                echo '';
                            }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
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