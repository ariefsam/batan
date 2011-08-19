<?php
$nama_menu = "PSJMN - Persyaratan";
include ("cek.php");
$url = $jump."lpsjmn_persyaratan.php";
$aksi=$_GET['aksi'];
$ujian = $_POST['ujian'];
$id_p = $_GET['idp'];
$id_s = $_GET['ids'];
$syarat = $_POST['syarat'];
$urutan = $_POST['urutan'];
$max     = $_POST['max'];
$id_syarat = $_POST['ids'];
//$ = $_POST[''];


if(isset($_POST['tmb_p']))
{$ss = "INSERT INTO `Lpsjmn_jenis_pelatihan` ( `id` , `nama_pelatihan` )VALUES (NULL , '$ujian');";
 $q = mysql_query("$ss") or die("salah");
header($url);
exit;
}
else if(isset($_POST['edit_p']))
{$ss = "UPDATE Lpsjmn_jenis_pelatihan SET nama_pelatihan = '$ujian' WHERE id = $id_p";  //echo "s= $ss";
 $q = mysql_query("$ss") or die("salah");
header($url);
exit;
}
else if(isset($_POST['tmb_s']))
{$ss = "INSERT INTO `Lpsjmn_jenis_syarat` ( syarat, urutan )VALUES ('$syarat' , '$max')"; //echo "s= $ss";
 $q = mysql_query("$ss") or die("salah");
header($url);
exit;
}
else if(isset($_POST['edit_s']))
{$ss = "UPDATE Lpsjmn_jenis_syarat SET syarat = '$syarat', urutan = '$urutan'  WHERE id = $id_syarat";  //echo "s= $ss";
 $q = mysql_query("$ss") or die("salah");
header($url);
exit;
}

