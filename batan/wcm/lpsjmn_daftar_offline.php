<?php
$nama_menu = "PSJMN - Pendaftaran Offline";
include ("cek.php");
$aksi = $_GET['aksi'];
switch ($aksi){
case 'delete_pelatihan':
    include 'lpsjmn_delete_pelatihan.php';
    break;
case 'p_tambah_pelatihan':
    include 'lpsjmn_tambah_pelatihan.php';
    break;
case 'load_periode':
    include 'lpsjmn_load_periode.php';
    die();
    break;
case 'detail':
    include 'lpsjmn_detail_siswa.php';
    break;
case 'edit_detail':
    include 'lpsjmn_edit_detail_siswa.php';
    break;
case 'list':
    include 'lpsjmn_list_siswa_offline.php';
    break;
case 'p_edit_detail':
    include 'lpsjmn_p_edit_detail.php';
    break;
case 'p_daftar':
    include 'lpsjmn_p_daftar.php';
    break;
default :
      include ("menukiri.php");

include "konfigurasi.php";
$db->where("1");
$db->get('Lpsjmn_jenis_pelatihan');
$pelatihan = $db->get_fetch();
$db->where("1");
$db->get('Lpsjmn_jenis_ujian');
$ujian = $db->get_fetch();
?>
<link type="text/css" href="ui/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="ui/jquery.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal").datepicker({
                    dateFormat:"dd MM yy",
                    changeMonth: true,
                    changeYear: true

                });
            });
</script>
<script type="text/javascript">

            function load_periode(id)
            {
                $('#periode').load('lpsjmn_daftar_offline.php?aksi=load_periode&id=' + id);
            }
</script>
<script type="text/javascript" src="ui/ui.core.js"></script>
<script type="text/javascript" src="ui/ui.datepicker.js"></script>
<script type="text/javascript" src="ui/ui.datepicker-id.js"></script>

        <div id="page"><div id="content">
        <?php include ("menu.php")?>

        <div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>
        <h2 class="title">Manajemen Pendaftaran Offline <?php echo $tahun_ini?></h2>

        <div class="entry">
        <form action="?aksi=p_daftar" method="POST" enctype="multipart/form-data" >
            <table>
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>: <input type="text" name="nama" /></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <input type="text" id="tanggal" name="tgl_lahir" id="tgl_lahir" /></td>
                    </tr>
                    <tr>
                        <td>Perusahaan</td>
                        <td>: <input type="text" name="perusahaan" /></td>
                    </tr>
                    <tr>
                        <td>No Kontak / Telpon</td>
                        <td>: <input type="text" name="telpon" /></td>
                    </tr>
                    <tr>
                        <td>Tanda Tangan</td>
                        <td>: <input type="file" name="tandatangan" /></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>: <input type="file" name="foto" /></td>
                    </tr>
                    
                    <tr>
                        <td>Pelatihan</td>
                        <td>:
                            <select name="pelatihan">
                                <option onclick="load_periode(0)" selected>---Pilih Pelatihan---</option>
                                <?php foreach($pelatihan as $p)
                                {?>
                                <option onclick="load_periode(<?php echo $p['id']?>)" value="<?php echo $p['id']?>"><?php echo $p['nama_pelatihan']?></option>
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
                        <td style="text-align: right"><input type="submit" value="Daftar" /></td>
                    </tr>
                </tbody>
            </table>
        </form>
        </div>

<?php }

?>


            <div class="cb">
                <div class="l">
                    <div class="r"></div>
                </div>
            </div>
        </div>


    </div>
    <!-- end content -->
</div>
<!-- end page -->
<?php include ("footer.php");?>

