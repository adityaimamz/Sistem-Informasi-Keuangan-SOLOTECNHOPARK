<?php include 'header.php'; 
$tahun = date('Y');
?>

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
            <h3 class="box-title">Daftar Surat Keluar  <?php echo "(".$tahun. ")";?></h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Surat
              </button>
              &nbsp
            <a href="surat_keluar_csv.php"><button type="button" class="btn btn-success btn-sm">
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
                              <input type="text" name="no_surat" required="required" class="form-control" placeholder="Masukkan No Surat Keluar ..">
                          </div>
                          <div class="form-group">
                          <label>TANGGAL</label>
                        <input type="date" name="tanggal" required="required" class="form-control" >
                          </div>

                          <div class="form-group">
                              <label>PERIHAL</label>
                              <input type="text" name="perihal"  class="form-control" placeholder="Masukkan Perihal ..">
                          </div>
                          <div class="form-group">
                              <label>KEPADA</label>
                              <input type="text" name="kepada" required="required" class="form-control" placeholder="Masukkan Kepada ..">
                          </div>
                          <div class="form-group">
                              <label>CATATAN</label>
                              <input type="text" name="catatan"  class="form-control" placeholder="Masukkan Catatan ..">
                          </div>
                          <div class="form-group">
                          <label>KATEGORI</label>
                            <select name="kategori" class="form-control" required="required">
                              <option value="">- Pilih -</option>
                              <option value="Permohonan">Permohonan</option>
                              <option value="Kunjungan">Kunjungan</option>
                              <option value="Undangan ">Undangan</option>
                              <option value="Jawaban ">Jawaban</option>
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
                  $tahun = date('Y');
                  $data = mysqli_query($koneksi,"SELECT surat_keluar.* FROM surat_keluar WHERE YEAR(surat_keluar.Tanggal)='$tahun' ORDER BY surat_keluar.id_Suratkeluar DESC");
                  while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>    

                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_Suratkeluar_<?php echo $d['Id_Suratkeluar'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_Suratkeluar_<?php echo $d['Id_Suratkeluar'] ?>">
                              <i class="fa fa-trash"></i>
                            </button>


                            <!-- Modal Update -->
                            <form action="surat_keluar_update.php" method="post" enctype="multipart/form-data">
                              <div class="modal fade" id="edit_Suratkeluar_<?php echo $d['Id_Suratkeluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label>NO SURAT KELUARL</label>
                                        <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['Id_Suratkeluar']; ?>">
                                        <input type="text" style="width:100%" name="Nomor_Suratkeluar"  value="<?php echo $d['Nomor_Suratkeluar'] ?>">
                                      </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>TANGGAL</label>
                                      <input type="text" style="width:100%" name="tanggal" class="form-control datepicker2" placeholder="Ubah Tanggal" value="<?php echo $d['Tanggal'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>PERIHAL</label>
                                      <input type="text" style="width:100%" name="perihal" required="required" class="form-control" value="<?php echo $d['Perihal'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>KEPADA</label>
                                      <input type="text" style="width:100%" name="kepada" required="required" class="form-control" value="<?php echo $d['Kepada'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                      <label>CATATAN</label>
                                      <input type="text" style="width:100%" name="catatan" class="form-control" value="<?php echo $d['Catatan'] ?>">
                                    </div>

                                    <div class="form-group" style="width:100%; margin-bottom:20px">
                                      <label>KATEGORIL</label>
                                      <select name="kategori" style="width:100%" class="form-control" >
                                      <option value="kategori"><?php echo $d['Kategori']; ?></option>
                                      <option value="Permohonan">Permohonan</option>
                                      <option value="Kunjungan">Kunjungan</option>
                                      <option value="Undangan ">Undangan</option>
                                      <option value="Jawaban ">Jawaban</option>
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

                          <!-- Modal Hapus -->
                          <div class="modal fade" id="hapus_Suratkeluar_<?php echo $d['Id_Suratkeluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <a href="surat_keluar_hapus.php?id=<?php echo $d['Id_Suratkeluar'] ?>" class="btn btn-primary">Hapus</a>
                                </div>
                              </div>
                            </div>
                          </div>

                      </td>
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