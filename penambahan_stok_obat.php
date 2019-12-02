<!-- <?php
include "string.php";
include "configdb.php";
include "obat_con.php";
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

    function fillColumn(e){
      document.getElementById('kodeobat').value = e.target.getAttribute('data-kodeobat');
      document.getElementById('namaobat').value = e.target.getAttribute('data-nama');
      document.getElementById('kategoriobat').value = e.target.getAttribute('data-kategoriobat');
      document.getElementById('jenisobat').value = e.target.getAttribute('data-jenisobat');
      document.getElementById('hargaobat').value  =  e.target.getAttribute('data-harga');
      document.getElementById('stokawal').value  =  e.target.getAttribute('data-stok');
      document.getElementById('stokakhir').value = e.target.getAttribute('data-stok');
      document.getElementById('stoktambah').value = 0;
    }
    function autotambahstock(val){
      var stokawal_pass = parseInt(document.getElementById('stokawal').value);
      if(!stokawal_pass){
        stokawal_pass = 0;
      }
      if(!val){
        document.getElementById('stokakhir').value = stokawal_pass;
      }else{
        document.getElementById('stokakhir').value = parseInt(val) + stokawal_pass;  
      }
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
	<h2 class="">Form Penambahan Stok Obat</h2>
</div>

  <!-- search button -->
  <div class="border border-info rounded">
    <div class="container-fluid">
    <form class="form-inline justify-content-end mt-3" method="post">
        <input class="form-control  mr-sm-2 " type="search" placeholder="Nama Obat" aria-label="Search" name="like_namaobat">
        <button class="btn btn-outline-info" type="submit" name="cariobat">Cari</button>
    </form>
    <div class="table text-center col py-3">
      <div class="row justify-content-center">
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <?php 
        if(isset($_POST['cariobat'])){
          //(isset($_POST['cariobat'])) {
            $like_namaobat=$_POST['like_namaobat'];
            $query_check=mysqli_query($connection, "select * from pemasukan_obat where nama_obat like '%$like_namaobat%'");
            $rows = mysqli_num_rows($query_check);
          
          if($rows>0){
            echo "<table class='table-outline table-hover col-md-8 mx-3 table-sm'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th>Kode Obat</th>";
            echo "<th>Nama Obat</th>";
            echo "<th>Kategori Obat</th>";
            echo "<th>Jenis Obat</th>";
            echo "<th>Harga</th>";
            echo "<th>Stok Obat</th>";
            echo "<th></th></tr>";
            for($i=0;$i<$rows;$i++){
              $result = mysqli_fetch_assoc($query_check);
              //$namaobat_pass = $result['nama_obat'];
              echo "<tr><td>" .$result['kode_obat']. "</td>";
              echo "<td>" .$result['nama_obat']. "</td>";
              echo "<td>" .$result['kategori_obat']. "</td>";
              echo "<td>" .$result['jenis_obat']. "</td>";
              echo "<td>" .$result['harga']. "</td>";
              echo "<td>" .$result['stok_obat']. "</td>";
              echo "<td><input class='btn btn-md btn-primary btn-outline-info btn-block' type='submit' value='Pilih' data-kodeobat = '" .$result['kode_obat']. "' data-nama='".$result['nama_obat']."' data-kategoriobat = '" .$result['kategori_obat']. "' data-jenisobat ='" .$result['jenis_obat']. "' data-harga='" .$result['harga']. "' data-stok='" .$result['stok_obat']. "' onClick='fillColumn(event); return false;'></input></td></tr>";
            }
          }else{
            echo "<span>Obat yang di cari tidak di temukan...</span>";
          }
          echo "</table>";
        }
        ?>
      </div>
    </div>
  </div>
<form method="post">
  <div class="form-group col">
    <label for="kodeobat" class="font-weight-bold col-sm-3 col-form-label">Kode Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="kodeobat" id="kodeobat" placeholder="Kode Obat" readonly="readonly">
    </div>
  </div>
    <div class="form-group col">
    <label for="namaobat" class="font-weight-bold col-sm-3 col-form-label">Nama Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="namaobat" id="namaobat" placeholder="Nama Obat" readonly="readonly">
    </div>
  </div>
  <div class="form-group col">
    <label for="kategoriobat" class="font-weight-bold col-sm-3 col-form-label">Kategori Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="kategoriobat" placeholder="Kategori Obat" readonly="readonly">
      <!-- <select class="custom-select" id="kategoriobat" name="kategoriobat">
        <option selected>Pilih Salah Satu</option>
        <option value="Antianginal">Antianginal</option>
        <option value="Dekongestan">Dekongestan</option>
        <option value="Eksipien">Eksipien</option>
    </select> -->
    </div>
  </div>
    <div class="form-group col">
    <label for="jenisobat" class="font-weight-bold col-sm-3 col-form-label">Jenis Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="jenisobat" placeholder="Jenis Obat" readonly="readonly">
      <!--
	    <select class="custom-select">
		  	<option selected>Pilih Salah Satu</option>
		  	<option value="1">One</option>
		  	<option value="2">Two</option>
		  	<option value="3">Three</option>
		</select>
  -->
    </div>
  </div>
    <div class="form-group col">
    <label for="hargaobat" class="font-weight-bold col-sm-3 col-form-label">Harga Obat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="hargaobat" placeholder="Harga Obat" readonly="readonly">
    </div>
  </div>
    <div class="form-group col">
    <label for="stokawal" class="font-weight-bold col-sm-3 col-form-label">Stok Awal</label>
    <div class="col form-inline ">
      <input type="text" class="form-control" name="stokawal" id="stokawal" placeholder="Stok Awal" readonly="readonly">
      <label class="mx-3"> + </label>
      <input type="number" class="form-control" id="stoktambah" placeholder="Tambahan Stok" oninput="autotambahstock(this.value);">
    </div>
  </div>
    <div class="form-group col">
    <label for="stokakhir" class="font-weight-bold col-sm-3 col-form-label">Stok Akhir</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="stokakhir" id="stokakhir" placeholder="Stok Akhir" readonly="readonly">
    </div>
  </div>
  <div class="form-group col">
    <div class="col-sm-5">
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submitstok"></input>
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