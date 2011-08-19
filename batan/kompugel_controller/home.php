<?php if(!$gabung) die()?>
<?php
//require "model/model.php";
require "lib/date.php";
require "lib/pagination.php";

//Berita Nuklir
$db->where('id_kategori=4 order by waktu_kirim desc');
$db->get('berita', 0, 5);
$list_berita_nuklir = $db->get_fetch();

//Berita Batan
$db->where('id_kategori=1 order by waktu_kirim desc');
$db->get('berita', 0, 5);
$list_berita_batan = $db->get_fetch();

////Artikel
$db->where('1');
$db->get('PIE', 0, 5);
$list_artikel = $db->get_fetch();

$db->where(1);
$db->get('satker');
$data_satker = $db->get_fetch();
foreach($data_satker as $s)
{
    $satker[$s['id']] = $s['nama'];
}




switch ($param[1])
{
    case "tentangbatan":
        $view_content = "view/tentangbatan.php";
        require "view/home.php";
        break;

    case "profil":
        $view_content = "view/profil.php";
        require "view/home.php";
        break;

    case "sejarah":
        $view_content = "view/sejarah.php";
        require "view/home.php";
        break;

    case "profil":
        $view_content = "view/profil.php";
        require "view/home.php";
        break;

    case "strukturorganisasi":
        $view_content = "view/strukturorganisasi.php";
        require "view/home.php";
        break;

    case "kerjasama":
        $view_content = "view/kerjasama.php";
        require "view/home.php";
        break;

    case "agenda":
        $view_content = "view/agenda.php";
        require "view/home.php";
        break;

    case "ansn":
        $view_content = "view/ansn.php";
        require "view/home.php";
        break;
    
    case "download":
        $view_content = "view/download.php";
        require "view/home.php";
        break;

    case "litbangyasa":
        $view_content = "view/litbangyasa.php";
        require "view/home.php";
        break;

    case "litbangenergi":
        $view_content = "view/litbangenergi.php";
        require "view/home.php";
        break;

     case "litbangpertanian":
        $view_content = "view/litbangpertanian.php";
        require "view/home.php";
        break;

     case "litbangkesehatan":
        $view_content = "view/litbangkesehatan.php";
        require "view/home.php";
        break;

     case "litbangtik":
        $view_content = "view/litbangtik.php";
        require "view/home.php";
        break;
    
    case "pengetahuan":
        $view_content = "view/pengetahuan.php";
        require "view/home.php";
        break;
    
    case "informasi":
        $view_content = "view/informasi.php";
        require "view/home.php";
        break;
    
    case "produk":
        $view_content = "view/produk.php";
        require "view/home.php";
        break;

     case "pengadaanbarang":
        $view_content = "view/pengadaanbarang.php";
        require "view/home.php";
        break;
    
   
   
    case "oss":
        $view_content = "view/oss.php";
        require "view/home.php";
        break;

    case "newsletter":
        $view_content = "view/newsletter.php";
        require "view/home.php";
        break;

    case "kunjungan":
        $view_content = "kunjungan.php";
        require "view/home.php";
        break;

    case "bukutamu":
        if($param[2] && $param[2]>0) $start=$param[2]; else $start=0;
        require_once('recaptcha/recaptchalib.php');
        $privatekey = "6LcP08YSAAAAAIqW7W9WnncTW4gx7i3wZ_HQrNqK";
        $publickey = "6LcP08YSAAAAAP3QZKfXDazMYd9_yT4zgnAczu9t";
        if ($_POST["recaptcha_response_field"]) {
                $resp = recaptcha_check_answer ($privatekey,
                                                $_SERVER["REMOTE_ADDR"],
                                                $_POST["recaptcha_challenge_field"],
                                                $_POST["recaptcha_response_field"]);

                if ($resp->is_valid) {
                        $data = array(
                            "nama"  => $_POST['nama'],
                            "isi"   => $_POST['isi'],
                            "email" => $_POST['email'],
                            "website" => $_POST['website']
                            );
                        $data['tanggal'] = date("Y-m-d H:i:s");
                        $x = $db->insert('buku_tamu', $data);
                        if($x) $_POST['isi']="";
                } else {
                        # set the error code so that we can display it
                        $error = $resp->error;
                        $notif = '<br /><span style="color: red">Kode kemanan harus diisi</span>';
                }
        }
        else $notif='<br /><span style="color: red">Kode kemanan harus diisi</span>';
        
        //Dapetin data
        $per_page = 7;
        $db->where('id_balas=0 order by id desc');
        $db->get('buku_tamu', $start, $per_page);
        $buku_tamu = $db->get_fetch();
        
        $db->where('id_balas=0');
        $db->get('buku_tamu');
        $confi['per_page']     = $per_page; //20
        $confi['start']        = $start;
        $confi['total_rows']   = $db->num_rows(); //199
        $confi['base_url']     = $config->base_url . "portal/home/bukutamu";
        $page = new pagination();
        $page->initialize($confi);
        $view_content = "view/bukutamu.php";
        require "view/home.php";
        break;

    case "beritaoss":
        $view_content = "view/beritaoss.php";
        require "view/home.php";
        break;

     case "rencpengadaan":
        $view_content = "view/rencpengadaan.php";
        require "view/home.php";
        break;

     case "pengumumanpengadaan":
        $view_content = "view/pengumumanpengadaan.php";
        require "view/home.php";
        break;

     case "beritapengadaan":
        $view_content = "view/beritapengadaan.php";
        require "view/home.php";
        break;

    case "produkbatan":
        $view_content = "view/produkbatan.php";
        require "view/home.php";
        break;

    case "produkhukum":
        $view_content = "view/produkhukum.php";
        require "view/home.php";
        break;

    case "galerivideo":
        $view_content = "view/galerivideo.php";
        require "view/home.php";
        break;

    case "renograph":
        $view_content = "view/renograph.php";
        require "view/home.php";
        break;

    case "radioisotop":
        $view_content = "view/radioisotop.php";
        require "view/home.php";
        break;

    case "xray":
        $view_content = "view/xray.php";
        require "view/home.php";
        break;

    case "xrayindustri":
        $view_content = "view/xrayindustri.php";
        require "view/home.php";
        break;

    case "dcs":
        $view_content = "view/dcs.php";
        require "view/home.php";
        break;

    case "jasahidro":
        $view_content = "view/jasahidro.php";
        require "view/home.php";
        break;

    case "jasandt":
        $view_content = "view/jasandt.php";
        require "view/home.php";
        break;

    case "mejaradiologi":
        $view_content = "view/mejaradiologi.php";
        require "view/home.php";
        break;

    case "faq":
        $view_content = "view/faq.php";
        require "view/home.php";
        break;

     case "referensi":
        $view_content = "view/referensi.php";
        require "view/home.php";
        break;

     case "e-jurnal":
        $view_content = "view/e-jurnal.php";
        require "view/home.php";
        break;

    case "e-procurement":
        $view_content = "view/e-procurement.php";
        require "view/home.php";
        break;

    case "sppa":
        $view_content = "view/sppa.php";
        require "view/home.php";
        break;

    case "spp":
        $view_content = "view/spp.php";
        require "view/home.php";
        break;

    default:
        $view_content = "view/depan.php";
        require "view/home.php";
        break;

}