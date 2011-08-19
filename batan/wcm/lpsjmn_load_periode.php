<?php
$nama_menu = "PSJMN - List Siswa";
include "cek.php";
$id=0;
if(isset($_GET['id'])) $id = $_GET['id'];
$db->where("id_pelatihan=$id");
$db->get('Lpsjmn_periode_pelatihan');
$data = $db->get_fetch();
if(count($data)>0){

require_once 'lib/date.php';
?>
<select name="periode">
<?php foreach($data as $d)
{?>
    <option value="<?php echo $d['id']?>"><?php echo periode($d['tgl_mulai'], $d['tgl_selesai'], $d['bln_mulai'], $d['th_mulai'])?></option>
<?php
}?>
</select>
<?php
}
else {?>
<select name="periode" disabled>
                                <option>--</option>
                            </select>
<?php }
