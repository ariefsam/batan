<?php
$nama_menu = "Manajemen Pengguna";
include ("cek.php");
include ("fungsi.php");
$url = $jump."pengguna.php";
$aksi=$_GET['aksi'];
$name=$_POST['username'];
$pass=$_POST['password'];
$level=$_POST['level'];
$list=$_POST['dmsg'];
$email = $_POST['email'];
$psn=$_GET['psn'];
$idpeng=$_GET['xx'];
$id_edit = $_POST['id_e'];
$nama_asli = $_POST['nama_asli'];


if(isset($_POST['BtnEdit']))
{
   //echo "asli = $nama_asli - nama = $name";
   if($nama_asli != $name){
   $query_nama = "SELECT username FROM pengguna order by id ASC";
   $result_nama=    mysql_query($query_nama) or die('Error, query gagal nama. ' . mysql_error());
   while($row_nama=mysql_fetch_array($result_nama))
   { list($nama)=$row_nama;
     if($name == $nama)
     {
        header($url."?aksi=ggl&psn=1");
        exit;
     }
   }
   }
  if($_POST[id_satker] != ""){
    $q = "UPDATE pengguna SET username = '$name' , email = '$email', level = '$level', id_satker='{$_POST['id_satker']}'  WHERE id = '$id_edit'";
  }
  else {
    $q = "UPDATE pengguna SET username = '$name' , email = '$email', level = '$level' WHERE id = '$id_edit'";
  }
  mysql_query($q) or die('Error, query gagal di update pengguna. ' . mysql_error());
  $kuer = "DELETE FROM menu_pengguna WHERE id_pengguna = '$id_edit'";
  mysql_query($kuer) or die('Error, query gagal di delete. ' . mysql_error());
  foreach($list as $indek=>$namalist){
     //echo "list : $namalist<br>";
     $query2 = "INSERT INTO `menu_pengguna` (id_pengguna, id_menu) VALUES ('$id_edit', '$namalist')";
     $result2 = mysql_query($query2);
  }
   header($url."?aksi=berhasil&psn=3");
    exit;

}


if(isset($_POST['BtnAdd']))
{
   $query_nama = "SELECT username FROM pengguna order by id ASC";
   $result_nama=    mysql_query($query_nama) or die('Error, query gagal nama. ' . mysql_error());
   while($row_nama=mysql_fetch_array($result_nama))
   { list($nama)=$row_nama;
     if($name == $nama)
     {
        header($url."?aksi=ggl&psn=1");
        exit;
     }
   }

  //echo "nama = $name<br>pass=$pass<br>level=$level<br>email=$email<br>";
  $pass = md5($pass);
  $query = "INSERT INTO `pengguna` (username, password, email, level, id_satker)
                      VALUES ('$name', '$pass', '$email', '$level', '{$_POST['id_satker']}')";
  //echo "kuer =$query <br>";
  $result = mysql_query($query);
  if(!$result) {
    header($url."?aksi=ggl&psn=2");
    exit;
  } else {
    $strsql = "SELECT max(id) FROM pengguna as besar";
    $qsql = mysql_query($strsql); $row=mysql_fetch_array($qsql);
    $besar = $row[0];
    foreach($list as $indek=>$namalist){
    //echo "list : $namalist<br>";
     $query2 = "INSERT INTO `menu_pengguna` (id_pengguna, id_menu) VALUES ('$besar', '$namalist')";
     $result2 = mysql_query($query2);
  }
    header($url."?aksi=berhasil&psn=1");
    exit;
  }
}

