<?php 
include 'header.php'; 
$tahun = date('Y');
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Surat Masuk
      <small>Data Surat Masuk UPT Solo Technopark</small>
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
            <h3 class="box-title">Daftar Surat Masuk <?php echo "(".$tahun. ")";?></h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Surat
              </button>
              &nbsp

              <a href="surat_masuk_csv.php"><button type="button" class="btn btn-success btn-sm">
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
            <!-- Modal Tambah -->
            <form action="surat_masuk_proses.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Suratmasuk</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                      <label>NO SURAT MASUK</label>
                      <input type="text" name="no_suratmasuk" class="form-control" placeholder="Masukkan No Surat Masuk ..">
                    </div>
                    <div class="form-group">
                      <label>NOMOR SURAT</label>
                      <input type="text" name="nomor_surat" class="form-control" placeholder="Masukkan Nomor Surat ..">
                    </div>
                    <div class="form-group">
                      <label>TANGGAL</label>
                      <input type="text" name="tanggal" required="required" class="form-control datepicker2">
                    </div>
                    <div class="form-group">
                      <label>PERIHAL</label>
                      <input type="text" name="perihal" required="required" class="form-control" placeholder="Masukkan Perihal ..">
                    </div>
                    <div class="form-group">
                      <label>TERIMA DARI</label>
                      <input type="text" name="terima_dari" required="required" class="form-control" placeholder="Masukkan Nama Penerima ..">
                    </div>
                    <div class="form-group">
                      <label>ISI</label>
                      <input type="text" name="isi" required="required" class="form-control" placeholder="Masukkan Isi Surat ..">
                    </div>
                    <div class="form-group">
                      <label>TANGGAL DITERUSKAN</label>
                      <input type="text" name="tanggal_diteruskan" required="required" class="form-control datepicker2">
                    </div>
                    <div class="form-group">
                      <label>CATATAN</label>
                      <input type="text" name="catatan" class="form-control" placeholder="Masukkan Catatan ..">
                    </div>
                    <div class="form-group">
                      <label>KATEGORI </label>
                      <select name="kategori" class="form-control" required="required">
                              <option value="">- Pilih -</option>
                              <option value="Permohonan">Permohonan</option>
                              <option value="Kunjungan">Kunjungan</option>
                              <option value="Undangan">Undangan</option>
                              <option value="Jawaban">Jawaban</option>
                              <option value="Berita_acara">Berita Acara</option>
                            </select>
                    </div>
                    <div class="form-group">
                      <label>TANGGAL PELAKSANAAN</label>
                      <input type="text" name="tgl_pelaksanaan" required="required" class="form-control datepicker2">
                    </div>
                    <div class="form-group">
                      <label>WAKTU PELAKSANAAN</label>
                      <input type="text" name="waktu_pelaksanaan" class="form-control" placeholder="Masukkan Waktu Pelaksanaan ..">
                    </div>
                    <div class="form-group">
                      <label>TEMPAT PELAKSANAAN</label>
                      <input type="text" name="tempat_pelaksanaan" class="form-control" placeholder="Masukkan Tempat Pelaksanaan ..">
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
                    <th>NO SURAT MASUK</th>
                    <th>NOMOR SURAT</th>
                    <th>TANGGAL</th>
                    <th>PERIHAL</th>
                    <th>TERIMA DARI</th>
                    <th>ISI</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $tahun = date('Y');
                  $data = mysqli_query($koneksi,"SELECT surat_masuk.* FROM surat_masuk WHERE YEAR(surat_masuk.Tanggal)='$tahun' ORDER BY surat_masuk.Id_Suratmasuk DESC");
                  while($d = mysqli_fetch_array($data)){
                      ?>
  
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    
                      <button title="Detail" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_Suratmasuk_<?php echo $d['Id_Suratmasuk'] ?>">
                            <i class="fa fa-list"></i>
                        </button>

                        <button title="Edit" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_Suratmasuk_<?php echo $d['Id_Suratmasuk'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button title="Delete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_Suratmasuk_<?php echo $d['Id_Suratmasuk'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <!-- Modal Edit -->
                        <form action="surat_masuk_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_Suratmasuk_<?php echo $d['Id_Suratmasuk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Suratmasuk</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>NO SURAT MASUK</label>
                                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['Id_Suratmasuk']; ?>">
                                    <input type="text" name="no_suratmasuk" class="form-control" placeholder="Masukkan No Surat Masuk .." value="<?php echo $d['No_Suratmasuk'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>NOMOR SURAT</label>
                                    <input type="text" name="nomor_surat" class="form-control" placeholder="Masukkan Nomor Surat .." value="<?php echo $d['Nomor_surat'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>TANGGAL</label>
                                    <input type="text" name="tanggal" required="required" class="form-control datepicker2" value="<?php echo $d['Tanggal'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>PERIHAL</label>
                                    <input type="text" name="perihal" required="required" class="form-control" placeholder="Masukkan Perihal .." value="<?php echo $d['Perihal'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>TERIMA DARI</label>
                                    <input type="text" name="terima_dari" required="required" class="form-control" placeholder="Masukkan Nama Penerima .." value="<?php echo $d['Terima_dari'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>ISI</label>
                                    <input type="text" name="isi" required="required" class="form-control" placeholder="Masukkan Isi Surat .." value="<?php echo $d['Isi'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>TANGGAL DITERUSKAN</label>
                                    <input type="text" name="tanggal_diteruskan" required="required" class="form-control datepicker2" value="<?php echo $d['Tanggal_diteruskan'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>CATATAN</label>
                                    <input type="text" name="catatan" class="form-control" placeholder="Masukkan Catatan .." value="<?php echo $d['Catatan'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>KATEGORI </label>
                                    <select name="kategori" style="width:100%" class="form-control" required="required">
                                      <option value="kategori"><?php echo $d['Kategori']; ?></option>
                                      <option value="Permohonan">Permohonan</option>
                                      <option value="Kunjungan">Kunjungan</option>
                                      <option value="Undangan">Undangan</option>
                                      <option value="Jawaban">Jawaban</option>
                                      <option value="Berita_acara">Berita Acara</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>TANGGAL PELAKSANAAN</label>
                                    <input type="text" name="tgl_pelaksanaan" required="required" class="form-control datepicker2" value="<?php echo $d['Tanggal_pelaksanaan'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>WAKTU PELAKSANAAN</label>
                                    <input type="text" name="waktu_pelaksanaan" class="form-control" placeholder="Masukkan Waktu Pelaksanaan .." value="<?php echo $d['Waktu_pelaksanaan'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>TEMPAT PELAKSANAAN</label>
                                    <input type="text" name="tempat_pelaksanaan" class="form-control" placeholder="Masukkan Tempat Pelaksanaan .." value="<?php echo $d['Tempat_pelaksanaan'] ?>">
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

                        <!-- Modal detail -->
                        <div class="modal fade" id="detail_Suratmasuk_<?php echo $d['Id_Suratmasuk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <th>NOMOR SURAT MASUK</th>
                                  <td><?php echo $d['No_Suratmasuk']; ?></td>
                                </tr>
                                <tr>
                                  <th>NOMOR SURAT</th>
                                  <td><?php echo $d['Nomor_surat']; ?></td>
                                </tr>
                                <tr>
                                  <th>PERIHAL</th>
                                  <td><?php echo $d['Perihal']; ?></td>
                                </tr>
                                <tr>
                                  <th>TERIMA DARI</th>
                                  <td><?php echo $d['Terima_dari']; ?></td>
                                </tr>
                                <tr>
                                  <th>ISI</th>
                                  <td><?php echo $d['Isi']; ?></td>
                                </tr>
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
                        <div class="modal fade" id="hapus_Suratmasuk_<?php echo $d['Id_Suratmasuk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="surat_masuk_hapus.php?id=<?php echo $d['Id_Suratmasuk'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td><?php echo $d['No_Suratmasuk']; ?></td>
                      <td><?php echo $d['Nomor_surat']; ?></td>
                      <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                      <td><?php echo $d['Perihal']; ?></td>
                      <td><?php echo $d['Terima_dari']; ?></td>
                      <td><?php echo $d['Isi']; ?></td>
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
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>