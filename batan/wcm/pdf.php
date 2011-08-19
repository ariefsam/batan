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
$line=5;
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
$pdf->Cell(10,6,'Telp. '.$data["telp"].', Fax. '.$data['fax']);
$y+=$line;
$y+=$line;
$pdf->SetY($y);
$pdf->SetX(30);
$pdf->Cell(10,6,'Menanggapi permohonan '.$data['instansi'].' tanggal 1 Februari 2011 teoooooooooooooooooooooooooooooooooooooooooooooooooontang');
//$pdf->SetY(32);
//$pdf->SetX(15);
//$pdf->Cell(10,6,'Tanggal :');
//$pdf->SetY($Y_Fields_Name_position);
//$pdf->SetX(35);
//$pdf->Cell(10,6,'No.',1,0,'L',1);
//$pdf->SetX(45);
//$pdf->Cell(80,6,'Jenis Limbah',1,0,'L',1);
//$pdf->SetX(125);
//$pdf->Cell(50,6,'Harga',1,0,'R',1);
//$pdf->Ln();
////Now show the 3 columns
//
//$pdf->SetY(32);
//$pdf->SetX(55);
//$pdf->Cell(10,6,from_date($data['tgl_order']));
////For each row, add the field to the corresponding column
//foreach ($d as $da)
//{
//
//    $name = $da["jenis_limbah"];
//    $real_price = $da["harga"];
//    $price_to_show = 'Rp '.rupiah($da["harga"]).',-';
//
//    $column_no = $no;
//    $column_limbah = $name;
//    $column_harga = $price_to_show;
//
//    $pdf->SetY($Y_Table_Position);
//    $pdf->SetX(35);
//    $pdf->Cell(10,6,$column_no,1);
//    $pdf->SetY($Y_Table_Position);
//    $pdf->SetX(45);
//    $pdf->Cell(80,6,$column_limbah,1);
//    $pdf->SetY($Y_Table_Position);
//    $pdf->SetX(125);
//    $pdf->Cell(50,6,$column_harga,1,0,'R');
//    //Sum all the Prices (TOTAL)
//    $total = $total+$real_price;
//    $Y_Table_Position+=6;
//    $no++;
//}
//
////Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
//$total = rupiah($total);
//
//$pdf->SetY($Y_Table_Position);
//$pdf->SetX(45);
//$pdf->Cell(80,6,'Total',1,0,'R',1);
//$pdf->SetY($Y_Table_Position);
//$pdf->SetX(125);
//$pdf->Cell(50,6,'Rp '.$total. ',-',1,0,'R');
//
//
////Create lines (boxes) for each ROW (Product)
////If you don't use the following code, you don't create the lines separating each row
//$i = 0;
//$pdf->SetY($Y_Table_Position);
//while ($i < $number_of_products)
//{
//    $pdf->SetX(45);
//    $pdf->MultiCell(120,6,'',1);
//    $i = $i +1;
//}

$pdf->Output();
?>
