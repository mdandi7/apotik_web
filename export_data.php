<?php
    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "apotik");
	if(isset($_POST['exportharian'])){
		@header("Content-Disposition: attachment; filename=penjualan_harian.csv");


		$query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_tanparesep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE tgl = convert(now(),date)");
		$data = "";
		$data.="Penjualan Tanpa Resep \n\n";
		$data.="Kode Faktur,";
		$data.="Kode Obat,";
		$data.="Nama Obat,";
		$data.="Jumlah,";
		$data.="Tanngal,";
		$data.="Total \n";
		 while($row=mysqli_fetch_assoc($query))
		 {
		  $data.=$row['no_faktur1'].",";
		  $data.=$row['kode_obat'].",";
		  $data.=$row['nama_obat'].",";
		  $data.=$row['jumlah'].",";
		  $data.=$row['tgl'].",";
		  $data.=$row['total1']."\n";
		 }

	 	$data.="\n\n";

	 	$query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_resep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE tgl = convert(now(),date)");
		$data.="Penjualan Dengan Resep \n\n";
		$data.="Kode Faktur,";
		$data.="Kode Obat,";
		$data.="Nama Obat,";
		$data.="Nama Pasien,";
		$data.="Nama Dokter,";
		$data.="Jumlah,";
		$data.="Tanngal,";
		$data.="Total \n";
		 while($row=mysqli_fetch_assoc($query))
		 {
		  $data.=$row['no_faktur'].",";
		  $data.=$row['kode_obat'].",";
		  $data.=$row['nama_obat'].",";
		  $data.=$row['nama_pasien'].",";
		  $data.=$row['nama_dokter'].",";
		  $data.=$row['jumlah'].",";
		  $data.=$row['tgl'].",";
		  $data.=$row['total']."\n";
		 }

		 echo $data;
 		exit();
		}

		if(isset($_POST['exportbulanan'])){
		@header("Content-Disposition: attachment; filename=penjualan_bulanan.csv");


		$query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_tanparesep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE month(tgl) = month(now())");
		$data = "";
		$data.="Penjualan Tanpa Resep \n\n";
		$data.="Kode Faktur,";
		$data.="Kode Obat,";
		$data.="Nama Obat,";
		$data.="Jumlah,";
		$data.="Tanngal,";
		$data.="Total \n";
		 while($row=mysqli_fetch_assoc($query))
		 {
		  $data.=$row['no_faktur1'].",";
		  $data.=$row['kode_obat'].",";
		  $data.=$row['nama_obat'].",";
		  $data.=$row['jumlah'].",";
		  $data.=$row['tgl'].",";
		  $data.=$row['total1']."\n";
		 }

	 	$data.="\n\n";

	 	$query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_resep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE month(tgl) = month(now())");
		$data.="Penjualan Dengan Resep \n\n";
		$data.="Kode Faktur,";
		$data.="Kode Obat,";
		$data.="Nama Obat,";
		$data.="Nama Pasien,";
		$data.="Nama Dokter,";
		$data.="Jumlah,";
		$data.="Tanngal,";
		$data.="Total \n";
		 while($row=mysqli_fetch_assoc($query))
		 {
		  $data.=$row['no_faktur'].",";
		  $data.=$row['kode_obat'].",";
		  $data.=$row['nama_obat'].",";
		  $data.=$row['nama_pasien'].",";
		  $data.=$row['nama_dokter'].",";
		  $data.=$row['jumlah'].",";
		  $data.=$row['tgl'].",";
		  $data.=$row['total']."\n";
		 }

		 echo $data;
 		exit();
		}
?>