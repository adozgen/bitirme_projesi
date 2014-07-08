<?php 
$baglan=mysql_connect("localhost","root","") or die ('Sunucuya Bağlanılamadı !');
$tablo=mysql_select_db("weblabapp",$baglan) or die (mysql_Error());
       mysql_query("SET NAMES UTF8");
$gelen=$_POST['editor1'];
$knuadi=$_POST['dkonu'];
$dcev=$_POST['dtarih'];
session_start();
$sid=$_SESSION["sid"];
if (isset($sid)) {
   $guncelle=mysql_query("update sorular SET soru='$gelen' where sid='$sid'"); 
   echo "guncelleme basarili oldu";
   header("Location:http://localhost/mvc/panel/home");
} else {
$ekle=mysql_query("INSERT INTO duyurular (duyuru,dkonu,dtarih) VALUES ('".$gelen."','".$knuadi."','".$dcev."')") or die (mysql_Error());
}
?>