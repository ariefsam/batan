
<!-- bagian tengah -->
	<div id="right">
	<!-- area isi-->
		<div class="border_area">
<div><p class="area_judul"><span>Berita BATAN</span></p> </div><br><br>
				<div class="text_judul">
		<?php echo $beritas['judul']?></div>
                <p class="area_text"><?php echo $beritas['deskripsi']; ?></p></br>
				
				<div class="area_text"><a href="portal/berita/arsipberita.html"><font style="float:left; margin-left:2px;" color=#FF0000>Klik Disini</font></a>&nbspuntuk melihat berita lainnya</div>

                                <br>
                               <!--<hr width=90% style="margin-left: 10px; margin-right: 20px;"></hr>

        <h4 style="text-align: left; text-transform: none; margin-top: 10px; margin-left: 10px;">Komentar</h4>

		<form action="batan/portal/berita/103.html" method="post" id="">
        <table style="margin-left: 10px;">
		<tr>
		<td>Nama </td>
		<td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
		<td><input style="width: 180px;" type="text" class="" name="input_nama" id="input_nama" maxlength="50" value=""/>
        </td>
		</tr>
		<tr>
		<td>E-mail </td>
		<td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
		<td><input style="width: 180px;" type="text" class="" name="input_nama" id="input_nama" maxlength="50" value=""/></td>
		</tr>
        <tr><td>Isi Pesan </td>
		<td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
		<td><textarea style="width: 380px; heigth: 300px;" class="" cols="30" rows="6" name="input_pesan" id="input_pesan"></textarea></td>
		</tr>
		</table>
		<table style="margin-left: 10px; margin-bottom: 30px; padding-top: 10px;">
        <tr><td>Kode Keamanan</td><td> : </td><td>&nbsp&nbsp&nbsp </td><td> <?php
                          require_once('recaptcha/recaptchalib.php');
                          $publickey = "6LcP08YSAAAAAP3QZKfXDazMYd9_yT4zgnAczu9t ";
                          echo recaptcha_get_html($publickey);
                        ?> </td>
            <tr><td></td><td></td><td></td>
                    <td style="text-align: right"><input type="submit" class="" value="  Tambahkan Pesan  " name="" title="Klik untuk menambahkan pesan Anda" id=""/></td></tr>
        </table>
	</form>
<?php foreach($list_komentar as $komentar) {?>
                        <div class="border_tamu">
                        <p class="area_text"><?php echo $komentar['nama']?>  </p>
                        <p class="area_text" style="margin-left: 50px;"><?php echo $komentar['komentar']?> </p>
                        <p class="area_text" style="margin-right: 20px; text-align: right; font-size: 10px;"> <?php echo $komentar['komentar']?></p>
                        </div>
        <?php }?>

			  <div class="border_tamu2">
			  <p class="area_text"><?php echo $komentar['nama']?>  </p>
			  <p class="area_text" style="margin-left: 50px;"> <?php echo $komentar['komentar']?></p>
			  <p class="area_text" style="margin-right: 20px; text-align: right; font-size: 10px;"> <?php echo $komentar['tgl']?></p>
			  </div>

			  <div style="margin-top: 30px; text-align:right; margin-right: 15px; margin-bottom: 30px;">
				<a href="#" style="text-decoration:none;"><font color=#9f9b9c><< sebelumnya</font></a>
				<a href="#" style="text-decoration:none;" "selected;"><font> 1 </font></a>
				<a href="#" style="text-decoration:none;"><font> 2 </font></a>
				<a href="#" style="text-decoration:none;"><font> 3 </font></a>
				<a href="#" style="text-decoration:none;" ><font> 4 </font></a>
				<a href="#" style="text-decoration:none;"><font> 5 </font></a>
				<a href="#" style="text-decoration:none;"><font color=#f5072e>selanjutnya >></font></a></div>-->
	</div>
        <!--end of area isi-->
	</div>



	<!--end of right-->
	<div class="clear">
	</div>
