<?php

if(!$_SESSION['admin']) header("Location: " . $config->base_url . "portal/login.html");
if(!$gabung) die();
require 'model/model.php';
require 'lib/pagination.php';
switch ($param[1])
{
    case "top_menu":
        if(isset($_POST['judul'])) $db->insert('top_menu', $_POST);
        //die();
        $db->where("1 order by parent, urutan");
        $db->get('top_menu');
        $list_top = $db->get_fetch();
        $arr_top_menu = get_array_top_menu($db);
        $view_content = "view/admin/top_menu.php";
//        require 'view/admin/depan.php';
        break;
    case "menu":
        if(isset($_POST['judul'])) $db->insert('menu', $_POST);
        $db->get('menu');
        $list_menu = $db->get_fetch();
        $view_content = "view/admin/menu.php";
        break;
        
    case "section":
        if(isset($_POST['judul'])) $db->insert('section', $_POST);
		$db->where('1 order by urutan');
        $db->get('section');
        $list_top = $db->get_fetch();
        $view_content = "view/admin/section.php";
//        require 'view/admin/depan.php';
        break;


    case "del_artikel":
        $db->where("id=" . $param[2]);
        $db->delete("artikel");
        break;

    case "del_top_menu":
        $db->where("id=" . $param[2]);
        $db->delete("top_menu");
        break;
    case "del_menu":
        $db->where("id=" . $param[2]);
        $db->delete("menu");
        break;

    case "update_top_menu":
        $arr_top_menu = get_array_top_menu($db);
        $db->where("id=" . $_POST['id']);
        $db->update("top_menu", $_POST);
        $db->where("id=" . $_POST['id']);
        $db->get("top_menu");
        $data = $db->get_fetch();        
        $top = $data[0]; ?>
                <td><?php echo $param[3]?></td>
                <td><?php echo $top['judul'] ?></td>
                <td><?php echo $top['link'] ?></td>
                <td><?php echo $arr_top_menu[$top['parent']] ?></td>
                <td><?php echo $top['urutan'] ?></td>
                <td><input type="button" value="Edit" onclick="edit(<?php echo $top['id']?>)" /> <input type="button" value="Hapus" onclick="hapus(<?php echo $top['id']?>)" /></td>
        <?php die();
        break;
    case "update_menu":
        $decoration = array("normal", "blink");
        $db->where("id=" . $_POST['id']);
        $db->update("menu", $_POST);
        $db->where("id=" . $_POST['id']);
        $db->get("menu");
        $data = $db->get_fetch();        
        $data = $data[0]; ?>
                <td><?php echo $param[2]?></td>
                <td><?php echo $data['judul'] ?></td>
                <td><?php echo $data['link'] ?></td>
                <td><?php echo $data['urutan'] ?></td>
                <td><?php echo $decoration[$data['decoration']]?></td>
                <td><input type="button" value="Edit" onclick="edit(<?php echo $data['id']?>)" /> <input type="button" value="Hapus" onclick="hapus(<?php echo $data['id']?>)" /></td>
        <?php die();
        break;
    case "update_section":
        $sort = array("Lama->Baru", "Baru->Lama");
        $front_page = array("Sembunyikan", "Tampilkan");
        $db->where("id=" . $_POST['id']);
        $db->update("section", $_POST);
        $db->where("id=" . $_POST['id']);
        $db->get("section");
        $data = $db->get_fetch();        
        $data = $data[0]; ?>
                <td><?php echo $param[2] ?></td>
                <td><?php echo $data['judul'] ?></td>
                <td><?php echo $front_page[$data['front_page']] ?></td>
                <td><?php echo $sort[$data['sort']] ?></td>
                <td><?php echo $data['urutan'] ?></td>
                <td><input type="button" value="Edit" onclick="edit(<?php echo $data['id']?>)" /> <input type="button" value="Tambah Menu" onclick="buka(<?php echo $data['id']?>)" /></td>
        <?php die();
        break;

    case "tambah_artikel":
        if(isset($_POST['judul']))
        {
            $data = $_POST;
            $data['alias'] = str_replace(" ", "-", strtolower(strip_tags($_POST['judul'])));
            $data['tanggal_buat'] = date("Y-m-d H:i:s");
            $data['tanggal_modif'] = date("Y-m-d H:i:s");
            $db->insert('artikel', $data);
            header("Location: artikel.html");
        }
        header("Location: artikel.html");
        break;

    case "artikel":
        
        $db->get('top_menu');
        $list_top = $db->get_fetch();
        $start = 0;
        if($param[2]) $start=$param[2];

		$db->where("1 Order by id desc");
        $db->get('artikel', $start, 20);
        $artikel = $db->get_fetch();
        
        $confi = array();
        $confi['per_page'] = 20;
        $confi['start'] = $start;
        $confi['base_url']= $config->base_url . "portal/admin/artikel";

        $db->get('artikel');
        $confi['total_rows'] = $db->num_rows();
        $page = new pagination();
        $page->initialize($confi);

        $db->get('section');
        $section = $db->get_fetch();
        $arr_section = array();
        foreach($section as $s)
        {
            $arr_section[$s['id']] = $s['judul'];
        }
        $view_content = "view/admin/artikel.php";
//        require "view/admin/depan.php";
        break;

    case "edit_artikel":
        $data = $_POST;
        $data['alias'] = str_replace(" ", "-", strtolower(strip_tags($_POST['judul'])));
        $data['tanggal_modif'] = date("Y-m-d H:i:s");
        $db->where('id=' . $_POST['id']);
        $db->get("artikel");
        $artikel = $db->get_fetch();
        $artikel = $artikel[0];
        $x = $db->update("artikel", $data);
        $db->where("link='portal/artikel/" . $artikel['alias'] . ".html'");
        $link_update = array(
            "link"  => "portal/artikel/" . $data['alias'] . ".html"
        );
        $db->update("top_menu", $link_update);
        $db->update("menu", $link_update);
        header("Location: artikel.html");
        break;

    default:
        $view_content="view/admin/welcome.php";
        break;
}


        require 'view/admin/depan.php';