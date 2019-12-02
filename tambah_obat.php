<?php
    $error=""; // Variable To Store Error Message
    // Define $username and $password
    $connection = mysqli_connect("localhost", "root", "", "apotik");
    if (isset($_POST['submit'])) {
        $kodeobat=$_POST['kodeobat'];
        $namaobat=$_POST['namaobat'];
        $jenisobat=$_POST['jenisobat'];
        $hargaobat=$_POST['hargaobat'];
        $stokobat=$_POST['stokobat'];
        $tglobat=$_POST['tglobat'];
        $tglkdl=$_POST['tglkdl'];
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        
        $query_check = mysqli_query($connection, "select * from pemasukan_obat where kode_obat = '$kodeobat' and nama_obat = '$namaobat'");

        $rows = mysqli_num_rows($query_check);
        if (($rows == 0) and ($jenisobat != "Pilih Salah Satu")){
            mysqli_query($connection, "INSERT INTO pemasukan_obat(kode_obat,nama_obat,jenis_obat,harga,stok_obat,tgl_masuk,tgl_kadaluarsa) VALUES('$kodeobat','$namaobat','$jenisobat','$hargaobat','$stokobat','$tglobat','$tglkdl')") or  die("".mysqli_error($connection));
            $error = "insert success.";
            //header("Location: pemasukan_obat.php"); // Redirecting To Other Page
            
        }  else{
            //$_SESSION['login_admin']=$username; // Initializing Session
            $error = "Kode_obat must be unique and cannot duplicate.";
            header("Location: pemasukan_obat.php"); // Redirecting To Other Page
        }
        mysqli_close($connection); // Closing Connection
    }
    elseif (isset($_POST['cariobat'])) {
        $like_namaobat=$_POST['like_namaobat'];
        $query_check=mysqli_query($connection, "select * from pemasukan_obat where nama_obat like '%$like_namaobat%'");
        $rows = mysqli_num_rows($query_check);
    }
?>