<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Data Barang</small>
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
            <h3 class="box-title">Transaksi Barang</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Barang
              </button>
              &nbsp
            <a href="barang_csv.php"><button type="button" class="btn btn-success btn-sm">
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
            <form action="barang_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Barang</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                              <div class="form-group">
                                  <label>NAMA BARANG</label>
                                  <input type="text" name="nama_barang" required="required" class="form-control" placeholder="Masukkan Nama Barang ..">
                              </div>

                              <div class="form-group">
                                  <label>NAMA GEDUNG</label>
                                  <input type="text" name="nama_gedung" required="required" class="form-control" placeholder="Masukkan Nama Gedung ..">
                              </div>

                              <div class="form-group">
                                  <label>NAMA RUANGAN/AREA</label>
                                  <input type="text" name="nama_ruangan_area" required="required" class="form-control" placeholder="Masukkan Nama Ruangan/Area ..">
                              </div>

                              <div class="form-group">
                                  <label>TANGGAL MASUK</label>
                                  <input type="text" name="tanggal_masuk" required="required" class="form-control datepicker2">
                              </div>

                              <div class="form-group">
                                  <label>TANGGAL KELUAR</label>
                                  <input type="text" name="tanggal_keluar" required="required" class="form-control datepicker2">
                              </div>

                              <div class="form-group">
                                  <label>JENIS MERK TIPE</label>
                                  <input type="text" name="jenis_merk_tipe" required="required" class="form-control" placeholder="Masukkan Jenis Merk Tipe Barang ..">
                              </div>

                              <div class="form-group">
                                  <label>KODE LABEL STP</label>
                                  <input type="text" name="kode_label_stp" required="required" class="form-control" placeholder="Masukkan Kode Label STP Barang ..">
                              </div>

                              <div class="form-group">
                                  <label>KODE LABEL PEMKOT</label>
                                  <input type="text" name="kode_label_pemkot" required="required" class="form-control" placeholder="Masukkan Kode Label Pemkot Barang ..">
                              </div>

                              <div class="form-group">
                                  <label>JUMLAH BARANG</label>
                                  <input type="text" name="jumlah_barang" required="required" class="form-control" placeholder="Masukkan Jumlah Barang ..">
                              </div>

                              <div class="form-group">
                                  <label>GAMBAR</label>
                                  <input type="file" name="gambar" required="required" class="form-control">
                                  <small>File yang di perbolehkan *PDF | *JPG | *jpeg | *PNG</small>
                              </div>

                              <div class="form-group">
                                  <label>DRIVE</label>
                                  <input type="text" name="drive" required="required" class="form-control" placeholder="Masukkan Drive Barang ..">
                              </div>

                              <div class="form-group">
                                  <label>KONDISI BARANG</label>
                                  <select name="kondisi_barang" class="form-control" required="required">
                                      <option value="">- Pilih -</option>
                                      <option value="baik">Baik</option>
                                      <option value="rusak">Rusak</option>
                                  </select>
                              </div>

                        <div class="form-group">
                        <label>CATATAN</label>
                        <input type="text" name="catatan" required="required" class="form-control" placeholder="Masukkan Catatan ..">
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
                    <th>OPSI</th>>
                    <th>NAMA BARANG</th>
                    <th>NAMA GEDUNG</th>
                    <th>JENIS/MERK/TIPE</th>
                    <th>JUMLAH BARANG</th>
                    <th>KONDISI BARANG</th>
                    <th>CATATAN</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($koneksi, "SELECT * FROM master_barang ORDER BY Id_barang DESC;");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    
                          <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_barang_<?php echo $d['Id_barang'] ?>">
                              <i class="fa fa-list"></i>
                          </button>

                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                          <?php if($d['Gambar']==''){ ?> 

                          <?php } else { ?> 
                              <button title="View" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_barang_<?php echo $d['Id_barang'] ?>">
                                <i class="fa fa-eye"></i>
                              </button>
                          <?php } ?>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>

                          <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-eye"></i>
                          </button> -->

                          <!-- Modal Update -->
                          <form action="barang_update.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="edit_barang_<?php echo $d['Id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Edit barang</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                                                        <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>NAMA BARANG</label>
                                          <input type="text" style="width:100%" name="nama_barang" required="required" class="form-control" value="<?php echo $d['Nama_barang'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>NAMA GEDUNG</label>
                                          <input type="text" style="width:100%" name="nama_gedung" required="required" class="form-control" value="<?php echo $d['Nama_gedung'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>NAMA RUANGAN/AREA</label>
                                          <input type="text" style="width:100%" name="nama_ruanganarea" required="required" class="form-control" value="<?php echo $d['Nama_ruanganarea'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>TANGGAL MASUK</label>
                                          <input type="text" style="width:100%" name="tanggal_masuk" required="required" class="form-control datepicker2" placeholder="Masukkan Nominal .." value="<?php echo $d['Tanggal_masuk'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>TANGGAL KELUAR</label>
                                          <input type="text" style="width:100%" name="tanggal_keluar" required="required" class="form-control datepicker2" placeholder="Masukkan Nominal .." value="<?php echo $d['Tanggal_keluar'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>JENIS MERK TIPE</label>
                                          <input type="text" style="width:100%" name="jenis_merk_tipe" required="required" class="form-control" value="<?php echo $d['JenisMerkTipe'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>KODE LABEL STP</label>
                                          <input type="text" style="width:100%" name="kode_label_stp" required="required" class="form-control" value="<?php echo $d['Kode_label_STP'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>KODE LABEL PEMKOT</label>
                                          <input type="text" style="width:100%" name="kode_label_pemkot" required="required" class="form-control" value="<?php echo $d['Kode_label_pemkot'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                          <label>KONDISI BARANG</label>
                                          <input type="text" style="width:100%" name="kondisi_barang" required="required" class="form-control" value="<?php echo $d['Kondisi_barang'] ?>">
                                      </div>

                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                        <label>CATATAN</label>
                                        <input type="text" style="width:100%" name="catatan" required="required" class="form-control" value="<?php echo $d['Catatan'] ?>">
                                      </div>
                                      <div class="form-group" style="width:100%;margin-bottom:20px">
                                        <label>JUMLAH BARANG</label>
                                        <input type="text" style="width:100%" name="jumlah_barang" required="required" class="form-control" value="<?php echo $d['Jumlah_barang'] ?>">
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
                          <div class="modal fade" id="lihat_barang_<?php echo $d['Id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <div class="modal fade" id="detail_barang_<?php echo $d['Id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <th>NAMA BARANG</th>
                                    <td><?php echo $d['Nama_barang']; ?></td>
                                </tr>
                                <tr>
                                    <th>NAMA GEDUNG</th>
                                    <td><?php echo $d['Nama_gedung']; ?></td>
                                </tr>
                                <tr>
                                    <th>NAMA RUANGAN/AREA</th>
                                    <td><?php echo $d['Nama_ruanganarea']; ?></td>
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
                                    <th>JENIS/MERK/TIPE</th>
                                    <td><?php echo $d['JenisMerkTipe']; ?></td>
                                </tr>
                                <tr>
                                    <th>KODE LABEL STP</th>
                                    <td><?php echo $d['Kode_label_STP']; ?></td>
                                </tr>
                                <tr>
                                    <th>KODE LABEL PEMKOT</th>
                                    <td><?php echo $d['Kode_label_pemkot']; ?></td>
                                </tr>
                                <tr>
                                    <th>JUMLAH BARANG</th>
                                    <td><?php echo $d['Jumlah_barang']; ?></td>
                                </tr>
                                <tr>
                                    <th>KONDISI BARANG</th>
                                    <td><?php echo $d['Kondisi_barang']; ?></td>
                                </tr>
                                <tr>
                                  <th>CATATAN</th>
                                  <td><?php echo $d['Catatan']; ?></td>
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
                          <div class="modal fade" id="hapus_barang_<?php echo $d['Id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <a href="barang_hapus.php?id=<?php echo $d['Id_barang'] ?>" class="btn btn-primary">Hapus</a>
                                </div>
                              </div>
                            </div>
                          </div>

                      </td>
                      <td><?php echo $d['Nama_barang']; ?></td>
                    <td><?php echo $d['Nama_gedung']; ?></td>
                    <td><?php echo $d['JenisMerkTipe']; ?></td>
                    <td class="text-center"><?php echo $d['Jumlah_barang']; ?></td>
                    <td><?php echo $d['Kondisi_barang']; ?></td>
                    <td><?php echo $d['Catatan']; ?></td>
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