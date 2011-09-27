<?php if(!$gabung) die();
require "lib/date.php";
 require_once('recaptcha/recaptchalib.php');
if($_POST['nama']){
   
        $privatekey = "6LcP08YSAAAAAIqW7W9WnncTW4gx7i3wZ_HQrNqK";
        $publickey = "6LcP08YSAAAAAP3QZKfXDazMYd9_yT4zgnAczu9t";
        if ($_POST["recaptcha_response_field"]) {
                $resp = recaptcha_check_answer ($privatekey,
                                                $_SERVER["REMOTE_ADDR"],
                                                $_POST["recaptcha_challenge_field"],
                                                $_POST["recaptcha_response_field"]);

                if ($resp->is_valid) {
                        $msg = 'Komentar berhasil dikirim';
                        $data = array(
                            "nama"  => $_POST['nama'],
                            "komentar"   => $_POST['isi'],
                            "email" => $_POST['email'],
                           // "website" => $_POST['website'],
                            "id_berita" => $_POST['id_berita']
                            );
                        $data['tgl'] = date("Y-m-d H:i:s");
                        $data->pesan = $this->msg;
                        $db = 'batan';
                        $x = $db->insert('berita_komentar', $data);
                        if($x) $_POST['isi']="";
                } else {
                        # set the error code so that we can display it
                        $error = $resp->error;
                        $notif = '<br /><span style="color: red">Kode kemanan harus diisi</span>';
                }
        }
        else $notif='<br /><span style="color: red">Kode kemanan harus diisi</span>';
}

$db->where('id_berita=' . intval($param[1]));
$db->get('berita');
$beritas = $db->get_fetch();
$beritas = $beritas[0];

//komentar
$db->get('berita_komentar', 0, 5);
$list_komentar = $db->get_fetch();

//Berita Nuklir
$db->where('id_kategori=4 order by waktu_kirim desc');
$db->get('berita', 0, 5);
$list_berita_nuklir = $db->get_fetch();

//Berita Batan
$db->where('id_kategori=1 order by waktu_kirim desc');
$db->get('berita', 0, 5);
$list_berita_batan = $db->get_fetch();

//arsip Berita
$db->where('1');
$db->get('berita', 0, 20);
$list_arsip_berita = $db->get_fetch();

////Artikel
$db->where('1');
$db->get('PIE', 0, 5);
$list_artikel = $db->get_fetch();

////list Artikel
$db->where('2');
$db->get('PIE', 0, 20);
$list_arsip_artikel = $db->get_fetch();

$db->where(1);
$db->get('satker');
$data_satker = $db->get_fetch();
foreach($data_satker as $s)
{
    $satker[$s['id']] = $s['nama'];
}

switch ($param[1])
{
    case "berita":
        $view_content = "view/berita.php";
        require "view/home.php";
        break;

    case "arsipberita":
        $view_content = "view/arsipberita.php";
        require "view/home.php";
        break;

    default:
        $view_content = "view/berita.php";
        require "view/home.php";
        break;
}

