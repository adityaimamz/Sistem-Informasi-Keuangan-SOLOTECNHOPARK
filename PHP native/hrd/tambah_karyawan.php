<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Informasi HRD</a></li>
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
              <form class="form-horizontal" action="tambah_profile_proses.php" method="POST">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Namor Induk Karyawan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nik" placeholder="Masukan nomor induk Karyawan">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Karyawan">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tempatlahir" placeholder="Masukan Tempat Lahir">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tanggal Lahir</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tanggallahir" class="form-control datepicker2" placeholder="Masukan Tanggal Lahir Karyawan">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Foto</label>

                    <div class="col-sm-10">
                      <input type="file" name="trnfoto" class="form-control">
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
                      <input type="text" name="tanggal" required="required" class="form-control datepicker2">
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
