<?php
//require_once('recaptcha/recaptchalib.php');
//$privatekey = "6LcP08YSAAAAAIqW7W9WnncTW4gx7i3wZ_HQrNqK";
//$resp = recaptcha_check_answer ($privatekey,
//        $_SERVER["REMOTE_ADDR"],
//        $_POST["recaptcha_challenge_field"],
//        $_POST["recaptcha_response_field"]);
//if ($resp->is_valid) {
//    $jenis_limbah = "";
//    $tgl_order = date('Y-m-d');
//    if(!$_SESSION['order_id'])
//    {
//        $data = array(
//            "instansi" => $_POST['instansi'],
//            "alamat" => $_POST['alamat'],
//            "email" => $_POST['email'],
//            "tgl_order" => $tgl_order
//        );
//        $x=$db->insert('order_limbah', $data);
//    }
//
//    else $x = $_SESSION['order_id'];
//
//    if($_POST['no_seri'])
//    {
//        $jenis_limbah = $_POST['jenis']." ".$_POST['no_seri'];
//    }
//
//    else
//    {
//        $jenis_limbah = $_POST['jenis'].$_POST['jenislain'];
//    }
//
//    $kand_radionuklida=$_POST['radionuklida1']."/".$_POST['radionuklida2'];
//
//    if($_POST['ph'] == 7)
//    {
//        $kategori_pH = "Netral";
//    }
//
//    else if ($_POST['ph'] < 7 && $_POST['ph'] >= 0)
//    {
//
//        $kategori_pH = "Asam";
//    }
//
//    else if ($_POST['ph'] <=14) $kategori_pH = "Basa";
//
//    $sifat = $_POST['sifat'].$_POST['sifatlain'];
//    $tanggal = to_date($_POST['tgl_ukur']);
//
//    $data = array(
//        "jenis_limbah" => $jenis_limbah,
//        "jenis_penampung" => $_POST['jenis_penampung'],
//        "no_penampung" => $_POST['nomor'],
//        "volume_limbah" => $_POST['volume'],
//        "berat_limbah" => $_POST['berat'],
//        "kand_radionuklida" => $kand_radionuklida,
//        "kand_kimia" => $_POST['kimia'],
//        "ph_limbah" => $_POST['ph'],
//        "kategori_ph_limbah" => $kategori_pH,
//        "volumik_radioaktivitas" => $_POST['volumik'],
//        "total_radioaktivitas" => $_POST['total'],
//        "lain2_radioaktivitas" => $_POST['lain2'],
//        "tgl_pengukuran" => $tanggal,
//        "permukaan" => $_POST['permukaan'],
//        "jarak_1_m" => $_POST['jarak'],
//        "alat_ukur" => $_POST['alat_ukur'],
//        "sifat_limbah" => $sifat,
//        "lain2" => $_POST['lain'],
//        "tgl_order" => $tgl_order,
//        "id_order" => $x
//    );
//
//    $_SESSION['order_id'] = $x;
//    //print_r($data);
//    $db->insert('limbah', $data);

    ?>
    <p>Data <b>berhasil</b> ditambahkan</p> <div style="text-align: center"><a href="?l=limbah&s=daftar">Tambah data limbah</a> | <a href="?l=limbah&s=daftar2">Selesai</a></div>
        <h2>Limbah yang Anda masukkan :</h2><br />
        <?php       $db->where('id_order=' . $_SESSION['order_id']. ' order by id_limbah' );
                    $db->get("limbah");
                    $d = $db->get_fetch();
                    $i=1;
                    foreach ($d as $data){
                    echo "Data limbah ke-".$i++;
                    ?>
        <table>
            <thead>
            </thead>
            <tbody>
                <tr>
                    <td><b>Jenis Limbah</b></td>
                    <td>: <?php echo $data['jenis_limbah']?></td>
                        </tr>
                        <tr>
                            <td><b>Penampung/Pembungkus</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;a. Jenis</td>
                            <td><?php echo $data['jenis_penampung']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;b. Nomor Drum/Penampung</td>
                            <td><?php echo $data['no_penampung']?></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Limbah</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;a. Volume</td>
                            <td><?php echo $data['volume_limbah']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;b. Berat</td>
                            <td><?php echo $data['berat_limbah']?></td>
                        </tr>
                        <tr>
                            <td><b>Karakteristik Limbah</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;a. Kand. Radionuklida/T1/2</td>
                            <td><?php echo $data['kand_radionuklida']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;b. Kandungan Kimia</td>
                            <td><?php echo $data['kand_kimia']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;c. pH Limbah</td>
                            <td><?php echo $data['ph_limbah']?> Kategori : <?php echo $data['kategori_ph_limbah']?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">&nbsp;d. Radioaktivitas</td>
                            <td>
                                - Volumik (Bq/m3, Ci/m3)/Tgl :&nbsp;<?php echo $data['volumik_radioaktivitas']?><br /><br />
                                - Total (Bq, Ci)/Tgl : <?php echo $data['total_radioaktivitas']?><br /><br />
                                - Lain-lain : <?php echo $data['lain2_radioaktivitas']?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">&nbsp;e. Dosis Paparan Limbah</td>
                            <td>
                                - Tanggal Pengukuran :&nbsp;<?php echo from_date($data['tgl_pengukuran'])?><br /><br />
                                - Permukaan (&mu; Sv/j, mRem/J) :&nbsp; <?php echo $data['permukaan']?><br /><br />
                                - Jarak 1 m (&mu; Sv/j, mRem/J) : <?php echo $data['jarak_1_m']?>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;f. Alat Pengukuran</td>
                            <td><?php echo $data['alat_ukur']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;g. Sifat</td>
                            <td>:<?php echo $data['sifat_limbah']?>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;h. Lain-lain</td>
                            <td><?php echo $data['lain2']?></td>
                        </tr>
                    </tbody>
                </table>
        <?php }?>
                <div style="text-align: center"><a href="?l=limbah&s=daftar">Tambah data limbah</a> | <a href="?l=limbah&s=daftar2">Selesai</a></div>
    <?php //}
//    else
//    {
    ?>
<!--                <h4 style="color: red">reCAPTCHA yang Anda masukkan tidak sesuai. <a href="?l=limbah&s=daftar2" style="text-decoration: underline">Kembali</a> dan coba lagi</h4>-->
    <?php// }?>

