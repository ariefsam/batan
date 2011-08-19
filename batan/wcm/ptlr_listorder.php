<?php
require 'konfigurasi.php';
require 'lib/date.php';
$db = db::singleton();

if($_GET['s']) $start=$_GET['s'];
else $start=0;

$where = '1 order by status asc';
if($_GET['find']) $where = "instansi like '%" . $_GET['find'] . "%' ORDER BY status";

$db->where($where);
$db->get('order_limbah',$start,10);
$data = $db->get_fetch();
include 'lib/pagination.php';

$config['per_page'] = 10;
$config['start'] = $start;
$config['base_url']="?find=" . $_GET['find'] . "&";
$config['variable']='s';

$db->where($where);
$db->get('order_limbah');
$config['total_rows']=$db->num_rows();

$page = new pagination();
$page->initialize($config);
?>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal").datepicker({
                    dateFormat:"dd MM yy",
                    changeMonth: true,
                    changeYear: true

                });
            });
</script>
<style type="text/css">
    .tabel, .tabel thead td {
        background: #3A570F;
        color: #fff;
    }

    .tabel td {
        background: #FFF;
    }
</style>
<script type="text/javascript">
            function edit(i){
                $('#data' + i).fadeOut("fast", function(){
                    $('#edit' + i).fadeIn()
                });
            }
            function hapus(id) {
                if (confirm("Yakin hendak menghapus data ini? Data yang dihapus tidak dapat dikembalikan.")) {
                    $.ajax({
                        url: 'ptlr_delete_limbah.php?id=' + id,
                        type: 'POST',
                        success: function(data) {
                            $('#data' + id).fadeOut('slow');
                        },
                        error: function() {
                            alert("Terjadi kesalahan, data tidak terhapus")
                        }
                    });
            }
        }

            function batal(id){
                $('#edit' + id).fadeOut("fast", function(){
                    $('#data' + id).fadeIn();
                });
            }
            function update(id)
            {
                var dataEdit = $('#form' + id).serialize();
                $.ajax({
                        url: 'update_order.php',
                        type: 'POST',
                        data: dataEdit,
                        success: function(datax) {
                                $('#data'+id).html(datax);
                        },
                        error: function(){
                                alert("Terjadi kesalahan. Data tidak tersimpan.")
                        }
                });
                batal(id);
            }

        </script>
<br />
<?php $page->show();?>
<br /><br />
<table class="tabel" cellpadding="3px">
    <thead>
        <tr>
            <td>No</td>
            <td>Institusi</td>
            <td>Alamat</td>
            <td>Email/Telp./Fax</td>
            <td>Tanggal Order</td>
            <td>Status</td>
            <td></td>
        </tr>
    </thead>
    <tbody>

        <?php
        $i=$start+1;
        foreach($data as $d)
        {
            if($_GET['find'])
            {
                $search = ucwords(strtolower($_GET['find']));
                $d['instansi'] = ucwords(strtolower($d['instansi']));
                $d['instansi'] = str_replace( $search , '<strong>'.$search.'</strong>' , $d['instansi'] );
            }
            ?>

        <tr id="data<?php echo $d['id_order']?>">
            <td><?php echo $i?></td>
            <td><?php echo $d['instansi']?></td>
            <td><?php echo $d['alamat']?></td>
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
            <td><input type="button" value="Detail Order" onclick="location.href='ptlr_limbah.php?id=<?php echo $d['id_order']?>'" /></td>
        </tr>
        <form id="form<?php echo $d['id_order']?>" action="update_order.php" method="POST">
        <tr id="edit<?php echo $d['id_order']?>" style="display: none; padding: 0; vertical-align: top">
            <input type="hidden" name="id_order" value="<?php echo $d['id_order']?>" />
            <input type="hidden" name="no" value="<?php echo $i?>" />
            <td><?php echo $i?></td>
            <td><input type="text" name="instansi" value="<?php echo $d['instansi']?>" /></td>
            <td><textarea name="alamat" rows="5" cols="20"><?php echo $d['alamat']?> </textarea></td>
            <td><input type="text" name="email" value="<?php echo $d['email']?>" /><br />
                <input type="text" name="telp" value="<?php echo $d['telp']?>"/><br />
                <input type="text" name="fax" value="<?php echo $d['fax']?>"/>
            </td>
            <td><input type="text" id="tanggal" name="tgl_order" value="<?php echo from_date($d['tgl_order'])?>" size="20" style="width: 120px"/></td>
            <td>
                <select name="status">
                    <option value="Baru">Baru</option>
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </td>
            <td>
                <input type="button" value="Update" onclick="update(<?php echo $d['id_order']?>)" />
                <input type="button" id="edit" value="Batal" onclick="batal(<?php echo $d['id_order']?>)" />
            </td>
            <td><input type="button" value="Detail Order" onclick="location.href='ptlr_limbah.php?id=<?php echo $d['id_order']?>'" /></td>
        </tr>
        </form>
        <?php
        $i++;
        }?>
    </tbody>
</table>
<br />
<?php
$page->show();
?>