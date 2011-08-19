<?php
//Load library tanggal
require 'lib/date.php';
//==========Load Library Upload, untuk mengupload=============
require 'lib/upload.php';
require_once 'konfigurasi.php';
$id = $_POST['id'];
$db->where("id=$id");
$db->get('lpsjmn_siswa');
$siswa = $db->get_fetch();
$siswa=$siswa[0];

$upload = new upload();
if ($_POST['nama']) {

    $data = $_POST;
    $data['tgl_lahir'] = to_date($data['tgl_lahir']);
    $dir_ktp = "./ktp/"; //Ini Photo sihs
    $dir_tandatangan = "./ttd/";

    if($_FILES['tandatangan']['name'])
    {
        $config['directory'] = $dir_tandatangan;
        $x = $upload->do_upload('tandatangan', $config);
        unlink($dir_ktp . $siswa['tandatangan']);
        $data['tandatangan'] = $x['name'];
    }

    if($_FILES['foto']['name'])
    {
        $config['directory'] = $dir_ktp;
        $x = $upload->do_upload('foto', $config);
        unlink($dir_tandatangan . $siswa['foto']);
        $data['foto'] = $x['name'];
    }
    $db->where("id=$id");
    $x = $db->update('Lpsjmn_siswa', $data);
    header('location: ?aksi=detail&id=' . $id);
}
