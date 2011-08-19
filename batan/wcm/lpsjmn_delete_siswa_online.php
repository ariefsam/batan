<?php
$id = $_GET['id'];
include 'konfigurasi.php';
$db->where("id=$id");
$db->delete('Lpsjmn_siswa_online');