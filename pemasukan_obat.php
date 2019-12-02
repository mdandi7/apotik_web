<!-- <?php
include "string.php";
include "obat_con.php";
include "configdb.php";
?> -->

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nama_aplikasi ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.navbar {
			padding: .8rem;
		}
		.navbar-nav li {
			padding-right: 20px;
		}
	</style>
  <script type="text/javascript">
    function popup(e) {
      var alertpass =  e;
      alert(alertpass); 
    }
  </script>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top sticky-top">
  <a class="navbar-brand" href="#"><img src=4.jpg "/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> Apotek Setiawan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Obat</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="pemasukan_obat.php">Pemasukan Obat</a>
          <a class="dropdown-item" href="penambahan_stok_obat.php">Penambahan Stok Obat</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Penjualan</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="obat_non_resep.php">Obat Non Resep</a>
          <a class="dropdown-item" href="obat_resep.php">Obat Resep</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="penjualan_harian.php">Laporan Penjualan Harian</a>
          <a class="dropdown-item" href="penjualan_bulanan.php">Laporan Penjualan Bulanan</a>
        </div>
      </li>
	  <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
	      <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="logout_con.php">Logout</a>
	      </div>
	  </li>
      </ul>
    </ul>
  </div>
</nav>

<!-- form -->
<div class="container-fluid py-5">
<div class="col text-center pb-3">
	<h2 class="">Form Pemasukan Obat</h2>
</div>
<div class="border border-info rounded">
<form class="mt-3" method="post">
  <div class="form-group col">
    <span><?php echo $error; ?></span>
    <label for="kodeobat" class="font-weight-bold col-sm-3 col-form-label">Kode Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="kodeobat" name="kodeobat" placeholder="Kode Obat" required></input>
    </div>
  </div>
    <div class="form-group col">
    <label for="namaobat" class="font-weight-bold col-sm-3 col-form-label">Nama Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="namaobat" name="namaobat" placeholder="Nama Obat" required>
    </div>
  </div>
  <div class="form-group col">
    <label for="kategoriobat" class="font-weight-bold col-sm-3 col-form-label">Kategori Obat</label>
    <div class="col-sm-5">
      <select class="custom-select" id="kategoriobat" name="kategoriobat">
        <option selected>Pilih Salah Satu</option>
        <option value="Antianginal">Antianginal</option>
        <option value="Dekongestan">Dekongestan</option>
        <option value="Eksipien">Eksipien</option>
    </select>
    </div>
  </div>
    <div class="form-group col">
    <label for="jenisobat" class="font-weight-bold col-sm-3 col-form-label">Jenis Obat</label>
    <div class="col-sm-5">
	    <select class="custom-select" id="jenisobat" name="jenisobat">
		  	<option selected>Pilih Salah Satu</option>
		  	<option value="Tablet">Tablet</option>
		  	<option value="Pil">Pil</option>
		  	<option value="Kapsul">Kapsul</option>
        <option value="Kaplet">Kaplet</option>
        <option value="Larutan=Larutan">Larutan</option>
        <option value="Infusa">Infusa</option>
        <option value="Salep">Salep</option>
        <option value="Obat Keras">Obat Keras</option>
        <option value="Obat Psikotropika">Obat Psikotropika</option>
        <option value="Obat Obat Narkotika">Obat Obat Narkotika</option>
        <option value="Obat Tetes">Obat Tetes</option>
        <option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
        <option value="Obat Bebas">Obat Bebas</option>
        <option value="Jamu">Jamu</option>
        <option value="Serbuk">Serbuk</option>
        <option value="Syirup">Syirup</option>
		</select>
    </div>
  </div>
    <div class="form-group col">
    <label for="hargaobat" class="font-weight-bold col-sm-3 col-form-label">Harga Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="hargaobat" placeholder="Harga Obat" name="hargaobat" required>
    </div>
  </div>
    <div class="form-group col">
    <label for="stokobat" class="font-weight-bold col-sm-3 col-form-label">Stok Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="stokobat" placeholder="Stok Obat" name="stokobat" required>
    </div>
  </div>
    <div class="form-group col">
    <label for="tglobat" class="font-weight-bold col-sm-3 col-form-label">Tanggal Obat Masuk</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="tglobat" placeholder="Tanggal Obat Masuk" name="tglobat">
    </div>
  </div>
    <div class="form-group col">
    <label for="tglkdl" class="font-weight-bold col-sm-3 col-form-label">Tanggal Kadaluarsa</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="tglkdl" placeholder="Tanggal Kadaluarsa" name="tglkdl">
    </div>
  </div>
  <div class="form-group col">
    <div class="col-sm-5">
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submitobat"></input>
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

<script src="assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>