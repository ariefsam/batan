<?php

require 'lib/db.php';
require 'lib/date.php';

$db = db::singleton();
$sidebar = 'sidebar_psjmn.php';

switch ($sub){
    case "alur":
        $view_content = 'view/psjmn/alur.php';
        break;
    case "syarat":
        $view_content = 'view/psjmn/syarat.php';
        break;
    case "daftar":
        $view_content = 'view/psjmn/daftar.php';
        $db->get('Lpsjmn_jenis_pelatihan');
        $pelatihan = $db->get_fetch();
        break;
    case "p_daftar":
        $view_content = 'view/psjmn/p_daftar.php';
        break;
    case "jadwal":
        $view_content = 'view/psjmn/jadwal.php';
        break;
    default:
        $view_content = 'view/psjmn/home.php';
        break;
}

?>
