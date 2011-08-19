<?php
    $nama_menu = "PTLR - Limbah";
    $tahun_ini = date('Y');
    include ("menukiri.php");
    include ("cek.php");
?>
<script type="text/javascript" src="ui/jquery.js"></script>
<div id="page">
    <div id="content">
        <div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>
        <h2 class="title">Manajemen Order Limbah <?php echo $tahun_ini?></h2>
            <div class="entry">
                <div style="text-align: left">
                Cari instansi: <input type="text" name="find" onkeyup="load_nama(this.value)" value="<?php echo $_GET['find']?>" />
                </div>
            <script type="text/javascript">
                function load_nama(name)
                {
                    $('#isi').load('ptlr_listorder.php?find=' + name.replace(/ /i, "%10"));
                }
            </script>
            <div id="isi">
                <?php require 'ptlr_listorder.php';?>
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
<?php include ("footer.php");?>