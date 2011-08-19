<?php
session_start();
$gabung = true;
require "kompugel_config/config.php";
require "lib/db.php";
$db = db::singleton();
/*
if(!isset($_SESSION['pengunjung']))
{
    $db->where("field='session'");
    $db->get('setting');
    $data = $db->get_fetch();
    $data = $data[0];
    $_SESSION['pengunjung'] = $data['value'];
    $data = array("value" => ++$data['value']);
    $db->update('setting', $data);
    $db->where(1);
    $data = array(
        "ip"        => $_SERVER['REMOTE_ADDR'],
        "session"   => $_SESSION['pengunjung'],
        "tanggal"   => date('Y-m-d H:i:s')
    );
    $db->insert('visit', $data);
}
*/
$param = explode("/", $_GET['controller']);
$controller = $param[0];
unset($param[0]);
$p_count = count($param);
if(is_file("kompugel_controller/" . $controller . ".php"))
require "kompugel_controller/" . $controller . ".php";
else header("Location: 404.php");
