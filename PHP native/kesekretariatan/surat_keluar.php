<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Surat Keluar
      <small>Data Surat Keluar UPT Solo Technopark</small>
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
            <h3 class="box-title">Daftar Surat Masuk</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Surat
              </button>
              &nbsp

              <a href="Suratkeluar_csv.php"><button type="button" class="btn btn-success btn-sm">
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
          <form action="surat_keluar_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Suratkeluar</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                          <div class="form-group">
                              <label>NO SURAT KELUAR</label>
                              <input type="text" name="Nomor_Suratkeluar" required="required" class="form-control" placeholder="Masukkan No Surat Keluar ..">
                          </div>
                          <div class="form-group">
                          <label>TANGGAL</label>
                        <input type="date" name="tanggal" required="required" class="form-control" >
                          </div>

                          <div class="form-group">
                              <label>PERIHAL</label>
                              <input type="text" name="rincian" required="required" class="form-control" placeholder="Masukkan Perihal ..">
                          </div>
                          <div class="form-group">
                              <label>KEPADA</label>
                              <input type="text" name="kepada" required="required" class="form-control" placeholder="Masukkan Kepada ..">
                          </div>
                          <div class="form-group">
                              <label>CATATAN</label>
                              <input type="text" name="catatan" required="required" class="form-control" placeholder="Masukkan Catatan ..">
                          </div>
                          <div class="form-group">
                          <label>KATEGORI</label>
                            <select name="kategori" class="form-control" required="required">
                              <option value="">- Pilih -</option>
                              <option value="Permohonan">Permohonan</option>
                              <option value="Kunjungan">Kunjungan</option>
                              <option value="Berita Acara ">Undangan</option>
                              <option value="Berita Acara ">Jawaban</option>
                              <option value="Berita Acara ">Berita Acara</option>
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
                    <th>NO SURAT KELUAR</th>
                    <th>TANGGAL</th>
                    <th>PERIHAL</th>
                    <th>KEPADA</th>
                    <th>CATATAN</th>
                    <th>KATEGORI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($koneksi,"SELECT surat_keluar.* FROM surat_keluar  ORDER BY surat_keluar.id_Suratkeluar DESC");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    

                        <button title="Edit" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_Suratkeluar_"<?php echo $d['id_Suratkeluar'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button title="Delete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_Suratkeluar_"_<?php echo $d['id_Suratkeluar'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>


                          <!-- Modal Edit -->
                        <form action="surat_keluar_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_Suratkeluar_<?php echo $d['id_Suratkeluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Suratkeluar</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>TANGGAL</label>
                                    <input type="text" style="width:100%" name="tanggal" required="required" class="form-control" placeholder="Masukkan Tanggal .." value="<?php echo $d['Tanggal'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <input type="hidden" name="id" value="<?php echo $d['id_Suratkeluar'] ?>">
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
                                    <label>LINK DRIVE</label>
                                    <input type="text" style="width:100%" name="drive" class="form-control" placeholder="Masukkan Link Drive File Anda .." value="<?php echo $d['Drive'] ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>BESARAN (RUPIAH)</label>
                                    <input type="text" style="width:100%" name="nominal" required="required" class="form-control" placeholder="Masukkan Besaran .." value="<?php echo $d['Besaran_biaya'];?>">
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
                        <div class="modal fade" id="lihat_Suratkeluar_<?php echo $d['id_Suratkeluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="modal fade" id="detail_Suratkeluar_<?php echo $d['id_Suratkeluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <th>TANGGAL DITERUSKAN</th>
                                  <td><?php echo $d['Tanggal_diteruskan']; ?></td>
                                </tr>
                                <tr>
                                  <th>CATATAN</th>
                                  <td><?php echo $d['Catatan']; ?></td>
                                </tr>
                                <tr>
                                  <th>KATEGORI</th>
                                  <td><?php echo $d['Kategori']; ?></td>
                                </tr>
                                <tr>
                                  <th>TANGGAL PELAKSANAAN</th>
                                  <td><?php echo $d['Tgl_pelaksanaan']; ?></td>
                                </tr>
                                <tr>
                                  <th>WAKTU PELAKSANAAN</th>
                                  <td><?php echo $d['Waktu_pelaksanaan']; ?></td>
                                </tr>
                                <tr>
                                  <th>TEMPAT PELAKSANAAN</th>
                                  <td><?php echo $d['Tempat_pelaksanaan']; ?></td>
                                </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_Suratkeluar_<?php echo $d['id_Suratkeluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="surat_keluar_hapus.php?id=<?php echo $d['id_Suratkeluar'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- modal edit verifikasi -->
                        <div class="modal fade" id="edit_verifikasi<?php echo $d['id_Suratkeluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="Suratkeluar_prosesverif.php?id=<?php echo $d['id_Suratkeluar'] ?>" class="btn btn-primary">Verifikasi</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
                        <!-- <td><?php echo $d['id_Suratkeluar']; ?></td> -->
                        <td><?php echo $d['Nomor_Suratkeluar']; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                        <td><?php echo $d['Perihal']; ?></td>
                        <td><?php echo $d['Kepada']; ?></td>
                        <td><?php echo $d['Catatan']; ?></td>
                        <td><?php echo $d['Kategori']; ?></td>
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
