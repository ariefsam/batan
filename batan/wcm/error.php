<?php
$nama_menu = "Pesan Akses";
include ("cek.php");
include ("menukiri.php");
echo '<div id="page"><div id="content">';
include ("menu.php");
echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
echo '<h2 class="title">Peringatan</h2><div class="entry"><p><font color=red><b>TIDAK BERHAK AKSES</b></font>
<br>Anda tidak mempunyai hak untuk mengakses halaman ini</p></div>';
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