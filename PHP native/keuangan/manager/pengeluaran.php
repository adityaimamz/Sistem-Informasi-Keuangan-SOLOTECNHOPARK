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

              <a href="pengeluaran_csv.php"><button type="button" class="btn btn-success btn-sm">
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
                    $data = mysqli_query($koneksi,"SELECT master_pengeluaran.*, master_divisi.Nama_divisi, master_sumberdana.Jenis AS jenisdana, master_belanja.Jenis AS jenisbelanja FROM master_pengeluaran, master_divisi, master_sumberdana, master_belanja WHERE master_divisi.Id_divisi=master_pengeluaran.Id_divisi AND master_pengeluaran.Id_sumberdana=master_sumberdana.Id_sumberdana AND master_belanja.Id_jenisbelanja=master_pengeluaran.Id_jenis order by Id_pengeluaran desc");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $d['Kode_pengeluaran']; ?></td>
                        <td><?php echo $d['jenisdana']; ?></td>
                        <td><?php echo $d['Nama_divisi']; ?></td>
                        <td><?php echo $d['Bulan']; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                        <td><?php echo $d['jenisbelanja']; ?></td>
                        <td><?php echo "Rp. ".number_format($d['Jumlah'])." ,-";?></td>
                        <td><?php echo $d['Rincian']; ?></td>
                        <td>

                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_pengeluaran_<?php echo $d['Id_pengeluaran'] ?>">
                            <i class="fa fa-eye"></i>
                          </button>
                          
                          <?php if($d['Drive']==''){ ?> 

                          <?php } else { ?> 
                            <a href="<?php echo $d['Drive']; ?>" title="Lihat File" target="_blank">
                              <button type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-cloud"></i>
                              </button>
                            </a>
                            <!-- <a href="<?php echo $d['Drive']; ?>" target="_blank">Lihat File</a> -->
                          <?php } ?>
                          
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