<?php 
include 'header.php'; 
$dinilai = $_GET['dinilai'];
$bulan = $_GET['bulan'];
$karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan.Id_karyawan = '$dinilai'");
$profil = mysqli_fetch_assoc($karyawan);
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      RENCANA PENILAIAN
      <small>Perencanaan Penilaian Karyawan</small>
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
            <h3 class="box-title">Karyawan yang Dinilai</h3>
          </div>

          <!-- TAMPILKAN DATA KARYAWAN YANG DINILAI -->
          <div class="box-body">
            <table class="table table-condensed">
                <tr>
                    <th>No Induk Karyawan</th>
                    <td><?php echo $profil['No_induk_karyawan']; ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?php echo $profil['Nama']; ?></td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td><?php echo $profil['Nama_jabatan']; ?></td>
                </tr>
                <tr>
                    <th>Unit Kerja</th>
                    <td><?php echo $profil['Nama_unit_kerja']; ?></td>
                </tr>
                <tr>
                    <th>Bulan Penilaian</th>
                    <td><?php echo $bulan; ?></td>
                </tr>
            </table>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Karyawan yang Menilai</h3>
            <div class="btn-group pull-right">
                <button title="Detail" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#search_penilai_<?php echo $profil['Id_karyawan'] ?>">
                    <i class="fa fa-search"> Cari Penilai</i>
                </button>
            </div>
          </div>
          <div class="box-body">
            <!-- Modal detail -->
            <div class="modal fade" id="search_penilai_<?php echo $profil['Id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Cari Karyawan yang Menilai</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- TAMPILKAN DATA YANG AKAN MENILAI -->
                        <div class="modal-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>NO</th>
                                    <th>NAMA KARYAWAN</th>
                                    <th>JABATAN</th>
                                    <th>UNIT KERJA</th>
                                    <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    $karyawan = "SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan.Id_karyawan !='$dinilai' ";
                                    $result = mysqli_query($koneksi, $karyawan);
                                    //memeriksa apakah ada data yang ditemukan
                                    if (mysqli_num_rows($result) > 0) { 
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                    <td class="text-center"><?php echo $no++; ?></td>
                                    <td><?php echo $row['Nama']; ?></td>
                                    <td><?php echo $row['Nama_jabatan']; ?></td>
                                    <td><?php echo $row['Nama_unit_kerja']; ?></td>
                                    <td class="text-center">
                                        <a href="atur_penilai_proses.php?penilai=<?php echo $row['Id_karyawan'] ?>&bulan=<?php echo $bulan; ?>&dinilai=<?php echo $dinilai; ?>" class="btn btn-success"><i class="fa fa-check"> Pilih</i></a>
                                    </td>
                                    </tr>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAMPILKAN DATA YANG DITUNJUK UNTUK MENILAI -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA KARYAWAN</th>
                      <th>JABATAN</th>
                      <th>UNIT KERJA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no=1;
                      $karyawan = "SELECT * FROM karyawan, unit_kerja, jabatan, penilaian, rencana_penilaian WHERE karyawan.Id_karyawan=rencana_penilaian.karyawan_penilai AND karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND rencana_penilaian.karyawan_dinilai=penilaian.Id_karyawan AND penilaian.Id_karyawan='$dinilai' AND penilaian.bulan='$bulan' group by rencana_penilaian.karyawan_penilai";
                      // $karyawan = "SELECT * FROM karyawan, unit_kerja, jabatan, penilaian, rencana_penilaian WHERE karyawan.Id_unit_kerja=unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan=jabatan.Id_jabatan AND penilaian.Id_karyawan=rencana_penilaian.karyawan_penilai AND penilaian.Id_karyawan='$penilai' AND penilaian.bulan='$bulan'";
                      $result = mysqli_query($koneksi, $karyawan);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $row['Nama']; ?></td>
                      <td><?php echo $row['Nama_jabatan']; ?></td>
                      <td><?php echo $row['Nama_unit_kerja']; ?></td>
                      <td>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_penilai_<?php echo $row['Id_rencana'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_penilai_<?php echo $row['Id_rencana'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <a href="penilaian_hapus.php?dinilai=<?php echo $row['karyawan_dinilai'] ?>&bulan=<?php echo $bulan ?>&idp=<?php echo $row['Id_rencana'] ?>" class="btn btn-primary">Hapus</a>
                                </div>
                              </div>
                            </div>
                          </div>
                      </td>
                    </tr>
                    <?php 
                        }
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
<?php include 'footer_kinerja.php'; ?>
