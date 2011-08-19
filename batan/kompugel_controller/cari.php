<?php
if(!$gabung) die();
if($_POST['cari']) header("Location: cari/" . str_replace(" ", "-", strtolower(strip_tags($_POST['cari']))) . ".html");
else {
    require "lib/date.php";
    require "model/model.php";
    if($param[2]) $start=$param[2]; else $start=0;
    if($start<0) $start=0;
    $data_cari = addslashes($param[1]);
    $db->where("judul like '%$data_cari%' or isi like '%$data_cari%'");
    $db->get("artikel", $start, 10);
    $list_cari = $db->get_fetch();   
    require "lib/pagination.php";
    $confi = array();
    $confi['per_page'] = 10;
    $confi['start'] = $start;
    $confi['base_url']= $config->base_url . "portal/cari/" . $param[1];

    $db->get('artikel');
    $confi['total_rows'] = $db->num_rows();
    $page = new pagination();
    $page->initialize($confi);
    
    $view_content = "view/hasil_cari.php";
    require "view/home.php";
}
