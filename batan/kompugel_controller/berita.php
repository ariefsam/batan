<?php if(!$gabung) die();
require "lib/date.php";
$db->where('id_berita=' . intval($param[1]));
$db->get('berita');
$berita = $db->get_fetch();
$berita = $berita[0];

//komentar
$db->get('berita_komentar', 0, 5);
$list_komentar = $db->get_fetch();

//Berita Nuklir
$db->where('id_kategori=4 order by waktu_kirim desc');
$db->get('berita', 0, 5);
$list_berita_nuklir = $db->get_fetch();

//Berita Batan
$db->where('id_kategori=1 order by waktu_kirim desc');
$db->get('berita', 0, 5);
$list_berita_batan = $db->get_fetch();

//arsip Berita
$db->where('1');
$db->get('berita', 0, 20);
$list_arsip_berita = $db->get_fetch();

////Artikel
$db->where('1');
$db->get('PIE', 0, 5);
$list_artikel = $db->get_fetch();

////list Artikel
$db->where('2');
$db->get('PIE', 0, 20);
$list_arsip_artikel = $db->get_fetch();

$db->where(1);
$db->get('satker');
$data_satker = $db->get_fetch();
foreach($data_satker as $s)
{
    $satker[$s['id']] = $s['nama'];
}

switch ($param[1])
{
    case "berita":
        $view_content = "view/berita.php";
        require "view/home.php";
        break;

    case "arsipberita":
        $view_content = "view/arsipberita.php";
        require "view/home.php";
        break;

    default:
        $view_content = "view/berita.php";
        require "view/home.php";
        break;
}

