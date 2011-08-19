<?php
function top_menu($db, $parent=0)
{
$db->where("parent=$parent order by urutan");
$db->get('top_menu');
$menu = $db->get_fetch();
if(count($menu)>0)
{
    if($parent==0) echo "<ul id=\"foo\" class=\"dropmenu\">";
    else echo "<ul>\n";

foreach($menu as $m)
{
    if($parent!=0)
    {?>
    <li><a href="<?php echo $m['link']?>"><?php echo $m['judul']?></a>
    <?php
    }
    else
    {
        if($m['link']){
        ?>

    <li><span><a href="<?php echo $m['link']?>"><?php echo $m['judul']?></a></span>
    <?php } else {?><li><span><?php echo $m['judul']?></span><?php }
    }?>

<?php echo "\n";
        top_menu($db,$m['id']);
        echo "</li>";
}
 echo "</ul>";
        ?>
    

<?php
}
}

function get_array_section($db)
{
	$db->where('1 order by urutan');
    $db->get('section');
    $section = $db->get_fetch();
    $arr_section = array();
    foreach($section as $s)
    {
        $arr_section[$s['id']] = $s['judul'];
    }
    return $arr_section;
}

function get_array_top_menu($db)
{
    $db->get('top_menu');
    $section = $db->get_fetch();
    $arr_section = array();
    $arr_section[0] = "Root";
    foreach($section as $s)
    {
        $arr_section[$s['id']] = $s['judul'];
    }
    
    return $arr_section;
}

function get_section_depan($db)
{
    $section = array();
    $data_section = array();
    $db->where("front_page=1 ORDER BY urutan");
    $db->get('section');
    $section = $db->get_fetch();
    foreach($section as $s)
    {
        $db->where("section=" . $s['id'] ." ORDER BY tanggal_buat desc");
		if($s['sort']==0) $db->where("section=" . $s['id'] ." ORDER BY tanggal_buat asc");
        $db->get('artikel',0,7);
        $artikel = array();
        $artikel = $db->get_fetch();
        $temp = array();
        foreach ($artikel as $a)
        {
            $db->query = "SELECT count(*) as jumlah_komentar FROM komentar WHERE id_artikel=" . $a['id'];
            $c = $db->get_fetch();
            $t = $a;
            $t['jumlah_komentar'] = $c[0][0];
            $temp[] = $t;
        }
        $s['artikel'] = $temp;
        $data_section[] = $s;
    }


    return $data_section;
}

function get_menu($db)
{
    $db->where("1 order by urutan");
    $db->get("menu");
    $list_menu = $db->get_fetch();?>
        
            <ul><?php
foreach($list_menu as $menu){?>
                <li><a href="<?php echo $menu['link']?>"<?php if($menu['decoration']==1) echo " class=\"blink_menu\""?>><?php echo $menu['judul']?></a></li>
<?php }?>
            </ul><?php
}