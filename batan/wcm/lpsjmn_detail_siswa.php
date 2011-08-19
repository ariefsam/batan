<?php
$id = $_GET['id'];
require 'konfigurasi.php';
require 'lib/date.php';

require 'lib/pagination.php';
$db->where("id=$id");
$db->get('Lpsjmn_siswa');
$data = $db->get_fetch();
$data = $data[0];

$per_page = 10;
if($_GET['s'] && $_GET['s']>0) $start = $_GET['s']; else $start=0; 
$db->query = "SELECT Lpsjmn_pelatihan.id as idnya,
                    Lpsjmn_jenis_pelatihan.nama_pelatihan,
                    Lpsjmn_jenis_ujian.nama_ujian,
                    Lpsjmn_periode_pelatihan.tgl_mulai,
                    Lpsjmn_periode_pelatihan.tgl_selesai,
                    Lpsjmn_periode_pelatihan.bln_mulai,
                    Lpsjmn_periode_pelatihan.th_mulai
            FROM Lpsjmn_pelatihan, Lpsjmn_periode_pelatihan, Lpsjmn_jenis_pelatihan, Lpsjmn_jenis_ujian
            WHERE
                Lpsjmn_periode_pelatihan.id_pelatihan=Lpsjmn_jenis_pelatihan.id AND
                Lpsjmn_pelatihan.id_periode=Lpsjmn_periode_pelatihan.id AND
                Lpsjmn_pelatihan.id_ujian=Lpsjmn_jenis_ujian.id AND
                Lpsjmn_pelatihan.id_siswa=$id order by th_mulai desc,bln_mulai desc,tgl_mulai desc";
$db->eksekusi();

$config['per_page'] = $per_page;
$config['start'] = $start;
$config['base_url']="lpsjmn_daftar.php?aksi=detail&id=" . $_GET['id'] . "&";
$config['variable']='s';
$config['total_rows']=$db->num_rows();

$db->query = $db->query . " limit $start, $per_page";
$pelatihan = $db->get_fetch();


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
        padding: 5px;
    }
</style>
<script type="text/javascript" src="ui/jquery.js"></script>
<script type="text/javascript">

            function load_periode(id)
            {
                $('#periode').load('lpsjmn_load_periode.php?id=' + id);
            }
</script>
<script type="text/javascript">
    function hapus(id) {
        if (confirm("Yakin hendak menghapus data ini? Data yang dihapus tidak dapat dikembalikan.")) {
            $.ajax({
                    url: '?aksi=delete_pelatihan&id=' + id,
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
                <table>
                    <thead>

                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>: <?php echo $data['nama']?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>: <?php echo from_date($data['tgl_lahir'])?></td>
                        </tr>
                        <tr>
                            <td>Perusahaan</td>
                            <td>: <?php echo $data['perusahaan']?></td>
                        </tr>
                        <tr>
                            <td>No Kontak / Telpon</td>
                            <td>: <?php echo $data['telpon']?></td>
                        </tr>
                        <tr style="vertical-align: top">
                            <td>Tanda Tangan</td>
                            <td>
                                <?php if($data['tandatangan']) {?>
                                <img alt="ttd" src="ttd/<?php echo $data['tandatangan']?>" style="max-width: 200px" />
                                <?php } else echo ": (Belum ada tanda tangan)"?>
                            </td>
                        </tr>
                        <tr style="vertical-align: top">
                            <td>Foto</td>
                            <td>
                                <?php if($data['foto']) {?>
                                <img alt="foto" src="ktp/<?php echo $data['foto']?>" style="max-width: 200px" />
                                <?php } else echo ": (Belum ada foto)"?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right"><input type="button" value="Edit" onclick="location.href='?aksi=edit_detail&id=<?php echo $data['id']?>'" /></td>
                        </tr>
                    </tbody>

                </table><br /><br />
    <?php
    
    if($_GET['error']=='sdt') echo "<h3>Error: Pelatihan sudah terdaftar</h3>";
    if(count($pelatihan)==0) echo "Belum ada Pelatihan yang diikuti";
    else{
        

    ?>
                Pelatihan yang diikuti
                <table width="680px" class="tabel">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Pelatihan</td>
                            <td>Ujian</td>
                            <td>Periode</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
<?php 
$i=1; require_once 'lib/date.php'; foreach($pelatihan as $d)
{?>
                        <tr id="row<?php echo $d['idnya']?>">
                            <td><?php echo $i++?></td>
                            <td><?php echo $d['nama_pelatihan']?></td>
                            <td><?php echo $d['nama_ujian']?></td>
                            <td><?php echo periode($d['tgl_mulai'], $d['tgl_selesai'], $d['bln_mulai'], $d['th_mulai'])?></td>
                            <td style="text-align: center"><input type="button" value="Hapus" onclick="hapus(<?php echo $d['idnya']?>)" /></td>
                        </tr>
<?php }?>
                    </tbody>
                </table>
    <?php } $page->show();?>
                <br /><br />
                Tambah Pelatihan
                <?php
$db->where("1");
$db->get('Lpsjmn_jenis_pelatihan');
$pelatihan = $db->get_fetch();
$db->where("1");
$db->get('Lpsjmn_jenis_ujian');
$ujian = $db->get_fetch();
?>
                <form action="?aksi=p_tambah_pelatihan" method="POST">
                    <input type="hidden" name="id_siswa" value="<?php echo $id?>" />
                <table>
                    <tr>
                        <td>Pelatihan</td>
                        <td>:
                            <select name="pelatihan" onchange="load_periode(this.value)">
                                <option value="0" selected>---Pilih Pelatihan---</option>
                                <?php foreach($pelatihan as $p)
                                {?>
                                <option value="<?php echo $p['id']?>"><?php echo $p['nama_pelatihan']?></option>
                                <?php
                                }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Periode</td>
                        <td>:
                            <span id="periode">
                            <select name="periode" disabled>
                                <option>--</option>
                            </select>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Ujian</td>
                        <td>:
                            <select name="ujian">
                                <?php foreach($ujian as $p)
                                {?>
                                <option value="<?php echo $p['id']?>"><?php echo $p['nama_ujian']?></option>
                                <?php
                                }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right"><input type="submit" value="Daftarkan Pelatihan" /></td>
                    </tr>
                </table>
            </form>