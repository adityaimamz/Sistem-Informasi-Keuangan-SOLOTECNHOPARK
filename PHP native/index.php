<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Soto Panaz</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script type="text/javascript" src="./plugins/chart.js/Chart.js"></script>
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<body>
	
<?php 
		include 'koneksi.php';
		?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">SOTO PANAZ</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#chart">Chart</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in>
		<h2 data-aos="fade-up" data-aos-delay="400">Selamat datang!</h2>
          <h1 class="pt-1" data-aos="fade-up">Solo Techno Park Finance Analyzer (Soto Panaz)</h1>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#chart" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Liat Grafik Pengeluaran</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_06a6pf9i.json"  background="transparent"  speed="1"  style="width: 600px; height: 450px;"  loop  autoplay></lottie-player>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

	    <!-- ======= Why Us Section ======= -->
		<section id="chart" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
          <div class="content">
              <h3>Progress Realisasi Pengeluaran/Belanja UPT KST SOLO TECHNOPARK</h3>
            </div>

            <div class="accordion-list">
			<div style="width: 800px;margin: 0px auto;">
					<h4>Per <b>Bulan</b> Tahun 2023 </h4>
					<canvas id="myChart"></canvas>
					</div>
            </div>
          </div>
          <!-- <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div> -->
        </div>
      </div>
    </section><!-- End Why Us Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Build and Developed by MSIB Intern Batch 3
      </div>
      <div class="credits">
        MSIB Intern Batch 3 ; Aditya Imam Z & Nadha Fitri
      </div>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
	<script type="text/javascript" src="./plugins/chart.js/Chart.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <script>
    var element = document.getElementById("loom-companion-mv3");
    element.parentNode.removeChild(element);
  </script>
  <script>

		var ctx = document.getElementById("myChart").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
						datasets: [{
							label: '',
							data: [
								<?php
						for($bulan=1;$bulan<=12;$bulan++){
							$thn_ini = date('Y');
							$penerimaan = mysqli_query($koneksi,"SELECT sum(Jumlah) AS total_penerimaan FROM master_pengeluaran WHERE month(Tanggal)='$bulan' AND year(Tanggal)='$thn_ini'");
							$pem = mysqli_fetch_assoc($penerimaan);
							
							// $total = str_replace(",", "44", number_format($pem['total_penerimaan']));
							$total = $pem['total_penerimaan'];
							if($pem['total_penerimaan'] == ""){
							echo "0,";
							}else{
							echo $total.",";
							}
						}
						?>
							],
							backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(255, 99, 132, 0.2)'
							],
							borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(255,99,132,1)'
							],
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									// beginAtZero:true
									// gunakan fungsi callback untuk mengubah format uang
									callback: function(value, index, values) {
										return 'Rp ' + value.toLocaleString('id-ID', { minimumFractionDigits: 0 });
									}
								}
							}]
						}
					}
				});

		
	</script>
</body>
</html>