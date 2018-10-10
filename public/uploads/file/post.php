<?php
error_reporting(0);
require "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi Tambah Edit Delete Berita dengan TinyMCE</title>
 
<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<!-- Masukkan TinyMCE ke TextArea -->
<script type="text/javascript">
tinyMCE.init({
// General options
mode : "textareas",
theme : "advanced",
plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
 
// Theme options
theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
 
// Example content CSS (should be your site CSS)
content_css : "css/content.css",
 
// Drop lists for link/image/media/template dialogs
template_external_list_url : "lists/template_list.js",
external_link_list_url : "lists/link_list.js",
external_image_list_url : "lists/image_list.js",
media_external_list_url : "lists/media_list.js",
 
// Style formats
style_formats : [
{title : 'Bold text', inline : 'b'},
{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
{title : 'Example 1', inline : 'span', classes : 'example1'},
{title : 'Example 2', inline : 'span', classes : 'example2'},
{title : 'Table styles'},
{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
],
 
// Replace values for the template plugin
template_replace_values : {
username : "Some User",
staffid : "991234"
}
});
</script>
</head>
 
<body>
<?php
switch($_GET[action]){
case "newpost": // apabila post.php?action=newpost maka tampilkan textarea untuk membuat berita baru
echo "<h2>Tambah Berita</h2>
<form method=\"POST\" action=\"post_action.php?action=input\">
<table>
<tr>
<td width=70>Judul</td>
<td><input type=\"text\" name=\"judul\" size=\"60\"></td>
</tr>";
 
echo "<tr>
<td>Isi Berita</td>
<td><textarea name=\"isi_berita\" style=\"width: 600px; height: 350px;\"></textarea></td>
</tr>";
 
echo "<tr>
<td></td>
<td><input type=\"submit\" value=\"Simpan\"><input type=\"button\" value=\"Batal\" onclick=\"self.history.back()\"></td>
</tr>
</table>
</form>";
break;
 
case "edit": // apabila post.php?action=edit maka tampilkan textarea untuk mengedit berita
$get = "select * from berita WHERE id = '$_GET[id]'"; // ambil data dari table berita
$exe = mysql_query($get); // jalankan perintah $get
$show = mysql_fetch_array($exe); // tampilkan hasil data dari $exe
 
echo "<h2>Edit Berita</h2>
<form method=\"POST\" action=\"post_action.php?action=update\">
<input type=\"hidden\" name=\"id\" value=\"$show[id]\">
<table>
<tr>
<td width=70>Judul</td>
<td><input type=\"text\" name=\"judul\" value=\"$show[judul]\" size=\"60\"></td>
</tr>";
 
echo "<tr>
<td>Isi Berita</td>
<td><textarea name=\"isi_berita\" style=\"width: 600px; height: 350px;\">$show[isi_berita]</textarea></td>
</tr>";
 
echo "<tr>
<td></td>
<td><input type=\"submit\" value=\"Update!\"><input type=\"button\" value=\"Batal\" onclick=\"self.history.back()\"></td>
</tr>
</table>
</form>";
break;
 
case "delete": // apabila post.php?action=delete maka berita akan dihapus
$get = "delete from berita where id = '$_GET[id]'"; // hapus data dari table berita
$del = mysql_query($get); // jalankan perintah $get
 
// tampilkan pesan ketika $del telah dijalankan
if($del){
echo "Berita berhasil dihapus !!!<br /><a href=\"index.php\">Kembali</a>";
}
else{
echo "Berita gagal dihapus !!!<br /><a href=\"index.php\">Kembali</a>";
}
break;
}
?>
<br /><br />&copy; CopyLeft 2011 by David [davidz.myfreed0m@gmail.com] [<a href="https://postinganane.wordpress.com">https://postinganane.wordpress.com</a>]
</body>
</html>