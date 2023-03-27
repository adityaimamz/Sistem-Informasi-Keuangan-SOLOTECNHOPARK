<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Data Barang</small>
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
                        <label>KODE BARANG</label>
                        <input type="text" name="kode_barang" required="required" class="form-control" placeholder="Masukkan Kode Barang ..">
                      </div>

                    <div class="form-group">
                        <label>NAMA BARANG</label>
                        <input type="text" name="nama_barang" required="required" class="form-control" placeholder="Masukkan Nama Barang ..">
                      </div>

                      <div class="form-group">
                        <label>MERK</label>
                        <input type="text" name="merk" required="required" class="form-control" placeholder="Masukkan Merk Barang ..">
                      </div>

                      <div class="form-group">
                        <label>TIPE</label>
                        <input type="text" name="tipe" required="required" class="form-control" placeholder="Masukkan Tipe Barang ..">
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
                        <label>LOKASI</label>
                        <input type="text" name="lokasi" required="required" class="form-control" placeholder="Masukkan Lokasi ..">
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
                        <label>TANGGAL MASUK</label>
                        <input type="text" name="tanggal_masuk" required="required" class="form-control datepicker2">
                      </div>

                      <div class="form-group">
                        <label>TANGGAL KELUAR</label>
                        <input type="text" name="tanggal_keluar" required="required" class="form-control datepicker2">
                      </div>

                      <div class="form-group">
                        <label>JUMLAH BARANG</label>
                        <input type="text" name="jumlah" required="required" class="form-control" placeholder="Masukkan Jumlah Barang ..">
                      </div>


                      <div class="form-group">
                        <label>UPLOAD BUKTI</label>
                        <input type="file" name="trnfoto" required="required" class="form-control">
                        <small>File yang di perbolehkan *PDF | *JPG | *jpeg | *PNG</small>
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
                    <th>OPSI</th>
                    <th>NO</th>
                    <th>KODE BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>MERK</th>
                    <th>TIPE</th>
                    <th>KONDISI BARANG</th>
                    <th>LOKASI</th>
                    <th>DIVISI</th>
                    <th>TANGGAL MASUK</th>
                    <th>TANGGAL KELUAR</th>
                    <th>JUMLAH BARANG</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($koneksi,"SELECT master_barang.*,master_divisi.Nama_divisi FROM master_divisi JOIN master_barang ON master_divisi.Id_divisi=master_barang.Id_divisi order by Id_barang desc;");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td>    
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>

                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_barang_<?php echo $d['Id_barang'] ?>">
                            <i class="fa fa-eye"></i>
                          </button>

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
                                      <label>KODE BARANG</label>
                                      <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama Kategori .." value="<?php echo $d['Id_barang']; ?>">
                                      <input type="text" style="width:100%" name="kode_barang" class="form-control" placeholder="Masukkan Nominal .." value="<?php echo $d['Kode_barang'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>NAMA BARANG</label>
                                      <input type="text" style="width:100%" name="nama_barang" required="required" class="form-control" value="<?php echo $d['Nama_barang'] ?>">
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
                                      <label>KONDISI BARANG</label>
                                      <input type="text" style="width:100%" name="kondisi_barang" required="required" class="form-control" value="<?php echo $d['Kondisi_barang'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>LOKASI</label>
                                      <input type="text" style="width:100%" name="lokasi" required="required" class="form-control" value="<?php echo $d['Lokasi'] ?>">
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
                                      <label>TANGGAL MASUK</label>
                                      <input type="text" style="width:100%" name="tanggal_masuk" required="required" class="form-control datepicker2" placeholder="Masukkan Nominal .." value="<?php echo $d['Tanggal_masuk'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TANGGAL_KELUAR</label>
                                      <input type="text" style="width:100%" name="tanggal_keluar" required="required" class="form-control datepicker2" placeholder="Masukkan Nominal .." value="<?php echo $d['Tanggal_keluar'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>JUMLAH BARANG</label>
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
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td><?php echo $d['Kode_barang']; ?></td>
                        <td><?php echo $d['Nama_barang']; ?></td>
                        <td><?php echo $d['Merk']; ?></td>
                        <td><?php echo $d['Tipe']; ?></td>
                        <td><?php echo $d['Kondisi_barang']; ?></td>
                        <td><?php echo $d['Lokasi']; ?></td>
                        <td><?php echo $d['Nama_divisi']; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal_masuk'])); ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal_keluar'])); ?></td>
                        <td class="text-center"><?php echo $d['Jumlah']; ?></td>
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