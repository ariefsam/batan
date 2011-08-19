<?php
$id = $_GET['id'];
require_once "konfigurasi.php";
$db->where("id=$id");
$db->delete('Lpsjmn_pelatihan');