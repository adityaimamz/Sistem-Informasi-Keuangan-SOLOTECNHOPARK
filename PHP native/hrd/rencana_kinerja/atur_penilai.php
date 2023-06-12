<?php 
include 'header.php'; 
$id = $_GET['id'];
$bulan = $_GET['bulan'];
$karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan.Id_karyawan = '$id'");
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
          <div class="box-body">
            <table class="table table-condensed">
                <tr>
                    <td>No Induk Karyawan</td>
                    <td><?php echo $profil['No_induk_karyawan']; ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><?php echo $profil['Nama']; ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td><?php echo $profil['Nama_jabatan']; ?></td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td><?php echo $profil['Nama_unit_kerja']; ?></td>
                </tr>
                <tr>
                    <td>Bulan Penilaian</td>
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
                                    $karyawan = "SELECT *
             FROM karyawan
             INNER JOIN unit_kerja ON karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja
             INNER JOIN jabatan ON karyawan.Id_jabatan = jabatan.Id_jabatan
             LEFT JOIN penilaian ON karyawan.Id_karyawan = penilaian.karyawan_penilai AND penilaian.bulan = '$bulan'
             WHERE karyawan_dinilai = '$id' AND penilaian.karyawan_penilai IS NULL";


                                    // $karyawan = "SELECT *
                                    //             FROM karyawan, unit_kerja, jabatan
                                    //             WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja
                                    //             AND karyawan.Id_jabatan = jabatan.Id_jabatan
                                    //             AND karyawan.Id_karyawan NOT IN (
                                    //                 SELECT Id_karyawan
                                    //                 FROM penilaian
                                    //                 WHERE Bulan = '" . $bulan . "'
                                    //             )";
                                    $karyawan = "SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan";
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
                                        <a href="atur_penilai_proses.php?penilai=<?php echo $row['Id_karyawan'] ?>&bulan=<?php echo $bulan; ?>&dinilai=<?php echo $id; ?>" class="btn btn-success"><i class="fa fa-check"> Pilih</i></a>
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
                      $karyawan = "SELECT * FROM karyawan, unit_kerja, jabatan, penilaian WHERE karyawan.Id_karyawan=penilaian.karyawan_penilai AND karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan_dinilai='$id' AND penilaian.bulan='$bulan' ";
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