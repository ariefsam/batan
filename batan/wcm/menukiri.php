<?php
session_start();
 $cek    = $_SESSION['cek'];
 $nama = $_SESSION['username'];
 $uid    = $_SESSION['uid'];
 $lvl    = $_SESSION['lvl'];
 $in = $_GET['in'];
 //echo "cek =$cek";
 include ("konfigurasi.php");
 if($cek == "sudah_diperiksa_sudahOK")
  {
     $query = "SELECT a.menu as menu, a.link as link FROM menu as a, menu_pengguna as b WHERE a.id = b.id_menu AND b.id_pengguna  = '$uid'AND a.tampil=1 ORDER BY a.id ASC";
     //echo "kuer = $query";
     $result=    mysql_query($query) or die('Error, query gagal2. ' . mysql_error());
     while($row=mysql_fetch_array($result))
     { list($menu, $link)=$row;
        $menu_p .=  '<li><a href="'.$link.'">'.$menu.'</a></li>';
     }
     $menu = '
     <ul>
                    <li><a href="index.php?in=1">Home</a></li>
                    '.$menu_p.'
                    <li><a href="off.php">Logout</a></li>
                </ul>
     ';
     if($in != 1)
     {$menu_atas = '<a href="?aksi=add" class="comments">Add</a>&nbsp;&nbsp;&nbsp;<font color=white>|</font>&nbsp;&nbsp;&nbsp;<a href="?aksi=list" class="comments">List</a>';}
      $isi = '
    <h2 class="title">'.$nama.', Selamat Datang di WebCoMa</h2>
            <div class="entry">
                <p>WebCoMa adalah <i>Web Content Management</i>.</p>
                <p>Melalui halaman ini Anda dapat menuju ke bagian pengelolaan <i>content web</i>.</p>
                <p>Silakan memilih menu disamping untuk melakukan perubahan pada <i>content</i> tertentu</p>
                <p>User_ID Login Anda menentukan tingkat <i>previlage</i> Anda untuk pengelolaan <i>content web</i>.</P>
                <p>Selamat bekerja, semoga bermanfaat!</p>
                <p><a href="mailto:admin@batan.go.id">admin@batan.go.id</a><br><br><br><br><br></p>
            </div>
   ';
  }
  else
  {
   $menu = '
   <ul><li><a href="index.php">Home</a></li><li><a href="login.php">Login</a></li></ul>
   <br><br><br><br><br><br><br><br>';
   $menu_atas = '';
   $isi = '
    <h2 class="title">Sekilas Tentang WebCoMa</h2>
            <div class="entry">
                <p>WebCoMa adalah <i>Web Content Management</i>.</p>
                <p>Melalui halaman ini Anda dapat menuju ke bagian pengelolaan <i>content web</i>.</p>
                <p>Sebelum masuk untuk melakukan pengelolaan <i>content web</i> lebih lanjut, Anda diharuskan <a href="login.php">Login</a>     terlebih dulu.</p>
                <p>User_ID Login Anda menentukan tingkat <i>previlage</i> Anda untuk pengelolaan <i>content web</i>.</P>

                <p>Silahkan Login untuk memulai, dan jangan lupa Logout setelah selesai menggunakan WCM</p>
                <p>Selamat bekerja, semoga bermanfaat!</p>
                <p><a href="mailto:admin@batan.go.id">admin@batan.go.id</a></p>
            </div>
   ';
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Diversity
Description: A two-column, fluid-width design suitable for blogs.
Version    : 1.0
Released   : 20070919

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>BATAN | WebComa</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="icon" href="favicon.ico" type="image/ico">
</head>
<body>
<!-- start sidebar -->
    <div id="search">
        <form method="get" action="">
            <fieldset>
            <h1 class="logo"><i>BATAN Web Content Managemen</i></h1>
            </fieldset>
        </form>
    </div>
<br/>
<div id="sidebar">
    <!-- div id="logo">
        <h1><a href="http://www.batan.go.id/"><img src="images/logo_batan.png"></a></h1><p>&nbsp;</p>
    </div -->
    <div id="widgets">
        <div id="widgets-top"></div>
        <ul>
            <li>
                <h2><i>MENU WebCoMa</i></h2>
                <?php echo $menu; ?>
            </li>
        </ul>
    </div>
</div>
<!-- end sidebar -->