switch ($aksi)
{
case "edit":
include ("menukiri.php");
echo '<div id="page"><div id="content">';
include ("menu.php");
echo '
<script language="javascript">
                    function FcheckFilled(n,v){
                      if(v==""){ alert(n+" Harus Di ISI!");return false; }
                      else { return true; }
                    }
                    function FcheckEmail(n,v){
                    var a=0
                    var p=0
                    for(var i=1;i<v.length;i++){
                      if(!v.charAt(i))return false
                      else if(v.charAt(i)=="@"){a++;if(v.charAt(i+1)==""){ alert(n+" Tidak VALID!");return false; }}
                      else if(v.charAt(i)=="."){p++;if(v.charAt(i+1)==""||v.charAt(i+1)=="@"||v.charAt(i-1)=="@"){ alert(n+" Tidak VALID!");return false; }}
                    }
                    if(a==1&&p){ return true; }
                    else { alert(n+" Harus diisi dengan data valid!");return false; }
                  }

                    function FcheckFormEdit(f){
                      if(!FcheckFilled("Nama Pengguna",f.username.value)){ f.username.focus();return false; }
                      if(!FcheckEmail("Alamat Email",f.email.value)){ f.email.focus();return false; }
                      return true;
                    }

                 function check(jml)
{
    var length = document.form1.elements.length;
    if (document.form1.checkall.checked==1)
    {
        for (i=length-1; i>0; i--)
        {
            var e = document.form1.elements[i];
            if (e.type=="checkbox" && e.name.indexOf("dmsg") != -1)
            {
                e.checked=1;
            }
        }
    }
    else
    {
        for (i=length-1; i>0; i--)
        {
            var e = document.form1.elements[i];
            if (e.type=="checkbox" && e.name.indexOf("dmsg") != -1)
            {
                e.checked=0;
            }
        }
    }
}


                    </script>';

   $array_mn = array(); $k=0;
   $query_mn = "SELECT a.id_menu, b.menu  FROM menu_pengguna as a, menu as b WHERE id_pengguna='$idpeng' AND a.id_menu = b.id";
   //echo "k = $query_mn<br>";
   $result_mn=    mysql_query($query_mn) or die('Error, query gagal2. ' . mysql_error());
   while($row_mn=mysql_fetch_array($result_mn))
   {   list($id_menuxyz, $nama_menu)=$row_mn;
       $array_mn[$k]= $nama_menu;
       $k = $k+1;
   }
   //print_r($array_mn);
   $query = "SELECT username, email, level  FROM pengguna WHERE id=$idpeng";
   $result=    mysql_query($query) or die('Error, query gagal2. ' . mysql_error());
   while($row=mysql_fetch_array($result))
   { list($nama, $email, $level)=$row;
     if($level=='a')
     $menu_level= '<input type="radio" name="level" value="a" checked>Admin &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="level" value="u">Bukan Admin';
     if($level=='u')
     $menu_level= '<input type="radio" name="level" value="a">Admin &nbsp;&nbsp;&nbsp;
                   <input type="radio" name="level" value="u" checked>Bukan Admin';
   }
   $m = 0;  $tnd = array();  $menu_arr=array();
   $query_pp = "SELECT * FROM menu order by id ASC";
   $result_pp=    mysql_query($query_pp) or die('Error, query gagal2. ' . mysql_error());
   while($row_pp=mysql_fetch_array($result_pp))
   { list($id, $menu, $keterangan)=$row_pp;
     $menu_arr[$m] = $menu;
     if (in_array($menu_arr[$m],$array_mn)) {
     $tnd[$m] = 'checked';
     }

     $menu_tampil .= '<input type="checkbox" name="dmsg[]" value="'.$id.'" '.$tnd[$m].'>'.$menu.'<br>';
     $m = $m + 1;
   }

  echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
  echo '<h2 class="title">Tambah Pengguna</h2><div class="entry">';
  echo '<p><form name="form1" method="post" action="">
    <table border=0 cellpadding=0 cellspacing=5 width=100%>
                         <tr>
                         <td>Nama Pengguna</td>
                         <td>:</td>
                         <td><input type="text" name="username" size="40" value='.$nama.'>
                         <input type="hidden" name="id_e" value='.$idpeng.'>
                         <input type="hidden" name="nama_asli" value='.$nama.'>
                         </td>
                         </tr>
                         <tr>
                         <td>Email</td>
                         <td>:</td>
                         <td><input type="text" name="email" size="40" value='.$email.'></td>
                         </tr>
                         <tr>
                         <td>Satker</td>
                         <td>:</td>
                         <td><select name=id_satker selected><option value="">...Pilih Satker...</option>'.Pilih("2008_Satker").'</select></td>
                         </tr>
                         <tr valign=top>
                         <td>Level Akses
                         </td>
                         <td>:</td>
                         <td>
                         '.$menu_level.'
                         </td>
                         </tr>
                         <tr>
                         <td>Level Akses Menu</td>
                         <td>:</td>
                         <td><input type="checkbox" name="checkall" value="checkbox" onClick="check();">Check / Uncheck All</td>
                         </tr>
                         <tr>
                         <td  colspan=2>&nbsp;</td>
                         <td>
                         '.$menu_tampil.'
                         </td>
                       </tr>
                         <tr><td valign=top colspan=2>&nbsp;</td>
                          <td> <input type="submit" name="BtnEdit" id="BtnEdit" value="Edit" onclick="return FcheckFormEdit(this.form)"></td>
                         </tr>
                    </table>   </form>


  </p></div>';

break;

case "hps":
  if($lvl != 'a')
  {
     header($url."?aksi=ggl&psn=4");
     exit;
  }
  else {
       $query = "DELETE FROM pengguna WHERE id = '$idpeng'";
       $result = mysql_query($query);
       if(!$result) {
         header($url."?aksi=ggl&psn=3");
         exit;
       }
       else
       {$query2 = "DELETE FROM menu_pengguna WHERE id_pengguna = '$idpeng'";
        $result2 = mysql_query($query2);
        header($url."?aksi=berhasil&psn=2");
        exit;
       }
  }
break;

case "berhasil":
if($psn=='1')
    $pesan = "Data telah disimpan";
else if($psn=='2')
    $pesan = "Data telah dihapus";
else if($psn=='3')
    $pesan = "Data telah diupdate";
include ("menukiri.php");
echo '<div id="page"><div id="content">';
include ("menu.php");
echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
  echo '<h2 class="title">Manajemen Pengguna</h2><div class="entry"><p><font color=red>BERHASIL</font><br>'.$pesan.'<br>-- <a href=?>ok</a> --</p></div>';
break;

case "ggl";
if($psn=='1')
    $pesan = "Nama pengguna sudah terdapat dalam database";
else if($psn=='2')
    $pesan = "Gagal ketika menyimpan ke database";
else if($psn=='3')
    $pesan = "Gagal hapus data";
else if($psn=='4')
    $pesan = "Anda tidak berhak untuk menghapus data";

include ("menukiri.php");
echo '<div id="page"><div id="content">';
include ("menu.php");
echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
echo '<h2 class="title">Manajemen Pengguna</h2><div class="entry"><p><font color=red><b>GAGAL</b></font><br>'.$pesan.'</p></div>';
break;

case "add":
include ("menukiri.php");
echo '<div id="page"><div id="content">';
include ("menu.php");
echo '
<script language="javascript">
                    function FcheckFilled(n,v){
                      if(v==""){ alert(n+" Harus Di ISI!");return false; }
                      else { return true; }
                    }
                    function FcheckEmail(n,v){
                    var a=0
                    var p=0
                    for(var i=1;i<v.length;i++){
                      if(!v.charAt(i))return false
                      else if(v.charAt(i)=="@"){a++;if(v.charAt(i+1)==""){ alert(n+" Tidak VALID!");return false; }}
                      else if(v.charAt(i)=="."){p++;if(v.charAt(i+1)==""||v.charAt(i+1)=="@"||v.charAt(i-1)=="@"){ alert(n+" Tidak VALID!");return false; }}
                    }
                    if(a==1&&p){ return true; }
                    else { alert(n+" Harus diisi dengan data valid!");return false; }
                  }

                    function FcheckFormAdd(f){
                      if(!FcheckFilled("Nama Pengguna",f.username.value)){ f.username.focus();return false; }
                      if(!FcheckFilled("Password",f.password.value)){ f.password.focus();return false; }
                      if(!FcheckFilled("Password Konfirmasi",f.password2.value)){ f.password2.focus();return false; }
                      if(f.password.value != f.password2.value){alert("Password dan Password Konfirmasi Harus Sama"); return false;}
                      if(!FcheckEmail("Alamat Email",f.email.value)){ f.email.focus();return false; }
                      return true;
                    }

                 function check(jml)
{
    var length = document.form1.elements.length;
    if (document.form1.checkall.checked==1)
    {
        for (i=length-1; i>0; i--)
        {
            var e = document.form1.elements[i];
            if (e.type=="checkbox" && e.name.indexOf("dmsg") != -1)
            {
                e.checked=1;
            }
        }
    }
    else
    {
        for (i=length-1; i>0; i--)
        {
            var e = document.form1.elements[i];
            if (e.type=="checkbox" && e.name.indexOf("dmsg") != -1)
            {
                e.checked=0;
            }
        }
    }
}


                    </script>';

   $query = "SELECT * FROM menu order by id ASC";
   $result=    mysql_query($query) or die('Error, query gagal2. ' . mysql_error());
   while($row=mysql_fetch_array($result))
   { list($id, $menu, $keterangan)=$row;
     $menu_tampil .= '<input type="checkbox" name="dmsg[]" value="'.$id.'">'.$menu.'<br>';
   }


echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
  echo '<h2 class="title">Tambah Pengguna</h2><div class="entry">';
  echo '<p><form name="form1" method="post" action="">
    <table border=0 cellpadding=0 cellspacing=5 width=100%>
                         <tr>
                         <td>Nama Pengguna</td>
                         <td>:</td>
                         <td><input type="text" name="username" size="40" ></td>
                         </tr>
                         <tr>
                         <td>Password</td>
                         <td>:</td>
                         <td><input type="password" name="password" size="40" ></td>
                         </tr>
                         <tr>
                         <td>Password Konfirmasi</td>
                         <td>:</td>
                         <td><input type="password" name="password2" size="40" ></td>
                         </tr>
                         <tr>
                         <td>Email</td>
                         <td>:</td>
                         <td><input type="text" name="email" size="40" /></td>
                         </tr>
                         <tr>
                         <td>Satker</td>
                         <td>:</td>
                         <td><select name=id_satker selected><option value="">...Pilih Satker...</option>'.Pilih("2008_Satker").'</select></td>
                         </tr>
                         <tr valign=top>
                         <td>Level Akses
                         </td>
                         <td>:</td>
                         <td>
                         <input type="radio" name="level" value="a">Admin &nbsp;&nbsp;&nbsp;
                         <input type="radio" name="level" value="u" checked>Bukan Admin
                         </td>
                         </tr>
                         <tr>
                         <td>Level Akses Menu</td>
                         <td>:</td>
                         <td><input type="checkbox" name="checkall" value="checkbox" onClick="check();">Check / Uncheck All</td>
                         </tr>
                         <tr>
                         <td  colspan=2>&nbsp;</td>
                         <td>
                         '.$menu_tampil.'
                         </td>
                       </tr>
                         <tr><td valign=top colspan=2>&nbsp;</td>
                          <td> <input type="submit" name="BtnAdd" id="BtnAdd" value="Tambah" onclick="return FcheckFormAdd(this.form)"></td>
                         </tr>
                    </table>   </form>


  </p></div>';

break;

case "list":
include ("menukiri.php");
echo'
<script LANGUAGE="JavaScript">
function Fconfirm(x){
  var agree=confirm(x);
  if (agree)
    return true ;
  else
    return false ;
}
function FcheckFormHapus(f){
  if(!Fconfirm("Yakin Mau Hapus??") ) { return false; }
  return true;
}
</script>
';
echo '<div id="page"><div id="content">';
include ("menu.php");
include ("lib.php");
  $strsql = "SELECT * FROM pengguna order by username ASC";
  $qsql = mysql_query($strsql);
  if (!isset($start) OR ($start == "")) $start = 0 ;
  $itemperpage = 10;
  $all_record = mysql_num_rows($qsql);
  $paging = generate_pagination("pengguna.php?aksi=list", $all_record, $itemperpage, $start);
  $j=$start+1;
  if($lvl == 'a')
  $menu_judul = '<td class=judul>Hapus</td>';
echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
  echo '<h2 class="title">Daftar Pengguna</h2><div class="entry"><table width=90% border=0>
            <tr><td colspan=6 align=center>'.$paging.'</td></tr>
            <tr><td colspan=6>&nbsp;</td></tr>
            <tr align=center bgcolor=#3A570F><td width=30 class=judul>No.</td>
            <td class=judul>Nama</td>
            <td  class=judul>Email</td>
            <td class=judul>Level</td>
            <td class=judul>Edit</td>
            '.$menu_judul.'
            </tr>';

 $query = "SELECT id, username, email, level FROM pengguna order by username ASC LIMIT $start,$itemperpage";
          $result=    mysql_query($query) or die('Error, query gagal2. ' . mysql_error());
          while($row=mysql_fetch_array($result))
          { list($idp, $namap, $emailp, $levelp)=$row;
            if($lvl == 'a')
            {
             $menu_hapus = '<td><form name=formxx><a href=?aksi=hps&xx='.$idp.' onClick="return FcheckFormHapus(formxx);">hapus</a><hr></form></td>';
            }
            if($levelp=='a')
            {
            $levelp = "Admin";
            }
            else
            {$levelp = "Bukan admin";
            }
            echo ' <tr valign=top align=center>
            <td>'.$j.'<hr></td>
            <td>'.$namap.'<hr></td>
            <td>&nbsp;'.$emailp.'<hr></td>
            <td>'.$levelp.'<hr></td>
            <td><a href=?aksi=edit&xx='.$idp.'>edit</a><hr></td>
            '.$menu_hapus.'
            </tr>
            ';
            $j +=1;
          }
echo '</table></p></div>';
break;

default :
      include ("menukiri.php");
      echo '<div id="page"><div id="content">';
      include ("menu.php");
      echo '<div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>';
      echo '<h2 class="title">Manajemen Pengguna</h2><div class="entry">
      <p>Menu ini digunakan untuk manajemen pengguna, yaitu pengaturan tentang pengguna yang berhak mengakses WebCoMa serta level hak akses dari masing-masing pengguna.</p>
      <p>Untuk menambahkan pengguna baru, klik menu \'<a href="?aksi=add">Add</a>\' pada link diatas.</p>
      <p>Untuk Melihat daftar pengguna yang telah diinputkan, klik menu \'<a href=?aksi=list>List</a>\' pada link diatas</p>
      </div>';
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