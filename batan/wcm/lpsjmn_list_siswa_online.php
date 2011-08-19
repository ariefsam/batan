<?php
include 'konfigurasi.php';
if($_GET['s']) $start=$_GET['s'];
else $start=0;


$where = 'Lpsjmn_siswa_online.pelatihan=Lpsjmn_jenis_pelatihan.id AND Lpsjmn_siswa_online.id_terdaftar=0 ORDER BY nama';
if($_GET['find']) $where = "Lpsjmn_siswa_online.pelatihan=Lpsjmn_jenis_pelatihan.id AND Lpsjmn_siswa_online.id_terdaftar=0 AND Lpsjmn_siswa_online.nama LIKE '%" . $_GET['find'] . "%' ORDER BY nama";

//Query penggabungan tabel siswa online dengan pelatihan yang diikuti
$db->where($where);
$db->get('Lpsjmn_siswa_online,Lpsjmn_jenis_pelatihan', $start, 20);
$siswa = $db->get_fetch();
include 'lib/pagination.php';

$config['per_page'] = 20;
$config['start'] = $start;
$config['base_url']="lpsjmn_daftar.php?aksi=list_online&find=" . $_GET['find'] . "&";
$config['variable']='s';

$db->where($where);
$db->get('Lpsjmn_siswa_online,Lpsjmn_jenis_pelatihan');
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
            <td>Pelatihan</td>
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
        <td><?php echo $s['nama_pelatihan']?></td>
        <td>
            <input type="button" value="Daftarkan" onclick="location.href='?aksi=daftarkan&id=<?php echo $s[0]?>'" />
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
                    url: '?aksi=delete_online&id=' + id,
                    type: 'POST',
                    success: function(data) {
                            $('#row' + id).fadeOut('slow');
                    },
                    error: function() {
                        alert("Terjadi kesalahan, data tidak tersimpan")
                    }
            });
        }
        }
</script>
<?php
$page->show();