<?php
$tgl = to_date($_POST['tgl_lahir']);
$data = array(
    "nama" => $_POST['nama'],
    "tgl_lahir" => $tgl,
    "perusahaan" => $_POST['perusahaan'],
    "telpon" => $_POST['telpon'],
    "pelatihan" => $_POST['pelatihan']
);
$db->where(1);
$db->get('Lpsjmn_jenis_pelatihan');
        $pelatihan = $db->get_fetch();

require_once('recaptcha/recaptchalib.php');
$privatekey = "6LcP08YSAAAAAIqW7W9WnncTW4gx7i3wZ_HQrNqK";
$resp = recaptcha_check_answer ($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]);
if ($resp->is_valid) {
    $db->insert('Lpsjmn_siswa_online', $data);
    ?>

<div class="entry">
    Pendaftaran Berhasil
 <table>
     <thead>
     </thead>
     <tbody>
         <tr>
             <td>Nama</td>
             <td>: <?php echo $_POST['nama']?></td>
         </tr>
         <tr>
             <td>Tanggal Lahir</td>
             <td>: <?php echo $_POST['tgl_lahir']?></td>
         </tr>
         <tr>
             <td>Perusahaan</td>
             <td>: <?php echo $_POST['perusahaan']?></td>
         </tr>
         <tr>
             <td>No Kontak / Telpon</td>
             <td>: <?php echo $_POST['telpon']?></td>
         </tr>
         <tr>
             <td>Pelatihan</td>
             <td>:
                 <?php $db->where('id = '.$_POST['pelatihan']);
                 $db->get('Lpsjmn_jenis_pelatihan');
                 $pelatihan = $db->get_fetch();
                 $pelatihan = $pelatihan[0];
                 echo $pelatihan['nama_pelatihan'];
                 ?>
             </td>
         </tr>
         <tr>
             <td></td>
             <td style="text-align: right"><a href="?l=psjmn&s=daftar" >Daftar lagi</a> &nbsp;&nbsp;<a href="?l=psjmn" />Selesai</td>
         </tr>
     </tbody>
 </table>
</div>

<?php
}
else { $notif = "Pendaftaran Gagal, cek data dan kode keamanan";
    require "daftar.php";
}
?>
