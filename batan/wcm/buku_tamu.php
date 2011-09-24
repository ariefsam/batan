<?php
$nama_menu = "Buku Tamu";
include ("cek.php");
require "lib/pagination.php";
include "konfigurasi.php";
require "lib/date.php";

//Dapetin data
if($_GET['s'] && ($_GET['s']>0)) $start=$_GET['s']; else $start=0;
$per_page = 10;
$db->where('id_balas=0 order by id desc');
$db->get('buku_tamu', $start, $per_page);
$buku_tamu = $db->get_fetch();

$db->where('id_balas=0');
$db->get('buku_tamu');
$confi['per_page'] = $per_page; //20
$confi['start'] = $start;
$confi['total_rows'] = $db->num_rows(); //199
$confi['base_url'] = $config->base_url . "buku_tamu.php?&";
$confi['variable'] = "s";
$page = new pagination();
$page->initialize($confi);

include ("menukiri.php");
?>
<script type="text/javascript" src="ui/jquery.js"></script>
<div id="page"><div id="content">
        <?php
        $menu_atas = '-';
        include ("menu.php")
        ?>

        <div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>
            <h2 class="title">Manajemen Buku Tamu</h2>

            <div class="entry">
                <div class="kotak">
                    <div class="pagination">
                        <?php $page->show() ?>
                    </div><br />
                    <?php foreach ($buku_tamu as $buku) { ?>
                        <div class="border_tamu">
                            Nama: <?php echo $buku['nama'] ?><br />
                            Email: <?php echo $buku['email']?><br />
                            Website: <a href="<?php echo $buku['website']?>"><?php echo $buku['website']?></a><br /><br />
                            <div style="margin-left: 5px; color: #000"> <?php echo $buku['isi'] ?> </div>
                            <div style="text-align: right;" font-size: 10px;"> <?php echo from_datetime($buku['tanggal']) ?></div>
                            <div style="text-align: left;"><a href="#">Balas</a><a href="">Hapus</a></div>
                        </div>
                        <?php
                        $db->where('id_balas=' . $buku['id']);
                        $db->get('buku_tamu');
                        $balas = $db->get_fetch();
                        foreach ($balas as $b) {
                            ?>
                            <div class="border_admin">
                                <p class="area_text"> <?php echo $b['nama'] ?> :</p>
                                <p class="area_text" style="margin-left: 50px;"> <?php echo $b['isi'] ?> </p>
                                <p class="area_text" style="margin-right: 20px; text-align: right; font-size: 10px;"> <?php echo from_datetime($b['tanggal']) ?></p>
                            </div>
    <?php }
} ?>

                </div>
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
<?php include ("footer.php"); ?>

