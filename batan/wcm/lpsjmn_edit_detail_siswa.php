<?php
$id = $_GET['id'];
require 'konfigurasi.php';
require 'lib/date.php';
$db->where("id=$id");
$db->get('Lpsjmn_siswa');
$data = $db->get_fetch();
$data = $data[0];


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
<script type="text/javascript" src="ui/ui.core.js"></script>
<script type="text/javascript" src="ui/ui.datepicker.js"></script>
<script type="text/javascript" src="ui/ui.datepicker-id.js"></script>

                <form action="?aksi=p_edit_detail" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                    <table>
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: <input type="text" name="nama" value="<?php echo $data['nama']?>" /></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: <input type="text" id="tanggal" name="tgl_lahir" id="tgl_lahir" value="<?php echo from_date($data['tgl_lahir'])?>" /></td><td> (contoh: 01 Januari 1990)</td>
                            </tr>
                            <tr>
                                <td>Perusahaan</td>
                                <td>: <input type="text" name="perusahaan" value="<?php echo $data['perusahaan']?>" /></td>
                            </tr>
                            <tr>
                                <td>No Kontak / Telpon</td>
                                <td>: <input type="text" name="telpon" value="<?php echo $data['telpon']?>" /></td>
                            </tr>
                            <tr>
                                <td>Tanda Tangan</td>
                                <td><?php if($data['tandatangan']) {?>
                                    <img src="ttd/<?php echo $data['tandatangan']?>" alt="ttd" style="max-width: 200px" /><br />
                                    <?php }?>
                                    <input type="file" name="tandatangan" />
                                </td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td><?php if($data['foto']) {?>
                                    <img src="ktp/<?php echo $data['foto']?>" alt="foto" style="max-width: 200px" /><br />
                                    <?php }?>
                                    <input type="file" name="foto" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: right"><input type="submit" value="Update" /></td>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </form>