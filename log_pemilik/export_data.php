	<?php
    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "apotik");

    $download_ind = $_GET["download_ind"];
    

	if($download_ind == "daily"){
		@header("Content-Disposition: attachment; filename=penjualan_harian.csv");

		$tgl=$_GET["data"];

		$query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_tanparesep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE tgl = '$tgl'");
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

	 	$query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_resep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE tgl = '$tgl'");
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

		if($download_ind == "monthly"){
		@header("Content-Disposition: attachment; filename=penjualan_bulanan.csv");

		$tgl=$_GET["data"];

		$query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_tanparesep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE DATE_FORMAT(tgl,'%Y-%m') = '$tgl'");
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

	 	$query = mysqli_query($connection,"SELECT a.*, b.nama_obat FROM penjualan_resep_detail a JOIN pemasukan_obat b on a.kode_obat = b.kode_obat WHERE DATE_FORMAT(tgl,'%Y-%m') = '$tgl'");
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

		if($download_ind == "pasien"){
		@header("Content-Disposition: attachment; filename=Konsultasi_pasien.csv");


		$query = mysqli_query($connection,"SELECT * FROM pasien");
		$data = "";
		$data.="Konsultasi Pasien \n\n";
		$data.="Nama Pasien,";
		$data.="Alamat,";
		$data.="Umur,";
		$data.="Pengukuran,";
		$data.="Hasil,";
		$data.="Tanggal \n";
		 while($row=mysqli_fetch_assoc($query))
		 {
		  $data.=$row['nama'].",";
		  $data.=$row['alamat'].",";
		  $data.=$row['umur'].",";
		  $data.=$row['pengukuran'].",";
		  $data.=$row['hasil'].",";
		  $data.=$row['tanggal']."\n";
		 }

		 echo $data;
 		exit();
		}

		if($download_ind == "obat"){
		@header("Content-Disposition: attachment; filename=Stok_Obat.csv");


		$query = mysqli_query($connection,"SELECT * FROM pemasukan_obat");
		$data = "";
		$data.="Stok Obat \n\n";
		$data.="Nama Obat,";
		$data.="Jenis Obat,";
		$data.="Harga,";
		$data.="Stok Obat,";
		$data.="Tanggal Masuk,";
		$data.="Tanggal Kadaluarsa \n";
		 while($row=mysqli_fetch_assoc($query))
		 {
		  $data.=$row['nama_obat'].",";
		  $data.=$row['jenis_obat'].",";
		  $data.=$row['harga'].",";
		  $data.=$row['stok_obat'].",";
		  $data.=$row['tgl_masuk'].",";
		  $data.=$row['tgl_kadaluarsa']."\n";
		 }

		 echo $data;
 		exit();
		}
?>