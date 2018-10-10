<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi Tambah Edit Delete Berita dengan TinyMCE</title>
</head>
 
<body>
<?php
error_reporting(0);
require "config.php";
 
$id = $_POST['id'];
$judul = $_POST['judul'];
$isi_berita = $_POST['isi_berita'];
 
switch($_GET[action]){
case "input": // jika post_action.php?action=input >> form action dari tambah berita
$ins = "insert into berita(judul , isi_berita) values('$judul' , '$isi_berita')"; // input data ke table berita
$exe = mysql_query($ins); // jalankan perintah $ins
 
// tampilkan pesan ketika $exe telah dijalankan
if($exe){
echo "Penambahan berita berhasil !!!<br /><a href=\"index.php\">Kembali</a>";
}
else{
echo "Penambahan berita gagal !!!<br /><a href=\"index.php\">Kembali</a>";
}
break;
 
case "update": // jika post_action.php?action=update >> form action dari edit berita
$update = "update berita set judul = '$judul' , isi_berita = '$isi_berita' where id = '$id'"; // update data yang ada di table berita
$exe = mysql_query($update);
 
// tampilkan pesan ketika $del telah dijalankan
if($exe){
echo "Berita berhasil diupdate !!!<br /><a href=\"index.php\">Kembali</a>";
}
else{
echo "Berita gagal diupdate !!!<br /><a href=\"index.php\">Kembali</a>";
}
break;
}
?>
<br /><br />&copy; CopyLeft 2011 by David [davidz.myfreed0m@gmail.com] [<a href="https://postinganane.wordpress.com">https://postinganane.wordpress.com</a>]
</body>
</html>