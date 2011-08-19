<?php

require 'lib/db.php';
require 'lib/date.php';

$db = db::singleton();
$sidebar = 'sidebar_limbah.php';

switch ($sub){
    case "daftar":
        $view_content = 'view/limbah/form.php';
        break;
    case "daftar2":
        $db->where('id_order='.$_SESSION['order_id']);
        $db->get('order_limbah');
        $data = $db->get_fetch();
        $data = $data[0];
        $db->where('id_order='.$_SESSION['order_id']);
        $db->get('limbah');
        $d = $db->num_rows();        
        mail('tedy.kwg@gmail.com', 'Order Limbah',
                '<html>
                    <body>
                        <h3>Yth Pengelola Limbah Radioaktif BATAN</h3>
                        <p>Ada order limbah dari :
                        <ul>
                            <li>Instansi : <b>'.$data["instansi"].'</b></li>
                            <li>Tanggal : <b>'.from_date($data["tgl_order"]).'</b></li>
                            <li>Jumlah limbah : <b>'.$d.'item</b></li>
                            <li>Email : <a href="mailto:'.$data["email"].'"><b>'.$data["email"].'</b></a></li>
                            <li>Telp. : <b>'.$data["telp"].'</b></li>
                            <li>Fax : <b>'.$data["fax"].'</b></li>
                        </ul>
                        <p>Untuk menindaklanjuti silakan ke <a href="www.google.com">WebCoMa BATAN</a></p>
                    </body>
                </html>',
                "To: Teddy <tedy.kwg@gmail.com>\n" .
                "From: WCM BATAN <wcm@batan.go.id>\n" .
                "MIME-Version: 1.0\n" .
                "Content-type: text/html; charset=iso-8859-1");
        session_destroy();
        header('Location: index.php?l=limbah&s=daftar');
        break;
    case "p_limbah":
        $view_content = 'view/limbah/p_limbah.php';
        break;
    default :
        $view_content = 'view/limbah/depan.php';
        break;
}
?>
