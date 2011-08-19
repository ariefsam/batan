<?php
include "konfigurasi.php";

session_start();

$url = $jump."index.php";
$cek=$_SESSION['cek'];
//echo "cek =$cek";

if($cek == "sudah_diperiksa_sudahOK")
 {
  session_destroy();
  header($url);
  exit;
 }else
 {
  header($jump."login.php?ck=1");
  exit;
 }
?>