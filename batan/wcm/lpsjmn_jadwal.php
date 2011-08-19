<?php
$nama_menu = "PSJMN - Jadwal Layanan";
include ("cek.php");
$url = $jump."lpsjmn_jadwal.php";
$aksi=$_GET['aksi'];
$bulan = $_GET['b'];
$tahun = $_GET['t'];
$id_p = $_GET['p'];
$p_idp = $_POST['idp'];
$p_bulan = $_POST['bulan'];
$p_tahun = $_POST['tahun'];
$tglm = $_POST['tglm'];
$tgls = $_POST['tgls'];
$id_periode = $_GET['id'];
//$ = $_POST[''];
//$ = $_GET[''];

if(isset($_POST['BtnAdd']))
{
  $query2 = "INSERT INTO `Lpsjmn_periode_pelatihan` (id_pelatihan, tgl_mulai, tgl_selesai, bln_mulai, th_mulai)
             VALUES ('$p_idp', '$tglm', '$tgls', '$p_bulan', '$p_tahun')";
  $result2 = mysql_query($query2);
  header($url);
  exit;
}
else if(isset($_POST['BtnEdit']))
{
  $query2 = "UPDATE Lpsjmn_periode_pelatihan SET tgl_mulai = '$tglm', tgl_selesai = '$tgls' WHERE id = '$p_idp'"; //echo "$query2";
  $result2 = mysql_query($query2);
  header($url);
  exit;
}



function bulan($date){
    switch($date){
        case "1": $bln="Januari";break;
        case "2": $bln="Februari";break;
        case "3": $bln="Maret";break;
        case "4": $bln="April";break;
        case "5": $bln="Mei";break;
        case "6": $bln="Juni";break;
        case "7": $bln="Juli";break;
        case "8": $bln="Agustus";break;
        case "9": $bln="September";break;
        case "10": $bln="Oktober";break;
        case "11": $bln="November";break;
        case "12": $bln="Desember";break;
    }
    return $bln;
}

