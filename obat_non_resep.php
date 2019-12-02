<?php
include "string.php";
include "configdb.php";
include "obat_con.php";
?>


<!DOCTYPE html>
<html>
<head>
  <title><?php echo $nama_aplikasi ?></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

  <!-- Style And Script for Live Search -->
  <style type="text/css">
    /*body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box 
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
     Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    } 

    .navbar {
      padding: .8rem;
    }
    .navbar-nav li {
      padding-right: 20px;
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
    function popup(e) {
      var alertpass =  e;
      alert(alertpass); 
    }

    function fillHarga(e){
      document.getElementById('hargaobat').value = e.target.getAttribute('data-harga');
      document.getElementById('kodeobat').value = e.target.getAttribute('data-kode');
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

    function fillTotHarga(e){
      if(!e){
        e = 0;
      }

      var harga = parseInt(document.getElementById('hargaobat').value);
      if(!harga){
        harga = 0;
      }

      document.getElementById('total').value = parseInt(e)*harga;
    }

    function fillKembali(e){
      if(!e){
         e = 0;
      }

      var total = document.getElementById('total').value;
      if(!total){
        total = 0;
      }
      document.getElementById('sisa').value = parseInt(e) - total;
    }

    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("backend-search.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });

    function PrintDiv() {    
      var divToPrint = document.getElementById('divToPrint');
      var popupWin = window.open('', '_blank');
      popupWin.document.open();
      popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
      popupWin.document.close();
    }


</script>
<!-- Style and Scripts end here -->

</head>
<body onload="fillOnLoad();">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top sticky-top">
  <a class="navbar-brand" href="#"><img src=4.jpg "/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> Apotek Setiawan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Print -->
  <div id="divToPrint" style="display:none;">
    <div>
             <?php 
                echo $html; 
                if($html!=""){
                  echo"<script type='text/javascript'>PrintDiv();</script>";
                }
             ?>      
    </div>
  </div>

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
  <h2 class="">Form Penjualan Tanpa Resep</h2>
</div>
<form class="border border-primary rounded" method="post">
    <div class="form-group col">
    <label for="nofaktur" class="font-weight-bold col-sm-3 col-form-label">No. Faktur</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="nofaktur" name="nofaktur" placeholder="No. Faktur" required="required">
    </div>
  </div>
    <div class="form-group col">
    <label for="namaobat" class="font-weight-bold col-sm-3 col-form-label">Nama Obat</label>
    <div class="col-sm-5">
    <div class="search-box">
        <!-- <input type="text" class="form-control" id="namaobat" name="namaobat" placeholder="Nama Obat"> -->
        <input type="text" class="form-control" id="namaobat" name="namaobat" autocomplete="off" placeholder="Nama Obat..." required="required">
        <div class="result"></div>
      </div>
      <input type="text" class="form-control" id="kodeobat" name="kodeobat" readonly="readonly" style="display: none;">
    </div>
  </div>
    <div class="form-group col">
    <label for="hargaobat" class="font-weight-bold col-sm-3 col-form-label">Harga </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="hargaobat" name="hargaobat" placeholder="Harga Obat..." readonly="readonly" required="required">
    </div>
  </div>
    <div class="form-group col">
    <label for="jumlah" class="font-weight-bold col-sm-3 col-form-label">Jumlah</label>
    <div class="col-sm-5">
      <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" oninput="fillTotHarga(this.value);" required="required">
    </div>
  </div>
  <div class="form-group col">
    <label for="total" class="font-weight-bold col-sm-3 col-form-label">Total</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="total" name="total" placeholder="Total" readonly="readonly">
    </div>
  </div>
  <div class="form-group col">
    <label for="tgl" class="font-weight-bold col-sm-3 col-form-label">Tanggal</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="tgl" name="tgl" placeholder="tgl">
    </div>
  </div>
  <div class="form-group col">
    <label for="bayar" class="font-weight-bold col-sm-3 col-form-label">Pembayaran</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="bayar" placeholder="bayar" oninput="fillKembali(this.value);" required="required">
    </div>
  </div>
  <div class="form-group col">
    <label for="sisa" class="font-weight-bold col-sm-3 col-form-label">Sisa</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="sisa" placeholder="Kembali" readonly="readonly">
    </div>
  </div>
  <div class="form-group col">
    <div class="col-sm-5">
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submitnonresep"></input>
    </div>
  </div>
</form>
</div>

<!-- insert query -->
<!-- insert data from db -->
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