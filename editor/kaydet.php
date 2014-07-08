<?php 
$baglan=mysql_connect("localhost","root","") or die ('Sunucuya Bağlanılamadı !');
$tablo=mysql_select_db("mvc",$baglan) or die (mysql_Error());
       mysql_query("SET NAMES UTF8");
$gelen=$_POST['editor1'];
$drsadi=$_POST['ders'];
$knuadi=$_POST['konu'];
$mdladi=$_POST['mdl'];
$zder=$_POST['zder'];
$kadi=$_POST['kadi'];
$dcev=$_POST['dcev'];
session_start();
$sid=$_SESSION["sid"];
if (isset($sid)) {
   $guncelle=mysql_query("update sorular SET soru='$gelen' where sid='$sid'"); 
   echo "guncelleme basarili oldu";
   header("Location:http://localhost/mvc/panel/home");
} else {
$ekle=mysql_query("INSERT INTO sorular (dersadi,mdladi,konuadi,kadi,zder,dcev,soru) VALUES ('".$drsadi."','".$mdladi."','".$knuadi."','".$kadi."','".$zder."','".$dcev."','".$gelen."')") or die (mysql_Error());
}
?>