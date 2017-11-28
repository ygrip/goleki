<?php
	function tgl_indonesia($tgl){
		$nama_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		$tanggal 	= substr($tgl, 8,2);
		$bulan 		= $nama_bulan[(int) substr($tgl,5,2)];
		$tahun		= substr($tgl, 0, 4);

		return $tanggal.' '.$bulan.' '.$tahun;
	}

	function waktu_gabung($tgl){
		$nama_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		$tanggal 	= substr($tgl, 8,2);
		$bulan 		= $nama_bulan[(int) substr($tgl,5,2)];
		$tahun		= substr($tgl, 0, 4);
		$jam		= substr($tgl, 11, 2);
		$menit		= substr($tgl, 14, 2);
		$detik		= substr($tgl, 17, 2);

		return $tanggal.' '.$bulan.' '.$tahun.',</br><p style="color : #f9cc79; font-weight: normal; font-size : 0.8vw;">'.$jam.':'.$menit.':'.$detik.' WIB</p>';
	}
?>