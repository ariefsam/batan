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
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<font color=#535050 size=2px>Tentang BATAN</font>';
        $view_content = "view/tentangbatan.php";
        require "view/home2.php";
        break;

    case "profil":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/tentangbatan.html" class="text" ><font color=#3b33e7 size=2px>Tentang BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Profil BATAN</font>';
        $view_content = "view/profil.php";
        require "view/home2.php";
        break;

    case "sejarah":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/tentangbatan.html" class="text" ><font color=#3b33e7 size=2px>Tentang BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Sejarah</font>';
        $view_content = "view/sejarah.php";
        require "view/home2.php";
        break;

    case "strukturorganisasi":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/tentangbatan.html" class="text" ><font color=#3b33e7 size=2px>Tentang BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Struktur Organisasi</font>';
        $view_content = "view/strukturorganisasi.php";
        require "view/home2.php";
        break;

    case "kerjasama":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/tentangbatan.html" class="text" ><font color=#3b33e7 size=2px>Tentang BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Kerjasama</font>';
        $view_content = "view/kerjasama.php";
        require "view/home2.php";
        break;

    case "agenda":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Agenda</font>';
        $view_content = "view/agenda.php";
        require "view/home2.php";
        break;

    case "ansn":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
\                <font color=#535050 size=2px>ANSN</font>';
        $view_content = "view/ansn.php";
        require "view/home2.php";
        break;

    case "download":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Download</font>';
        $view_content = "view/download.php";
        require "view/home2.php";
        break;

    case "litbangyasa":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Hasil Litbangyasa</font>';
        $view_content = "view/litbangyasa.php";
        require "view/home2.php";
        break;

    case "litbangenergi":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/litbangyasa.html" class="text" ><font color=#3b33e7 size=2px>Hasil Litbangyasa</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Energi</font>';
        $view_content = "view/litbangenergi.php";
        require "view/home2.php";
        break;

     case "litbangpertanian":
          $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/litbangyasa.html" class="text" ><font color=#3b33e7 size=2px>Hasil Litbangyasa</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Pertanian&Peternakan</font>';
        $view_content = "view/litbangpertanian.php";
        require "view/home2.php";
        break;

     case "litbangkesehatan":
          $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/litbangyasa.html" class="text" ><font color=#3b33e7 size=2px>Hasil Litbangyasa</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Kesehatan&Obat-obatan</font>';
        $view_content = "view/litbangkesehatan.php";
        require "view/home2.php";
        break;

     case "litbangtik":
          $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/litbangyasa.html" class="text" ><font color=#3b33e7 size=2px>Hasil Litbangyasa</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Teknologi Informasi&Komunikasi</font>';
        $view_content = "view/litbangtik.php";
        require "view/home2.php";
        break;

    case "pengetahuan":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Ilmu Pengetahuan</font>';
        $view_content = "view/pengetahuan.php";
        require "view/home2.php";
        break;

    case "informasi":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Informasi</font>';
        $view_content = "view/informasi.php";
        require "view/home2.php";
        break;

    case "produk":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Produk</font>';
        $view_content = "view/produk.php";
        require "view/home2.php";
        break;

     case "pengadaanbarang":
          $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Pengadaan Barang-Jasa</font>';
        $view_content = "view/pengadaanbarang.php";
        require "view/home2.php";
        break;



    case "oss":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Open Source Software</font>';
        $view_content = "view/oss.php";
        require "view/home2.php";
        break;

    case "newsletter":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/ansn.html" class="text" ><font color=#3b33e7 size=2px>ANSN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>ANSN Newsletter</font>';
        $view_content = "view/newsletter.php";
        require "view/home2.php";
        break;

    case "kunjungan":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/informasi.html" class="text" ><font color=#3b33e7 size=2px>Informasi</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Kunjungan</font>';
        $view_content = "kunjungan.php";
        require "view/home2.php";
        break;

    case "bukutamu":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/informasi.html" class="text" ><font color=#3b33e7 size=2px>Informasi</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Buku Tamu</font>';

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
        require "view/home2.php";
        break;

    case "beritaoss":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/oss.html" class="text" ><font color=#3b33e7 size=2px>Open Source Software</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Berita OSS</font>';
        $view_content = "view/beritaoss.php";
        require "view/home2.php";
        break;

     case "rencpengadaan":
          $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/pengadaanbarang.html" class="text" ><font color=#3b33e7 size=2px>Pengadaan Barang-Jasa</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Rencana Pengadaan</font>';
        $view_content = "view/rencpengadaan.php";
        require "view/home2.php";
        break;

     case "pengumumanpengadaan":
          $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/pengadaanbarang.html" class="text" ><font color=#3b33e7 size=2px>Pengadaan Barang-Jasa</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Pengumuman Pengadaan</font>';
        $view_content = "view/pengumumanpengadaan.php";
        require "view/home2.php";
        break;

     case "beritapengadaan":
          $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/pengadaanbarang.html" class="text" ><font color=#3b33e7 size=2px>Pengadaan Barang-Jasa</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Berita Pengadaan</font>';
        $view_content = "view/beritapengadaan.php";
        require "view/home2.php";
        break;

    case "produkbatan":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Produk BATAN</font>';
        $view_content = "view/produkbatan.php";
        require "view/home2.php";
        break;

    case "produkhukum":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Produk Hukum</font>';
        $view_content = "view/produkhukum.php";
        require "view/home2.php";
        break;

    case "galerivideo":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/galeri.html" class="text" ><font color=#3b33e7 size=2px>Galeri</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Galeri Video</font>';
        $view_content = "view/galerivideo.php";
        require "view/home2.php";
        break;

    case "renograph":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <a href="portal/home/produkbatan.html" class="text" ><font color=#3b33e7 size=2px>Produk BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Renograf&Thyroid Up-Take</font>';
        $view_content = "view/renograph.php";
        require "view/home2.php";
        break;

    case "radioisotop":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <a href="portal/home/produkbatan.html" class="text" ><font color=#3b33e7 size=2px>Produk BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Radioisotop&Radiofarmaka</font>';
        $view_content = "view/radioisotop.php";
        require "view/home2.php";
        break;

    case "xray":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <a href="portal/home/produkbatan.html" class="text" ><font color=#3b33e7 size=2px>Produk BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>X-Ray Kedokteran</font>';
        $view_content = "view/xray.php";
        require "view/home2.php";
        break;

    case "xrayindustri":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <a href="portal/home/produkbatan.html" class="text" ><font color=#3b33e7 size=2px>Produk BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>X-Ray Industri</font>';
        $view_content = "view/xrayindustri.php";
        require "view/home2.php";
        break;

    case "dcs":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <a href="portal/home/produkbatan.html" class="text" ><font color=#3b33e7 size=2px>Produk BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>DCS&Appron T</font>';
        $view_content = "view/dcs.php";
        require "view/home2.php";
        break;

    case "jasahidro":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <a href="portal/home/produkbatan.html" class="text" ><font color=#3b33e7 size=2px>Produk BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Hidrologi</font>';
        $view_content = "view/jasahidro.php";
        require "view/home2.php";
        break;

    case "jasandt":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <a href="portal/home/produkbatan.html" class="text" ><font color=#3b33e7 size=2px>Produk BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Jasa NDT</font>';
        $view_content = "view/jasandt.php";
        require "view/home2.php";
        break;

    case "mejaradiologi":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
		<a href="portal/home/produk.html" class="text" ><font color=#3b33e7 size=2px>Produk</font></a><font color=#297b0a size=2px> > </font>
                <a href="portal/home/produkbatan.html" class="text" ><font color=#3b33e7 size=2px>Produk BATAN</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>Perangkat Meja Radiologi</font>';
        $view_content = "view/mejaradiologi.php";
        require "view/home2.php";
        break;

    case "faq":
        $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
                <font color=#535050 size=2px>FAQ</font>';
        $view_content = "view/faq.php";
        require "view/home2.php";
        break;

     case "referensi":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
            <a href="portal/home/pengetahuan.html" class="text" ><font color=#3b33e7 size=2px>Ilmu Pengetahuan</font></a><font color=#297b0a size=2px> > </font>
            <font color=#535050 size=2px>Referensi</font>';
        $view_content = "view/referensi.php";
        require "view/home2.php";
        break;

     case "e-jurnal":
          $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
            <a href="portal/home/pengetahuan.html" class="text" ><font color=#3b33e7 size=2px>Ilmu Pengetahuan</font></a><font color=#297b0a size=2px> > </font>
            <font color=#535050 size=2px>Jurnal Elektronik</font>';
        $view_content = "view/e-jurnal.php";
        require "view/home2.php";
        break;

    case "e-procurement":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
            <a href="portal/home/pengadaanbarang.html" class="text" ><font color=#3b33e7 size=2px>Pengadaan Barang-Jasa</font></a><font color=#297b0a size=2px> > </font>
            <font color=#535050 size=2px>E-Procurement</font>';
        $view_content = "view/e-procurement.php";
        require "view/home2.php";
        break;

    case "sppa":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
            <a href="portal/home/pengadaanbarang.html" class="text" ><font color=#3b33e7 size=2px>Pengadaan Barang-Jasa</font></a><font color=#297b0a size=2px> > </font>
            <font color=#535050 size=2px>Syarat Pendaftaran Penyedia</font>';
        $view_content = "view/sppa.php";
        require "view/home2.php";
        break;

    case "spp":
         $navhistory = '<a href="" class="text" ><font color=#3b33e7 size=2px>Beranda</font></a><font color=#297b0a size=2px> > </font>
            <a href="portal/home/pengadaanbarang.html" class="text" ><font color=#3b33e7 size=2px>Pengadaan Barang-Jasa</font></a><font color=#297b0a size=2px> > </font>
            <font color=#535050 size=2px>Syarat Pendaftaran Pengguna</font>';
        $view_content = "view/spp.php";
        require "view/home2.php";
        break;

    default:
        $view_content = "view/depan.php";
        require "view/home.php";
        break;

}