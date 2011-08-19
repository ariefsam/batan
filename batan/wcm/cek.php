<?php
session_start();
include ("konfigurasi.php");
 $cek       = $_SESSION['cek'];
 $nama      = $_SESSION['username'];
 $uid       = $_SESSION['uid'];
 $lvl       = $_SESSION['lvl'];
 $idsatker      = $_SESSION['idsatker'];
//echo "cek =$cek<br>nama = $username<br>jump = $jump";
   if($cek != "sudah_diperiksa_sudahOK")
  {
    header ($jump."login.php?ck=1");
    exit;
  }

   $array_menu = array(); $c=1;
   $array_menu[0] = 'Pesan Akses';
   $query = "SELECT a.menu as menu, a.link as link FROM menu as a, menu_pengguna as b WHERE a.id = b.id_menu AND b.id_pengguna = '$uid'";
   $result=    mysql_query($query) or die('Error, query gagal2. ' . mysql_error());
   while($row=mysql_fetch_array($result))
     { list($menu, $link)=$row;
        $array_menu[$c] = $menu;
        $c= $c + 1;
     }
  if (!in_array($nama_menu,$array_menu)) {
    header ($jump."error.php");
    exit;
     }
?>