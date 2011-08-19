<?php
//Halaman ini merupakan halaman utama dari silaba.. Jika layanannya adalah PSJMN,
// maka untuk selanjutnya file2 di psjmn.php yang diedit.

if($_GET['l']) $layanan = $_GET['l'];
else $layanan = "depan";

$sub = $_GET['s'];
$active_menu = "home";
$main_content = "view/main2.php";

switch ($layanan)
{
    case "depan":
        $view_content = "view/depan.php";
        $main_content = "view/main.php";
        break;
    case "psjmn";
        $active_menu = "psjmn";
        require "psjmn.php";
        break;
    case "limbah";
        $active_menu = "limbah";
        session_start();
        require "limbah.php";
        break;
    default:
        $view_content = "view/404.php";
        $main_content = "view/main.php";
        break;
}

require $main_content;
