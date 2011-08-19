<?php
$id = $_GET['id'];
include 'konfigurasi.php';
$db->where("id_order=$id");
$db->delete('order_limbah');
$db->where("id_order=$id");
$db->delete('limbah');