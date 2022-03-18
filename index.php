
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Objek Wisata Bandung
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <link href="assets/css/bootrap.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

  <style type="text/css">
    
    /* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #ffffff;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}

  </style>
</head>


<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#">
          Wisata Bandung </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
        
          <li class="nav-item">
            <a class="nav-link" href="#wisata" target="">
               Wisata
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#objekwisata" target="">
               Objek wisata
            </a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary" href="admin/home.php" target="">
               Login admin
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('img/gsate.jpg')" >
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">SELAMAT DATANG</h1>
          <h4>ini adalah web wisata bandung</h4>
          <br>
       <!--    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> Watch video
          </a> -->
        </div>
      </div>

    </div>
  </div>

  <!-- wisata -->
  <div class="main main-raised"id="wisata">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">SELAMAT DATANG</h2>
             <img src="img/gsate.jpg" alt="Rounded Image" class="img-raised rounded img-fluid">
            <p align="justify"> Sistem rekomendasi ini dibuat untuk memudahkan para pengunjung untuk mencari rekomendasi tempat wisata.
    Pengunjung dapat mengetahui rekomendasi tempat wisata setelah memilih objek wisata dan memasukkan jarak yang akan ditempuh.
    Selain itu pengunjung dapat melihat beberapa penjelasan dari objek wisata yang telah disediakan oleh admin dengan cara mengklik
    detail pada halaman objek wisata. Pengunjung juga dapat mengisi buku tamu atau buku kunjungan dengan mengisi nama, alamat dan
    memberi komentar untuk sistem yang telah dibuat, komentar bisa berupa saran atau masukan untuk sistem agar dapat menjadi lebih baik lagi.</p>
<p align="justify">Untuk pengunjung yang belum mengetahui wisata alam apa saja yang ada di Bandung silahkan klik
<a href="pencarian.php">disini</a> untuk melihat beberapa destinasi wisata yang diberikan.
          </div>
        </div>
        
      </div>
    
  
    </div>
  </div>

<div class="container">
  <div class="section text-center">
      <div class="row"> 
        <div class="col-md-12">  
          <form style="color: white;" class="example" action="index.php" method="get">
               <input type="text" placeholder="Cari wisata berdasarkan nama wisata.." name="cari">
               <button type="submit" value="cari"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
  </div>
</div>

<?php 
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
}
?>


<!-- objekwisata -->
    <div class="section section-tabs"id="objekwisata">
      <div class="container" >

  <?php 
    include 'config/koneksi.php';

  if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $data = $koneksi->query("select * from wisata where nama_objek like '%".$cari."%'"); 

      }else{
        $data =$koneksi->query("select * from wisata
           
        ");    

      }

      while($row=$data->fetch_array()){
         $fas=$row['code_fasilitas'];
    $ex=explode(',',$fas);
    // print_r($ex[1]);
      ?>

         <!--                nav tabs               -->
        <div id="nav-tabs">
      
          <div class="row">
            <div class="col-md-6">
  
            
              <!-- Tabs with icons on Card -->
               <div class="card card-login">
              <form class="form" action="rekomendasi.php" method="post">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Harga dan Fasilitas</h4>
                 
                </div>
               
                <div class="card-body">
                  <div class="input-group">
                  <label for="exampleInputEmail1">Harga</label>
                    <input type="text" class="form-control text-center" placeholder="" name="harga"value="<?php echo $row['harga']; ?>" readonly>
                     
                  </div>
                  <input type="hidden" class="form-control text-center" placeholder="" name="id_wis"value="<?php echo $row['id_wis']; ?>" readonly>

                      <input type="hidden" class="form-control text-center" placeholder="" name="objek"value="<?php echo $row['nama_objek']; ?>" readonly>


                  <div class="input-group">
                  <label for="exampleInputEmail1">Fasilitas</label>
                    <input type="email" class="form-control text-center" name="jum_fas" placeholder="" value="<?php echo $row['jum_fasilitas']; ?>" readonly>
                  </div>
                  <!-- <div class="input-group">
                  
                    <input type="password" class="form-control" placeholder="Password" autocomplete="">
                  </div> -->
                </div>
                  <!-- <a href="" class="btn btn-primary btn-link btn-wd btn-lg">Pilih</a> -->
                <div class="footer text-center">
         <!--        <a href="#pablo" type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a> -->
              
                <button type="submit" class="btn btn-primary"name="id_objek">Pilih</button>
              </div>  
              </form>
            </div>
              <!-- End Tabs with icons on Card -->
            </div>
            <div class="col-md-6">
            
              <!-- Tabs on Plain Card -->
              <div class="card card-nav-tabs card-plain">
                <div class="card-header card-header-danger text-center">
                  <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                  <h4 class="card-title">detail</h4>
                </div>
                <div class="card-body ">
                  <div class="tab-content text-center">
                    <div class="tab-pane active" id="">
                       <img src="img/<?php echo $row['gambar']; ?>" alt="Rounded Image" class="img-raised rounded img-fluid" style="height: 300px;">
                      <h1><?php echo $row['nama_objek']; ?></h1>
                      <p><?php echo $row['ket_tempat']; ?></p>
                      <p><a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#detailModal<?php echo $row['id_wis']; ?>">Detail</a></p>
                     
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Tabs on plain Card -->

                  
            </div>
          </div>
        </div>

        <div class="modal fade" id="detailModal<?php echo $row['id_wis']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">detail Wisata</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="../fungsi/fungsiwisata.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Wisata</label>
    <input type="text" class="form-control" name="nama_objek" value="<?php echo $row['nama_objek']; ?>"id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
   
  </div>

<!--   <div class="form-group">
    <label for="exampleInputEmail1">Pilih Fasilitas</label><br>

    <?php
    $query = $koneksi->query("select * from Fasilitas");
    $fas=$row['code_fasilitas'];
    // $ex=explode(',',$fas);
     //print_r($ex);
    
    // $f=$query[$code_fasilitas]
    while ($r=$query->fetch_array())
    {
      echo "<input type='checkbox' value='".$r['code_fasilitas']."' name='code_fasilitas[]' /> ".$r['nama_fasilitas']."<br />";
    }
    ?>
  </div> -->

   <div class="form-group">
    <label for="exampleInputEmail1">Fasilitas</label>
    <input type="text" class="form-control" value="<?php echo $row['code_fasilitas']; ?>" name="jum_fasilitas" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Jumlah Fasilitas</label>
    <input type="text" class="form-control" value="<?php echo $row['jum_fasilitas']; ?>" name="jum_fasilitas" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Harga</label>
    <input type="text" class="form-control" name="harga" value="<?php echo $row['harga']; ?>"id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Keterangan Tempat</label>
    <textarea rows="4" cols="50" name="comment" form="usrform"><?php echo $row['ket_tempat']; ?></textarea>
    <!-- <input type="textarea" class="form-control" value="<?php echo $row['ket_tempat']; ?>"name="ket_tempat" id="exampleInputEmail1" aria-describedby="emailHelp">
     -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Gambar</label>
    <input type="file" class="form-control" name="gambar" id="exampleInputEmail1" aria-describedby="emailHelp">
    <img src="img/<?php echo $row['gambar']; ?>"width="200" height="200">
    
  </div>
  
  
 <!--  <button type="submit" class="btn btn-primary">Submit</button> -->
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</form>
      </div>
     
    </div>
  </div>
</div>

         <?php
  }
  ?>
      </div>
    </div>













  <!-- footer -->
  <footer class="footer">
      <div class="container">
      
        <div class="copyright float-center">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>Skripsi Wisata Bandung 
        </div>
      </div>
    </footer>


 
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>

</html>