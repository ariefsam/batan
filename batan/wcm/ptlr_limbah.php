<?php
require 'konfigurasi.php';
require 'lib/date.php';
require 'lib/currency.php';
$nama_menu = "PTLR - Limbah";
include ("cek.php");
$id=$_GET['id'];
include ("menukiri.php");
$tahun_ini = date('Y');
?>
<script type="text/javascript">
            function edit(i){
                $('#data' + i).fadeOut("fast", function(){
                    $('#edit' + i).fadeIn()
                });
            }
            function batal(id){
                $('#edit' + id).fadeOut("fast", function(){
                    $('#data' + id).fadeIn();
                });
            }
            function update(id)
            {
                var dataEdit = $('#form' + id).serialize();
                $.ajax({
                        url: 'update_harga.php',
                        type: 'POST',
                        data: dataEdit,
                        success: function(datax) {
                                $('#data'+id).html(datax);
                        },
                        error: function(){
                                alert("Terjadi kesalahan. Data tidak tersimpan.")
                        }
                });
                batal(id);
            }

        </script>
<script type="text/javascript" src="ui/jquery.js"></script>
<div id="page">
    <div id="content">
        <?php
//        $menu_atas = '<a href="?aksi=add" class="comments">Add</a>&nbsp;&nbsp;&nbsp;<font color=white>|</font>&nbsp;&nbsp;&nbsp;<a href="?aksi=list" class="comments">Lists</a>&nbsp;&nbsp;&nbsp;<font color=white>|</font>&nbsp;&nbsp;&nbsp;<a href="?aksi=list_online" class="comments">List Online</a>';
//        include ("menu.php")?>

        <div class="post"><div class="ct"><div class="l"><div class="r"></div></div></div>
        <h2 class="title">Manajemen Order Limbah <?php echo $tahun_ini?></h2>
            <div class="entry">
                <div style="margin-left: 400px; padding: 1 1 1 1"><a href="pdf.php?id=<?php echo $id?>" style="text-decoration: underline">Cetak pdf</a><img src="images/pdf.png" /></div>
                <?php       
                $db->where('id_order='.$id.' order by id_limbah' );
                $db->get("limbah");
                $d = $db->get_fetch();
                $i=1;
                foreach ($d as $data){
                echo "Data limbah ke-".$i++;
                ?>
                <div class="tedy">
                <table>
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Tanggal</b></td>
                            <td><?php echo from_date($data['tgl_order'])?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Limbah</b></td>
                            <td>: <?php echo $data['jenis_limbah']?></td>
                        </tr>
                        <tr>
                            <td><b>Penampung/Pembungkus</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;a. Jenis</td>
                            <td>: <?php echo $data['jenis_penampung']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;b. Nomor Drum/Penampung</td>
                            <td>: <?php echo $data['no_penampung']?></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Limbah</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;a. Volume</td>
                            <td>: <?php echo $data['volume_limbah']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;b. Berat</td>
                            <td>: <?php echo $data['berat_limbah']?></td>
                        </tr>
                        <tr>
                            <td><b>Karakteristik Limbah</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;a. Kand. Radionuklida/T1/2</td>
                            <td>: <?php echo $data['kand_radionuklida']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;b. Kandungan Kimia</td>
                            <td>: <?php echo $data['kand_kimia']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;c. pH Limbah</td>
                            <td>: <?php echo $data['ph_limbah']?> Kategori : <?php echo $data['kategori_ph_limbah']?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">&nbsp;d. Radioaktivitas</td>
                            <td>
                                - Volumik (Bq/m3, Ci/m3)/Tgl :&nbsp;<?php echo $data['volumik_radioaktivitas']?><br /><br />
                                - Total (Bq, Ci)/Tgl :&nbsp;<?php echo $data['total_radioaktivitas']?><br /><br />
                                - Lain-lain : <?php echo $data['lain2_radioaktivitas']?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">&nbsp;e. Dosis Paparan Limbah</td>
                            <td>
                                - Tanggal Pengukuran :&nbsp;<?php echo from_date($data['tgl_pengukuran'])?><br /><br />
                                - Permukaan (&mu; Sv/j, mRem/J) :&nbsp;<?php echo $data['permukaan']?><br /><br />
                                - Jarak 1 m (&mu; Sv/j, mRem/J) : <?php echo $data['jarak_1_m']?>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;f. Alat Pengukuran</td>
                            <td>: <?php echo $data['alat_ukur']?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;g. Sifat</td>
                            <td>: <?php echo $data['sifat_limbah']?>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;h. Lain-lain</td>
                            <td>: <?php echo $data['lain2']?></td>
                        </tr>
                        <tr id="data<?php echo $data['id_limbah']?>">
                            <td><b />Harga</td>
                            <td>: <?php echo "Rp ".rupiah($data['harga'])?>
                                <input type="button" id="edit" value="Edit" onclick="edit(<?php echo $data['id_limbah']?>)" />
                            </td>
                        </tr>
                        <form id="form<?php echo $data['id_limbah']?>" action="update_harga.php" method="POST">
                            <input type="hidden" value="<?php echo $data['id_limbah']?>" name="id_limbah" />
                        <tr id="edit<?php echo $data['id_limbah']?>" style="display: none; padding: 0">
                            <td><b />Harga</td>
                            <td>
                                : <input type="text" name="harga" value="<?php echo $data['harga']?>" size="20" />
                                <input type="button" value="Update" onclick="update(<?php echo $data['id_limbah']?>)" />
                                <input type="button" id="edit" value="Batal" onclick="batal(<?php echo $data['id_limbah']?>)" />
                            </td>
                        </tr>
                        </form>
                    </tbody>
                </table>
                </div>
    <?php }?>
            </div>
            <div class="cb">
                <div class="l">
                    <div class="r"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
</div>
<!-- end page -->
<?php include ("footer.php");?>

