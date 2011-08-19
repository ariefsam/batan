<?php
function periode($tgl_mulai, $tgl_selesai)
{
    if ($tgl_mulai==$tgl_selesai) return $tgl_mulai;
    else return "$tgl_mulai - $tgl_selesai";
}
  $bulan = array(
            " ** ",
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
         );
  $tahun_ini = date("Y");
  $k = 0;   $tp3 ="";
  $db->where("1 order by id");
  $db->get("Lpsjmn_jenis_pelatihan");
  $hasil = $db->get_fetch();
  ?>
<table id='table'>
    <thead>
        <tr class='oddd'>
            <th scope='col' class = 'th'>BULAN</th>
                 <?php foreach ($hasil as $h){?>
                     <th class = 'th' scope='col'><?php echo $h['nama_pelatihan']?></th>
                  <?php }?>
                 </tr>
                 </thead>
                 <tbody>
             <?php
             for ($i=1; $i<=12; $i++)
             {?>
                     <tr>
                         <td>
                             <?php echo $bulan[$i]?>
                         </td>
               <?php foreach ($hasil as $h)
                     {
                         $db->where("id_pelatihan=" . $h['id'] . " AND bln_mulai=" . $i  . " AND th_mulai=" . $tahun_ini);
                         $db->get("Lpsjmn_periode_pelatihan");
                         $periode_pelatihan = $db->get_fetch();
                         $periode_pelatihan = $periode_pelatihan[0];
                 ?>

                     <td class = 'th' scope='col'><?php echo periode($periode_pelatihan['tgl_mulai'],$periode_pelatihan['tgl_selesai'])?>&nbsp;</td>
                 <?php }?>
                     </tr>
                     <?php }?>
                 </tbody>
                 </table>

            <table>
            <tr><td><br><b><u>Catatan :</u></b><br>Sertifikasi Uji Radiografi Level 1 dan 2 (Ahli Radiografi dan Operator Radiografi)
            dan Tes Psikologi Kandidat Personil Uni Radiografi dapat dilaksanakan dengan jumlah peserta minimal 20 orang.
            Tes Psikologi dilaksanakan oleh Lembaga Psikologi yang disetujui oleh PSJMN-BATAN</td></tr>
            </table>
            


