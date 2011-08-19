<?php if(!$gabung) die();

require "model/model.php";
require "lib/date.php";
if($param[2]) $start=$param[2]; else $start=0;
if($start<0) $start=0;
$arr_section = get_array_section($db);

require "lib/pagination.php";
$db->where("id=" . $param[1]);
$db->get("section");
if($db->num_rows()==0) header('Location: 404.php');
$data = $db->get_fetch();
$data = $data[0];

$db->where("section=" . $param[1] . " ORDER BY tanggal_buat desc");
if($data['sort']==0) $db->where("section=" . $param[1] . " ORDER BY tanggal_buat asc");
$db->get("artikel", $start, 10);
$list_section = $db->get_fetch();

$confi = array();
$confi['per_page'] = 10;
$confi['start'] = $start;
$confi['base_url']= $config->base_url . "portal/section/" . $param[1];

$db->get('artikel');
$confi['total_rows'] = $db->num_rows();
$page = new pagination();
$page->initialize($confi);
$view_content = "view/section.php";
require "view/home.php";