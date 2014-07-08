<?php

session_start();
$ders=$_SESSION["data"]["ders"];
$utime=$_SESSION["data"]["utime"];
$kturu=$_SESSION["data"]["kturu"];
if (isset($ders)) {
    $GLOBALS["ders"]=$ders;
}
/*
  $Id$ Yavuz Yasin D�zg�n

  PHP Tabanl� Optik Okuyucu ve Optik Form Scripti, A��k Kaynak Optik Okuyucu ��z�m�d�r
  http://www.duzgun.com

  Copyright (c) 2011 Duzgun.com

  Released under the GNU General Public License
*/
error_reporting(E_ALL & ~E_NOTICE);
include("require/constants.php");
$dbh=mysql_connect($GLOBALS['db_hostname'], $GLOBALS['db_username'], $GLOBALS['db_password']) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ($GLOBALS['db_dbname']);
mysql_query("SET NAMES UTF8");

require('fpdf.php');

function transform($x,$y)
{
global $strleftspace,$spacelen,$startmarginx,$startmarginy;
$setx = $startmarginx + $strleftspace + $spacelen*$x;
$sety = $startmarginy + $strleftspace + $spacelen*$y;
return array($setx,$sety);
}
$dersadi=$GLOBALS["ders"];
function AddPage($adi,$soyadi,$numarasi,$sinif,$sube,$cevapanahtariUTime,$readerUTime)
{
global $pdf,$dbh;
$dersadi=$GLOBALS["ders"];
$kturu=$_SESSION["data"]["kturu"];
$PUAN = array();
$Dogru  = 0;
$Yanlis = 0;
$Bos    = 0;
$Net    = 0;
$result = mysql_query("SELECT `ders`,`cevapnum`,`kitap`,`A`,`B`,`C`,`D` FROM `d_cevaplar` WHERE `ogrnum`=".$numarasi." AND `utime` = '".$readerUTime."' ORDER BY `cevapnum` ASC");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
if (mysql_num_rows($result) > 0)
{
while ($row = mysql_fetch_assoc($result)) {
$result2 = mysql_query("SELECT `A` , `B` , `C` , `D` FROM `d_cevapanahtari` WHERE `kturu` = '".$row['kitap']."' AND `ders` = '".$row['ders']."' AND `utime` = '".$cevapanahtariUTime."' AND `cevapnum`='".$row['cevapnum']."' ORDER BY `cevapnum` ASC" );
if (!$result2) {
    die('Invalid query: ' . mysql_error());
}
if (mysql_num_rows($result2) > 0)
{
$Karar = -1; // YANLIS
$CevapA = $row['A'];
$CevapB = $row['B'];
$CevapC = $row['C'];
$CevapD = $row['D'];
$AnahtarA = mysql_result($result2, 0, "A");
$AnahtarB = mysql_result($result2, 0, "B");
$AnahtarC = mysql_result($result2, 0, "C");
$AnahtarD = mysql_result($result2, 0, "D");
if(($CevapA+$CevapB+$CevapC+$CevapD)>1)$Karar = -1; //YANLIS
else if(($CevapA+$CevapB+$CevapC+$CevapD)==0)$Karar = 0; //BOS
else
{
if($AnahtarA==1)
{
if($CevapA==1)$Karar = 1;  //DOGRU
}
if ($AnahtarB==1)
{
if($CevapB==1)$Karar = 1;
}
if ($AnahtarC==1)
{
if($CevapC==1)$Karar = 1;
}
if ($AnahtarD==1)
{
if($CevapD==1)$Karar = 1;
}
}

if($Karar==-1)
$Yanlis += 1;
else if($Karar==0)
$Bos    += 1;
else if($Karar==1)
$Dogru  += 1;
// son
}
}
}

$Net    =  $Dogru-($Yanlis/3);
$Basari =  $Dogru*10;
$PUAN['D'] = array($Dogru,$Yanlis,$Bos,$Net,$Basari);
$PUAN['TOPLAM'] = round(($Basari),2);
if($PUAN['T'][3]==0 && $PUAN['M'][3]==0 && $PUAN['F'][3]==0 && $PUAN['S'][3]==0 && $PUAN['D'][3]==0)
mysql_query("UPDATE `d_reader` SET `puan` = '0' WHERE `utime` = '".$readerUTime."' AND `num` =".$numarasi);
else
mysql_query("UPDATE `d_reader` SET `puan` = '".$PUAN['TOPLAM']."' WHERE `utime` = '".$readerUTime."' AND `num` =".$numarasi);


//round(1.95583, 2);
$pdf->AddPage();

$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',8);
$pdf->SetXY(6,10);
$pdf->Cell(0,2,'ONDOKUZ MAYIS UNIVERSITESI',0,0,'C');
$pdf->SetXY(3,11);
//$pdf->Cell(0,8,$dersadi,0,0,'C');
$pdf->SetXY(3,12);
$pdf->Cell(0,14,'SINAV SONUC BELGESI',0,0,'C');
$pdf->SetXY(10,30);
$pdf->Rect(10, 30, 100, 5);
$pdf->Rect(10, 35, 100, 5);
$pdf->Rect(10, 40, 100, 5 ,"");
$pdf->Rect(10, 45, 100, 5 ,"");
$pdf->Line(48, 30, 48, 50);
$pdf->SetXY(10,30);
$pdf->Cell(38,5,'ADI SOYADI',0,0,'L');
$pdf->Cell(50,5,$adi." ".$soyadi ,0,0,'L');
$pdf->SetXY(10,35);
$pdf->Cell(38,5,'SINIF',0,0,'L');
$pdf->Cell(50,5,$sinif.' / '.$sube,0,0,'L');
$pdf->SetXY(10,40);
$pdf->Cell(38,5,'OKUL NO',0,0,'L');
$pdf->Cell(50,5,$numarasi,0,0,'L');
$pdf->SetXY(10,45);
$pdf->Cell(38,5,'TOPLAM PUAN',0,0,'L');
$pdf->Cell(50,5,$PUAN['TOPLAM'],0,0,'L');

$dersadi=$GLOBALS["ders"];
$pdf->SetXY(10,55);
$pdf->Rect(10, 55, 38, 5 ,"||");
$pdf->Cell(45,5,'SONUC TABLOSU',0,0,'C');
//$pdf->Cell(38,5,'MATEMAT�K',0,0,'C');
//$pdf->Cell(38,5,'FEN VE TEKNOLOJ�',0,0,'C');
//$pdf->Cell(38,5,'SOSYAL B�LG�LER',0,0,'C');
//$pdf->Cell(38,5,'�NG�L�ZCE',0,0,'C');
$pdf->Rect(10, 60, 38, 10 ,"");
$pdf->Rect(10, 65, 38, 5 ,"");
$pdf->Rect(10, 70, 38, 5 ,"");
$pdf->Rect(10, 75, 38, 5 ,"");
//$pdf->Rect(10, 55, 38, 25 ,"");
//$pdf->Rect(48, 55, 38, 25 ,"");
//$pdf->Rect(86, 55, 38, 25 ,"");
//$pdf->Rect(124, 55, 38, 25 ,"");
//$pdf->Rect(162, 55, 38, 25 ,"");
$pdf->Line(19.5, 60, 19.5, 70);
$pdf->Line(29, 60, 29, 70);
$pdf->Line(38.5, 60, 38.5, 70);
$pdf->Line(48, 60, 48, 70);
//$pdf->Line(57.5, 60, 57.5, 70);
//$pdf->Line(67, 60, 67, 70);
//$pdf->Line(76.5, 60, 76.5, 70);
//$pdf->Line(86, 60, 86, 70);
//$pdf->Line(95.5, 60, 95.5, 70);
//$pdf->Line(105, 60, 105, 70);
//$pdf->Line(114.5, 60, 114.5, 70);
//$pdf->Line(124, 60, 124, 70);
//$pdf->Line(133.5, 60, 133.5, 70);
//$pdf->Line(143, 60, 143, 70);
//$pdf->Line(152.5, 60, 152.5, 70);
//$pdf->Line(162, 60, 162, 70);
//$pdf->Line(171.5, 60, 171.5, 70);
//$pdf->Line(181, 60, 181, 70);
//$pdf->Line(190.5, 60, 190.5, 70);
$pdf->SetXY(10,60);
$pdf->Cell(9.5,5,'D',0,0,'C');
$pdf->Cell(9.5,5,'Y',0,0,'C');
$pdf->Cell(9.5,5,'B',0,0,'C');
$pdf->Cell(9.5,5,'N',0,0,'C');
//$pdf->Cell(9.5,5,'D',0,0,'C');
//$pdf->Cell(9.5,5,'Y',0,0,'C');
//$pdf->Cell(9.5,5,'B',0,0,'C');
//$pdf->Cell(9.5,5,'N',0,0,'C');
//$pdf->Cell(9.5,5,'D',0,0,'C');
//$pdf->Cell(9.5,5,'Y',0,0,'C');
//$pdf->Cell(9.5,5,'B',0,0,'C');
//$pdf->Cell(9.5,5,'N',0,0,'C');
//$pdf->Cell(9.5,5,'D',0,0,'C');
//$pdf->Cell(9.5,5,'Y',0,0,'C');
//$pdf->Cell(9.5,5,'B',0,0,'C');
//$pdf->Cell(9.5,5,'N',0,0,'C');
//$pdf->Cell(9.5,5,'D',0,0,'C');
//$pdf->Cell(9.5,5,'Y',0,0,'C');
//$pdf->Cell(9.5,5,'B',0,0,'C');
//$pdf->Cell(9.5,5,'N',0,0,'C');
$pdf->SetXY(10,65);
$pdf->Cell(9.5,5,Round($PUAN['D'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['D'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['D'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['D'][3], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['M'][0], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['M'][1], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['M'][2], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['M'][3], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['F'][0], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['F'][1], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['F'][2], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['F'][3], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['S'][0], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['S'][1], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['S'][2], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['S'][3], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['D'][0], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['D'][1], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['D'][2], 2),0,0,'C');
//$pdf->Cell(9.5,5,Round($PUAN['D'][3], 2),0,0,'C');
$pdf->SetXY(10,70);
$pdf->Cell(38,5,'% BASARI',0,0,'C');
//$pdf->Cell(38,5,'% BA�ARI',0,0,'C');
//$pdf->Cell(38,5,'% BA�ARI',0,0,'C');
//$pdf->Cell(38,5,'% BA�ARI',0,0,'C');
//$pdf->Cell(38,5,'% BA�ARI',0,0,'C');
$pdf->SetXY(10,75);
//$pdf->Cell(38,5,Round($PUAN['T'][4], 2),0,0,'C');
//$pdf->Cell(38,5,Round($PUAN['M'][4], 2),0,0,'C');
//$pdf->Cell(38,5,Round($PUAN['F'][4], 2),0,0,'C');
//$pdf->Cell(38,5,Round($PUAN['S'][4], 2),0,0,'C');
$pdf->Cell(38,5,Round($PUAN['D'][4], 2),0,0,'C');
rapor_query($adi,$soyadi,$numarasi,$dersadi,$sinif,$sube,$readerUTime,$PUAN['D']);
//rapor_query($adi,$soyadi,$numarasi,'M',$sinif,$sube,$readerUTime,$PUAN['M']);
//rapor_query($adi,$soyadi,$numarasi,'F',$sinif,$sube,$readerUTime,$PUAN['F']);
//rapor_query($adi,$soyadi,$numarasi,'S',$sinif,$sube,$readerUTime,$PUAN['S']);
//rapor_query($adi,$soyadi,$numarasi,'D',$sinif,$sube,$readerUTime,$PUAN['D']);
}
if(isset($_GET['sonuc'])) {
$cevapanahtariUTime = $_GET['cevapanahtariUTime'];
$readerUTime = $_GET['readerUTime'];
$pdf=new FPDF('L','mm','A5');
$result = mysql_query("SELECT o.`num` , o.`ad` , o.`soyad` , o.`sinif` , o.`sube` FROM `d_reader` r, `d_ogrenciler` o WHERE r.`num` = o.`num` AND r.`utime` = '".$readerUTime."' ORDER BY o.`sinif` , o.`sube` , o.`num` ASC");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_assoc($result)) {
AddPage($row['ad'],$row['soyad'],$row['num'],$row['sinif'],$row['sube'],$cevapanahtariUTime,$readerUTime);
}
$pdf->SetCompression(true);
$pdf->Output();
}else
{
?>
<html>
<head><title>Optik Okuyucu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
    <?php
    include_once 'optikgorsel.php';
    echo '</br></br>';
    ?>
<center><form id="form1" name="form1" method="get" action="">
<table border="1" cellspacing="0" cellpadding="5">
<tr><td colspan="3">Puan Hesabi ve Sonuçlarin PDF çiktisi</td></tr><tr>
<td>Optik Form Kayit Tarihi</td><td>Karsilastirilacak Cevap Anahtari Tarihi</td>
<td>&nbsp;</td></tr><tr><td><label for="readerUTime"></label>
<select name="readerUTime" id="readerUTime">
<?php
$result = mysql_query("SELECT `utime` FROM `d_reader` GROUP BY `utime` ORDER BY `utime` DESC");
if (!$result) {
die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_assoc($result)) {
echo '<option value="'.$row['utime'].'">'.$row['utime'].'</option>';
}
?>
</select></td><td><label for="cevapanahtariUTime"></label>
<select name="cevapanahtariUTime" id="cevapanahtariUTime">
<?php
$result = mysql_query("SELECT `utime` FROM `d_cevapanahtari` GROUP BY `utime` ORDER BY `utime` DESC");
if (!$result) {
die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_assoc($result)) {
echo '<option value="'.$row['utime'].'">'.$row['utime'].'</option>';
}
?>
</select></td><td>
<input type="submit" name="sonuc" id="sonuc" value="Sonuçlari Al" /></td>
</tr>
<?php
$result = mysql_query("SELECT `num` , `file` , `utime` FROM `d_reader` WHERE `num` NOT IN(SELECT `num` FROM `d_ogrenciler`)");
if (!$result) {
die('Invalid query: ' . mysql_error());
}
if(mysql_num_rows($result)>0) echo '<tr><td colspan="3"><font color="red"><b>Asagidaki �grenci sisteme kaydedilmemis. L�tfen d_ogrenciler tablosuna ekleyiniz.</b></font></td></tr>';
while ($row = mysql_fetch_assoc($result)) {
echo '<tr><td colspan="3">�grenci No: <b>'.$row['num'].'</b>, Dosya Adi: <b>'.$row['file'].'</b>, UTime: <b>'.$row['utime'].'</b></td></tr>';
}
?>
</table></form><center></body></html>
<?php
}
function rapor_query($adi,$soyadi,$numarasi,$ders,$sinif,$sube,$readerUTime,$PUAN)
{
$result = mysql_query('SELECT id FROM `d_rapor` WHERE utime=\''.$readerUTime.'\' AND ders=\''.$ders.'\' AND ogrnum='.$numarasi.' LIMIT 1');
if (!$result) {
die('Could not query:' . mysql_error());
}
$id =0;
if(mysql_num_rows($result)<1)
{
$query = mysql_query("INSERT INTO `d_rapor` (`id`, `ogrnum`, `ders`, `sinif`, `sube`, `dogru`, `yanlis`, `bos`, `net`, `basari`, `utime`) VALUES (NULL, '".$numarasi."', '".$ders."', '".$sinif."', '".$sube."', '".$PUAN[0]."', '".$PUAN[1]."', '".$PUAN[2]."', '".$PUAN[3]."', '".$PUAN[4]."', '".$readerUTime."');");
$id = mysql_insert_id();
}
else
{
$id = mysql_result($result, 0, 0);
mysql_query("UPDATE `d_rapor` SET `ders` = '".$ders."', `sinif` = '".$sinif."', `sube` = '".$sube."', `dogru` = '".$PUAN[0]."', `yanlis` = '".$PUAN[1]."', `bos` = '".$PUAN[2]."', `net` = '".$PUAN[3]."', `basari` = '".$PUAN[4]."' WHERE `id` =".$id);
}
return $id;
}
?>
