<?php
include "string.php";
include "configdb.php";
  ?>


<!DOCTYPE html>
<html>
<head>
  <title><?php echo $nama_aplikasi ?></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
        z-index: 999;
        background : white;
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

    $(document).ready(function(){
        $(document).on("keyup input", ".search-text", function(){
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
            $(this).parents(".search-box").find('input[type="text"]').attr("data-kode", $(this).attr("data-kode"));
            $(this).parents(".line-input").find('.harga-obat').val($(this).attr('data-harga'));
            $(this).parent(".result").empty();
        });

        $(document).on("click",".btn-insert",function(e){
          $(this).parent(".line-input").clone().insertAfter($(this).closest(".line-input")).find("input[type='text']").val("").end().find("input[type='number']").val("");
        });

        $(document).on("keyup input", ".jumlah-obat", function(){
          var th_val = $(this).val();

          var harga = $(".harga-obat").map(function() {
             return $(this).val();
          }).get();

          var jumlah = $(".jumlah-obat").map(function() {
             return $(this).val();
          }).get();

          var total = 0;

          for(var i=0;i<harga.length;i++){
            if(harga[i] == ""){curr_harga = 0;}else{curr_harga = harga[i]};
            if(jumlah[i] == ""){curr_jumlah = 0;}else{curr_jumlah = jumlah[i]};
            total += parseInt(curr_harga) * parseInt(curr_jumlah);
          }

          $(".total-harga").val(total);
          
        });

        $(document).on("keyup input", ".pembayaran-int", function(){
          var kembali = parseInt($(this).val()) - parseInt($(".total-harga").val()); 
          $(".kembali-int").val(kembali);
        });

        //BUTTON PEMBAYARAN
        $(document).on("click", ".btn-submit-penjualan", function(){

          var nama_obat = $(".search-text").map(function() {
             return $(this).val();
          }).get();

          var kode_obat = $(".search-text").map(function() {
             return $(this).attr("data-kode");
          }).get();

          var jumlah = $(".jumlah-obat").map(function() {
             return $(this).val();
          }).get();

          var tanggal = $("#tgl").val();
          var total = $(".total-harga").val();

          $.ajax({
            type: "POST",
            url: 'pembelian-obat-ajax.php',
            data:{
              namaobat : nama_obat,
              kode_obat : kode_obat,
              jumlah_obat : jumlah,
              tanggal : tanggal,
              type : 'non-resep',
              total_harga : total, 
            },
            complete: function(response){
              alert(response.responseText);
            },
            error: function () {
              //alert("Select failed.");
              //$('#test').html('Bummer: there was an error!');
              //document.getElementById("test").innerHTML = prepareSQL;
            }
          });
          return false;
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

<form class="border border-primary rounded form-insert-pembelian" method="post">
    <div class="form-group col">
    <label for="namaobat" class="font-weight-bold col-sm-3 col-form-label">Nama Obat</label>
    <div class="col-sm-7">

    <!-- Obat -->
    <div class="form-inline line-input">
      <div class="search-box" style="position: relative;">
          <!-- Nama -->
          <!-- <input type="text" class="form-control" id="namaobat" name="namaobat" placeholder="Nama Obat"> -->
          <input type="text" class="form-control search-text" autocomplete="off" placeholder="Nama Obat..." required="required">

          <div class="result" id="test"></div>
      </div>
      <!-- Total -->
      <input type="number" class="form-control ml-2 jumlah-obat" placeholder="Jumlah" required="required">
      <!-- Harga -->
      <input type="text" class="form-control ml-2 harga-obat" placeholder="Harga Obat..." readonly="readonly" required="required">
      <!-- Button -->
      <button type="button" class="mx-2 my-1 btn btn-default btn-insert">
        <span class="fa fa-plus" aria-hidden="true"></span>
      </button>
    </div>

    <!-- N -->
    </div>
  </div>
  <div class="form-group col">
    <label for="total" class="font-weight-bold col-sm-3 col-form-label">Total</label>
    <div class="col-sm-5">
      <input type="text" class="form-control total-harga" placeholder="Total" readonly="readonly">
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
      <input type="number" class="form-control pembayaran-int" placeholder="bayar" required="required">
    </div>
  </div>
  <div class="form-group col">
    <label for="sisa" class="font-weight-bold col-sm-3 col-form-label">Sisa</label>
    <div class="col-sm-5">
      <input type="text" class="form-control kembali-int" placeholder="Kembali" readonly="readonly">
    </div>
  </div>
  <div class="form-group col">
    <div class="col-sm-5">
      <input class="btn btn-lg btn-primary btn-block btn-submit-penjualan" type="submit" name="submitnonresep"></input>
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