<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator - Keuangan STP</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="shortcut icon" href="../assets/dist/img/logo stp-01.png" type="image/x-icon">

  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <?php 
  include '../koneksi.php';
  session_start();

  // Periksa apakah pengguna telah melakukan login dan sesi ID pengguna telah terisi
  if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    // Jika belum login, alihkan pengguna ke halaman login
    header("Location:../login.php?alert=belum_login");
    exit();
  }
  
  // Periksa apakah ID pengguna dalam sesi sesuai dengan ID yang diminta di URL
  if (isset($_GET['id']) && $_SESSION['id'] != $_GET['id']) {
    // Jika ID pengguna tidak sesuai, alihkan pengguna ke halaman dengan ID mereka sendiri
    header("Location: ../karyawan?id=" . $_SESSION['id']);
    exit();
  }
  
  // ID pengguna dalam sesuai dengan ID yang diminta di URL, dapatkan ID pengguna dari URL
  $id_karyawan = $_GET['id'];
  ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">

  <style>
    #table-datatable {
      width: 100% !important;
    }
    #table-datatable .sorting_disabled{
      border: 1px solid #f4f4f4;
    }
  </style>
  <div class="wrapper">

  <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b><i class="fa fa-money"></i></b> </span>
        <span class="logo-lg"><b>SotoPanaz</b>App</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                $id_user = $_SESSION['id'];
                $profil = mysqli_query($koneksi,"select * from master_user where Id_user='$id_user'");
                // $profil = mysqli_fetch_assoc($profil);
                ?>
                <span class="hidden-xs"><?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['level']; ?></span>
              </a>
            </li>
            <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">NAVIGASI</li>
          <li>
            <a href="index.php?id=<?php echo $_SESSION['id']?>">
              <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            </a>
          </li>
          <li>
            <a href="nilai_kinerja/penilaian.php?id=<?php echo $_SESSION['id']?>">
              <i class="fa fa-edit"></i>
              <span>NILAI REKAN</span>
            </a>
          </li>
          <li>
            <a href="nilai_kinerja/kinerja_saya.php">
              <i class="fa fa-user"></i>
              <span>KINERJA SAYA</span>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
            </a>
          </li>
          <li class="header">TIME</li>
            <h5 class="text-center" style="color:white;">
              <script type='text/javascript'>

              var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
              var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
              var date = new Date();
              var day = date.getDate();
              var month = date.getMonth();
              var thisDay = date.getDay(),
                  thisDay = myDays[thisDay];
              var yy = date.getYear();
              var year = (yy < 1000) ? yy + 1900 : yy;
              document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
              //-->
              </script>
              <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
              </style><div id="clock"></div>
              <script type="text/javascript">
              function showTime() {
                  var a_p = "";
                  var today = new Date();
                  var curr_hour = today.getHours();
                  var curr_minute = today.getMinutes();
                  var curr_second = today.getSeconds();
                  if (curr_hour < 12) {
                      a_p = "AM";
                  } else {
                      a_p = "PM";
                  }
                  if (curr_hour == 0) {
                      curr_hour = 12;
                  }
                  if (curr_hour > 12) {
                      curr_hour = curr_hour - 12;
                  }
                  curr_hour = checkTime(curr_hour);
                  curr_minute = checkTime(curr_minute);
                  curr_second = checkTime(curr_second);
              document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                  }

              function checkTime(i) {
                  if (i < 10) {
                      i = "0" + i;
                  }
                  return i;
              }
              setInterval(showTime, 500);
              </script>
            </h5>
          
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
