<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Penerimaan
      <small>Data Penerimaan</small>
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
            <h3 class="box-title">Transaksi Penerimaan</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Penerimaan
              </button>
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

            <!-- Modal -->
            <form action="penerimaan_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Penerimaan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

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
                        <label>NO TANDA TERIMA</label>
                        <input type="number" name="No_tandaterima" required="required" class="form-control" placeholder="Masukkan No Tanda Terima ..">
                      </div>

                      <div class="form-group">
                        <label>METODE PEMBAYARAN</label>
                        <select name="metode" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <?php 
                          include 'koneksi.php';
                          $metode = mysqli_query($koneksi,"SELECT * FROM metode_bayar ORDER BY Jenis ASC");
                          while($k = mysqli_fetch_array($metode)){
                            ?>
                            <option value="<?php echo $k['Id_metode']; ?>"><?php echo $k['Jenis']; ?></option>
                            <?php 
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>TANGGAL</label>
                        <input type="text" name="tanggal" required="required" class="form-control datepicker2">
                      </div>

                      <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama" required="required" class="form-control" placeholder="Masukkan Nama ..">
                      </div>

                      <div class="form-group">
                        <label>ALAMAT/ASAL INSTANSI</label>
                        <input type="text" name="alamat" required="required" class="form-control" placeholder="Masukkan Alamat/Asak Instansi ..">
                      </div>

                      <div class="form-group">
                        <label>KEPERLUAN</label>
                        <input type="text" name="keperluan" required="required" class="form-control" placeholder="Masukkan Keperluan ..">
                      </div>

                      <div class="form-group">
                        <label>BESARAN (RUPIAH)</label>
                        <input type="number" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal ..">
                      </div>

             <!--          <div class="form-group">
                        <label>Upload File</label>
                        <input type="file" name="trnfoto" required="required" class="form-control">
                        <small>File yang di perbolehkan *PDF | *JPG | *jpeg </small>
                      </div>
 -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>


            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>BULAN</th>
                    <th>NO TANDA TERIMA</th>
                    <th>METODE BAYAR</th>
                    <th>NAMA</th>
                    <th>ASAL INSTANSI</th>
                    <th>KEPERLUAN</th>
                    <th>BESARAN</th>
                    <th>OPSI</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM master_penerimaan order by Id_penerimaan desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                      <td><?php echo $d['Bulan']; ?></td>
                      <td><?php echo $d['No_tandaterima']; ?></td>
                      <td><?php echo $d['Id_metode']; ?></td>
                      <td><?php echo $d['Nama_pembayar']; ?></td>
                      <td><?php echo $d['Alamat_instansi']; ?></td>
                      <td><?php echo $d['Keperluan']; ?></td>
                      <td><?php echo $d['Besaran_biaya']; ?></td>
                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_penerimaan_<?php echo $d['Id_penerimaan'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_penerimaan_<?php echo $d['Id_penerimaan'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_transaksi_<?php echo $d['Id_penerimaan'] ?>">
                          <i class="fa fa-eye"></i>
                        </button> -->

                        <form action="penerimaan_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_penerimaan_<?php echo $d['Id_penerimaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit penerimaan</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

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
                                    <label>NO TANDA TERIMA</label>
                                    <input type="hidden" name="id" value="<?php echo $d['Id_penerimaan'] ?>">
                                    <input type="number" style="width:100%" name="No_tandaterima" required="required" class="form-control datepicker2" value="<?php echo $d['No_tandaterima'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>METODE PEMBAYARAN</label>
                                    <select name="metode" style="width:100%" class="form-control" required="required">
                                      <option value="">- Pilih -</option>
                                      <?php 
                                      $metode = mysqli_query($koneksi,"SELECT * FROM metode_bayar ORDER BY Id_metode ASC");
                                      while($k = mysqli_fetch_array($metode)){
                                        ?>
                                        <option <?php if($d['Id_metode'] == $k['Id_metode']){echo "selected='selected'";} ?> value="<?php echo $k['Id_metode']; ?>"><?php echo $k['Jenis']; ?></option>
                                        <?php 
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>TANGGAL</label>
                                    <input type="text" style="width:100%" name="tanggal" required="required" class="form-control" placeholder="Masukkan Tanggal .." value="<?php echo $d['Tanggal'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>NAMA</label>
                                    <input type="text" style="width:100%" name="nama" required="required" class="form-control" placeholder="Masukkan Nama .." value="<?php echo $d['Nama_pembayar'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>ALAMAT/ASAL INSTANSI</label>
                                    <input type="text" style="width:100%" name="alamat" required="required" class="form-control" placeholder="Masukkan Asal Instansi .." value="<?php echo $d['Alamat_instansi'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>KEPERLUAN</label>
                                    <input type="text" style="width:100%" name="keperluan" required="required" class="form-control" placeholder="Masukkan Keperluan .." value="<?php echo $d['Keperluan'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>BESARAN (RUPIAH)</label>
                                    <input type="text" style="width:100%" name="nominal" required="required" class="form-control" placeholder="Masukkan Besaran .." value="<?php echo $d['Besaran_biaya'] ?>">
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

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_penerimaan_<?php echo $d['Id_penerimaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="penerimaan_hapus.php?id=<?php echo $d['Id_penerimaan'] ?>" class="btn btn-primary">Hapus</a>
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
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>