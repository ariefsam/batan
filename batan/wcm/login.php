<?php
include ("menukiri.php");?>
<!-- end sidebar -->
<!-- start page -->
<div id="page">
    <?php //include ("header.php");?>
    <!-- start content -->
    <div id="content">
        <?php include ("menu.php");

        //include ("konfigurasi.php");
        include 'lib.php';
        if ($_GET['ck']!='') $ck=$_GET['ck'];
        if($ck==1) $isi_ck = "- ANDA BELUM LOGIN";
        ?>
        <script language='javascript'>
        function FcheckForm(f){
          if(!FcheckFilled('Nama',f.username.value)){ f.username.focus();return false; }
          if(!FcheckFilled('Password',f.password.value)){ f.password.focus();return false; }
          return true;
        }
        </script>

                <div class="post">
            <div class="ct">
                <div class="l">
                    <div class="r"></div>
                </div>
            </div>
            <h2 class="title">FORM LOGIN <?php echo "<font color=red>$isi_ck</font><br>&nbsp;" ?></h2>
            <div class="entry">

            <form method="post" action="login2.php" name="formlogin">
            <table border=0 cellpadding=0 cellspacing=5>
                 <tr>
                 <td width=35%>Masukkan Nama</td>
                 <td>:</td>
                 <td><input type="text" name="username" size="30">
                 </td>
                 </tr>

                 <tr>
                 <td>Masukkan Password</td>
                 <td>:</td>
                 <td><input type="password" name="password" size="30" /></td>
                 </tr>

                 <tr>
                 <td colspan=3 align=right><input type="submit" value="Login" name="BtnLogin" onClick="return FcheckForm(formlogin);">
                 <br><br>
                 </td>
                 </tr>
                 <tr>
                 <td>&nbsp;</td>
                 <td colspan=2 align=center><font color=red>Lupa password ? <a href=krm_pass.php>klik disini</a></font>
                 <br><br><br><br><br>
                 </td>
                 </tr>
            </table>
            </form>


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