switch ($aksi)
{
case "hapus_jadwal":
mysql_query("DELETE FROM Lpsjmn_periode_pelatihan WHERE id = '$id_periode'") or die("<br>salah periode");
mysql_query("DELETE FROM Lpsjmn_pelatihan WHERE id_periode = '$id_periode'") or die('Error. ' . mysql_error());
header($url);
exit;

break;

case "edit_jadwal":
$x = "SELECT b.nama_pelatihan, a.tgl_mulai, a.tgl_selesai, a.bln_mulai, a.th_mulai
      from Lpsjmn_periode_pelatihan as a, Lpsjmn_jenis_pelatihan as b
      where a.id = $id_periode AND a.id_pelatihan = b.id"; //echo "x= $x";
$q2 = mysql_query("$x") or die('Error, gagal jenis ujian. ' . mysql_error());
$row=mysql_fetch_array($q2);  list($namap, $tglmu, $tglse, $blnx, $thnx) = $row;
include ("menukiri.php");
echo '<div id="page"><div id="content">';
echo '
<script language="javascript">
                    function FcheckFilled(n,v){
                      if(v==""){ alert(n+" Harus Di ISI!");return false; }
                      else { return true; }
                    }
                    function FcheckMaxLength(n,v,num){ 
                    if(v.length>num){ alert("Jumlah Karakter Maksimum  "+n+" adalah "+num+"!");return false; }
                    else { return true; }
                  }

                  function FcheckNumber(n,v){
                    if((isNaN(v))||(v=="")){ alert(n+" Harus Angka!");return false; }
                    else { return true; }
                  }
function FcheckFormAdd(f){
                      if(!FcheckFilled("Tanggal Mulai",f.tglm.value)){ f.tglm.focus();return false; }
                      if(!FcheckMaxLength("Tanggal Mulai",f.tglm.value, 2)){ f.tglm.focus();return false; }
                      if(!FcheckNumber("Tanggal Mulai",f.tglm.value)){ f.tglm.focus();return false; }
                      if(!FcheckFilled("Tanggal Selesai",f.tgls.value)){ f.tgls.focus();return false; }
                      if(!FcheckMaxLength("Tanggal Selesai",f.tgls.value, 2)){ f.tgls.focus();return false; }
                      if(!FcheckNumber("Tanggal Selesai",f.tgls.value)){ f.tgls.focus();return false; }
                      return true;
                    }
</script>
';

$bl = bulan($blnx);
echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
  echo '<h2 class="title">Edit Jadwal Pelayanan</h2><h3 class="title">'.$namap.' - '.$bl.' '.$thnx.'</h3><div class="entry">';
  echo '<p><form name="form1" method="post" action="">
    <table border=0 cellpadding=0 cellspacing=5 width=100%>
                         <tr>
                         <td width = 100>Tanggal Mulai</td>
                         <td>:</td>
                         <td><input type="text" name="tglm" size="10" value="'.$tglmu.'"></td>
                         </tr>
                         <tr>
                         <td>Tanggal Selesai</td>
                         <td>:</td>
                         <td><input type="text" name="tgls" size="10" value="'.$tglse.'"></td>
                         </tr>
                         <tr><td valign=top colspan=2>&nbsp;
                         <input type="hidden" name="idp" value="'.$id_periode.'" />
                         </td>
                          <td> <input type="submit" name="BtnEdit" id="BtnEdit" value="Edit" onclick="return FcheckFormAdd(this.form)" /></td>
                         </tr>
                    </table>   </form>


  </p></div>';
break;

case "tambah_jadwal":
$x = "SELECT nama_pelatihan from Lpsjmn_jenis_pelatihan where id=$id_p"; //echo "x= $x";
$q2 = mysql_query("$x") or die('Error, gagal jenis ujian. ' . mysql_error());
$row=mysql_fetch_array($q2);  list($pusing) = $row;
include ("menukiri.php");
echo '<div id="page"><div id="content">';
echo '
<script language="javascript">
                    function FcheckFilled(n,v){
                      if(v==""){ alert(n+" Harus Di ISI!");return false; }
                      else { return true; }
                    }
                    function FcheckMaxLength(n,v,num){ 
                    if(v.length>num){ alert("Jumlah Karakter Maksimum  "+n+" adalah "+num+"!");return false; }
                    else { return true; }
                  }

                  function FcheckNumber(n,v){
                    if((isNaN(v))||(v=="")){ alert(n+" Harus Angka!");return false; }
                    else { return true; }
                  }
function FcheckFormAdd(f){
                      if(!FcheckFilled("Tanggal Mulai",f.tglm.value)){ f.tglm.focus();return false; }
                      if(!FcheckMaxLength("Tanggal Mulai",f.tglm.value, 2)){ f.tglm.focus();return false; }
                      if(!FcheckNumber("Tanggal Mulai",f.tglm.value)){ f.tglm.focus();return false; }
                      if(!FcheckFilled("Tanggal Selesai",f.tgls.value)){ f.tgls.focus();return false; }
                      if(!FcheckMaxLength("Tanggal Selesai",f.tgls.value, 2)){ f.tgls.focus();return false; }
                      if(!FcheckNumber("Tanggal Selesai",f.tgls.value)){ f.tgls.focus();return false; }
                      return true;
                    }
</script>
';

$bl = bulan($bulan);
echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
  echo '<h2 class="title">Tambah Jadwal Pelayanan</h2><h3 class="title">'.$pusing.' - '.$bl.' '.$tahun.'</h3><div class="entry">';
  echo '<p><form name="form1" method="post" action="">
    <table border=0 cellpadding=0 cellspacing=5 width=100%>
                         <tr>
                         <td width = 100>Tanggal Mulai</td>
                         <td>:</td>
                         <td><input type="text" name="tglm" size="10" ></td>
                         </tr>
                         <tr>
                         <td>Tanggal Selesai</td>
                         <td>:</td>
                         <td><input type="text" name="tgls" size="10" ></td>
                         </tr>
                         <tr><td valign=top colspan=2>&nbsp;
                         <input type="hidden" name="idp" value="'.$id_p.'" />
                         <input type="hidden" name="bulan" value="'.$bulan.'" />
                         <input type="hidden" name="tahun" value="'.$tahun.'" />
                         </td>
                          <td> <input type="submit" name="BtnAdd" id="BtnAdd" value="Tambah" onclick="return FcheckFormAdd(this.form)"></td>
                         </tr>
                    </table>   </form>


  </p></div>';
break;

default :
      include ("menukiri.php");
      echo '<div id="page"><div id="content">';
      //include ("menu.php");
      echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
$tahun_ini = date("Y"); //echo "th = $tahun_ini";
$bulan[1] = 'Jan'; $bulan[2] = 'Feb'; $bulan[3] = 'Mar'; $bulan[4] = 'Apr'; $bulan[5] = 'Mei'; $bulan[6] = 'Jun';
$bulan[7] = 'Jul'; $bulan[8] = 'Aug'; $bulan[9] = 'Sept'; $bulan[10] = 'Okt'; $bulan[11] = 'Nov'; $bulan[12] = 'Des ';
$j = 1; $tampil_bulan = "";
for($k=1; $k<=12; $k ++)
{
  $tampil_bulan .=  "<td class=judul><b>$bulan[$k]</b></td>";
}

$k = 0;   $tp3 ="";  $tampil_pelatihan ="";
$q2 = mysql_query("SELECT * from Lpsjmn_jenis_pelatihan order by id") or die('Error, gagal jenis ujian. ' . mysql_error());
while($row2=mysql_fetch_array($q2))
   { list($idp, $pelatihan)=$row2;
     $tp1 = "<td width=150><b>$pelatihan</b></td>";
     $tp2 = "";   $m=1;
     for($l = 1; $l <= 12; $l ++)
     { $arr_idj[$m] = "";
       $q3 = mysql_query("SELECT id, tgl_mulai, tgl_selesai from Lpsjmn_periode_pelatihan WHERE id_pelatihan='$idp' AND bln_mulai = $l and th_mulai = $tahun_ini") or die('Error, gagal jadwal. ' . mysql_error());
       $mulai = ""; $selsai = "";
       while($row3=mysql_fetch_array($q3))
       { list($idj, $tglm, $tgls)=$row3;
         $mulai = $tglm;
         if($tglm == $tgls) $selsai = ""; else $selsai = " - ".$tgls;
         $arr_idj[$m]=$idj;
       }
       if($arr_idj[$m]== "") $link_xx = "<div align=right><a href='?aksi=tambah_jadwal&b=$l&t=$tahun_ini&p=$idp'><img src='images/document.gif' alt='tambah' title='tambah' border='0' /></a></div>";
       else $link_xx = "<div align=right><a href='?aksi=edit_jadwal&id=$arr_idj[$m]'><img src='images/edit.gif' title='edit'  border='0' /></a>
       <a href='?aksi=hapus_jadwal&id=$arr_idj[$m]'><img src='images/hapus.gif' alt='hapus' title='hapus' border='0' /></a></div>";
       $tp2 .= "<td align=center><big><b>$mulai"."$selsai</b></big><br>
       $link_xx
       </td>";
       $m = $m + 1;
     }
     $tp3 .= "<tr bgcolor=#ecf3e1>$tp1"."$tp2</tr>";

   }


echo '<h2 class="title">Manajemen Jadwal Layanan '.$tahun_ini.'</h2><div class="entry">';
 echo '
   <table width=100% border=0 cellspacing="1" cellpadding="8">
  <tr align=center bgcolor=#3A570F><td class=judul><b>&nbsp;</b></td>
  '.$tampil_bulan.'
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

