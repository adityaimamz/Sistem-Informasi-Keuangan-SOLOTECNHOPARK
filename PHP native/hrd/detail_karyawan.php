<?php 
include 'header.php'; 
$id_karyawan = $_GET['id'];
$karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan.Id_karyawan = '$id_karyawan'");
$profil = mysqli_fetch_assoc($karyawan);
?>
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

        <h4 align="center"><b><?php echo $profil['Nama'];?></b></h4>
        <h6 align="center"><?php echo $profil['Nama_jabatan']; ?></h6>
        <!-- <h6 align="center"><i class="fa fa-circle text-success"></i> Online</h6> -->

        <ul class="list-group list-group-unbordered">

          </li>
        </ul>

        <a href="edit_karyawan.php?id=<?php echo $profil['Id_karyawan'] ?>" class="btn btn-primary btn-block"><b>Edit Data Karyawan</b></a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
        <li><a href="#jabatan" data-toggle="tab">Riwayat Jabatan</a></li>
        <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
        <li><a href="#pelatihan" data-toggle="tab">Pelatihan</a></li>
        <li><a href="#hukuman" data-toggle="tab">Hukuman Disiplin</a></li>
        <li><a href="#cuti" data-toggle="tab">Cuti</a></li>
        <li><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
        <li><a href="#akun" data-toggle="tab">Akun</a></li>
      </ul>
      <div class="tab-content">
      <!--Profile -->
        <div class="active tab-pane" id="profil">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th></th>
                  <th style="width: 70%"></th>
                </tr>
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
                    <th>TANGGAL LULUS</th>
                    <th>TINGKAT</th>
                    <th>JURUSAN</th>
                    <th>SEKOLAH/KAMPUS</th>
                    <th>GELAR</th>
                  </tr>
                  <?php 
                    $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_pendidikan WHERE karyawan.Id_karyawan = riwayat_pendidikan.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                    while($pendidikan = mysqli_fetch_assoc($d)){
                  ?>
                  <tr>
                    <td><?php echo isset($pendidikan['Tahun_lulus']) ? $pendidikan['Tahun_lulus'] : ''; ?></td>
                    <td><?php echo isset($pendidikan['Tingkat']) ? $pendidikan['Tingkat'] : ''; ?></td>
                    <td><?php echo isset($pendidikan['Jurusan']) ? $pendidikan['Jurusan'] : ''; ?></td>
                    <td><?php echo isset($pendidikan['Nama_instansi']) ? $pendidikan['Nama_instansi'] : ''; ?></td>
                    <td><?php echo isset($pendidikan['Gelar']) ? $pendidikan['Gelar'] : ''; ?></td>
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
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <tr>
                    <th>TANGGAL SK</th>
                    <th>PELANGGARAN</th>
                    <th>HUKUMAN</th>
                    <th>TINGKAT HUKUMAN</th>
                  </tr>
                  <?php 
                    $d = mysqli_query($koneksi,"SELECT * FROM karyawan, riwayat_pendidikan WHERE karyawan.Id_karyawan = riwayat_pendidikan.Id_karyawan AND karyawan.Id_karyawan = '$id_karyawan'");
                    $pendidikan = mysqli_fetch_assoc($d);
                    while($pendidikan = mysqli_fetch_assoc($d)){
                  ?>
                  <tr>
                    <td><?php echo isset($pendidikan['Tahun_lulus']) ? $pendidikan['Tahun_lulus'] : ''; ?></td>
                    <td><?php echo isset($pendidikan['Tingkat']) ? $pendidikan['Tingkat'] : ''; ?></td>
                    <td><?php echo isset($pendidikan['Jurusan']) ? $pendidikan['Jurusan'] : ''; ?></td>
                    <td><?php echo isset($pendidikan['Nama_instansi']) ? $pendidikan['Nama_instansi'] : ''; ?></td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
              </div>
            <!-- /.box-body -->
            </div>
              <table class="table table-condensed">
                <tr>
                  <th></th>
                  <th style="width: 70%"></th>
                </tr>
                <tr>
                  <td>Nama Pelanggaran</td>
                  <td><?php echo $profil['Pelanggaran']; ?></td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>Nama Hukuman</td>
                  <td><?php echo $profil['Hukuman']; ?></td>
                </tr>
                <tr>
                  <td>Tingkat Hukuman</td>
                  <td><?php echo $profil['Tingkat_hukuman']; ?></td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>Tanggal SK</td>
                  <td><?php echo $profil['Tgl_sk']; ?></td>
                  <td>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        <!-- /.Hukuman -->

         <!-- .Cuti -->
        <div class="tab-pane" id="cuti">
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tr>
                <th></th>
                <th style="width: 70%"></th>
              </tr>
              <tr>
                <td>Id Cuti</td>
                <td><?php echo $profil['Id_cuti']; ?></td>
                <td>
                </td>
              </tr>
              <tr>
                <td>Tanggal SK</td>
                <td><?php echo $profil['tgl_SK']; ?></td>
              </tr>
              <tr>
                <td>Keperluan</td>
                <td><?php echo $profil['Keperluan']; ?></td>
                <td>
                </td>
              </tr>
              <tr>
                <td>Mulai Cuti</td>
                <td><?php echo $profil['mulai_cuti']; ?></td>
                <td>
                </td>
              </tr>
              <tr>
                <td>Selesai Cuti</td>
                <td><?php echo $profil['selesai_cuti']; ?></td>
                <td>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.Cuti -->

        <!-- .akun -->
        <div class="tab-pane" id="akun">
          <div class="box-body no-padding">
            <table class="table table-condensed">
              <tr>
                <th></th>
                <th style="width: 70%"></th>
              </tr>
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
        </div>

        <!-- /.keluarga -->
        <div class="tab-pane" id="keluarga">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#ortu" data-toggle="tab">Orang tua</a></li>
              <li><a href="#pasangan" data-toggle="tab">Pasangan</a></li>
              <li><a href="#mertua" data-toggle="tab">Mertua</a></li>
              <li><a href="#anak" data-toggle="tab">Anak</a></li>
              </div>
              
              <div class="tab-pane" id="ortu">
                          
              <div class="tab-content">       
                <div class="active tab-pane" id="ortu">
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tr>
                        <th></th>
                        <th style="width: 70%"></th>
                      </tr>
                      <tr>
                        <td>Nama Ayah</td>
                        <td><?php echo $profil['nama_ayah']; ?></td>
                        <td>
                        </td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Ayah</td>
                        <td><?php echo $profil['tempatlahir_ayah']; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Ayah</td>
                        <td><?php echo $profil['tgllahir_ayah']; ?></td>
                        <td>
                        </td>
                      </tr>
                      <tr>
                        <td>Nama Ibu</td>
                        <td><?php echo $profil['nama_ibu']; ?></td>
                        <td>
                        </td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir Ibu</td>
                        <td><?php echo $profil['tempatlahir_ibu']; ?></td>
                        <td>
                        </td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir Ibu</td>
                        <td><?php echo $profil['tgllahir_ibu']; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>

              <div class="tab-pane" id="pasangan">
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tr>
                      <th></th>
                      <th style="width: 70%"></th>
                    </tr>
                    <tr>
                      <td>Nama Pasangan</td>
                      <td><?php echo $profil['nama_pasangan']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir Pasangan</td>
                      <td><?php echo $profil['tempatlahir_pasangan']; ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Pasangan</td>
                      <td><?php echo $profil['tgllahir_pasangan']; ?></td>
                      <td>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>

              <div class="tab-pane" id="mertua">
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tr>
                      <th></th>
                      <th style="width: 70%"></th>
                    </tr>
                    <tr>
                      <td>Nama Mertua</td>
                      <td><?php echo $profil['nama_mertua']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir Mertua</td>
                      <td><?php echo $profil['tempatlahir_mertua']; ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Mertua</td>
                      <td><?php echo $profil['tgllahir_mertua']; ?></td>
                      <td>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>

              <div class="tab-pane" id="anak">
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tr>
                      <th></th>
                      <th style="width: 70%"></th>
                    </tr>
                    <tr>
                      <td>Nama Anak ke-1</td>
                      <td><?php echo $profil['nama_anak1']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir Anak ke-1</td>
                      <td><?php echo $profil['tempatlahir_anak1']; ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Anak ke-1</td>
                      <td><?php echo $profil['tgllahir_anak1']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Nama Anak ke-2</td>
                      <td><?php echo $profil['nama_anak2']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir Anak ke-2</td>
                      <td><?php echo $profil['tempatlahir_anak2']; ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Anak ke-2</td>
                      <td><?php echo $profil['tgllahir_anak2']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Nama Anak ke-3</td>
                      <td><?php echo $profil['nama_anak3']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir Anak ke-3</td>
                      <td><?php echo $profil['tempatlahir_anak3']; ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Anak ke-3</td>
                      <td><?php echo $profil['tgllahir_anak3']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Nama Anak ke-4</td>
                      <td><?php echo $profil['nama_anak4']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir Anak ke-4</td>
                      <td><?php echo $profil['tempatlahir_anak4']; ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Anak ke-4</td>
                      <td><?php echo $profil['tgllahir_anak4']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Nama Anak ke-5</td>
                      <td><?php echo $profil['nama_anak5']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>Tempat Lahir Anak ke-5</td>
                      <td><?php echo $profil['tempatlahir_anak5']; ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Anak ke-5</td>
                      <td><?php echo $profil['tgllahir_anak5']; ?></td>
                      <td>
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