<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Agenda
      <small>Data Agenda</small>
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
            <h3 class="box-title">Daftar Agenda</h3>
            <div class="btn-group pull-right">            

              
              &nbsp
            <a href="agenda_csv.php"><button type="button" class="btn btn-success btn-sm">
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
            <form action="agenda_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Agenda</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label>TANGGAL</label>
                        <input type="date" name="tanggal" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PUKUL</label>
                        <input type="text" name="pukul" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ACARA</label>
                        <input type="text" name="acara" required="required" class="form-control" placeholder="Masukkan Acara..">
                    </div>
                    <div class="form-group">
                        <label>INSTANSI</label>
                        <input type="text" name="instansi" required="required" class="form-control" placeholder="Masukkan Instansi..">
                    </div>
                    <div class="form-group">
                        <label>TEMPAT</label>
                        <input type="text" name="tempat" required="required" class="form-control" placeholder="Masukkan Tempat..">
                    </div>
                    <div class="form-group">
                        <label>PERIHAL</label>
                        <select name="perihal" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <option value="Kunjungan">Kunjungan</option>
                          <option value="Undangan">Undangan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>STATUS</label>
                        <select name="status" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <option value="Draft">Draft</option>
                          <option value="Disposisi">Disposisi</option>
                          <option value="Terlaksana">Terlaksana</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label>JUMLAH PENGUNJUNG</label>
                        <input type="number" name="jumlah_pengunjung" required="required" class="form-control" placeholder="Masukkan Jumlah Pengunjung..">
                    </div>
                    <div class="form-group">
                        <label>KETERANGAN</label>
                        <input type="text" name="keterangan" required="required" class="form-control" placeholder="Masukkan Keterangan..">
                    </div>

                    <div class="form-group" style="width:100%;margin-bottom:20px">
                        <label>PIC</label>
                      <select name="pegawai" style="width:100%" class="form-control" required="required">
                        <option value="">- Pilih -</option>
                        <?php 
                        $pegawai = mysqli_query($koneksi,"SELECT * FROM master_pegawai ORDER BY Id_pegawai ASC");
                        while($p = mysqli_fetch_array($pegawai)){
                          ?>
                          <option <?php if($p['Id_pegawai'] == $p['Id_pegawai']){echo "selected='selected'";} ?> value="<?php echo $p['Id_pegawai']; ?>"><?php echo $p['Nama_pegawai']; ?></option>
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
                    <th>TANGGAL</th>
                    <th>PUKUL</th>
                    <th>ACARA</th>
                    <th>INSTANSI</th>
                    <th>TEMPAT</th>
                    <th>PERIHAL</th>
                    <th>STATUS</th>
                    <th>JUMLAH PENGUNJUNG</th>
                    <th>KETERANGAN</th>
                    <th>PIC</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT master_agenda.*,master_pegawai.Nama_pegawai FROM master_pegawai JOIN master_agenda ON master_pegawai.Id_pegawai=master_agenda.Id_pegawai order by Id_agenda desc;");
                  while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                        <td><?php echo $d['Tanggal']; ?></td>
                        <td><?php echo $d['Pukul']; ?></td>
                        <td><?php echo $d['Acara']; ?></td>
                        <td><?php echo $d['Instansi']; ?></td>
                        <td><?php echo $d['Tempat']; ?></td>
                        <td><?php echo $d['Perihal']; ?></td>
                        <td><?php echo $d['Status']; ?></td>
                        <td class="text-center"><?php echo $d['Jumlah_pengunjung']; ?></td>
                        <td><?php echo $d['Keterangan']; ?></td>
                        <td><?php echo $d['Nama_pegawai']; ?></td>
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
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?> 