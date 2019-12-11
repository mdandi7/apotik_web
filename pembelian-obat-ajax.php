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

	    $total=$_POST['total_harga'];
	    $html = "";

		$faktur_check = mysqli_query($connection, "SHOW TABLE STATUS LIKE 'penjualan_tanparesep_detail'");
		$faktur = mysqli_fetch_array($faktur_check);
		$nofaktur = $faktur['Auto_increment'];

		$stock_trigg = 0;
		for($i = 0; $i < count($kodeobat); $i++){
			$stok_check = mysqli_query($connection, "SELECT stok_obat FROM pemasukan_obat WHERE kode_obat = '$kodeobat[$i]'");
        	$stok = mysqli_fetch_array($stok_check);
        	if($stok['stok_obat'] < $jumlah[$i]){
        		$stock_trigg = 1;
	            $stoknow = $stok['stok_obat'];
	            $error .= "Stok obat $namaobat[$i] tidak mencukupi. Stok sebanyak $stoknow \n";
	        }
		}

		if($stock_trigg == 1){
	        echo($error);
	    }else{
	    	echo($nofaktur);	//SAMPAI DISINI BELUM KELAR//
	    }
		
		ob_end_flush();
	    mysqli_close($connection); // Closing Connection
	}    
	
?>