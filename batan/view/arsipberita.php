
<div class="border_area">
		<div><p class="area_judul"><span>Arsip Berita Nuklir Terkini</span></p> </div><br><br>
				<div class="area_text">
				Tanggal:
		<select name=tanggal>
		<option value='00'> </option>
		<option value='01'>01</option>
		<option value='02'>02</option>
		<option value='03'>03</option>
		<option value='04'>04</option>
		<option value='05'>05</option>
		<option value='06'>06</option>
		<option value='07'>07</option>
		<option value='08'>08</option>
		<option value='09'>09</option>
		<option value='10'>10</option>
		<option value='11'>11</option>
		<option value='12'>12</option>
		<option value='13'>13</option>
		<option value='14'>14</option>
		<option value='15'>15</option>
		<option value='16'>16</option>
		<option value='17'>17</option>
		<option value='18'>18</option>
		<option value='19'>19</option>
		<option value='20'>20</option>
		<option value='21'>21</option>
		<option value='22'>22</option>
		<option value='23'>23</option>
		<option value='24'>24</option>
		<option value='25'>25</option>
		<option value='26'>26</option>
		<option value='27'>27</option>
		<option value='28'>28</option>
		<option value='29'>29</option>
		<option value='30'>30</option>
		<option value='31'>31</option>
		</select>

		&nbspBulan:
		<select name=bulan>
		<option value='00'> </option>
		<option value='Januari'>Januari</option>
		<option value='Februari'>Februari</option>
		<option value='Maret'>Maret</option>
		<option value='April'>April</option>
		<option value='Mei'>Mei</option>
		<option value='Juni'>Juni</option>
		<option value='Juli'>Juli</option>
		<option value='Agustus'>Agustus</option>
		<option value='September'>September</option>
		<option value='Oktober'>Oktober</option>
		<option value='November'>November</option>
		<option value='Desember'>Desember</option>
		</select>

		&nbspTahun:
		<select name=bulan>
		<option value='00'> </option>
		<option value='2011'>2011</option>
		<option value='2010'>2010</option>
		<option value='2009'>2009</option>
		<option value='2008'>2008</option>
		<option value='2007'>2007</option>
		<option value='2006'>2006</option>
		<option value='2005'>2005</option>
		</select>
                <input name="" onclick="" class="" value=" Tampilkan Berita " type="button" style="margin-left: 30px;">

		<br></div><br/>


                <table style="list-style-type: none;  margin-top: -20px; font-family: verdana; font-size: 13px; text-decoration: none;">
                     <?php foreach ($list_arsip_berita  as $arsipberita) {?>
                <tr >
                   
                    <td width="400px" style="padding: 10px;"><a href="portal/berita/<?php echo $arsipberita['id_berita'] ?>.html"><?php echo $arsipberita['judul']?>  </a></td>
		<td width="150px" style="margin-left: 450px; margin-right:570px; "> <?php echo $arsipberita['waktu_kirim']?>  </td>
		<td width="100px"> <?php echo $satker[$arsipberita['pengirim']];?> </td>
                </tr>

<?php }?>
                </table>

                <div style="margin-top: 25px; margin-bottom: 20px; text-align:center;">
				<a href="#" style="text-decoration:none;"><font color=#9f9b9c><< sebelumnya</font></a>
				<a href="#" style="text-decoration:none;"><font> 1 </font></a>
				<a href="#" style="text-decoration:none;"><font> 2 </font></a>
				<a href="#" style="text-decoration:none;"><font> 3 </font></a>
				<a href="#" style="text-decoration:none;" ><font> 4 </font></a>
				<a href="#" style="text-decoration:none;"><font> 5 </font></a>
				<a href="#" style="text-decoration:none;"><font color=#f5072e>selanjutnya >></font></a></div>
 

		</div>

