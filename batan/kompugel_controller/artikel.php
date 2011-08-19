<?php if(!$gabung) die();
require "lib/date.php";
$db->where('id=' . intval($param[1]));
$db->get('pie');
$artikels = $db->get_fetch();
$artikels= $artikels[0];


//Berita Nuklir
$db->where('id_kategori=4 order by waktu_kirim desc');
$db->get('berita', 0, 5);
$list_berita_nuklir = $db->get_fetch();

//Berita Batan
$db->where('id_kategori=1 order by waktu_kirim desc');
$db->get('berita', 0, 5);
$list_berita_batan = $db->get_fetch();

////list Artikel
$db->where('1');
$db->get('PIE', 0, 20);
$list_arsip_artikel = $db->get_fetch();

////Artikel
$db->where('1');
$db->get('PIE', 0, 5);
$list_artikel = $db->get_fetch();



$db->where(1);
$db->get('satker');
$data_satker = $db->get_fetch();
foreach($data_satker as $s)
{
    $satker[$s['id']] = $s['nama'];
}

        switch ($param[1])
        {
        case "artikel":
        $view_content = "view/artikel.php";
        require "view/home.php";

        case "arsipartikel":
        $view_content = "view/arsipartikel.php";
        require "view/home.php";
        break;

        default:
        $view_content = "view/artikel.php";
        require "view/home.php";
        break;
}

