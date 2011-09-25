<?php
$error="";
if($param[2] && $param[2]>0) $start=$param[2]; else $start=0;
        
        if($_POST["recaptcha_response_field"]) {
                $resp = recaptcha_check_answer ($privatekey,
                                                $_SERVER["REMOTE_ADDR"],
                                                $_POST["recaptcha_challenge_field"],
                                                $_POST["recaptcha_response_field"]);

                if ($resp->is_valid) {
                        $data = array(
                            "nama" => $_POST['input_nama'],
                            "email" => $_POST['email'],
                            "subjek" => $_POST['subyek'],
                            "pesan" => $_POST['input_pesan'],
                            "tanggal" => date("Y-m-d H:i:s")
                            );
                        $x = $db->insert('kritik_komentar', $data);
                        if($x) $_POST['isi']="";
                } else {
                        # set the error code so that we can display it
                        $error = $resp->error;
                        $notif = '<br /><span style="color: red">Kode kemanan harus diisi</span>';
                }
        }
        else $notif='<br /><span style="color: red">Kode kemanan harus diisi</span>';
?>
<!-- bagian tengah -->
	<div id="right">
	<!-- area isi-->
		<div class="border_area">
		<div><p class="area_judul" style="padding-top: 1px"><span>Lokasi</span></p> </div><br><br>
			  <table>
		<tr><td>
		<img border="1px solid #000" src='images/gedung.jpg' title="Kantor Pusat BATAN" style= "margin-left:10px; margin-top:0px;" >
		</td>
		<td><font size=3pt style="float:right; margin-top:0px; margin-left:10px;">Jl. Kuningan Barat, Mampang Prapatan, Jakarta 12710</br></br> Telp.(021) 525-1109, Fax.(021) 525-1110</br></br>  E-mail : humas@batan.go.id </font>
		</td>
		</tr>
		</table>
		<br>
			 <div><p class="area_judul" style="padding-top: 1px"><span>Kritik, Saran, dan Keluhan</span></p> </div><br><br>
			<form action="" method="post">
        <table style="margin-left: 50px;">
		<tr>
		<td>Nama </td>
		<td>&nbsp&nbsp&nbsp </td><td></td><td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
		<td><input style="width: 420px;" type="text" class="" name="input_nama" id="input_nama" maxlength="50" value=""/>
        </td>
		</tr>
		<tr>
		<td>E-mail </td>
		<td>&nbsp&nbsp&nbsp </td><td></td><td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
		<td><input style="width: 420px;" type="text" class="" name="email" id="email" maxlength="50" value=""/></td>
		</tr>
		<tr>
		<td>Subyek </td>
		<td>&nbsp&nbsp&nbsp </td><td></td><td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
		<td><select name="subyek" style="width: 420px;">
		<option value='Laporan Penyalahgunaan yang Terjadi di BATAN'>Laporan Penyalahgunaan yang Terjadi di BATAN</option>
		<option value='Komentar, Saran, dan Pertanyaan Aktivitas BATAN dan LITBANG'>Komentar, Saran, dan Pertanyaan Aktivitas BATAN dan LITBANG</option>
		<option value='Komentar, Saran, Pertanyaan, dan Kritik Website BATAN'>Komentar, Saran, Pertanyaan, dan Kritik Website BATAN</option>
		<option value='Komentar, Saran, Pertanyaan, dan Kritik Jaringan Komputer BATAN'>Komentar, Saran, Pertanyaan, dan Kritik Jaringan Komputer BATAN </option>
		</select> &nbsp &nbsp &nbsp
		</td></tr>
        <tr><td>Isi Pesan </td>
		<td>&nbsp&nbsp&nbsp </td><td></td><td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
		<td><textarea style="width: 420px; heigth: 300px;" class="" cols="30" rows="6" name="input_pesan" id="input_pesan"></textarea></td>
		</tr>
		</table>

		<table style="margin-left: 50px;">
		<tr><td>Keamanan </td>
		<td>&nbsp&nbsp&nbsp </td><td></td><td>&nbsp&nbsp&nbsp </td>
		<td><?php

                          echo recaptcha_get_html($publickey, $error);
                        ?></td></tr>
                </table>
                            <table>
		<tr><td></td>&nbsp&nbsp&nbsp <td></td>&nbsp&nbsp&nbsp <td>&nbsp&nbsp&nbsp </td><td></td><td><input type=submit name=”” value="  Kirim  " style=" margin-left:135px;"/>
		</td></tr>
	
		</table>

	</form>
		<br>
		<br>

		</div>
		<!--end of area isi-->
	</div>
	<!--end of right-->