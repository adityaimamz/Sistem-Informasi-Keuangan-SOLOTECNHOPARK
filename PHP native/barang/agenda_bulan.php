<?php include 'header.php'; 
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
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Agenda
      <small>Data Agenda <?php echo "(".$namabulan[$bulan_ini]. ")";?></small>
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

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Agenda
              </button>
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
                        <input type="date" name="tanggal"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PUKUL</label>
                        <input type="text" name="pukul" class="form-control" placeholder="mulai pukul: _____ dan selesai pukul:_____">
                    </div>
                    <div class="form-group">
                        <label>ACARA</label>
                        <input type="text" name="acara"  class="form-control" placeholder="Masukkan Acara..">
                    </div>
                    <div class="form-group">
                        <label>INSTANSI</label>
                        <input type="text" name="instansi"  class="form-control" placeholder="Masukkan Instansi..">
                    </div>
                    <div class="form-group">
                        <label>TEMPAT</label>
                        <input type="text" name="tempat" class="form-control" placeholder="Masukkan Tempat..">
                    </div>
                    <div class="form-group">
                        <label>PERIHAL</label>
                        <select name="perihal" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Kunjungan">Kunjungan</option>
                          <option value="Undangan">Undangan</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label>JUMLAH PENGUNJUNG</label>
                        <input type="number" name="jumlah_pengunjung"  class="form-control" placeholder="Masukkan Jumlah Pengunjung..">
                    </div>
                    <div class="form-group">
                        <label>KETERANGAN</label>
                        <input type="text" name="keterangan"  class="form-control" placeholder="Masukkan Keterangan..">
                    </div>
                    <div class="form-group">
                        <label>PIC</label>
                        <input type="text" name="pic"  class="form-control" placeholder="Masukkan Nama PIC..">
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
                    <th>TANGGAL</th>
                    <th>PUKUL</th>
                    <th>ACARA</th>
                    <th>INSTANSI</th>
                    <th>TEMPAT</th>
                    <th>PERIHAL</th>
                    <th>JUMLAH PENGUNJUNG</th>
                    <th>KETERANGAN</th>
                    <th>PIC</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $bulan = date('m');
                $data = mysqli_query($koneksi,"SELECT master_agenda.*, master_keterangan.Keterangan FROM master_agenda LEFT JOIN master_keterangan ON master_agenda.Id_keterangan=master_keterangan.Id_keterangan WHERE MONTH(master_agenda.Tanggal)='$bulan' order by Id_agenda desc;");
                  while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    

                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_agenda_<?php echo $d['Id_agenda'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_agenda_<?php echo $d['Id_agenda'] ?>">
                              <i class="fa fa-trash"></i>
                            </button>


                            <!-- Modal Update -->
                            <form action="agenda_update.php" method="post" enctype="multipart/form-data">
                              <div class="modal fade" id="edit_agenda_<?php echo $d['Id_agenda'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="exampleModalLabel">Edit agenda</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                        <label>TANGGAL</label>
                                        <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['Id_agenda']; ?>">
                                        <input type="text" style="width:100%" name="tanggal" class="form-control datepicker2" placeholder="Ubah Tanggal" value="<?php echo $d['Tanggal'] ?>">
                                      </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>PUKUL</label>
                                      <input type="text" style="width:100%" name="pukul" required="required" class="form-control" value="<?php echo $d['Pukul'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>ACARA</label>
                                      <input type="text" style="width:100%" name="acara" required="required" class="form-control" value="<?php echo $d['Acara'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>INSTANSI</label>
                                      <input type="text" style="width:100%" name="instansi" required="required" class="form-control" value="<?php echo $d['Instansi'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TEMPAT</label>
                                      <input type="text" style="width:100%" name="tempat" required="required" class="form-control" value="<?php echo $d['Tempat'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%; margin-bottom:20px">
                                      <label>PERIHAL</label>
                                      <select name="perihal" style="width:100%" class="form-control" >
                                      <option value="perihal"><?php echo $d['Perihal']; ?></option>
                                      <option value="Kunjungan">Kunjungan</option>
                                      <option value="Undangan">Undangan</option>
                                      </select>
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>JUMLAH PENGUNJUNG</label>
                                    <input type="text" style="width:100%" name="jumlah_pengunjung" required="required" class="form-control" placeholder="Masukkan Jumlah .." value="<?php echo $d['Jumlah_pengunjung'];?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>keterangan</label>
                                    <input type="text" style="width:100%" name="keterangan" required="required" class="form-control" placeholder="Masukkan Jumlah .." value="<?php echo $d['Keterangan'];?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>PIC</label>
                                    <input type="text" style="width:100%" name="pic" required="required" class="form-control" placeholder="Ganti nama Pic.." value="<?php echo $d['Pic'];?>">
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
                          <div class="modal fade" id="hapus_agenda_<?php echo $d['Id_agenda'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <a href="agenda_hapus.php?id=<?php echo $d['Id_agenda'] ?>" class="btn btn-primary">Hapus</a>
                                </div>
                              </div>
                            </div>
                          </div>

                      </td>
                        <td><?php echo $d['Tanggal']; ?></td>
                        <td><?php echo $d['Pukul']; ?></td>
                        <td><?php echo $d['Acara']; ?></td>
                        <td><?php echo $d['Instansi']; ?></td>
                        <td><?php echo $d['Tempat']; ?></td>
                        <td><?php echo $d['Perihal']; ?></td>
                        <td class="text-center"><?php echo $d['Jumlah_pengunjung']; ?></td>
                        <td><?php echo $d['Keterangan']; ?></td>
                        <td><?php echo $d['Pic']; ?></td>
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