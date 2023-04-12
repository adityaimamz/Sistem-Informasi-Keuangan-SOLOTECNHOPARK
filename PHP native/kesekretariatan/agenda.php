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
                        <input type="date" name="tanggal" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PUKUL</label>
                        <input type="time" name="pukul" required="required" class="form-control">
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
                        <select name="Perihal" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <option value="Kunjungan">Kunjungan</option>
                          <option value="Undangan">Undangan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>STATUS</label>
                        <select name="Status" class="form-control" required="required">
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
  <select name="PIC" style="width:100%" class="form-control" required="required">
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
                    <th>OPSI</th>
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
                  $data = mysqli_query($koneksi,"SELECT master_agenda.* FROM master_agenda  ORDER BY master_agenda.Id_agenda DESC");
                  while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    
                          <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_agenda_<?php echo $d['Id_agenda'] ?>">
                              <i class="fa fa-list"></i>
                          </button>

                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_agenda_<?php echo $d['Id_agenda'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                          <?php if($d['Gambar']==''){ ?> 

                          <?php } else { ?> 
                              <button title="View" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_agenda_<?php echo $d['Id_agenda'] ?>">
                                <i class="fa fa-eye"></i>
                              </button>
                          <?php } ?>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_agenda_<?php echo $d['Id_agenda'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>

                          <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_agenda_<?php echo $d['Id_agenda'] ?>">
                            <i class="fa fa-eye"></i>
                          </button> -->

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
                                      <label>KODE agenda</label>
                                      <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama Kategori .." value="<?php echo $d['Id_agenda']; ?>">
                                      <input type="text" style="width:100%" name="kode_agenda" class="form-control" placeholder="Masukkan Nominal .." value="<?php echo $d['Kode_agenda'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>NAMA agenda</label>
                                      <input type="text" style="width:100%" name="nama_agenda" required="required" class="form-control" value="<?php echo $d['Nama_agenda'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>MERK</label>
                                      <input type="text" style="width:100%" name="merk" required="required" class="form-control" value="<?php echo $d['Merk'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TIPE</label>
                                      <input type="text" style="width:100%" name="tipe" required="required" class="form-control" value="<?php echo $d['Tipe'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TIPE</label>
                                      <input type="text" style="width:100%" name="tipe" required="required" class="form-control" value="<?php echo $d['Tipe'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>KONDISI agenda</label>
                                      <input type="text" style="width:100%" name="kondisi_agenda" required="required" class="form-control" value="<?php echo $d['Kondisi_agenda'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>LOKASI</label>
                                      <input type="text" style="width:100%" name="lokasi" required="required" class="form-control" value="<?php echo $d['Lokasi'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>pegawai</label>
                                      <select name="pegawai" style="width:100%" class="form-control" required="required">
                                        <option value="">- Pilih -</option>
                                        <?php 
                                        $pegawai = mysqli_query($koneksi,"SELECT * FROM master_pegawai ORDER BY Id_pegawai ASC");
                                        while($k = mysqli_fetch_array($pegawai)){
                                          ?>
                                          <option <?php if($d['Id_pegawai'] == $k['Id_pegawai']){echo "selected='selected'";} ?> value="<?php echo $k['Id_pegawai']; ?>"><?php echo $k['Nama_pegawai']; ?></option>
                                          <?php 
                                        }
                                        ?>
                                      </select>
                                      </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TANGGAL MASUK</label>
                                      <input type="text" style="width:100%" name="tanggal_masuk" required="required" class="form-control datepicker2" placeholder="Masukkan Nominal .." value="<?php echo $d['Tanggal_masuk'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TANGGAL_KELUAR</label>
                                      <input type="text" style="width:100%" name="tanggal_keluar" required="required" class="form-control datepicker2" placeholder="Masukkan Nominal .." value="<?php echo $d['Tanggal_keluar'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>JUMLAH agenda</label>
                                    <input type="text" style="width:100%" name="jumlah" required="required" class="form-control" placeholder="Masukkan Jumlah .." value="<?php echo $d['Jumlah'];?>">
                                  </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>UPLOAD BUKTI</label>
                                      <input type="file" name="trnfoto" class="form-control"><br>
                                      <!-- <small><?php echo $d['Bukti'] ?></small> -->
                                      <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[Gambar]'>$d[Gambar]</a>";?> tidak dirubah kosongkan saja</p>
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
                          <div class="modal fade" id="lihat_agenda_<?php echo $d['Id_agenda'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Bukti Upload</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['Gambar']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Modal detail -->
                          <div class="modal fade" id="detail_agenda_<?php echo $d['Id_agenda'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <th>KODE agenda</th>
                                    <td><?php echo $d['Kode_agenda']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>NAMA agenda</th>
                                    <td><?php echo $d['Nama_agenda']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>TANGGAL MASUK</th>
                                    <td><?php echo date('d-m-Y', strtotime($d['Tanggal_masuk'])); ?></td>
                                  </tr>
                                  <tr>
                                    <th>TANGGAL KELUAR</th>
                                    <td><?php echo date('d-m-Y', strtotime($d['Tanggal_keluar'])); ?></td>
                                  </tr>
                                  <tr>
                                    <th>MERK</th>
                                    <td><?php echo $d['Merk']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>TIPE</th>
                                    <td><?php echo $d['Tipe']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>JUMLAH agenda</th>
                                    <td><?php echo $d['Jumlah']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>KONDISI agenda</th>
                                    <td><?php echo $d['Kondisi_agenda']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>LOKASI</th>
                                    <td><?php echo $d['Lokasi']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>pegawai</th>
                                    <td><?php echo $d['Nama_pegawai']; ?></td>
                                  </tr>
                                  </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>

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
                        <!-- <td><?php echo $d['Kode_agenda']; ?></td> -->
                        <td><?php echo $d['Nama_agenda']; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal_masuk'])); ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal_keluar'])); ?></td>
                        <td class="text-center"><?php echo $d['Jumlah']; ?></td>
                        <!-- <td><?php echo $d['Merk']; ?></td> -->
                        <!-- <td><?php echo $d['Tipe']; ?></td> -->
                        <td><?php echo $d['Kondisi_agenda']; ?></td>
                        <td><?php echo $d['Lokasi']; ?></td>
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