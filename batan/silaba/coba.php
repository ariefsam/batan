
  <script type="text/javascript">
    $(document).ready(function(){
      $("#tanggal").datepicker({dateFormat:"dd MM yy",
              changeMonth:true,
              changeYear:true
      });
    });
    </script>
        <div id="page"><div id="content">
        <?php include ("menu.php")?>

        <div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>
        <h2 class="title">Manajemen Pendaftaran Offline <?php echo $tahun_ini?></h2>

        <div class="entry">
        <form action="?aksi=p_daftar" method="POST" enctype="multipart/form-data" >
            <table>
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>: <input type="text" name="nama" /></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <input id="tanggal" type="text"></td>
                    </tr>
                    <tr>
                        <td>Perusahaan</td>
                        <td>: <input type="text" name="perusahaan" /></td>
                    </tr>
                    <tr>
                        <td>No Kontak / Telpon</td>
                        <td>: <input type="text" name="telpon" /></td>
                    </tr>
                    <tr>
                        <td>Tanda Tangan</td>
                        <td>: <input type="file" name="tandatangan" /></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>: <input type="file" name="foto" /></td>
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
                        <td>Periode</td>
                        <td>:
                            <span id="periode">
                            <select name="periode" disabled>
                                <option>--</option>
                            </select>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Ujian</td>
                        <td>:
                            <select name="ujian">
                                <?php foreach($ujian as $p)
                                {?>
                                <option value="<?php echo $p['id']?>"><?php echo $p['nama_ujian']?></option>
                                <?php
                                }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right"><input type="submit" value="Daftar" /></td>
                    </tr>
                </tbody>
            </table>
        </form>
        </div></div>

<?php //}

?>


            <div class="cb">
                <div class="l">
                    <div class="r"></div>
                </div>
            </div>
        </div>


    </div>