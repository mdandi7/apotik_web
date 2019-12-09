<?php
    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "apotik");
    $html="";
    // Define $username and $password
    if (isset($_POST['submitobat'])) {
        $kodeobat=$_POST['kodeobat'];
        $namaobat=$_POST['namaobat'];
        $kategoriobat=$_POST['kategoriobat'];
        $jenisobat=$_POST['jenisobat'];
        $hargaobat=$_POST['hargaobat'];
        $stokobat=$_POST['stokobat'];
        $tglobat=$_POST['tglobat'];
        $tglkdl=$_POST['tglkdl'];
        
        $query_check = mysqli_query($connection, "select * from pemasukan_obat where (kode_obat = '$kodeobat' or nama_obat = '$namaobat')");

        $rows = mysqli_num_rows($query_check);
        if (($rows == 0) and ($jenisobat != "Pilih Salah Satu")){
            mysqli_query($connection, "INSERT INTO pemasukan_obat(kode_obat,nama_obat,jenis_obat,harga,stok_obat,tgl_masuk,tgl_kadaluarsa) VALUES('$kodeobat','$namaobat','$kategoriobat','$jenisobat','$hargaobat','$stokobat','$tglobat','$tglkdl')") or  die("".mysqli_error($connection));
            $error = "Input data obat sukses.";
            //header("Location: pemasukan_obat.php"); // Redirecting To Other Page
            
        }  else{
            //$_SESSION['login_admin']=$username; // Initializing Session
            $error = "Kode obat dan nama obat harus unik dan tidak bisa di duplikasi, atau pilih salah satu jenis obat.";
            //header("Location: pemasukan_obat.php"); // Redirecting To Other Page
        }
        ob_end_flush();
        mysqli_close($connection); // Closing Connection

    }

    if (isset($_POST['submitstok'])) {
        $kodeobat=$_POST['kodeobat'];
        $namaobat=$_POST['namaobat'];
        $stokakhir=$_POST['stokakhir'];

        $error = "tets ";
        if(isset($kodeobat)){
            mysqli_query($connection, "UPDATE pemasukan_obat SET stok_obat = '$stokakhir' WHERE kode_obat = '$kodeobat' AND nama_obat = '$namaobat'");
            $error = "Stok obat berhasil di update.";
        }
    }

    if(isset($_POST['submitnonresep'])){
        $namaobat=$_POST['namaobat'];
        $kodeobat=$_POST['kodeobat'];
        $hargaobat=$_POST['hargaobat'];
        $jumlah=$_POST['jumlah'];
        $tgl=$_POST['tgl'];
        $total=$_POST['total'];

        $faktur_check = mysqli_query($connection, "SELECT max(no_faktur1) as no_faktur1 FROM penjualan_tanparesep_detail");
        $faktur = mysqli_fetch_array($faktur_check);
        $nofaktur = $faktur['no_faktur1'];
        $nofaktur += 1;

        $stok_check = mysqli_query($connection, "SELECT stok_obat FROM pemasukan_obat WHERE kode_obat = '$kodeobat'");
        $stok = mysqli_fetch_array($stok_check);

        if($stok['stok_obat'] < $jumlah){
            $stoknow = $stok['stok_obat'];
            $error = "Stok obat $namaobat tidak mencukupi. Stok sebanyak $stoknow";
        }else{
            $update_stok = $stok['stok_obat'] - $jumlah;
            mysqli_query($connection, "INSERT INTO penjualan_tanparesep_detail(kode_obat,jumlah,tgl,total1) VALUES ('$kodeobat','$jumlah','$tgl','$total')");
            mysqli_query($connection,"UPDATE pemasukan_obat SET stok_obat = '$update_stok' WHERE kode_obat = '$kodeobat'");
            $error = "Penjualan obat $namaobat sebanyak $jumlah telah dilakukan pada tanggal $tgl . Stok Obat tersisa $update_stok.";
            $html .= "<div align='center'>";
            $html .= "<table style='border-style: dashed;><tr>";
            $html .= "<div align='center'>---------------------------------------------------------<br>";
            $html .= "<b>APOTEK SETIAWAN</b><br>";
            $html .= "Jl. Poros Kolaka-Pomalaa No.12 Kel.Wundulako.<br>";
            $html .= "---------------------------------------------------------<br><br></div>";
            $html .= "<div>Faktur &nbsp;&nbsp;&nbsp;: $nofaktur <br>";
            $html .= "Admin : $login_name |Tanggal : $tgl";
            $html .= "<table style='border-style: dashed;'><b><tr style='backgrouond-color:blue;' align='center'><th>Nama Obat</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr></b>";
            $html .= "<tr><td>$namaobat</td><td>$hargaobat</td><td>$jumlah</td><td>$total</td></tr>";
            $html .= "</table>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</tr></table>";
        }
    }

    if(isset($_POST['submitresep'])){
        $namapasien=$_POST['namapasien'];
        $namadokter=$_POST['namadokter'];
        $namaobat=$_POST['namaobat'];
        $hargaobat=$_POST['hargaobat'];
        $kodeobat=$_POST['kodeobat'];
        $jumlah=$_POST['jumlah'];
        $tgl=$_POST['tgl'];
        $total=$_POST['total'];

        $faktur_check = mysqli_query($connection, "SELECT max(no_faktur) as no_faktur FROM penjualan_resep_detail");
        $faktur = mysqli_fetch_array($faktur_check);
        $nofaktur = $faktur['no_faktur'];
        $nofaktur += 1;

        $stok_check = mysqli_query($connection, "SELECT stok_obat FROM pemasukan_obat WHERE kode_obat = '$kodeobat'");
        $stok = mysqli_fetch_array($stok_check);


        if($stok['stok_obat'] < $jumlah){
            $stoknow = $stok['stok_obat'];
            $error = "Stok obat $namaobat tidak mencukupi. Stok sebanyak $stoknow";
        }else{
            $update_stok = $stok['stok_obat'] - $jumlah;
            mysqli_query($connection, "INSERT INTO penjualan_resep_detail(kode_obat,nama_pasien,nama_dokter,jumlah,tgl,total) VALUES ('$kodeobat','$namapasien','$namadokter','$jumlah','$tgl','$total')");
            mysqli_query($connection,"UPDATE pemasukan_obat SET stok_obat = '$update_stok' WHERE kode_obat = '$kodeobat'");
            $error = "Penjualan obat $namaobat sebanyak $jumlah telah dilakukan pada tanggal $tgl . Stok Obat tersisa $update_stok.";
            $html .= "<div align='center'>";
            $html .= "<table style='border-style: dashed;><tr>";
            $html .= "<div align='center'>---------------------------------------------------------<br>";
            $html .= "<b>APOTEK SETIAWAN!</b><br>";
            $html .= "Jl. Poros Kolaka-Pomalaa No.12 Kel.Wundulako<br>";
            $html .= "---------------------------------------------------------<br><br></div>";
            $html .= "<div>Faktur &nbsp;&nbsp;&nbsp;: $nofaktur &nbsp;&nbsp;&nbsp; Nama Pasien &nbsp;&nbsp;&nbsp;: $namapasien<br>";
            $html .= "Admin : $login_name |Tanggal : $tgl";
            $html .= "<table style='border-style: dashed;'><b><tr style='backgrouond-color:blue;' align='center'><th>Nama Obat</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr></b>";
            $html .= "<tr><td>$namaobat</td><td>$hargaobat</td><td>$jumlah</td><td>$total</td></tr>";
            $html .= "</table>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</tr></table>";
        }
    }
?>