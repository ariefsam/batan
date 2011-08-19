<?php
include "konfigurasi.php";
$db->where("1");
$db->get('Lpsjmn_jenis_pelatihan');
$pelatihan = $db->get_fetch();
$db->where("1");
$db->get('Lpsjmn_jenis_ujian');
$ujian = $db->get_fetch();
?>
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
<script type="text/javascript">

            function load_periode(id)
            {
                $('#periode').load('lpsjmn_load_periode.php?id=' + id);
            }
</script>
<script type="text/javascript" src="ui/ui.core.js"></script>
<script type="text/javascript" src="ui/ui.datepicker.js"></script>
<script type="text/javascript" src="ui/ui.datepicker-id.js"></script>

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
                        <td>: <input type="text" id="tanggal" name="tgl_lahir" id="tgl_lahir" /></td>
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
                            <select name="pelatihan" onchange="load_periode(this.value);">
                                <option value="0" selected>---Pilih Pelatihan---</option>
                                <?php foreach($pelatihan as $p)
                                {?>
                                <option value="<?php echo $p['id']?>"><?php echo $p['nama_pelatihan']?></option>
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