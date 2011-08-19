<?php
require_once('recaptcha/recaptchalib.php');
$publickey = "6LcP08YSAAAAAP3QZKfXDazMYd9_yT4zgnAczu9t ";
$privatekey = "6LcP08YSAAAAAIqW7W9WnncTW4gx7i3wZ_HQrNqK";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;
$resp = recaptcha_check_answer ($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]);
if($_POST["recaptcha_response_field"]){
                            if($resp->is_valid){
                                $jenis_limbah = "";
                                $tgl_order = date('Y-m-d');
                                if(!$_SESSION['order_id'])
                                {
                                    $data = array(
                                        "instansi" => $_POST['instansi'],
                                        "alamat" => $_POST['alamat'],
                                        "email" => $_POST['email'],
                                        "telp" => $_POST['telp'],
                                        "fax" => $_POST['fax'],
                                        "tgl_order" => $tgl_order,
                                        "status" => 'Baru'
                                    );
                                    $x=$db->insert('order_limbah', $data);
                                }
                                else{
                                    $x = $_SESSION['order_id'];
                                }
                                $dimensi = $_POST['panjang']."x".$_POST['lebar']."x".$_POST['tinggi'];
                                if($_POST['no_seri'])
                                {
                                    $jenis_limbah = $_POST['jenis']." no. seri ".$_POST['no_seri'];
                                }
                                else
                                {
                                    $jenis_limbah = $_POST['jenis'].$_POST['jenislain'];
                                }

                                $kand_radionuklida=$_POST['radionuklida1']." / ".$_POST['radionuklida2'];

                                if($_POST['ph'] == 7)
                                {
                                    $kategori_pH = "Netral";
                                }

                                else if ($_POST['ph'] < 7 && $_POST['ph'] >= 0)
                                {

                                    $kategori_pH = "Asam";
                                }

                                else if ($_POST['ph'] <=14) $kategori_pH = "Basa";

                                $sifat = $_POST['sifat'].$_POST['sifatlain'];
                                $tanggal = to_date($_POST['tgl_ukur']);
                                $volumik = $_POST['volumik']." ".$_POST['satuan_volimuk']."/".$_POST['tgl_volumik'];
                                $total = $_POST['total']." ".$_POST['satuan_total']."/".$_POST['tgl_total'];
                                $permukaan = $_POST['permukaan']." ".$_POST['satuan_permukaan'];
                                $jarak = $_POST['jarak']." ".$_POST['satuan_jarak'];
                                $data = array(
                                    "jenis_limbah" => $jenis_limbah,
                                    "jenis_penampung" => $_POST['jenis_penampung'],
                                    "no_penampung" => $_POST['nomor'],
                                    "volume_limbah" => $_POST['volume'],
                                    "berat_limbah" => $_POST['berat'],
                                    "dimensi" => $dimensi,
                                    "kand_radionuklida" => $kand_radionuklida,
                                    "kand_kimia" => $_POST['kimia'],
                                    "ph_limbah" => $_POST['ph'],
                                    "kategori_ph_limbah" => $kategori_pH,
                                    "volumik_radioaktivitas" => $volumik,
                                    "total_radioaktivitas" => $total,
                                    "lain2_radioaktivitas" => $_POST['lain2'],
                                    "tgl_pengukuran" => $tanggal,
                                    "permukaan" => $permukaan,
                                    "jarak_1_m" => $jarak,
                                    "alat_ukur" => $_POST['alat_ukur'],
                                    "sifat_limbah" => $sifat,
                                    "lain2" => $_POST['lain'],
                                    "tgl_order" => $tgl_order,
                                    "id_order" => $x
                                );
                                //print_r($data);
                                $_SESSION['order_id'] = $x;
                                $db->insert('limbah', $data);
                                header('Location: index.php?l=limbah&s=p_limbah');
                          }  else {
                              # set the error code so that we can display it
                              $error = $resp->error;
                          }
}

