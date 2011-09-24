<style type="text/css">
    table td {
        vertical-align: top;
        padding: 5px;
    }
</style>
<!-- bagian tengah -->
	<div id="right">
	<!-- area isi-->
		<div class="border_area">
		<form action="" method="post" name="frm" style="margin-left: 20px; margin-top: 10px; margin-bottom:5px;">
									Pilihan Agenda <select name="tanggal">
                                                                            <?php foreach ($kategori_agenda as $k){?>
                                                                            <option value="<?php echo $k['id']?>"><?php echo $k['nama']?></option>
                                                                            <?php }?>
									</select> &nbsp &nbsp &nbsp
									Bulan <select name="bulan">
                                                                            <option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option><option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option><option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option></select> &nbsp &nbsp &nbsp
									Tahun <select name="tahun">
                                                                            <option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option></select> &nbsp
									<input name="Submit" onclick="" class="butinput" value="Tampilkan Agenda" type="button" />
									<input name="txtSecID" value="" type="hidden">
								</form>


		      <div><p class="area_judul" style="padding-top: 1px"><span>Program Tahunan</span></p> </div><br><br>
			
                      <table style=" margin-left: 10px; margin-right: 8px; margin-bottom: 10px; border:1px dashed #ccc;">
			  <th>No</th><th>Nama kegiatan</th><th>Tanggal</th><th>Tempat</th><th>Penyelenggara</th>
			  <?php
                          $i=1;
                          foreach($agenda as $a){?>
                          <tr><td><?php echo $i++?></td><td><?php echo $a['nama_kegiatan']?></td><td><?php echo from_date($a['tgl'])?></td><td><?php echo $a['tempat']?></td><td><?php echo $satker[$a['id_satker']]?></td><td></td><td></td></tr>
                          <?php }?>
			  </table>
			  <div><p class="area_judul"><span>Pencarian agenda berdasarkan:</span></p> </div><br><br>

				<form action="" method="post" name="" style="margin-left: 20px;">
					<input type="checkbox" value="NamaKegiatan"/> Nama Kegiatan &nbsp <input type="text-box" style="width: 450px;" maxlength="60;">
						<br/>
					<input type="checkbox" value="Penyelenggara"/> Penyelenggara &nbsp&nbsp <input type="text-box" style="width: 450px;" maxlength="50;">
						</br>
						<input name="Submit" onclick="ajaxNewsindexSec(#)" class="" value="OK" type="button" style="margin-left: 545px;">
						</form>
						</br>

				<form action="" method="post" name="frm" style="margin-left: 20px; margin-top: 10px; margin-bottom:5px;">
									Pilihan Agenda <select name="tanggal">
									<option value="ProgramTahunan" "selected">Program Tahunan</option><option value="ProgramPelatihan">Program Pelatihan</option><option value="ProgramCoaching">Program Coaching</option></select> &nbsp &nbsp &nbsp
									Bulan <select name="bulan">
									<option value="none" selected="selected">  </option><option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option><option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option><option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option><option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option></select> &nbsp &nbsp &nbsp
									Tahun <select name="tahun">
									<option value="none" selected="selected">  </option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option></select> &nbsp
									<input name="Submit" onclick="ajaxNewsindexSec(#)" class="butinput" value="Tampilkan Agenda" type="button">
									<input name="txtSecID" value="" type="hidden">
								</form>


		</div>
		<!--end of area isi-->
	</div>
	<!--end of right-->