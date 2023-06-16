<?php 
include 'header.php'; 
$id = $_GET['dinilai'];
$idp = $_GET['idp'];
$bulan = $_GET['bulan'];
$karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan.Id_karyawan = '$id'");
$profil = mysqli_fetch_assoc($karyawan);
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      FORM PENILAIAN
      <small>Form Penilaian Karyawan</small>
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
            <h3 class="box-title">Form Penilaian</h3>
          </div>
          <div class="box-body">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" action="penilaian_proses.php" method="POST" enctype="multipart/form-data">
                <table class="table table-condensed">
                <!-- <table border="1"> -->
                  <thead>
                    <tr>
                      <th colspan="2" class="text-center">UNSUR PENILAIAN</th>
                      <th colspan="4" class="text-center">BOBOT/NILAI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th colspan="2">PERILAKU PERGAULAN</th>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>4</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Kejujuran</td>
                      <td><input type="radio" name="r1" id="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1" id="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1" id="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1" id="r1_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Berperilaku sangat jujur (4) <br>
                        Pernah berperilaku tidak jujur (2) <br>
                        Sering berperilaku  tidak jujur (1)
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">B</td>
                      <td>Respek/Penghargaan kepada orang lain</td>
                      <td><input type="radio" name="r2" id="r2_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r2" id="r2_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r2" id="r2_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r2" id="r2_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Menghargai (ngajeni) orang lain (4) <br>
                        Mempertimbangkan orang lain (3) <br>
                        Pernah tidak menghargai orang lain (2) <br>
                        Tidak menghargai orang lain (1)
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">C</td>
                      <td>Respek/Penghargaan dari orang lain</td>
                      <td><input type="radio" name="r3" id="r3_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r3" id="r3_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r3" id="r3_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r3" id="r3_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Keberadaannya sangat diperlukan/diharapkan (4) <br>
                        Keberadaannya diperlukan/diharapkan (3) <br>
                        Keberadaannya tidak berpengaruh (2) <br>
                        keberadaannya tidak diharapkan (1)
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">D</td>
                      <td>Terbuka terhadap saran dan kritik</td>
                      <td><input type="radio" name="r4" id="r4_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r4" id="r4_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r4" id="r4_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r4" id="r4_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Orang lain dengan enak dapat menyampaikan kritik dan saran secara spontan (4) <br>
                        Orang lain tidak sungkan menyampaikan kritik  dan saran ketika diminta (3) <br>
                        Orang lain enggan menyampaikan kritik  dan saran ketika diminta (2) <br>
                        Orang lain dengan terpaksa menyampaikan kritik dan saran (1)
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">E</td>
                      <td>Peduli pada orang lain</td>
                      <td><input type="radio" name="r5" id="r5_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r5" id="r5_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r5" id="r5_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r5" id="r5_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Sangat peduli pada peristiwa yang dialami orang lain (4) <br>
                        Peduli pada peristiwa yang dialami orang lain (3) <br>
                        Kurang peduli pada peristiwa yang dialami orang lain (2) <br>
                        Tidak peduli pada peristiwa yang dialami orang lain (1)
                      </td>
                    </tr>
                    <tr>
                      <th colspan="2">KOMPETENSI</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Pemahaman Pekerjaan</td>
                      <td><input type="radio" name="r6" id="r6_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r6" id="r6_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r6" id="r6_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r6" id="r6_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Menguasai dasar-dasar, keahlian, metode, sistem, dan prosedur dalam pelaksanaan pekerjaannya dan juga bidang lainnya (4) <br>
                        Menguasai hanya ruang lingkup pekerjaannya sendiri (3) <br>
                        Kurang menguasai beberapa tahap pekerjaannya (2) <br>
                        Hanya mengetahui garis besar dari perusahannya (1)
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">B</td>
                      <td>Kualitas pekerjaan</td>
                      <td><input type="radio" name="r7" id="r7_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r7" id="r7_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r7" id="r7_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r7" id="r7_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Mutu pekerjaan lebih tinggi dari standar atau rata-rata lebih tinggi dari standar (4) <br>
                        Mutu sesuai dengan standar (3) <br>
                        Kurang memuaskan, tapi mutu tidak jauh dari standar (2) <br>
                        Mutu pekerjaan jauh dari standar (1)
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">C</td>
                      <td>Waktu penyelesaian pekerjaan</td>
                      <td><input type="radio" name="r8" id="r8_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r8" id="r8_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r8" id="r8_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r8" id="r8_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Mampu menyelesaikan pekerjaan lebih cepat dari target waktu yang ditentukan (4) <br>
                        Pada umumnya dapat menyelesiakan pekerjaan sesuai dengan waktu yang ditentukan (3) <br>
                        Terlambat menyelesaikan pekerjaan menurut target waktu yang ditentukan (2) <br>
                        Tidak mampu menyelesaikan pekerjaan menurut target waktu yang ditentukan (1)
                      </td>
                    </tr>
                    <tr>
                      <th colspan="2">PERILAKU BEKERJA</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Tanggung jawab</td>
                      <td><input type="radio" name="r9" id="r9_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r9" id="r9_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r9" id="r9_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r9" id="r9_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Atasan tidak perlu memberitahukan secara rinci tugas-tugas yang harus diselesaikan dan sangat dapat dipercaya /diandalkan terhadap tugas-tugasnya disamping perhatian terhadap tugas kelompok (4) <br>
                        Dapat dipercaya untuk menyelesaikan dengan baik tugas-tugas yang diuraikan dengan jelas (3) <br>
                        Terkadang lalai terhadap tugas yang menjadi tanggungjawabnya dan atasan masih perlu mengecek dan mengingatkan tugas-tugasnya secara rinci (2) <br>
                        Tidak bertanggungjawab dan tidak dapat dipercaya terhadap tugas dan pekerjaannya (1)
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">B</td>
                      <td>Kerjasama</td>
                      <td><input type="radio" name="r10" id="r10_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r10" id="r10_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r10" id="r10_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r10" id="r10_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Mudah diajak kerjasama baik di dalam maupun di luar unit kerjanya (4) <br>
                        Dapat bekerjasama dengan kelompoknya (3) <br>
                        Kurang dapat bekerjasama dengan kelompoknya (2) <br>
                        Tidak dapat bekerjasama dengan kelompoknya (1)
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">C</td>
                      <td>Kreativitas</td>
                      <td><input type="radio" name="r11" id="r11_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r11" id="r11_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r11" id="r11_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r11" id="r11_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Sadar akan kesempatan memperbaiki pekerjaannya dan sering menampilkan ide-ide produktif (4) <br>
                        Bekerja tanpa menunggu perintah atasan, tidak perlu kontrol dan dapat dipercaya (3) <br>
                        Perlu dimotivasi untuk menyelesaikan pekerjaan secara rutin (2) <br>
                        Bekerja dengan menunggu instruksi atau perintah atasan (1)
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <td colspan="4">
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="idp" id="idp" required="required" class="form-control" value="<?php echo $idp; ?>">
                            <input type="hidden" name="id_karyawan" id="id_karyawan" required="required" class="form-control" value="<?php echo $id; ?>">
                            <input type="hidden" name="bulan" id="bulan" required="required" class="form-control" value="<?php echo $bulan; ?>">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </form>
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

