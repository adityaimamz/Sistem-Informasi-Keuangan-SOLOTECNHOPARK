<?php include 'header.php';
$namabulan = array(
    1 => "Januari",
    2 => "Februari",
    3 => "Maret",
    4 => "April",
    5 => "Mei",
    6 => "Juni",
    7 => "Juli",
    8 => "Agustus",
    9 => "September",
    10 => "Oktober",
    11 => "November",
    12 => "Desember"
  );
  $bulan_ini = date('n');
  ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Karyawan Performa Tertinggi
      <small>Performa Karyawan</small>
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
            <h3 class="box-title">Performa Tertinggi Bulan <?php echo "(".$namabulan[$bulan_ini]. ")";?></h3>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA KARYAWAN</th>
                    <th>JABATAN</th>
                    <th>UNIT KERJA</th>
                    <th>SKOR</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $bulan = date('m');
                  $karyawan = "SELECT MAX(Ratarata_nilai)/3 AS nilai_tertinggi, karyawan.Nama, jabatan.Nama_jabatan, unit_kerja.Nama_unit_kerja
                                FROM penilaian, karyawan, unit_kerja, jabatan
                                WHERE karyawan.Id_karyawan = penilaian.Id_karyawan
                                AND unit_kerja.Id_unit_kerja = karyawan.Id_unit_kerja
                                AND jabatan.Id_jabatan = karyawan.Id_jabatan
                                AND penilaian.Bulan = '$bulan'
                                AND penilaian.Tahun = '2023'
                                ORDER BY penilaian.Ratarata_nilai DESC
                                LIMIT 3";
                  $result = mysqli_query($koneksi, $karyawan);
                  // memeriksa apakah ada data yang ditemukan
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td><?php echo $row['Nama']; ?></td>
                        <td><?php echo $row['Nama_jabatan']; ?></td>
                        <td><?php echo $row['Nama_unit_kerja']; ?></td>
                        <td class="text-center"><?php echo round(($row['nilai_tertinggi']), 2); ?></td>
                      </tr>
                  <?php
                    }
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