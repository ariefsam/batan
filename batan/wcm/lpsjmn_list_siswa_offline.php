<?php
$nama_menu = "PSJMN - List Siswa";
include "cek.php";
include 'konfigurasi.php';
if($_GET['s']) $start=$_GET['s'];
else $start=0;


$where = '1 ORDER BY nama';
if($_GET['find']) $where = "nama like '%" . $_GET['find'] . "%' ORDER BY nama";

$db->where($where);
$db->get('Lpsjmn_siswa', $start, 20);
$siswa = $db->get_fetch();
include 'lib/pagination.php';

$config['per_page'] = 20;
$config['start'] = $start;
$config['base_url']="?aksi=list&find=" . $_GET['find'] . "&";
$config['variable']='s';

$db->where($where);
$db->get('Lpsjmn_siswa');
$config['total_rows']=$db->num_rows();

$page = new pagination();
$page->initialize($config);
?>
<style type="text/css">
    .tabel, .tabel thead td {
        background: #3A570F;
        color: #fff;
    }

    .tabel td {
        background: #FFF;
    }
</style>
<?php $page->show();?>
<br /><br />
<table class="tabel" cellpadding="3px" style="width: 680px">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Perusahaan</td>
            <td>Telpon</td>
            <td></td>
        </tr>

    </thead>
    <?php
    $i=$start+1;
    foreach ($siswa as $s)
    {
        if($_GET['find'])
        {
            $search = ucwords(strtolower($_GET['find']));
            $s['nama'] = ucwords(strtolower($s['nama']));
            $s['nama'] = str_replace( $search , '<strong>'.$search.'</strong>' , $s['nama'] );
        }
        ?>

    <tr id="row<?php echo $s[0]?>">
        <td><?php echo $i++?></td>
        <td><?php echo $s['nama']?></td>
        <td><?php echo $s['perusahaan']?></td>
        <td><?php echo $s['telpon']?></td>
        <td>
            <input type="button" value="Detail" onclick="location.href='?aksi=detail&id=<?php echo $s['id']?>'" />
            <input type="button" value="Hapus" onclick="hapus(<?php echo $s[0]?>)" />
        </td>
    </tr>
    <?php
    }?>
</table>
<br />

<script type="text/javascript">
    function hapus(id) {
        if (confirm("Yakin hendak menghapus data ini? Data yang dihapus tidak dapat dikembalikan.")) {
            $.ajax({
                    url: '?aksi=delete&id=' + id,
                    type: 'POST',
                    success: function(data) {
                            $('#row' + id).fadeOut('slow');
                    },
                    error: function() {
                        alert("Terjadi kesalahan, data tidak terhapus")
                    }
            });
        }
        }
</script>
<?php
$page->show();
?>