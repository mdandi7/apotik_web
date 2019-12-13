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
            mysqli_query($connection, "INSERT INTO pemasukan_obat(kode_obat,nama_obat,kategori_obat,jenis_obat,harga,stok_obat,tgl_masuk,tgl_kadaluarsa) VALUES('$kodeobat','$namaobat','$kategoriobat','$jenisobat','$hargaobat','$stokobat','$tglobat','$tglkdl')") or  die("".mysqli_error($connection));
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

?>