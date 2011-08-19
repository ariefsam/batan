<?php
  $pesan=$_GET['psn'];

if($pesan=='1')
 $text = "data yang anda masukkan salah";
else if($pesan=='2')
 $text = "Semua Field harus diisi";

include ("menukiri.php");?>
<!-- end sidebar -->
<!-- start page -->
<div id="page">

    <!-- start content -->
    <div id="content">
        <?php include ("menu.php");?>

        <div class="post">
            <div class="ct">
                <div class="l">
                    <div class="r"></div>
                </div>
            </div>
            <h2 class="title">PESAN ERROR</h2>
            <div class="entry">
                <p><font color=red><?php echo "$text"; ?></font></p>
                <p><input type="button" name="Back" value="Back" onclick="history.back()" /><br><br><br><br><br><br><br><br><br></p>
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