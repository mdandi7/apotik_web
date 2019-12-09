<?php
    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "apotik");
    // Define $username and $password
    $html = "";
    if (isset($_POST['submitpasien'])) {
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $umur=$_POST['umur'];
        $pengukuran=$_POST['pengukuran'];
        $hasil=$_POST['hasil'];
        $tgl=$_POST['tgl'];
        
        /*$query_check = mysqli_query($connection, "select * from pasien where (kode_obat = '$kodeobat' or nama_obat = '$namaobat')");*/

        //$rows = mysqli_num_rows($query_check);
        if ($pengukuran != "Pilih Salah Satu"){
            mysqli_query($connection, "INSERT INTO pasien(nama,alamat,umur,pengukuran,hasil,tanggal) VALUES('$nama','$alamat','$umur','$pengukuran','$hasil','$tgl')") or  die("".mysqli_error($connection));
            $error = "Input konsultasi pasien sukses.";
            //header("Location: pemasukan_obat.php"); // Redirecting To Other Page
            $html .= "<div align='center'>";
            $html .= "<table style='border-style: dashed;><tr>";
            $html .= "<div align='center'>---------------------------------------------------------<br>";
            $html .= "<b>APOTEK SETIAWAN!</b><br>";
            $html .= "Jl. Poros Kolaka-Pomalaa No.12 Kel.Wundulako<br>";
            $html .= "---------------------------------------------------------<br><br></div>";
            $html .= "<div> Nama Pasien &nbsp;&nbsp;&nbsp;: $nama | Umur &nbsp;&nbsp;&nbsp;: $umur  <br>";
            $html .= "Alamat Pasien &nbsp;&nbsp;&nbsp;: $alamat |<br> Pengukuran &nbsp;&nbsp;&nbsp;: $pengukuran  <br>";
            $html .= "Hasil : $hasil |<br>";
            $html .= "Obat : .................................<br>";
            $html .= "...........................................<br>";
            $html .= "...........................................<br>";
            $html .= "...........................................<br>";
            $html .= "Apoteker : $login_name | Tanggal : $tgl</div>";
            
        }  else{
            //$_SESSION['login_admin']=$username; // Initializing Session
            $error = "Kode obat dan nama obat harus unik dan tidak bisa di duplikasi, atau pilih salah satu jenis obat.";
            //header("Location: pemasukan_obat.php"); // Redirecting To Other Page
        }
        ob_end_flush();
        mysqli_close($connection); // Closing Connection

    }
?>