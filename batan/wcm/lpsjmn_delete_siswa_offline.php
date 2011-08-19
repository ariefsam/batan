<?php
$id = $_GET['id'];
include 'konfigurasi.php';
$db->where("id=$id");
$db->delete('Lpsjmn_siswa');
$db->where("id_siswa=$id");
$db->delete('Lpsjmn_pelatihan');
$db->where("id_terdaftar=$id");
$db->delete('Lpsjmn_siswa_online');