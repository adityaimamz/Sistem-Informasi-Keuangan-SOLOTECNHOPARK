
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/css/style.css" />
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

     <title>Login</title>

 </head>
 <body>
    <center>

        <br />

        <?php
        if (isset($_GET['alert'])) {
          if ($_GET['alert'] == "gagal") {
            echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
          } else if ($_GET['alert'] == "logout") {
            echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
          } else if ($_GET['alert'] == "belum_login") {
            echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
          }
        }
        ?>
      </center>

    <div class="box">
     <div class="container login-panel">
         <div class="top">
            <span class="text-login">Selamat Datang!    </span>
             <span class="text-login">Silahkan Login Terlebih dahulu</span>
             <header class="header-login">Login</header>
         </div>
         <form action="periksa_login.php" method="POST">
         <div class="input-field has-feedback">
             <input type="text" class="input form-control" placeholder="Username" id="" required="required" autocomplete="off">
             <i class='bx bx-user logo' ></i>
         </div>

         <div class="input-field">
             <input type="Password" class="input form-control" placeholder="Password" id="" required="required" autocomplete="off">
             <i class='bx bx-lock-alt logo'></i>
         </div>

         <div class="input-field">
            <button type="submit" class="button2">
                Masuk
            </button>
         </div>
         </form>
     </div>
 </div>
 </body>
 </html>
