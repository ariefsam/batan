<?php
require 'lib/db.php';
require 'lib/currency.php';
$error = "";
$db     = db::singleton();
if($_POST['harga'])
{
    $data = array(
        "harga"  => $_POST['harga']
    );
    $db->where("id_limbah=" . $_POST['id_limbah']);
    $a = $db->update('limbah', $data);

$db->get('limbah');
$data= $db->get_fetch();
$data=$data[0];


?>
<td><b>Harga</b></td>
<td>: Rp <?php echo rupiah($data['harga'])?>
    <input type="button" id="edit" value="Edit" onclick="edit(<?php echo $data['id_limbah']?>)" />
</td>
<?php }?>