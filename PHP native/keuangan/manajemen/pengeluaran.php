<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Pengeluaran
      <small>Data Pengeluaran</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Transaksi Pengeluaran</h3>
            <div class="btn-group pull-right">            

            </div><hr>
          </div>

          <div class="box-body">

            <!-- Modal Tambah-->
            <form action="pengeluaran_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                        <label>SUMBER DANA</label>
                        <select name="sumberdana" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <?php 
                          include 'koneksi.php';
                          $sumberdana = mysqli_query($koneksi,"SELECT * FROM master_sumberdana ORDER BY Jenis ASC");
                          while($k = mysqli_fetch_array($sumberdana)){
                            ?>
                            <option value="<?php echo $k['Id_sumberdana']; ?>"><?php echo $k['Jenis']; ?></option>
                            <?php 
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>DIVISI</label>
                        <select name="divisi" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <?php 
                          include 'koneksi.php';
                          $divisi = mysqli_query($koneksi,"SELECT * FROM master_divisi ORDER BY Nama_divisi ASC");
                          while($k = mysqli_fetch_array($divisi)){
                            ?>
                            <option value="<?php echo $k['Id_divisi']; ?>"><?php echo $k['Nama_divisi']; ?></option>
                            <?php 
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>BULAN</label>
                        <select name="bulan" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <option value="Januari">Januari</option>
                          <option value="Februari">Februari</option>
                          <option value="Maret">Maret</option>
                          <option value="April">April</option>
                          <option value="Mei">Mei</option>
                          <option value="Juni">Juni</option>
                          <option value="Juli">Juli</option>
                          <option value="Agustus">Agustus</option>
                          <option value="September">September</option>
                          <option value="Oktober">Oktober</option>
                          <option value="November">November</option>
                          <option value="Desember">Desember</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>TANGGAL SPJ</label>
                        <input type="text" name="tanggal" required="required" class="form-control datepicker2">
                      </div>

                      <div class="form-group">
                        <label>JENIS BELANJA</label>
                        <select name="jenis" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <option value="Barang/Jasa">Barang/Jasa</option>
                          <option value="Modal">Modal</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>RINCIAN BELANJA</label>
                        <input type="text" name="rincian" required="required" class="form-control" placeholder="Masukkan Rincian ..">
                      </div>

                      <div class="form-group">
                        <label>JUMLAH (RUPIAH)</label>
                        <input type="number" name="jumlah" required="required" class="form-control" placeholder="Masukkan Nominal ..">
                      </div>

                      <div class="form-group">
                        <label>Upload Bukti</label>
                        <input type="file" name="trnfoto" required="required" class="form-control">
                        <small>File yang di perbolehkan *PDF | *JPG | *jpeg </small>
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
                    <th>KODE PENGELUARAN</th>
                    <th>SUMBER DANA</th>
                    <th>DIVISI</th>
                    <th>BULAN</th>
                    <th>TANGGAL SPJ</th>
                    <th>JENIS BELANJA</th>
                    <th>JUMLAH (RUPIAH)</th>
                    <th>RINCIAN</th>
                    <th>OPSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($koneksi,"SELECT master_pengeluaran.*, master_divisi.Nama_divisi, master_sumberdana.Jenis FROM master_pengeluaran, master_divisi, master_sumberdana WHERE master_divisi.Id_divisi=master_pengeluaran.Id_divisi AND master_pengeluaran.Id_sumberdana=master_sumberdana.Id_sumberdana order by Id_pengeluaran desc");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $d['Kode_pengeluaran']; ?></td>
                        <td><?php echo $d['Jenis']; ?></td>
                        <td><?php echo $d['Nama_divisi']; ?></td>
                        <td><?php echo $d['Bulan']; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                        <td><?php echo $d['Jenis_belanja']; ?></td>
                        <td><?php echo "Rp. ".number_format($d['Jumlah'])." ,-";?></td>
                        <td><?php echo $d['Rincian']; ?></td>
                        <td>    

                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_pengeluaran_<?php echo $d['Id_pengeluaran'] ?>">
                            <i class="fa fa-eye"></i>
                          </button>

                          <!-- Modal Update -->
                          <form action="pengeluaran_update.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="edit_pengeluaran_<?php echo $d['Id_pengeluaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Edit pengeluaran</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>SUMBER DANA</label>
                                      <select name="sumberdana" style="width:100%" class="form-control" required="required">
                                        <option value="">- Pilih -</option>
                                        <?php 
                                        $sumberdana = mysqli_query($koneksi,"SELECT * FROM master_sumberdana ORDER BY Id_sumberdana ASC");
                                        while($k = mysqli_fetch_array($sumberdana)){
                                          ?>
                                          <option <?php if($d['Id_sumberdana'] == $k['Id_sumberdana']){echo "selected='selected'";} ?> value="<?php echo $k['Id_sumberdana']; ?>"><?php echo $k['Jenis']; ?></option>
                                          <?php 
                                        }
                                        ?>
                                      </select>
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>DIVISI</label>
                                      <select name="divisi" style="width:100%" class="form-control" required="required">
                                        <option value="">- Pilih -</option>
                                        <?php 
                                        $divisi = mysqli_query($koneksi,"SELECT * FROM master_divisi ORDER BY Id_divisi ASC");
                                        while($k = mysqli_fetch_array($divisi)){
                                          ?>
                                          <option <?php if($d['Id_divisi'] == $k['Id_divisi']){echo "selected='selected'";} ?> value="<?php echo $k['Id_divisi']; ?>"><?php echo $k['Nama_divisi']; ?></option>
                                          <?php 
                                        }
                                        ?>
                                      </select>
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>BULAN</label>
                                      <select name="bulan" style="width:100%" class="form-control" required="required">
                                        <option value="">- Pilih -</option>
                                        <option <?php if($d['Bulan'] == "Januari"){echo "selected='selected'";} ?> value="Januari">Januari</option>
                                        <option <?php if($d['Bulan'] == "Februari"){echo "selected='selected'";} ?> value="Februari">Februari</option>
                                        <option <?php if($d['Bulan'] == "Maret"){echo "selected='selected'";} ?> value="Maret">Maret</option>
                                        <option <?php if($d['Bulan'] == "April"){echo "selected='selected'";} ?> value="April">April</option>
                                        <option <?php if($d['Bulan'] == "Mei"){echo "selected='selected'";} ?> value="Mei">Mei</option>
                                        <option <?php if($d['Bulan'] == "Juni"){echo "selected='selected'";} ?> value="Juni">Juni</option>
                                        <option <?php if($d['Bulan'] == "Juli"){echo "selected='selected'";} ?> value="Juli">Juli</option>
                                        <option <?php if($d['Bulan'] == "Agustus"){echo "selected='selected'";} ?> value="Agustus">Agustus</option>
                                        <option <?php if($d['Bulan'] == "September"){echo "selected='selected'";} ?> value="September">September</option>
                                        <option <?php if($d['Bulan'] == "Oktober"){echo "selected='selected'";} ?> value="Oktober">Oktober</option>
                                        <option <?php if($d['Bulan'] == "November"){echo "selected='selected'";} ?> value="November">November</option>
                                        <option <?php if($d['Bulan'] == "Desember"){echo "selected='selected'";} ?> value="Desember">Desember</option>
                                      </select>
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TANGGAL</label>
                                      <input type="text" style="width:100%" name="tanggal" required="required" class="form-control datepicker2" placeholder="Masukkan Nominal .." value="<?php echo $d['Tanggal'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>JENIS BELANJA</label>
                                      <select name="jenis" style="width:100%" class="form-control" required="required">
                                        <option value="">- Pilih -</option>
                                        <option <?php if($d['Jenis_belanja'] == "Barang/Jasa"){echo "selected='selected'";} ?> value="Barang/Jasa">Barang/Jasa</option>
                                        <option <?php if($d['Jenis_belanja'] == "Modal"){echo "selected='selected'";} ?> value="Modal">Modal</option>
                                      </select>
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>RINCIAN BELANJA</label>
                                      <input type="text" style="width:100%" name="rincian" required="required" class="form-control" placeholder="Masukkan Nominal .." value="<?php echo $d['Rincian'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <input type="hidden" name="id" value="<?php echo $d['Id_pengeluaran'] ?>">
                                      <label>JUMLAH (RUPIAH)</label>
                                      <input type="text" style="width:100%" name="jumlah" required="required" class="form-control" placeholder="Masukkan Nominal .." value="<?php echo $d['Jumlah']; ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>Upload File</label>
                                      <input type="file" name="trnfoto" class="form-control"><br>
                                      <!-- <small><?php echo $d['Bukti'] ?></small> -->
                                      <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[Bukti_lpj]'>$d[Bukti_lpj]</a>";?> tidak dirubah kosongkan saja</p>
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
                          <div class="modal fade" id="lihat_pengeluaran_<?php echo $d['Id_pengeluaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Bukti Upload</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['Bukti_lpj']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Modal Hapus -->
                          <div class="modal fade" id="hapus_pengeluaran_<?php echo $d['Id_pengeluaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <a href="pengeluaran_hapus.php?id=<?php echo $d['Id_pengeluaran'] ?>" class="btn btn-primary">Hapus</a>
                                </div>
                              </div>
                            </div>
                          </div>

                      </td>
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