switch ($aksi)
{
case "ed_p":
$q = mysql_query("SELECT nama_pelatihan FROM Lpsjmn_jenis_pelatihan WHERE id=$id_p");
$r = mysql_fetch_array($q);
 echo '
 <script language="javascript">
                    function FcheckFilled(n,v){
                      if(v==""){ alert(n+" Harus Di ISI!");return false; }
                      else { return true; }
                    } 
function FcheckFormEdit(f){
                      if(!FcheckFilled("Jenis Ujian",f.ujian.value)){ f.ujian.focus();return false; }
                      return true;
                    }
                  </script>';
 include ("menukiri.php");
 echo '<div id="page"><div id="content">';
 echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
 echo '<h2 class="title">Tambah Jenis Ujian</h2><div class="entry">';
 echo '<p><form name="form1" method="post" action="">
    <table border=0 cellpadding=0 cellspacing=5 width=100%>
                         <tr>
                         <td>Jenis Ujian</td>
                         <td>:</td>
                         <td><input type="text" name="ujian" size="40" value="'.$r[0].'">
                         </td>
                         </tr>
                         <tr>
                         <tr><td valign=top colspan=2>&nbsp;</td>
                          <td> <input type="submit" name="edit_p" id="edit_p" value="Edit" onclick="return FcheckFormEdit(this.form)"></td>
                         </tr>
                    </table>   </form>


  </p>';

echo '      </div>';
break;

case "tmb_p":

 echo '
 <script language="javascript">
                    function FcheckFilled(n,v){
                      if(v==""){ alert(n+" Harus Di ISI!");return false; }
                      else { return true; }
                    } 
function FcheckFormEdit(f){
                      if(!FcheckFilled("Jenis Ujian",f.ujian.value)){ f.ujian.focus();return false; }
                      return true;
                    }
                  </script>';
 include ("menukiri.php");
 echo '<div id="page"><div id="content">';
 echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
 echo '<h2 class="title">Tambah Jenis Ujian</h2><div class="entry">';
 echo '<p><form name="form1" method="post" action="">
    <table border=0 cellpadding=0 cellspacing=5 width=100%>
                         <tr>
                         <td>Jenis Ujian</td>
                         <td>:</td>
                         <td><input type="text" name="ujian" size="40">
                         </td>
                         </tr>
                         <tr>
                         <tr><td valign=top colspan=2>&nbsp;</td>
                          <td> <input type="submit" name="tmb_p" id="tmb_p" value="Tambah" onclick="return FcheckFormEdit(this.form)"></td>
                         </tr>
                    </table>   </form>


  </p>';

echo '      </div>';
break;

case "hapus_syarat":
mysql_query("DELETE FROM Lpsjmn_jenis_syarat WHERE id = '$id_s'") or die("<br>salah jenis");
mysql_query("DELETE FROM Lpsjmn_syarat WHERE id_syarat = '$id_s'") or die("<br>salah syarat");
header($url);
exit;
break;

case "edit_syarat":
$q = mysql_query("SELECT * FROM Lpsjmn_jenis_syarat WHERE id='$id_s'");
$r = mysql_fetch_array($q);
 echo '
 <script language="javascript">
                    function FcheckFilled(n,v){
                      if(v==""){ alert(n+" Harus Di ISI!");return false; }
                      else { return true; }
                    } 
function FcheckFormEdit(f){
                      if(!FcheckFilled("Pesyaratan",f.syarat.value)){ f.syarat.focus();return false; }
                      if(!FcheckFilled("Urutan",f.urutan.value)){ f.urutan.focus();return false; }
                      return true;
                    }
                  </script>';
 include ("menukiri.php");
 echo '<div id="page"><div id="content">';
 echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
 echo '<h2 class="title">Edit Persyaratan</h2><div class="entry">';
 echo '<p><form name="form1" method="post" action="">
    <table border=0 cellpadding=0 cellspacing=5 width=100%>
                         <tr>
                         <td>Persyaratan</td>
                         <td>:</td>
                         <td><input type="text" name="syarat" size="40" value="'.$r[1].'">
                         </td>
                         </tr>
                         <tr>
                         <td>Nomor urut Tampil</td>
                         <td>:</td>
                         <td><input type="text" name="urutan" size="10" value="'.$r[2].'">
                         </td>
                         </tr>
                         <tr>
                         <tr><td valign=top colspan=2>&nbsp;</td>
                          <td>
                          <input type="hidden" name="ids" value="'.$r[0].'" />
                          <input type="submit" name="edit_s" id="edit_s" value="Edit" onclick="return FcheckFormEdit(this.form)"></td>
                         </tr>
                    </table>   </form>


  </p>';

echo '      </div>';
break;

case "tambah_syarat":
$q = mysql_query("SELECT max(urutan) FROM Lpsjmn_jenis_syarat");
$r = mysql_fetch_array($q);    $max = $r[0] + 1;
 echo '
 <script language="javascript">
                    function FcheckFilled(n,v){
                      if(v==""){ alert(n+" Harus Di ISI!");return false; }
                      else { return true; }
                    } 
function FcheckFormEdit(f){
                      if(!FcheckFilled("Pesyaratan",f.syarat.value)){ f.syarat.focus();return false; }
                      return true;
                    }
                  </script>';
 include ("menukiri.php");
 echo '<div id="page"><div id="content">';
 echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
 echo '<h2 class="title">Tambah Persyaratan</h2><div class="entry">';
 echo '<p><form name="form1" method="post" action="">
    <table border=0 cellpadding=0 cellspacing=5 width=100%>
                         <tr>
                         <td>Persyaratan</td>
                         <td>:</td>
                         <td><input type="text" name="syarat" size="40">
                         </td>
                         </tr>
                         <tr>
                         <td>Nomor urut Tampil</td>
                         <td>:</td>
                         <td><input type="text" name="urutan" size="10" value="'.$max.'" disabled>
                         </td>
                         </tr>
                         <tr>
                         <tr><td valign=top colspan=2>&nbsp;</td>
                          <td>
                          <input type="hidden" name="max" value="'.$max.'" />
                          <input type="submit" name="tmb_s" id="tmb_s" value="Tambah" onclick="return FcheckFormEdit(this.form)"></td>
                         </tr>
                    </table>   </form>


  </p>';

echo '      </div>';
break;

case "tmb":
$query2 = "INSERT INTO `Lpsjmn_syarat` (id_pelatihan, id_syarat) VALUES ('$id_p', '$id_s')";
//echo "kuer = $query2";
$result2 = mysql_query($query2);
header($url);
exit;
break;

case "hps_p":
mysql_query("DELETE FROM Lpsjmn_jenis_pelatihan WHERE id = '$id_p'") or die("<br>salah jenis");
mysql_query("DELETE FROM Lpsjmn_syarat WHERE id_pelatihan = '$id_p'") or die("<br>salah syarat");
header($url);
exit;
break;

case "hps":
$id_hps = $_GET['cc'];
$kuer = "DELETE FROM Lpsjmn_syarat WHERE id = '$id_hps'";
mysql_query($kuer);
header($url);
exit;
break;

default :
      include ("menukiri.php");
      echo '<div id="page"><div id="content">';
      //include ("menu.php");
      echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
$j = 0; $tampil_syarat = "";
$q = mysql_query("SELECT * from Lpsjmn_jenis_syarat order by urutan") or die('Error, gagal syarat. ' . mysql_error());
while($row=mysql_fetch_array($q))
   { list($ids, $syarat, $urutans)=$row;
     $ar_id[$j] = $ids;
     $j = $j + 1;
     $tampil_syarat .= "<td class=judul>$syarat<br>
                     <a href='?aksi=edit_syarat&ids=$ids'><img src='images/edit.gif' title='edit'  border='0' /></a> <a href='?aksi=hapus_syarat&ids=$ids'><img src='images/hapus.gif' alt='hapus' title='hapus' border='0' /></a></td>";
   }

$k = 0;   $tp3 ="";
$q2 = mysql_query("SELECT * from Lpsjmn_jenis_pelatihan order by id") or die('Error, gagal jenis ujian. ' . mysql_error());
while($row2=mysql_fetch_array($q2))
   { list($idp, $pelatihan)=$row2;

     $k = $k + 1;
     $tp1 = "<td width=150><b>$pelatihan</b><br><a href='?aksi=ed_p&idp=$idp'><img src='images/edit.gif' title='edit'  border='0' /></a> <a href='?aksi=hps_p&idp=$idp'><img src='images/hapus.gif' alt='hapus' title='hapus' border='0' /></a></td>";
     $tp2 = "";
     for($l = 0; $l < $j; $l ++)
     {
      $q3 = mysql_query("SELECT * FROM Lpsjmn_syarat WHERE id_pelatihan = '$idp' AND id_syarat = '$ar_id[$l]'");  $r3 = mysql_fetch_array($q3);
      $jumq3 = mysql_num_rows($q3);
      if($jumq3 == 0) $data = "<div align=right>&nbsp;<br><small><a href='?aksi=tmb&idp=$idp&ids=$ar_id[$l]' style='color:green'>edit</a></small></div>";
      else $data = "<div align=center><img src='images/approve.gif'  border='0' /></div><div align=right>&nbsp;<br><small><a href='?aksi=hps&cc=$r3[0]' style='color:green'>edit</a></small></div>";
      $tp2 .= "<td>$data</td>";
     }
     $tp3 .= "<tr bgcolor=#ecf3e1>".$tp1.$tp2."</tr>";
   }

      echo '<h2 class="title">Manajemen Persyaratan Sertifikasi</h2><div class="entry">';
 echo '
   <table width=100% border=0 cellspacing="1" cellpadding="8">
  <tr align=center bgcolor=#3A570F>
    <td rowspan="2" class=judul><b>Jenis Ujian</b><br><small><a href="?aksi=tmb_p">[ tambah ]</a></small></td>
    <td colspan="'.$j.'" class=judul><b>Persyaratan</b>&nbsp;&nbsp; <small><a href="?aksi=tambah_syarat">[ tambah ]</a></small></td>
  </tr>
  <tr align="center"  bgcolor=#3A570F>
   '.$tampil_syarat.'
  </tr>
  '.$tp3.'
</table>
   ';


echo '      </div>';
break;

}

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
?>