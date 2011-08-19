<div class="border_area">
    <div><p class="area_judul" style="padding-top: 1px"><span>Buku Tamu</span></p> </div><br>

    <div class="pagination">
        <?php $page->show()?>
    </div><br />
<?php foreach($buku_tamu as $buku){?>
    <div class="border_tamu">
        <p class="area_text"> <?php echo $buku['nama']?> :</p>
        <p class="area_text" style="margin-left: 50px;"> <?php echo $buku['isi']?> </p>
        <p class="area_text" style="margin-right: 20px; text-align: right; font-size: 10px;"> <?php echo from_datetime($buku['tanggal'])?></p>
    </div>
<?php   $db->where('id_balas=' . $buku['id']);
        $db->get('buku_tamu');
        $balas = $db->get_fetch();
        foreach($balas as $b){?>
    <div class="border_admin">
        <p class="area_text"> <?php echo $b['nama']?> :</p>
        <p class="area_text" style="margin-left: 50px;"> <?php echo $b['isi']?> </p>
        <p class="area_text" style="margin-right: 20px; text-align: right; font-size: 10px;"> <?php echo from_datetime($b['tanggal'])?></p>
    </div>
    <?php } }?>



    <div>
        <!--<hr align="left" width=80% noshade></hr>-->
        <br>
        <h2 style="text-align: center; text-transform: none" id="gb_title">Isi Buku Tamu</h2>
<center><?php echo $notif?></center>
        <form action="portal/home/bukutamu.html" method="post" id="">
            <table style="margin-left: 100px;">
                <tr>
                    <td>Nama </td>
                    <td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
                    <td><input style="width: 380px;" type="text" class="" name="nama" id="input_nama" maxlength="50" value="<?php echo $_POST['nama']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>E-mail </td>
                    <td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
                    <td><input style="width: 380px;" type="text" class="" name="email" id="input_nama" maxlength="50" value="<?php echo $_POST['email']?>"/></td>
                </tr>
                <tr>
                    <td>Website </td>
                    <td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
                    <td><input style="width: 380px;" type="text" class="" name="website" id="input_nama" maxlength="50" value="<?php echo $_POST['website']?>"/></td>
                </tr>
                <tr><td>Isi Pesan </td>
                    <td>&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp&nbsp </td><td>&nbsp&nbsp&nbsp </td>
                    <td><textarea style="width: 380px; heigth: 300px;" class="" cols="30" rows="6" name="isi" id="input_pesan"><?php echo $_POST['isi']?></textarea></td>
                </tr>
                <br/>
            </table>
            <table style="margin-left: 100px; margin-bottom: 55px; padding-top: 10px;">
                <tr><td style="vertical-align: top">Kode Keamanan</td><td></td><td></td><td><?php
                          
                          echo recaptcha_get_html($publickey, $error);
                        ?></td>
                </tr><tr><td></td><td></td><td></td>
                    <td style="text-align: right"><input type="submit" class="" value="  Tambahkan Pesan  " name="" title="Klik untuk menambahkan pesan Anda" id=""/></td></tr>
            </table>
        </form>


    </div>
</div>
