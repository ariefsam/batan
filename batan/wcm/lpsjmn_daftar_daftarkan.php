<?php

require "konfigurasi.php";
$id = $_GET['id'];
$db->where("id=$id");
$db->get('Lpsjmn_siswa_online');
$siswa = $db->get_fetch();
print_r($siswa);
if (count($siswa) > 0)
{
    $siswa = $siswa[0];
    $data = array(
        "nama"          => $siswa['nama'],
        "tgl_lahir"     => $siswa['tgl_lahir'],
        "perusahaan"    => $siswa['perusahaan'],
        "telpon"        => $siswa['telpon']
    );
    $x = $db->insert('Lpsjmn_siswa', $data);
    if ($x)
    {
        $db->where("id=$id");
        $id_baru = array(
            "id_terdaftar"  => $x,
            "status"        => 1
        );
        $db->update('Lpsjmn_siswa_online', $id_baru);
        header('location: ?aksi=edit_detail&id=' . $x);
    }
    else
        echo "Pendaftaran Gagal";
}
else ;
    //header('Location: lpsjmn_daftar.php');

