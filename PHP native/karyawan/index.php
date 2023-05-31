<?php 
include 'header.php'; 
date_default_timezone_set('Asia/Jakarta');
$hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
// array bulan dalam bahasa Indonesia
$namabulan = array(
  1 => "Januari",
  2 => "Februari",
  3 => "Maret",
  4 => "April",
  5 => "Mei",
  6 => "Juni",
  7 => "Juli",
  8 => "Agustus",
  9 => "September",
  10 => "Oktober",
  11 => "November",
  12 => "Desember"
);

$bulan_ini = date('n');
$hari_ini = date('w');
?>


<div class="content-wrapper">

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
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        
        <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

        <h4 align="center"><b><?php echo $_SESSION['nama'];?></b></h4>
        <h6 align="center"><i class="fa fa-circle text-success"></i> Online</h6>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Followers</b> <a class="pull-right">1,322</a>
          </li>
          <li class="list-group-item">
            <b>Following</b> <a class="pull-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Friends</b> <a class="pull-right">13,287</a>
          </li>
        </ul>

        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
        <div class="box-header">
              <h3 class="box-title">Profil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th></th>
                  <th style="width: 70%"></th>
                </tr>
                <tr>
                  <td>No Induk Karyawan</td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><?php echo $d['Nama']; ?></td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>Unit Kerja</td>
                  <td><?php echo $d['Unit_kerja']; ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /Profile -->

      <!--.Jabatan -->
      <div class="tab-pane" id="jabatan">
        <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">TMT</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputName" placeholder="Masukan TMT">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Jabatan</label>

              <div class="col-sm-10">
              <select name="jabatan" class="form-control">
                    <option value="">- Pilih -</option>
                    <?php 
                    include 'koneksi.php';
                    $jabatan = mysqli_query($koneksi,"SELECT * FROM jabatan ORDER BY Nama_jabatan ASC");
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
              <label for="inputName" class="col-sm-2 control-label">Unit</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Masukan Unit Karyawan">
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
        <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Tingkat</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputName" placeholder="Masukan Tingkat Pendidikan">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Jurusan</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Masukan Jurusan">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Instansi</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Masukan Nama Instansi">
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Gelar</label>

              <div class="col-sm-10">
                <textarea class="form-control" id="inputExperience" placeholder="Masukan Gelar"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Tahun Lulus</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" placeholder="Masukan Tahun Lulus">
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
        <!-- /.Pendidikan -->

         <!-- .Pelatihan -->
         <div class="tab-pane" id="pelatihan">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Diklat</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputName" placeholder="Masukan Nama Diklat">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Tipe Diklat</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Masukan Tipe Diklat">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Penyelenggara</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Masukan Penyelenggara">
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Tanggal Lulus</label>

              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lulus">
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
        <!-- /.Pelatihan -->

        <!-- .Hukuman -->
        <div class="tab-pane" id="hukuman">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputPelanggaran" class="col-sm-2 control-label">Pelanggaran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputPelanggaran" placeholder="Masukkan Pelanggaran">
                </div>
              </div>
              <div class="form-group">
                <label for="inputHukuman" class="col-sm-2 control-label">Hukuman</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputHukuman" placeholder="Masukkan Hukuman">
                </div>
              </div>
              <div class="form-group">
                <label for="inputTingkatHukuman" class="col-sm-2 control-label">Tingkat Hukuman</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputTingkatHukuman" placeholder="Masukkan Tingkat Hukuman">
                </div>
              </div>
              <div class="form-group">
                <label for="inputTanggalSK" class="col-sm-2 control-label">Tanggal SK</label>
                <div class="col-sm-10">
                  <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal SK">
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
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputIdCuti" class="col-sm-2 control-label">Id Cuti</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputIdCuti" placeholder="Masukkan Id Cuti">
                </div>
              </div>
              <div class="form-group">
                <label for="inputTanggalSK" class="col-sm-2 control-label">Tanggal SK</label>
                <div class="col-sm-10">
                  <input type="text" name="tanggal" class="form-control datepicker2"  placeholder="Tanggal SK">
                </div>
              </div>
              <div class="form-group">
                <label for="inputKeperluan" class="col-sm-2 control-label">Keperluan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputKeperluan" placeholder="Masukkan Keperluan">
                </div>
              </div>
              <div class="form-group">
                <label for="inputTanggalMulaiCuti" class="col-sm-2 control-label">Tanggal Mulai Cuti</label>
                <div class="col-sm-10">
                  <input type="text" name="tanggal" class="form-control datepicker2"  placeholder="Tanggal Mulai Cuti">
                </div>
              </div>
              <div class="form-group">
                <label for="inputTanggalSelesaiCuti" class="col-sm-2 control-label">Tanggal Selesai Cuti</label>
                <div class="col-sm-10">
                  <input type="text" name="tanggal" class="form-control datepicker2"  placeholder="Tanggal Selesai Cuti">
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

             <!-- .Cuti -->
             <div class="tab-pane" id="akun">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputNamaPegawai" class="col-sm-2 control-label">Nama Pegawai</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputNamaPegawai" placeholder="Masukkan Nama Pegawai">
                </div>
              </div>
              <div class="form-group">
                <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputUsername" placeholder="Masukkan Username">
                </div>
              </div><div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Masukkan Password">
                  <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="showPasswordBtn">Tampilkan</button>
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

            <!-- /.Cuti -->
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
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputNamaAyah" class="col-sm-2 control-label">Nama Ayah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputNamaAyah" placeholder="Masukkan Nama Ayah">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTempatLahirAyah" class="col-sm-2 control-label">Tempat Lahir Ayah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputTempatLahirAyah" placeholder="Masukkan Tempat Lahir Ayah">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTanggalLahirAyah" class="col-sm-2 control-label">Tanggal Lahir Ayah</label>
            <div class="col-sm-10">
              <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Ayah">
            </div>
          </div>
          <div class="form-group">
            <label for="inputNamaIbu" class="col-sm-2 control-label">Nama Ibu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputNamaIbu" placeholder="Masukkan Nama Ibu">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTempatLahirIbu" class="col-sm-2 control-label">Tempat Lahir Ibu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputTempatLahirIbu" placeholder="Masukkan Tempat Lahir Ibu">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTanggalLahirIbu" class="col-sm-2 control-label">Tanggal Lahir Ibu</label>
            <div class="col-sm-10">
              <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Ibu">
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

      <div class="tab-pane" id="pasangan">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputNamaPasangan" class="col-sm-2 control-label">Nama Pasangan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNamaPasangan" placeholder="Masukkan Nama Pasangan">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTempatLahirPasangan" class="col-sm-2 control-label">Tempat Lahir Pasangan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTempatLahirPasangan" placeholder="Masukkan Tempat Lahir Pasangan">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalLahirPasangan" class="col-sm-2 control-label">Tanggal Lahir Pasangan</label>
              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Pasangan">
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


        <div class="tab-pane" id="mertua">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputNamaMertua" class="col-sm-2 control-label">Nama Mertua</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNamaMertua" placeholder="Masukkan Nama Mertua">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTempatLahirMertua" class="col-sm-2 control-label">Tempat Lahir Mertua</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTempatLahirMertua" placeholder="Masukkan Tempat Lahir Mertua">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalLahirMertua" class="col-sm-2 control-label">Tanggal Lahir Mertua</label>
              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Mertua">
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


        <div class="tab-pane" id="anak">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputAnak1" class="col-sm-2 control-label">Anak ke-1</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAnak1" placeholder="Masukkan Nama Anak ke-1">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTempatLahirAnak1" class="col-sm-2 control-label">Tempat Lahir Anak ke-1</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTempatLahirAnak1" placeholder="Masukkan Tempat Lahir Anak ke-1">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalLahirAnak1" class="col-sm-2 control-label">Tanggal Lahir Anak ke-1</label>
              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-1">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAnak2" class="col-sm-2 control-label">Anak ke-2</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAnak2" placeholder="Masukkan Nama Anak ke-2">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTempatLahirAnak2" class="col-sm-2 control-label">Tempat Lahir Anak ke-2</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTempatLahirAnak2" placeholder="Masukkan Tempat Lahir Anak ke-2">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalLahirAnak2" class="col-sm-2 control-label">Tanggal Lahir Anak ke-2</label>
              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-2">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAnak3" class="col-sm-2 control-label">Anak ke-3</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAnak3" placeholder="Masukkan Nama Anak ke-3">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTempatLahirAnak3" class="col-sm-2 control-label">Tempat Lahir Anak ke-3</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTempatLahirAnak3" placeholder="Masukkan Tempat Lahir Anak ke-3">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalLahirAnak3" class="col-sm-2 control-label">Tanggal Lahir Anak ke-3</label>
              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-3">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAnak4" class="col-sm-2 control-label">Anak ke-4</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAnak4" placeholder="Masukkan Nama Anak ke-4">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTempatLahirAnak4" class="col-sm-2 control-label">Tempat Lahir Anak ke-4</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTempatLahirAnak4" placeholder="Masukkan Tempat Lahir Anak ke-4">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalLahirAnak4" class="col-sm-2 control-label">Tanggal Lahir Anak ke-4</label>
              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-4">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAnak5" class="col-sm-2 control-label">Anak ke-5</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAnak5" placeholder="Masukkan Nama Anak ke-5">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTempatLahirAnak5" class="col-sm-2 control-label">Tempat Lahir Anak ke-5</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTempatLahirAnak5" placeholder="Masukkan Tempat Lahir Anak ke-5">
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalLahirAnak5" class="col-sm-2 control-label">Tanggal Lahir Anak ke-5</label>
              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control datepicker2" placeholder="Tanggal Lahir Anak ke-5">
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