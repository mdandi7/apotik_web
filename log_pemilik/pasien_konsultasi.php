<?php
include "string.php";
include "configdb.php";
include "export_data.php"

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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="penjualan_harian.php">Penjualan Harian</a>
          <a class="dropdown-item" href="penjualan_bulanan.php">Penjualan Bulanan</a>
          <a class="dropdown-item" href="pasien_konsultasi.php">Pasien Konsultasi</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="info_obat.php">Info Stok Obat</a>
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

<div class="container py-5">
  <div class="col text-center ">
    <h2 class=""> Data Pasien Konsultasi Penggunan Obat</h2>
    <h2 class=""> Dan Swamedikasi</h2>
  </div>
</div>
<div class="">
<form method="post" class="container-fluid row justify-content-center">
<table class='table table-outline table-hover col-md-8 mx-3 table-md'>
  <thead class='thead-light'>
    <tr>
    <th colspan="8">Laporan Bulanan</th>
    </tr>
    <tr>
      <th>Nama Pasien</th>
      <th>Alamat</th>
      <th>Umur</th>
      <th>Pengukuran</th>
      <th>Hasil</th>
      <th>Tanggal</th>
    </tr>
<?php
  $query = mysqli_query($connection,"SELECT * FROM pasien");

  $rows = mysqli_num_rows($query);
  for($i=0;$i<$rows;$i++){
    $result = mysqli_fetch_assoc($query);
    //$namaobat_pass = $result['nama_obat'];
    echo "<tr><td>" .$result['nama']. "</td>";
    echo "<td>" .$result['alamat']. "</td>";
    echo "<td>" .$result['umur']. "</td>";
    echo "<td>" .$result['pengukuran']. "</td>";
    echo "<td>" .$result['hasil']. "</td>";
    echo "<td>" .$result['tanggal']. "</td>";
  }
?>
  </thead>
</table>
<input class="col-sm-4 btn btn-lg btn-primary btn-block my-4" type="submit" value="Download" name="exportpasien"></input>
</form>
</div>

<!-- Footer -->

</body>
<script src="../assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>