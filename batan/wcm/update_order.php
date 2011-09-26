<?php
require 'lib/db.php';
require 'lib/date.php';
$error = "";
$db     = db::singleton();
if($_POST['id_order']){
$data = array(
    "instansi"  => $_POST['instansi'],
    "gedung" => $_POST['gedung'],
    "jalan" => $_POST['jalan'],
    "kota" => $_POST['kota'],
    "kodepos" => $_POST['kodepos'],
    "email" => $_POST['email'],
    "tgl_order" => to_date($_POST['tgl_order']),
    "status" => $_POST['status'],
    "telp" => $_POST['telp'],
    "fax" => $_POST['fax']
    );
    $db->where("id_order=" . $_POST['id_order']);
    $a=$db->update('order_limbah', $data);

$db->where("id_order=" . $_POST['id_order']);
$db->get('order_limbah');
$d= $db->get_fetch();
$d=$d[0];
$alamat = $d['gedung']."<br />".$d['jalan']."<br />"."  ".$d['kota']." ".$d['kodepos'].", Indonesia";
?>
<td><?php echo $_POST['no']?></td>
<td><?php echo $d['instansi']?></td>
<td><?php echo $alamat;?></td>
<td>
    <?php echo $d['email']?><br />
    <?php echo $d['telp']?><br />
    <?php echo $d['fax']?>
</td>
<td><?php echo from_date($d['tgl_order']) ?></td>
<td><?php echo $d['status']?></td>
<td>
    <input type="button" id="edit" value="Edit" onclick="edit(<?php echo $d['id_order']?>)" />
    <input type="button" id="hapus" value="Hapus" onclick="hapus(<?php echo $d['id_order']?>)" />
</td>
<td><input type="button" id="edit" value="Detail Order" onclick="location.href='ptlr_limbah.php?id=<?php echo $d['id_order']?>'" /></td>
<?php }?>
