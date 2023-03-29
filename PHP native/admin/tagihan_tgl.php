<?php 
include 'header.php'; 
$tanggal = date('Y-m-d');
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tagihan
      <small>Data Tagihan</small>
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
            <h3 class="box-title">Transaksi Tagihan <?php echo "(".$tanggal. ")";?></h3>
            <div class="btn-group pull-right">            
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

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>OPSI</th>
                    <th>BULAN</th>
                    <th>TANGGAL</th>
                    <th>NAMA</th>
                    <th>ASAL INSTANSI</th>
                    <th>BESARAN</th>
                    <th>KEPERLUAN</th>
                    <th>STATUS</th>
                    <th>KETERANGAN</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $tanggal = date('Y-m-d');
                  $data = mysqli_query($koneksi,"SELECT master_penerimaan.* FROM master_penerimaan WHERE master_penerimaan.Status='invoice' AND master_penerimaan.Tanggal='$tanggal' ORDER BY master_penerimaan.Id_penerimaan DESC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>
                        <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_penerimaan_<?php echo $d['Id_penerimaan'] ?>">
                            <i class="fa fa-list"></i>
                        </button>  

                        <?php if($d['Bukti']==''){ ?> 

                          <?php } else { ?> 
                              <button title="View" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_penerimaan_<?php echo $d['Id_penerimaan'] ?>">
                                <i class="fa fa-eye"></i>
                              </button>
                          <?php } ?>
                        
                        <?php if($d['Drive']==''){ ?> 

                          <?php } else { ?> 
                            <a href="<?php echo $d['Drive']; ?>" title="Lihat File" target="_blank">
                              <button type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-cloud"></i>
                              </button>
                            </a>
                            <!-- <a href="<?php echo $d['Drive']; ?>" target="_blank">Lihat File</a> -->
                          <?php } ?>

                          <button title="Delete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_penerimaan_<?php echo $d['Id_penerimaan'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <!-- Modal Edit -->
                        <form action="tagihan_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_tagihan<?php echo $d['Id_penerimaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Tagihan</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>NO TANDA TERIMA</label>
                                    <input type="hidden" name="id" value="<?php echo $d['Id_penerimaan'] ?>">
                                    <input type="text" style="width:100%" name="No_tandaterima" required="required" class="form-control">
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
                                    <label>LINK DRIVE</label>
                                    <input type="text" style="width:100%" name="drive" class="form-control">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>Upload File</label>
                                    <input type="file" name="trnfoto" class="form-control"><br>
                                    <!-- <small><?php echo $d['Bukti'] ?></small> -->
                                    <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[Bukti]'>$d[Bukti]</a>";?> tidak dirubah kosongkan saja</p>
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

                        <!-- Modal lihat -->
                        <div class="modal fade" id="lihat_penerimaan_<?php echo $d['Id_penerimaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Lihat Bukti Upload</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <embed src="../gambar/bukti/<?php echo $d['Bukti']; ?>" type="application/pdf" width="100%" height="400px" />
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal detail -->
                        <div class="modal fade" id="detail_penerimaan_<?php echo $d['Id_penerimaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <th>TANGGAL</th>
                                  <td><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                                </tr>
                                <tr>
                                  <th>BULAN</th>
                                  <td><?php echo $d['Bulan']; ?></td>
                                </tr>
                                <tr>
                                  <th>NAMA</th>
                                  <td><?php echo $d['Nama_pembayar']; ?></td>
                                </tr>
                                <tr>
                                  <th>ASAL INSTANSI</th>
                                  <td><?php echo $d['Alamat_instansi']; ?></td>
                                </tr>
                                <tr>
                                  <th>BESARAN</th>
                                  <td><?php echo "Rp. ".number_format($d['Besaran_biaya'], 2, '.', ',')." ,-"; ?></td>
                                </tr>
                                <tr>
                                  <th>KEPERLUAN</th>
                                  <td><?php echo $d['Keperluan']; ?></td>
                                </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- modal edit verifikasi -->
                        <div class="modal fade" id="edit_verifikasi<?php echo $d['Id_penerimaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Anda yakin ingin memverifikasi data dengan kode <?php echo $d['No_tandaterima']?> ?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="penerimaan_prosesverif.php?id=<?php echo $d['Id_penerimaan'] ?>" class="btn btn-primary">Verifikasi</a>
                              </div>
                            </div>
                          </div>
                        </div>

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
                                <a href="tagihan_hapus.php?id=<?php echo $d['Id_penerimaan'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
                      <td><?php echo $d['Bulan']; ?></td>
                      <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                      <!-- <td><?php echo $d['No_tandaterima']; ?></td> -->
                      <!-- <td><?php echo $d['Jenis']; ?></td> -->
                      <td><?php echo $d['Nama_pembayar']; ?></td>
                      <td><?php echo $d['Alamat_instansi']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['Besaran_biaya'], 2, '.', ',')." ,-"; ?></td>
                      <td><?php echo $d['Keperluan']; ?></td>
                      <td class="text-center">
                        <button title="Bayarkan" type="button" class="btn bg-red btn-flat btn-xs" data-toggle="modal" data-target="#edit_tagihan<?php echo $d['Id_penerimaan'] ?>">Invoice</button>
                      </td>
                      <td class="text-center">
                        <?php if($d['Keterangan']=='nonverifikasi'){ ?>
                          <button title="Verifikasi" type="button" class="btn bg-orange btn-flat btn-xs" data-toggle="modal" <?php echo $d['Id_penerimaan'] ?>">Draft</button>
                        <?php } else { ?>
                          <button title="Sudah Terverifikasi" type="button" class="btn bg-blue btn-flat btn-xs" data-toggle="modal">Terverifikasi</button>
                        <?php } ?>
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
