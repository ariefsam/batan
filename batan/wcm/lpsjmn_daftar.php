<?php
$nama_menu = "PSJMN - List Siswa";
include ("cek.php");
$aksi=$_GET['aksi'];


      include ("menukiri.php");?>
        <script type="text/javascript" src="ui/jquery.js"></script>
        <div id="page"><div id="content">
        <?php
        $menu_atas = '<a href="?aksi=add" class="comments">Add</a>&nbsp;&nbsp;&nbsp;<font color=white>|</font>&nbsp;&nbsp;&nbsp;<a href="?aksi=list" class="comments">Lists</a>&nbsp;&nbsp;&nbsp;<font color=white>|</font>&nbsp;&nbsp;&nbsp;<a href="?aksi=list_online" class="comments">List Online</a>';
        include ("menu.php")?>

        <div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>
        <h2 class="title">Manajemen Pendaftaran Online <?php echo $tahun_ini?></h2>

        <div class="entry">
<?php
switch ($aksi)
{
    case 'p_edit_detail':
        include 'lpsjmn_p_edit_detail.php';
        break;
    case 'p_tambah_pelatihan':
        include 'lpsjmn_tambah_pelatihan.php';
        break;
    case 'p_daftar':
        include 'lpsjmn_p_daftar.php';
        break;
    case 'delete':
        include 'lpsjmn_delete_siswa_offline.php';
        break;
    case 'delete_online':
        include 'lpsjmn_delete_siswa_online.php';
        break;
    case 'detail':
        include 'lpsjmn_detail_siswa.php';
        break;
    case 'edit_detail':
        include 'lpsjmn_edit_detail_siswa.php';
        break;
    case 'daftarkan':
        include 'lpsjmn_daftar_daftarkan.php';
        break;
    case 'delete':
        include 'lpsjmn_delete_siswa_online.php';
        break;
    case 'list_online':
        ?>
            <div style="text-align: left">
                Cari nama: <input type="text" name="find" onkeyup="load_nama(this.value)" value="<?php echo $_GET['find']?>" />
            </div>
            <script type="text/javascript">
                function load_nama(name)
                {
                    $('#isi').load('lpsjmn_list_siswa_online.php?find=' + name.replace(/ /i, "%20"));
                }
            </script>
            <div id="isi">
            <?php
        require 'lpsjmn_list_siswa_online.php';
        ?>
            </div>
            <?php
        break;
    case 'add':
        require 'lpsjmn_add.php';
        break;
    case 'load_periode':
        include 'lpsjmn_load_periode.php';
        die();
        break;
    default :
        ?>
            <div style="text-align: left">
                Cari nama: <input type="text" name="find" onkeyup="load_nama(this.value)" value="<?php echo $_GET['find']?>" />
            </div>
            <script type="text/javascript">
                function load_nama(name)
                {
                    $('#isi').load('lpsjmn_list_siswa_offline.php?find=' + name.replace(/ /i, "%20"));
                }
            </script>
            <div id="isi">
            <?php
        require 'lpsjmn_list_siswa_offline.php';
        ?>
            </div>
        <?php
        break;
    
}?>
        </div>



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

