<link type="text/css" href="ui/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="ui/jquery.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal").datepicker({
                    dateFormat:"dd MM yy",
                    changeMonth: true,
                    changeYear: true

                });
            });
            
            
</script>
<script type="text/javascript" src="ui/ui.core.js"></script>
<script type="text/javascript" src="ui/ui.datepicker.js"></script>
<script type="text/javascript" src="ui/ui.datepicker-id.js"></script>
<div class="entry">
    <?php echo $notif?>
        <form action="?l=psjmn&s=p_daftar" method="POST" enctype="multipart/form-data" >
            <table>
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>: <input type="text" name="nama" value="<?php echo $_POST['nama']?>" /></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <input id="tanggal" type="text" name="tgl_lahir" value="<?php echo $_POST['tgl_lahir']?>" /></td>
                    </tr>
                    <tr>
                        <td>Perusahaan</td>
                        <td>: <input type="text" name="perusahaan" value="<?php echo $_POST['perusahaan']?>" /></td>
                    </tr>
                    <tr>
                        <td>No Kontak / Telpon (tanpa spasi)</td>
                        <td>: <input type="text" name="telpon" value="<?php echo $_POST['telpon']?>" /></td>
                    </tr>
                    <tr>
                        <td>Pelatihan</td>
                        <td>:
                            <select name="pelatihan">
                                <option onclick="load_periode(0)" selected>---Pilih Pelatihan---</option>
                                <?php foreach($pelatihan as $p)
                                {?>
                                <option onclick="load_periode(<?php echo $p['id']?>)" value="<?php echo $p['id']?>"><?php echo $p['nama_pelatihan']?></option>
                                <?php
                                }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Masukkan Kode:</td>
                        <td>
                            <?php
                          require_once('recaptcha/recaptchalib.php');
                          $publickey = "6LcP08YSAAAAAP3QZKfXDazMYd9_yT4zgnAczu9t ";
                          echo recaptcha_get_html($publickey);
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right"><input type="submit" value="Daftar" /></td>
                    </tr>
                </tbody>
            </table>
        </form>
        </div>