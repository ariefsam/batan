<?php
//Load library tanggal
require 'lib/date.php';
//==========Load Library Upload, untuk mengupload=============
require 'lib/upload.php';
require_once 'konfigurasi.php';

$upload = new upload();
if ($_POST['nama']) {
    $data = array(
        'nama'      => $_POST['nama'],
        'perusahaan'=> $_POST['perusahaan'],
        'telpon'    => $_POST['telpon'],
        'tgl_lahir' => to_date($_POST['tgl_lahir'])
    );
    $dir_ktp = "./ktp/";
    $dir_tandatangan = "./ttd/";

    if($_FILES['tandatangan']['name'])
    {
        $config['directory'] = $dir_tandatangan;
        $x = $upload->do_upload('tandatangan', $config);
        $data['tandatangan'] = $x['name'];
    }

    if($_FILES['foto']['name'])
    {
        $config['directory'] = $dir_ktp;
        $x = $upload->do_upload('foto', $config);
        $data['foto'] = $x['name'];
    }
    $x = $db->insert('Lpsjmn_siswa', $data);
    if ($x)
    {
        if($_POST['periode']!=0)
        {
            $pel = array(
                "id_periode"    => $_POST['periode'],
                "id_ujian"      => $_POST['ujian'],
                "id_siswa"      => $x
            );
            $p = $db->insert('Lpsjmn_pelatihan', $pel);
        }
        header('location: ?aksi=detail&id=' . $x);
    }
    else
        $info = "Pendaftaran Gagal";
}
include ("menukiri.php");
?>

<div id="page"><div id="content">
<?php include ("menu.php") ?>

        <div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>
            <h2 class="title">Manajemen Pendaftaran Offline <?php echo $tahun_ini ?></h2>

            <div class="entry">
                <?php
                if ($x) 
                {?>
                Pendaftaran Sukses<br />
                <a href="lpsjmn_daftar_offline.php?aksi=detail&id=<?php echo $x?>">Klik disini untuk detail</a>
                    <?php } else { ?>
                        Pendaftaran Gagal<br />
                <a href="lpsjmn_daftar_offline.php">Klik disini untuk kembali</a>
                        <?php } ?>
            </div>