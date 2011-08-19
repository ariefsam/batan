<?php
$nama_menu = "Buku Tamu";
include ("cek.php");
$db->get('buku');



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

