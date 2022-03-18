
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php">
          Wisata Bandung </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
   
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('img/gsate.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="" action="index.php">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Hasil Rekomenkasi </h4>
              
              </div>
              <p class="description text-center">detail</p>
              <div class="card-body">
                <div class="input-group">
                 
                  <input type="text" class="form-control" name="nama_pengunjung" placeholder="Nama Lengkap..." value="<?php echo $_GET['objek'];?>" readonly>
                </div>
                <div class="input-group">
                 
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat..." value="<?php echo $_GET['harga'];?>" readonly>
                </div>
                <div class="input-group">
                 
                  <input type="text" class="form-control" name="komentar" placeholder="Komentar..." value="<?php echo $_GET['fasilitas'];?>" readonly>
                </div>

                  <div class="input-group">
                 
                  <input type="text" class="form-control" name="jarak" placeholder="Jarak..." value="<?php echo $_GET['ket'];?>" readonly>
                </div>

              </div>
              <div class="footer text-center">
              <button href="index.php" type="submit" class="btn btn-primary"name="id_objek">
  Cari wisata lagi
</button>
                <!-- <a href="index.php" type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Cari Objek lain</a> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
      
        <div class="copyright float-center">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>Wisata Bandung 
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>

</html>