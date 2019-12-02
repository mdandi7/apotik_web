  <?php
include "string.php";
include "configdb.php";
include "input_con.php"

//$con = OpenCon();

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nama_aplikasi ?></title>

    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.navbar {
			padding: .8rem;
		}
		.navbar-nav li {
			padding-right: 20px;
		}
		.carousel-inner img {
			width: 100%;
			height: 100%;
		}

	</style>
  <script type="text/javascript">
    function popup(e) {
      var alertpass =  e;
      alert(alertpass); 
    }
    function fillOnLoad(e){
      var today = new Date();
      if(today.getDate() < 10){
        var date = '-0'+today.getDate();
      }else{
        var date = '-'+today.getDate();
      }
      if((today.getMonth()+1) < 10){
        var month = '-0'+(today.getMonth()+1);
      }else {
        var month = '-'+(today.getMonth()+1);
      }

      var fullDate = today.getFullYear()+month+date;
      document.getElementById('tgl').value = fullDate;
    }
  </script>
</head>

<body onload="fillOnLoad();">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top sticky-top">
  <a class="navbar-brand" href="#"><img src= 4.jpg "/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> Apotek Setiawan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="input.php">Input <span class="sr-only">(current)</span></a>
      </li>  
      <li class="nav-item active">
        <a class="nav-link" href="info.php">Info <span class="sr-only">(current)</span></a>
      </li>      
	  <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
	      <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="../logout_con.php">Logout</a>
	      </div>
	  </li>
      </ul>
    </ul>
  </div>
</nav>


 <!-- Jumbotron -->
 <div class="jumbotron jumbotron-fluid bg-dark mb-0 rounded-bottom">
  <div class="container text-center text-light">
  	<img src= 4.jpg width="30" height="30""#">
    <h1 class="display-5">Apotek Setiawan</h1>
    <p class="lead">Jl. Poros Kolaka-Pomalaa No.12 Kel.Wundulako</p>
  </div>
</div>


<!-- form input -->
<div class="container-fluid py-4">
<div class="col text-center pb-3">
  <h2 class="">Data Pasien Konsultasi</h2>
  <h2 class="">Penggunaan Obat dan Swamedikasi</h2>
</div>
<div class="border border-info rounded">
<form class="col mt-3" method="post">
  <div class="form-group col">
    <!-- <span><?php echo $error; ?></span> -->
    <label for="Nama" class="font-weight-bold col-sm-3 col-form-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required></input>
    </div>
  </div>
    <div class="form-group col">
    <label for="alamat" class="font-weight-bold col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
    </div>
  </div>
   <div class="form-group col">
    <label for="Umur" class="font-weight-bold col-sm-3 col-form-label">Umur</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="umur" placeholder="umur" name="umur" required>
    </div>
  </div>
    <div class="form-group col">
    <label for="pengukuran" class="font-weight-bold col-sm-3 col-form-label">Pengukuran</label>
    <div class="col-sm-5">
      <select class="custom-select" id="Pengukuran" name="pengukuran">
        <option selected valu="Pilih Salah Satu">Pilih Salah Satu</option>
        <option value="Tekanan Darah (120/80 mmHg)">Tekanan Darah (120/80 mmHg)</option>
        <option value="Gula Darah Puasa (72-126 mg/dL)">Gula Darah Puasa (72-126 mg/dL)</option>
        <option value="Gula Darah Sewaktu/Acak (144-180 mg/dL)">Gula Darah Sewaktu/Acak (144-180 mg/dL)</option>
        <option value="Kolesterol (<200 mg/dL)">Kolesterol (<200 mg/dL)</option>
        <option value="Asam Urat Pria (3,5 -7,0 mg/dL) Wanita (2,6 - 6,0 mg/dL)">Asam Urat Pria (3,5 -7,0 mg/dL) Wanita (2,6 - 6,0 mg/dL)</option>
    </select>
    </div>
  </div>
    <div class="form-group col">
    <label for="hasil" class="font-weight-bold col-sm-3 col-form-label">Hasil</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="hasil" placeholder="hasil" name="hasil" required>
    </div>
  </div>
    <div class="form-group col">
    <label for="tanggal" class="font-weight-bold col-sm-3 col-form-label">Tanggal</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Obat Masuk">
    </div>
  </div>
  <div class="form-group row justify-content-center px-5">
    <div class="col-sm-5">
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submitpasien"></input>
    </div>
  </div>
</form>
</div>
</div>





</body>
  <span>
    <?php 
      if ($error!=""){
        echo '<script> var eror = "'; echo $error; echo '";popup(eror); </script>';
      } 
    ?>
  </span>
<!-- Footer -->
<footer class="bg-dark text-center text-light pb-2 pt-2 mt-5 rounded-top"> 
  &copy Copyright 2019
</footer>
<script src="../assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>