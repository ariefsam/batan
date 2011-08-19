<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'batan';
$jump = "location: http://localhost/batan/wcm/";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Gagal Melakukan Koneksi ke MYSQL');
mysql_select_db($dbname);

//=======================Library PKL Arief================
require_once 'lib/db.php';
$db = db::singleton();


?>
