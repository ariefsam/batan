<?php
function Koneksi($host, $name, $pass, $db)
{
	$koneksi =  mysql_connect($host, $name, $pass, $db) ;
	if ($koneksi) {
    		mysql_select_db($db);
//		echo "Koneksi Sukses";
	}
	else {
    		echo "Koneksi Gagal";
    		exit;
	}
}
function Pilih($tabel){
	$strsql="select * from $tabel";
//	echo $strsql;
	$q=mysql_query($strsql);
	while($d=mysql_fetch_array($q)) {
		$pilihan .="<Option value={$d[id]}> {$d[nama]}</Option>";
	}
	return $pilihan;
}
function Pilih_Satker($tabel){
	$strsql="select * from $tabel";
//	echo $strsql;
	$q=mysql_query($strsql);
	while($d=mysql_fetch_array($q)) {
		$pilihan .="<Option value={$d[id_pengirim]}> {$d[nama_pengirim]}</Option>";
	}
	return $pilihan;
}
?>
