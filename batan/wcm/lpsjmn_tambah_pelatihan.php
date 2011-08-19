<?php
$error="";
if($_POST['periode'])
{
    $db->where('
    id_periode='.$_POST['periode'].' AND
    id_ujian='.$_POST['ujian'].' AND
    id_siswa='.$_POST['id_siswa']);
    $db->get('Lpsjmn_pelatihan');
    if($db->num_rows()>0) { header('Location: ?aksi=detail&id=' . $_POST['id_siswa'] . '&error=sdt'); die();}
    else {
        $pel = array(
                    "id_periode"    => $_POST['periode'],
                    "id_ujian"      => $_POST['ujian'],
                    "id_siswa"      => $_POST['id_siswa']
                );
        $p = $db->insert('Lpsjmn_pelatihan', $pel);
    }
}
header('Location: ?aksi=detail&id=' . $_POST['id_siswa']);