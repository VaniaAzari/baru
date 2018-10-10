<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "tinymce";
$koneksi = mysql_connect ($host,$user,$pass);
mysql_select_db($database) or die ("Gagal Koneksi bos !!!");
?>