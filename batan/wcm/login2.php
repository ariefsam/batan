<?php 
// login2.php
include("konfigurasi.php");
// Start a session. Session is explained below.
session_start();

// Same checking stuff all over again.
if(isset($_POST['BtnLogin'])) {
    if(empty($_POST['username']) || empty($_POST['password'])) {
        header($jump."salah.php?psn=2");
                exit;
        //echo "pesan salah 2";
    }
    // Create the variables again.
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Encrypt the password again with the md5 hash. 
    // This way the password is now the same as the password inside the database.
    $password = md5($password);
 
    // Store the SQL query inside a variable. 
    // ONLY the username you have filled in is retrieved from the database.
    $query = "SELECT id, username, password, level, id_satker
              FROM   `pengguna`
              WHERE  username='$username'";
 
    $result = mysql_query($query);
    if(!$result) { 
        // Gives an error if the username given does not exist.
        // or if something else is wrong.
        echo "The query failed " . mysql_error();
    } else {
        // Now create an object from the data you've retrieved.
        $row = mysql_fetch_object($result);
        // You've now created an object containing the data.
        // You can call data by using -> after $row.
        // For example now the password is checked if they're equal.
        if($row->password != $password) {
            header($jump."salah.php?psn=1");
                        exit;
            //echo "pesan salah 1";
        }
        // By storing data inside the $_SESSION superglobal,
        // you stay logged in until you close your browser.
        session_start();
    $uid = $row->id;
    $lvl = $row->level; 
    $idsatker = $row->id_satker; 
    $_SESSION['uid'] = $uid;        
    $_SESSION['lvl'] = $lvl;
    $_SESSION['username'] = $username;
    $_SESSION['idsatker'] = $idsatker;
        $_SESSION['sid'] = session_id(); 
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['cek'] = "sudah_diperiksa_sudahOK";
        session_register("username");
        session_register("sid");
        session_register("ip");
        session_register("cek");
        session_register("uid");
        session_register("lvl");
        session_register("idsatker");
       //   $xx        = $_SESSION['username'];
       // echo "namaxx=$xx";
          header($jump."index.php?in=1");
          exit;
         //echo "BERHASIL";
    }
}