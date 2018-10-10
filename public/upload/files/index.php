<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi Tambah Edit Delete Berita dengan TinyMCE</title>
<style>
table{
width:600px;
border:1px outset #000;
border-collapse:collapse;
}
</style>
</head>
 
<body>
<?php
error_reporting(0);
require "config.php";
 
echo "<table border=\"1px\">
<tr>
<td width=\"5%\">No</td>
<td width=\"75%\">Judul</td>
<td width=\"20%\">Aksi</td>
</tr>";
 
$no = 1;
$get = "select * from berita order by id desc"; // ambil berita dari table berita dan diurutkan dari berita terbaru
$exe = mysql_query($get); // jalankan perintah $get
 
// looping data berita kemudian ditampilkan
while($show = mysql_fetch_array($exe)){
echo "<tr>
<td>$no</td>
<td width=\"200px\">$show[judul]</td>
<td>
<a href=post.php?action=edit&id=$show[id]>Edit</a> |
<a href=post.php?action=delete&id=$show[id]>Hapus</a>
</td>
</tr>";
$no++;
}
echo " <tr>
<td width=\"5%\"></td>
<td width=\"75%\"><a href=\"post.php?action=newpost\">Tambah Berita</a></td>
<td width=\"20%\"></td>
</tr>
</table>";
?>
 
<br />
&copy; CopyLeft 2011 by David [davidz.myfreed0m@gmail.com] [<a href="https://postinganane.wordpress.com">https://postinganane.wordpress.com</a>]
</body>
</html>