?>
<link type="text/css" href="ui/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="ui/jquery.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal").datepicker({
                    dateFormat:"dd MM yy",
                    changeMonth: true,
                    changeYear: true

                });
            });
            $(document).ready(function(){
                $("#tggl").datepicker({
                    dateFormat:"dd MM yy",
                    changeMonth: true,
                    changeYear: true

                });
            });
            $(document).ready(function(){
                $("#tgl").datepicker({
                    dateFormat:"dd MM yy",
                    changeMonth: true,
                    changeYear: true

                });
            });
            function tutup()
            {
                $('#bekas').hide();
                $('#lainnya').hide();
                $('#sifat').hide();
            }
            
            function validate(tipe, elementValue){
                if(tipe=='email'){
                    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
                    return emailPattern.test(elementValue);
                }
                else if(tipe=='angka'){
                    var emailPattern = /^[0-9]/;  
                    return emailPattern.test(elementValue);
                }
                else return false;
             }
             
             function cek(){
                 if(!validate('email',$('#email').val())){
                     $('#notif_email').html('Email tidak valid');
                     $('#notif_email').css(document.bgColor = yellow);
                     $('#notif').html('Formulir belum valid, mohon periksa kembali input data Anda');
                     return false;
                 }
                 else {
                     $('#notif_email').html('Email valid');
                     $('#notif').html('Formulir sudah valid');
                     return true;
                 }

                 
             }
