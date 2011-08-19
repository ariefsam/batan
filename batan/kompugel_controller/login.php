<?php
if($param[1]=="logout")
{
    unset($_SESSION['admin']);
    $view_content = "view/admin/login.php";
}
else if($param[1]=="ganti_password")
{
    $view_content = "view/admin/ganti_password.php";
}
else $view_content = "view/admin/login.php";
require 'view/admin/depan.php';