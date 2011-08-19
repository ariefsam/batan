<?php
  $tahun_ini = date("Y");
  $k = 0;   $tp3 ="";
  $db->where("1 order by id");
  $db->get("Lpsjmn_jenis_pelatihan");
  $hasil = $db->get_fetch();
  ?>
<table id='table'>
    <thead>
        <tr class='oddd'>
            <th scope='col' class = 'th'>Persyaratan</th>
                 <?php foreach ($hasil as $h){?>
                     <th class = 'th' scope='col'><?php echo $h['nama_pelatihan']?></th>
                  <?php $k++; }?>
                 </tr>
                 </thead>
                 <tbody>
             <?php
             $db->where("1 order by urutan");
             $db->get("Lpsjmn_jenis_syarat");
             $jenis_syarat = $db->get_fetch();
             foreach ($jenis_syarat as $syarat)
             {?>
                     <tr>
                         <td>
                             <?php echo $syarat['syarat']?>
                         </td>
               <?php
                         for($l = 1; $l <=$k ; $l++)
                         {
                         $db->where("id_pelatihan=" . $l . " AND id_syarat=" . $syarat['id']);
                         $db->get("Lpsjmn_syarat");
                         $jumlah = $db->num_rows();
                 ?>
                     <td class = 'th' scope='col'><?php if($jumlah > 0){ ?><div align=center><img src='images/psjmn/approve.gif'  border='0' /></div><?php }?>&nbsp;</td>
                 <?php }?>
                     </tr>
                 <?php }?>
                 </tbody>
                 </table>
        <table>
        <tr><td><br>
        <b><u>Catatan :</u></b><br><ol>
        <li>Surat Keterangan dokter dari Poliklinik BATAN kawasan PUSPIPTEK Serpong.</li>
        <li>Semua persyaratan administrasi sebagaimana tersebut pada tabel diatas harus
        dilengkapi dan diserahkan ke Pusat Standarisasi dan Jaminan Mutu Up. Bidang Akreditasi
        dan Sertifikasi, paling lambat 3 (tiga) hari sebelum tanggal pelaksanaan ujian. Kandidat
        peserta ujian yang tidak memenuhi ketentuan tersebut tidak diperkenankan untuk mengikuti ujian.</li>
        <li>Bagi personel yang lulus pada Sertifikasi BAru atau Sertifikasi Ulang dikenakan biaya validasi
        Surat Izin Bekerja (S.I.B) sesuai dengan Peraturan Pemerintah Republik Indonesia Nomor 27 Tahun 2009 Tentang Jenis dan Tarif atas Jenis
        PNBP yang berlaku pada BAPETEN</li>
        <li>Akan dilakukan verifikasi terhadap ijazah asli pada saat pendaftaran dan kartu identitas diri (KTP)</li>
        </ol>

        <b><u>Syarat dan Kondisi :</u></b><br>Sertifikasi Baru Uji Radiografi Level 1 dan 2<ol>
        <li>Agar lulus dalam ujian tertulis, kandidat harus memperoleh nilai minimum 70% untuk setiap bagian ujian.</li>
        <li>Agar lulus dalam ujian praktek, kandidat harus memperoleh nilai minimum 70% untuk setiap spesimen yang diajukan.</li>
        <li>Seseorang kandidat yang gagal dalam memperoleh nilai lulus yang disyaratkan untuk sertifikasi dapat diuji ulang dua
        kali dalam setiap bagian ujian, dimana ujian ulang dilakukan tidak lebih cepat dari 30 hari setelah ujian terdahulu dan tidak lebih
        lama dari dua tahun setelah ujian terdahulu</li>
        </ol>

        <b><u>Sertifikasi Ulang Uji Radiografi Level 1 dan 2</u></b><br>
        Bagi personil yang dinyatakan lulus ujian kualifikasi dan mempunyai Sertifikasi Keahlian yang diterbitkan terhitung mulai tanggal
        ujian sebagai berikut, untuk :
        <ul>
        <li>Uji Radiografi Level 1 tanggal Ujian 13-14 Februari 2011, dan seterusnya.</li>
        <li>Uji Radiografi Level 2 tanggal Ujian 5-6 Februari 2011, dan seterusnya.</li>
        </ul>
        Sertifikasi ulang tersebut dapat dilakukan dengan persyaratan tambahan berikut ini (ketentuan ini berlaku selama pelaksanaan ujian kualifikasi dan sertifikasi
        personel Uji Radiografi dilakukan oleh PSJMN BATAN), dengan ketentuan sebagai berikut :<ol>
        <li>Personel tersebut harus mengikuti ujian materi praktek.</li>
        <li>Bila personel tersebut gagal memperoleh nilai sekurangnya 70% untuk spesimen yang diujikan, satu kali ujian ulang pada ujian
        sertifikasi ulang ahrus diperbolehkan dalam waktu 12 bulan sejak ujian sertifikasi ulang yang pertama</li>
        </ol>
        </td></tr>
        </table>