</script>
<script type="text/javascript" src="ui/ui.core.js"></script>
<script type="text/javascript" src="ui/ui.datepicker.js"></script>
<script type="text/javascript" src="ui/ui.datepicker-id.js"></script>
<div class="entry">   
    <form action="" method="POST" enctype="multipart/form-data"  >
            <h2>Data Instansi</h2>
            <?php if(!$_SESSION['order_id']){?>
            <table>
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td>Instansi</td>
                        <td>: <input type="text" name="instansi" value="<?php echo $_POST['instansi']?>"/></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">Alamat</td>
                        <td style="vertical-align: top">: <textarea name="alamat" rows="8" ><?php echo $_POST['alamat']?></textarea></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <input type="text" name="email" id="email" onkeydown="cek()" value="<?php echo $_POST['email']?>"/>
                        <span id="notif_email"></span></td>
                    </tr>
                    <tr>
                        <td>Telp / HP</td>
                        <td>: <input type="text" name="telp" onkeypress="cek()" value="<?php echo $_POST['telp']?>"/>
                    </tr>
                    <tr>
                        <td>Fax</td>
                        <td>: <input type="text" name="fax" onkeypress="cek()" value="<?php echo $_POST['fax']?>"/>
                    </tr>
                </tbody>
            </table><?php }
            else {
                $db->where('id_order=' . $_SESSION['order_id']);
                $db->get("order_limbah");
                $data = $db->get_fetch();
                $data = $data[0];
                ?>

            <table>
                <tbody>
                    <tr>
                        <td>Instansi</td>
                        <td>: <?php echo $data['instansi']?></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">Alamat</td>
                        <td style="vertical-align: top">: <?php echo $data['alamat']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?php echo $data['email']?> <input type="hidden" id="email" value="<?php echo $data['email']?>" /></td>
                        
                    </tr>
                    <tr>
                        <td>Telp/HP</td>
                        <td>: <?php echo $data['telp']?> <input type="hidden" id="telp" value="<?php echo $data['telp']?>" /></td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?php echo $data['fax']?> <input type="hidden" id="fax" value="<?php echo $data['fax']?>" /></td>

                    </tr>
                </tbody>
            </table>
            <?php }
            ?>
            <h2>Data Limbah</h2>
            <table>
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Jenis Limbah</b></td>
                        <td colspan="2">:
                            <select name="jenis" onchange="if(this.value == 'lainnya'){ tutup(); $('#lainnya').fadeIn();} else if(this.value=='Sumber Berkas'){ tutup(); $('#bekas').fadeIn();} else{tutup();}">
                                <option value="Cair">Cair</option>
                                <option value="Padat">Padat</option>
                                <option value="Gas">Gas</option>
                                <option value="Semi Cair">Semi Cair</option>
                                <option value="Sumber Berkas">Sumber Berkas</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                            <span id="bekas" style="display: none">No Seri: <input type="text" name="no_seri" /></span>
                            <span id="lainnya" style="display: none">Penjelasan: <input type="text" name="jenislain" /></span>

                        </td>
                    </tr>
                    <tr>
                        <td><b>Penampung/Pembungkus</b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;a. Jenis</td>
                        <td colspan="2">: <input type="text" name="jenis_penampung" id="jenis" value="<?php echo $_POST['jenis_penampung']?>"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;b. Nomor Drum/Penampung</td>
                        <td colspan="2">: <input type="text" name="nomor" id="nomor" value="<?php echo $_POST['nomor']?>"/></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Limbah</b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;a. Volume</td>
                        <td colspan="2">: <input type="text" name="volume" id="volume" value="<?php echo $_POST['volume']?>"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;b. Berat</td>
                        <td colspan="2">: <input type="text" name="berat" id="berat" value="<?php echo $_POST['berat']?>"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;b. Dimensi</td>
                        <td colspan="2">: Panjang <input type="text" name="panjang" id="panjang" style="width: 60px" value="<?php echo $_POST['panjang']?>"/>
                        x Lebar <input type="text" name="lebar" id="panjang" style="width: 60px" value="<?php echo $_POST['lebar']?>"/>
                        x Tinggi <input type="text" name="tinggi" id="panjang" style="width: 60px" value="<?php echo $_POST['tinggi']?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Karakteristik Limbah</b></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;a. Kand. Radionuklida/T1/2</td>
                        <td colspan="2">: <input type="text" name="radionuklida1" style="width: 120px" value="<?php echo $_POST['radionuklida1']?>"/> / <input type="text" name="radionuklida2" style="width: 120px" value="<?php echo $_POST['radionuklida2']?>"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;b. Kandungan Kimia</td>
                        <td colspan="2">: <input type="text" name="kimia" id="kimia" value="<?php echo $_POST['kimia']?>"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;c. pH Limbah</td>
                        <td colspan="2">: <input type="text" name="ph" id="ph" style="width: 50px" value="<?php echo $_POST['ph']?>"/></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top" rowspan="3">&nbsp;d. Radioaktivitas</td>
                        <td>- Volumik/Tgl</td>
                        <td>: <input type="text" name="volumik" id="volumik" style="width: 120px" value="<?php echo $_POST['volumik']?>"/>
                            <select name="satuan_volumik">
                                <option>Bq/m3</option>
                                <option>Ci/m3</option>
                            </select> /
                            <br />
                            &nbsp;<input type="text" name="tgl_volumik" id="tanggal" value="<?php echo $_POST['tgl_volumik']?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>- Total/Tgl</td>

                        <td>: <input type="text" name="total" id="total" style="width: 120px" value="<?php echo $_POST['total']?>"/>
                            <select name="satuan_total">
                                <option>Bq</option>
                                <option>Ci</option>
                            </select> /
                            <br />
                            &nbsp;<input type="text" name="tgl_total" id="tggl" value="<?php echo $_POST['tgl_total']?>"/>
                        </td>
                    </tr>
                    <tr>
                            <td>- Lain-lain </td>
                            <td>: <input type="text" name="lain2" value="<?php echo $_POST['lain2']?>"/></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top" rowspan="3">&nbsp;e. Dosis Paparan Limbah</td>
                        <td>- Tanggal Pengukuran</td>
                        <td>: <input type="text" name="tgl_ukur" id="tgl" value="<?php echo $_POST['tgl_ukur']?>"/></td>
                    </tr>
                    <tr>
                        <td>- Permukaan</td>
                        <td>: <input type="text" name="permukaan" id="permukaan" style="width: 120px" value="<?php echo $_POST['permukaan']?>"/>
                            <select name="satuan_permukaan">
                                <option>&mu; Sv/j</option>
                                <option>mRem/J</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>- Jarak 1 m</td>
                        <td>: <input type="text" name="jarak" id="jarak" style="width: 120px" value="<?php echo $_POST['jarak']?>"/>
                            <select name="satuan_jarak">
                                <option>&mu; Sv/j</option>
                                <option>mRem/J</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;f. Alat Pengukuran</td>
                        <td colspan="2">: <input type="text" name="alat_ukur" id="alat_ukur" value="<?php echo $_POST['alat_ukur']?>"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;g. Sifat</td>
                        <td colspan="2">:
                            <select name="sifat" onchange="if(this.value == 'lainnya'){ tutup(); $('#sifat').fadeIn();} else{tutup();}">
                                <option value="Volatil">Volatil</option>
                                <option value="Korosif">Korosif</option>
                                <option value="Eksplosif">Eksplosif</option>
                                <option value="Toksisitas">Toksisitas</option>
                                <option value="Imflamable">Imflamable</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                            <span id="sifat" style="display: none" >Penjelasan: <input type="text" name="sifatlain" value="<?php echo $_POST['sifatlain']?>"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;h. Lain-lain</td>
                        <td colspan="2">: <input type="text" name="lain" value="<?php echo $_POST['lain']?>"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">
                        <?php                          
                          echo recaptcha_get_html($publickey, $error);                          
                        ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: left" colspan="2">
                            <input type="submit" value="Masukkan" style="margin-right: 220px"/>
                            <br /><span id="notif"></span><br />
                            <a href="index.php?l=limbah&s=daftar2">Selesai</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>