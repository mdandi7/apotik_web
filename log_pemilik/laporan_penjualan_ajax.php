<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "apotik");
    
    $query_ind = $_POST['query_ind'];
    
    $html = "";

    //Query
    if($query_ind == "daily"){
        $tgl = $_POST['choosenDay'];

        $query = mysqli_query($connection, "SELECT a.*, b.nama_obat FROM penjualan_tanparesep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE tgl = '$tgl'");
        
        $rows = mysqli_num_rows($query);

        $html .= "<form method='post' class='container-fluid row justify-content-center container-fluid'>";
        $html .= "<table class='table table-outline table-hover col-md-8 mx-3 table-md'>";
        $html .= "<thead class='thead-light'><tr>";
        $html .= "<th colspan='6'>Penjualan Tanpa Resep</th></tr><tr>";
        $html .= "<th>No Faktur</th>";
        $html .= "<th>Kode Obat</th>";
        $html .= "<th>Nama Obat</th>";
        $html .= "<th>Jumlah</th>";
        $html .= "<th>Tanngal</th>";
        $html .= "<th>Total</th></tr></thead>";

        for($i=0;$i<$rows;$i++){
            $result = mysqli_fetch_assoc($query);
            $html .= "<tr><td>" .$result['no_faktur1']. "</td>";
            $html .= "<td>" .$result['kode_obat']. "</td>";
            $html .= "<td>" .$result['nama_obat']. "</td>";
            $html .= "<td>" .$result['jumlah']. "</td>";
            $html .= "<td>" .$result['tgl']. "</td>";
            $html .= "<td>" .$result['total1']. "</td></tr>";
        }

        $html .= "</table>";

        $html .= "<br><br>";
        $html .= "<table class='table table-outline table-hover col-md-8 mx-3 table-md'>";
        $html .= "<thead class='thead-light'><tr>";
        $html .= "<th colspan='8'>Penjualan Dengan Resep</th></tr><tr>";
        $html .= "<tr><th>No Faktur</th>";
        $html .= "<th>Kode Obat</th>";
        $html .= "<th>Nama Obat</th>";
        $html .= "<th>Nama Pasien</th>";
        $html .= "<th>Nama Dokter</th>";
        $html .= "<th>Jumlah</th>";
        $html .= "<th>Tanngal</th>";
        $html .= "<th>Total</th></tr></thead>";

        $query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_resep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE tgl = '$tgl'");
        $rows = mysqli_num_rows($query);

        for($i=0;$i<$rows;$i++){
            $result = mysqli_fetch_assoc($query);
            //$namaobat_pass = $result['nama_obat'];
            $html .= "<tr><td>" .$result['no_faktur']. "</td>";
            $html .= "<td>" .$result['kode_obat']. "</td>";
            $html .= "<td>" .$result['nama_obat']. "</td>";
            $html .= "<td>" .$result['nama_pasien']. "</td>";
            $html .= "<td>" .$result['nama_dokter']. "</td>";
            $html .= "<td>" .$result['jumlah']. "</td>";
            $html .= "<td>" .$result['tgl']. "</td>";
            $html .= "<td>" .$result['total']. "</td>";
        }

        $html .= "</table>";
        $html .= "<input class='col-sm-4 btn btn-lg btn-primary btn-block my-4 exportharian' type='submit' value='Download' name='exportharian'></input>";
        $html .= "</form>|";
        $html .= "FunctionOnLoad()";

        echo $html;
    }else if($query_ind == "monthly"){
        $tgl = $_POST['choosenMth'];
        
        $query = mysqli_query($connection, "SELECT a.*, b.nama_obat FROM penjualan_tanparesep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE DATE_FORMAT(tgl,'%Y-%m') = '$tgl'");
        
        $rows = mysqli_num_rows($query);

        $html .= "<form method='post' class='container-fluid row justify-content-center container-fluid'>";
        $html .= "<table class='table table-outline table-hover col-md-8 mx-3 table-md'>";
        $html .= "<thead class='thead-light'><tr>";
        $html .= "<th colspan='6'>Penjualan Tanpa Resep</th></tr><tr>";
        $html .= "<th>No Faktur</th>";
        $html .= "<th>Kode Obat</th>";
        $html .= "<th>Nama Obat</th>";
        $html .= "<th>Jumlah</th>";
        $html .= "<th>Tanngal</th>";
        $html .= "<th>Total</th></tr></thead>";

        for($i=0;$i<$rows;$i++){
            $result = mysqli_fetch_assoc($query);
            $html .= "<tr><td>" .$result['no_faktur1']. "</td>";
            $html .= "<td>" .$result['kode_obat']. "</td>";
            $html .= "<td>" .$result['nama_obat']. "</td>";
            $html .= "<td>" .$result['jumlah']. "</td>";
            $html .= "<td>" .$result['tgl']. "</td>";
            $html .= "<td>" .$result['total1']. "</td></tr>";
        }

        $html .= "</table>";

        $html .= "<br><br>";
        $html .= "<table class='table table-outline table-hover col-md-8 mx-3 table-md'>";
        $html .= "<thead class='thead-light'><tr>";
        $html .= "<th colspan='8'>Penjualan Dengan Resep</th></tr><tr>";
        $html .= "<tr><th>No Faktur</th>";
        $html .= "<th>Kode Obat</th>";
        $html .= "<th>Nama Obat</th>";
        $html .= "<th>Nama Pasien</th>";
        $html .= "<th>Nama Dokter</th>";
        $html .= "<th>Jumlah</th>";
        $html .= "<th>Tanngal</th>";
        $html .= "<th>Total</th></tr></thead>";

        $query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_resep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE DATE_FORMAT(tgl,'%Y-%m') = '$tgl'");
        $rows = mysqli_num_rows($query);

        for($i=0;$i<$rows;$i++){
            $result = mysqli_fetch_assoc($query);
            //$namaobat_pass = $result['nama_obat'];
            $html .= "<tr><td>" .$result['no_faktur']. "</td>";
            $html .= "<td>" .$result['kode_obat']. "</td>";
            $html .= "<td>" .$result['nama_obat']. "</td>";
            $html .= "<td>" .$result['nama_pasien']. "</td>";
            $html .= "<td>" .$result['nama_dokter']. "</td>";
            $html .= "<td>" .$result['jumlah']. "</td>";
            $html .= "<td>" .$result['tgl']. "</td>";
            $html .= "<td>" .$result['total']. "</td>";
        }

        $html .= "</table>";
        $html .= "<input class='col-sm-4 btn btn-lg btn-primary btn-block my-4 exportharian' type='submit' value='Download' name='exportharian'></input>";
        $html .= "</form>|";
        $html .= "FunctionOnLoad()";
        
        echo $html;
    }
?>