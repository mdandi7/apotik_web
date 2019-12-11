<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "apotik");
    
    $type=$_POST['type'];
	
	if($type == "non-resep"){

		$kodeobat=$_POST['kode_obat'];
		$namaobat=$_POST['namaobat'];
	    $jumlah=$_POST['jumlah_obat'];


	    $tgl=$_POST['tanggal'];
	    $login_name = $_POST['login_name'];
	    $total=$_POST['total_harga'];
	    $html = "";

		$faktur_check = mysqli_query($connection, "SHOW TABLE STATUS LIKE 'penjualan_tanparesep_detail'");
		$faktur = mysqli_fetch_array($faktur_check);
		$nofaktur = $faktur['Auto_increment'];
		$stock_obat = array();
		$harga_obat = array();
		$harga_obat_tot = array();

		$stock_trigg = 0;
		for($i = 0; $i < count($kodeobat); $i++){
			$stok_check = mysqli_query($connection, "SELECT * FROM pemasukan_obat WHERE kode_obat = '$kodeobat[$i]'");
        	$stok = mysqli_fetch_array($stok_check);
        	$stock_obat[$i] = $stok['stok_obat'];
        	$harga_obat_tot[$i] = $stok['harga'] * $jumlah[$i];
        	$harga_obat[$i] = $stok['harga'];
        	if($stok['stok_obat'] < $jumlah[$i]){
        		$stock_trigg = 1;
	            $stoknow = $stok['stok_obat'];
	            $html .= "Stok obat $namaobat[$i] tidak mencukupi. Stok sebanyak $stoknow \n";
	        }
		}

		$html .= "||";

		if($stock_trigg == 1){
	        echo($html);
	    }else{
	    	for($i = 0; $i < count($kodeobat); $i++){

		    	mysqli_query($connection, "INSERT INTO obat_terjual(no_faktur,type_penjualan,kode_obat,nama_obat, jumlah, total_harga) VALUES ('$nofaktur','$type','$kodeobat[$i]','$namaobat[$i]','$jumlah[$i]','$harga_obat_tot[$i]')");
				$curr_stock = $stock_obat[$i] - $jumlah[$i];

		    	mysqli_query($connection,"UPDATE pemasukan_obat SET stok_obat = '$curr_stock' WHERE kode_obat = '$kodeobat[$i]'");

		    	$html .= "Penjualan obat $namaobat[$i] sebanyak $jumlah[$i] telah dilakukan pada tanggal $tgl . Stok Obat tersisa $curr_stock. \n";
	    	}

	    	$html .= "||";

	    	$sum_jumlah = array_sum($jumlah);
	    	
	    	mysqli_query($connection, "INSERT INTO penjualan_tanparesep_detail(jumlah,tgl,total1) VALUES ('$sum_jumlah','$tgl','$total')");

	    	
            $html .= "<div align='center'>";
            $html .= "<table style='border-style: dashed;><tr>";
            $html .= "<div align='center'>---------------------------------------------------------<br>";
            $html .= "<b>APOTEK SETIAWAN</b><br>";
            $html .= "Jl. Poros Kolaka-Pomalaa No.12 Kel.Wundulako.<br>";
            $html .= "---------------------------------------------------------<br><br></div>";
            $html .= "<div>Faktur &nbsp;&nbsp;&nbsp;: $nofaktur <br>";
            $html .= "Admin : $login_name | Tanggal : $tgl";
            $html .= "<table style='border-style: dashed;'><b><tr style='backgrouond-color:blue;' align='center'><th>Nama Obat</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr></b>";

            for($i = 0; $i < count($kodeobat); $i++){
            	$html .= "<tr><td>$namaobat[$i]</td><td>$harga_obat[$i]</td><td>$jumlah[$i]</td><td>$harga_obat_tot[$i]</td></tr>";
            }

            $html .= "</table>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</tr></table>";


	    	echo $html;
	    }
		
		ob_end_flush();
	    mysqli_close($connection); // Closing Connection

	}elseif($type == "with-resep"){

		$kodeobat=$_POST['kode_obat'];
		$namaobat=$_POST['namaobat'];
	    $jumlah=$_POST['jumlah_obat'];

	    $nama_pasien=$_POST['nama_pasien'];
	    $nama_dokter=$_POST['nama_dokter'];
	    $tgl=$_POST['tanggal'];
	    $login_name = $_POST['login_name'];
	    $total=$_POST['total_harga'];
	    $html = "";

		$faktur_check = mysqli_query($connection, "SHOW TABLE STATUS LIKE 'penjualan_resep_detail'");
		$faktur = mysqli_fetch_array($faktur_check);
		$nofaktur = $faktur['Auto_increment'];
		$stock_obat = array();
		$harga_obat = array();
		$harga_obat_tot = array();

		$stock_trigg = 0;
		for($i = 0; $i < count($kodeobat); $i++){
			$stok_check = mysqli_query($connection, "SELECT * FROM pemasukan_obat WHERE kode_obat = '$kodeobat[$i]'");
        	$stok = mysqli_fetch_array($stok_check);
        	$stock_obat[$i] = $stok['stok_obat'];
        	$harga_obat_tot[$i] = $stok['harga'] * $jumlah[$i];
        	$harga_obat[$i] = $stok['harga'];
        	if($stok['stok_obat'] < $jumlah[$i]){
        		$stock_trigg = 1;
	            $stoknow = $stok['stok_obat'];
	            $html .= "Stok obat $namaobat[$i] tidak mencukupi. Stok sebanyak $stoknow \n";
	        }
		}

		$html .= "||";

		if($stock_trigg == 1){
	        echo($html);
	    }else{
	    	for($i = 0; $i < count($kodeobat); $i++){

		    	mysqli_query($connection, "INSERT INTO obat_terjual(no_faktur,type_penjualan,kode_obat,nama_obat, jumlah, total_harga) VALUES ('$nofaktur','$type','$kodeobat[$i]','$namaobat[$i]','$jumlah[$i]','$harga_obat_tot[$i]')");
				$curr_stock = $stock_obat[$i] - $jumlah[$i];

		    	mysqli_query($connection,"UPDATE pemasukan_obat SET stok_obat = '$curr_stock' WHERE kode_obat = '$kodeobat[$i]'");

		    	$html .= "Penjualan obat $namaobat[$i] sebanyak $jumlah[$i] telah dilakukan pada tanggal $tgl . Stok Obat tersisa $curr_stock. \n";
	    	}

	    	$html .= "||";

	    	$sum_jumlah = array_sum($jumlah);
	    	
	    	mysqli_query($connection, "INSERT INTO penjualan_resep_detail(nama_pasien, nama_dokter, jumlah,tgl,total) VALUES ('$nama_pasien','$nama_dokter','$sum_jumlah','$tgl','$total')");

	    	
            $html .= "<div align='center'>";
            $html .= "<table style='border-style: dashed;><tr>";
            $html .= "<div align='center'>---------------------------------------------------------<br>";
            $html .= "<b>APOTEK SETIAWAN</b><br>";
            $html .= "Jl. Poros Kolaka-Pomalaa No.12 Kel.Wundulako.<br>";
            $html .= "---------------------------------------------------------<br><br></div>";
            $html .= "<div>Faktur &nbsp;&nbsp;&nbsp;: $nofaktur <br>";
            $html .= "Pasien : $nama_pasien | Dokter : $nama_dokter <br>";
            $html .= "Admin : $login_name | Tanggal : $tgl";
            $html .= "<table style='border-style: dashed;'><b><tr style='backgrouond-color:blue;' align='center'><th>Nama Obat</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr></b>";

            for($i = 0; $i < count($kodeobat); $i++){
            	$html .= "<tr><td>$namaobat[$i]</td><td>$harga_obat[$i]</td><td>$jumlah[$i]</td><td>$harga_obat_tot[$i]</td></tr>";
            }

            $html .= "</table>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</tr></table>";


	    	echo $html;
	    }
		
		ob_end_flush();
	    mysqli_close($connection); // Closing Connection
	}
	
?>