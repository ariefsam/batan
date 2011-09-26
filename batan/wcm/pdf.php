<?php
//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('lib/fpdf.php');

//Connect to your database
require 'lib/db.php';
require 'lib/currency.php';
require 'lib/date.php';

$db = db::singleton();

$id=$_GET['id'];
$db->where('id_order='.$id);
$db->get('order_limbah');
$data = $db->get_fetch();
$data = $data[0];
$db->where('1');
$db->get('kabid_ptlr');
$data2 = $db->get_fetch();
$data2 = $data2[0];
//Select the Products you want to show in your PDF file
$db->where('id_order='.$id);
$db->get('limbah');
$d = $db->get_fetch();

//Initialize the 3 columns and the total
$column_no = "";
$column_limbah = "";
$column_harga = "";
$total = 0;
$no = 1;

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetMargins(2, 3, 2);

//Fields Name position
$Y_Fields_Name_position = 40;
//Table position, under Fields Name
$Y_Table_Position = 46;
$y=44;
$x=15;
$line=6;
//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->Image('images/kop_ptlr.jpg',5,2,-300);
$pdf->SetFont('Times','',12);
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(10,6,'Yth.');
$y+=$line;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(10,6,$data['instansi']);
$y+=$line;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(10,6,'Graha Semesta, 3rd Floor');
$y+=$line;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(10,6,'Jl. Raya Kebayoran Lama Pal. VII No. 31');
$y+=$line;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(10,6,'Jakarta 12210, Indonesia');
$y+=$line;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(10,6,'Telp. '.$data['telp'].', Fax. '.$data['fax']);
$y+=2*$line;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->MultiCell(180,6,'           Menanggapi permohonan '.$data['instansi'].' tanggal '.from_date($data['tgl_order']).' tentang pembuangan limbah radioaktif, dengan ini kami sampaikan bahwa :','J');
$y+=2*$line;
$pdf->SetY($y);
$pdf->SetX(22);
$pdf->Cell(10,6,'1.');
$pdf->SetX(28);
$pdf->MultiCell(167,6,'Untuk melimbahkan zat radioaktif ke PTLR-BATAN maka penghasil limbah harus memiliki Surat Persetujuan Pengiriman Zat Radioaktif yang dikeluarkan oleh BAPETEN, dan sesuai peraturan yang berlaku pengurusan surat tersebut menjadi tanggung jawab penghasil limbah, dalam hal ini '.$data['instansi'].'.','J');
$y+=4*$line;
$pdf->SetY($y);
$pdf->SetX(22);
$pdf->Cell(10,6,'2.');
$pdf->SetX(28);
$pdf->MultiCell(167,6,'Adapun biaya pengelolaan limbah radioaktif di atur sesuai PP No. 29 tahun 2011, yaitu :','J');
//TABEL
$y+=$line;
$pdf->SetY($y);
$pdf->SetX(29);
$pdf->Cell(10,6,'No.',1,0,'C',1);
$pdf->SetX(39);
$pdf->Cell(120,6,'Uraian Kegiatan',1,0,'C',1);
$pdf->SetX(159);
$pdf->Cell(35,6,'Biaya (Rp.)',1,0,'C',1);
$pdf->Ln();
foreach ($d as $da)
{

    $name = "Pengelolaan (1 buah Cs-137 aktivitas 740 MBq = 20 mCi, biaya Rp. ".rupiah($da["harga"])."/buah)";
    $real_price = $da["harga"];
    $price_to_show = rupiah($da["harga"]).',-';

    $column_no = $no;
    $column_limbah = $name;
    $column_harga = $price_to_show;
    $y+=$line;
    $pdf->SetY($y);
    $pdf->SetX(29);
    $pdf->MultiCell(10,12,$column_no,1,'C');
    $pdf->SetY($y);
    $pdf->SetX(39);
    $pdf->MultiCell(120,6,$column_limbah,1,'J');
    $pdf->SetY($y);
    $pdf->SetX(159);
    $pdf->MultiCell(35,12,$column_harga,1,'C');
    //Sum all the Prices (TOTAL)
    $total = $total+$real_price;
    $no++;
    $y+=$line;
}

//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
$total = rupiah($total);
$y+=$line;
$pdf->SetY($y);
$pdf->SetX(29);
$pdf->Cell(130,6,'Jumlah',1,0,'C');
$pdf->SetY($y);
$pdf->SetX(159);
$pdf->Cell(35,6,$total. ',-',1,0,'C');


//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(45);
    $pdf->MultiCell(120,6,'',1);
    $i = $i +1;
}

$y+=$line;
$pdf->SetY($y);
$pdf->SetX(28);
$pdf->MultiCell(167,6,'Total biaya pengelolaan limbah radioaktif sebesar Rp. '.$total.',- ','J');
$pdf->SetX(22);
$pdf->Cell(10,6,'3.');
$pdf->SetX(28);
$pdf->MultiCell(167,6,'Biaya pengelolaan limbah radioaktif di atas tidak termasuk biaya transportasi. Biaya transportasi adalah menjadi tanggung jawab Wajib Bayar, dalam hal ini adalah '.$data['instansi'].'.','J');
$pdf->SetX($x);
$pdf->MultiCell(180,6,'Untuk informasi lebih lengkap dapat menghubungi '.$data2['nama'].' (Kepala Bidang Pengolahan Limbah - PTLR).','J');
$pdf->SetX(28);
$pdf->MultiCell(180,6,'Demikian, atas perhatian dan kerja samanya, kami ucapkan terima kasih.');
$pdf->SetX($x);
$pdf->MultiCell(100,6,'NB : Surat resmi akan kami kirim kemudian');


////Now show the 3 columns
//
//$pdf->SetY(32);
//$pdf->SetX(55);
//$pdf->Cell(10,6,from_date($data['tgl_order']));
////For each row, add the field to the corresponding column


$pdf->Output();
?>