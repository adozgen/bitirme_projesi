<?php
/*
  $Id$ Yavuz Yasin Düzgün

  PHP Tabanlý Optik Okuyucu ve Optik Form Scripti, Açýk Kaynak Optik Okuyucu Çözümüdür
  http://www.duzgun.com

  Copyright (c) 2011 Duzgun.com

  Released under the GNU General Public License
*/
error_reporting(E_ALL & ~E_NOTICE);
include("require/constants.php");

$dbh=mysql_connect($GLOBALS['db_hostname'], $GLOBALS['db_username'], $GLOBALS['db_password']) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ($GLOBALS['db_dbname']);


require('fpdf.php');

function transform($x,$y)
{
global $strleftspace,$spacelen,$startmarginx,$startmarginy;
$setx = $startmarginx + $strleftspace + $spacelen*$x;
$sety = $startmarginy + $strleftspace + $spacelen*$y;
return array($setx,$sety);
}

function AddPage($readerUTime)
{
global $pdf,$dbh;
$PUAN = array();


$PUAN['6TA'] = DersSinifSubeOrtalama('T','6','A',$readerUTime);
$PUAN['6MA'] = DersSinifSubeOrtalama('M','6','A',$readerUTime);
$PUAN['6FA'] = DersSinifSubeOrtalama('F','6','A',$readerUTime);
$PUAN['6SA'] = DersSinifSubeOrtalama('S','6','A',$readerUTime);
$PUAN['6DA'] = DersSinifSubeOrtalama('D','6','A',$readerUTime);
$PUAN['6HA'] = DersSinifSubeOrtalama('','6','A',$readerUTime);

$PUAN['6TB'] = DersSinifSubeOrtalama('T','6','B',$readerUTime);
$PUAN['6MB'] = DersSinifSubeOrtalama('M','6','B',$readerUTime);
$PUAN['6FB'] = DersSinifSubeOrtalama('F','6','B',$readerUTime);
$PUAN['6SB'] = DersSinifSubeOrtalama('S','6','B',$readerUTime);
$PUAN['6DB'] = DersSinifSubeOrtalama('D','6','B',$readerUTime);
$PUAN['6HB'] = DersSinifSubeOrtalama('','6','B',$readerUTime);

$PUAN['6TC'] = DersSinifSubeOrtalama('T','6','C',$readerUTime);
$PUAN['6MC'] = DersSinifSubeOrtalama('M','6','C',$readerUTime);
$PUAN['6FC'] = DersSinifSubeOrtalama('F','6','C',$readerUTime);
$PUAN['6SC'] = DersSinifSubeOrtalama('S','6','C',$readerUTime);
$PUAN['6DC'] = DersSinifSubeOrtalama('D','6','C',$readerUTime);
$PUAN['6HC'] = DersSinifSubeOrtalama('','6','C',$readerUTime);

$PUAN['6T_'] = DersSinifSubeOrtalama('T','6','',$readerUTime);
$PUAN['6M_'] = DersSinifSubeOrtalama('M','6','',$readerUTime);
$PUAN['6F_'] = DersSinifSubeOrtalama('F','6','',$readerUTime);
$PUAN['6S_'] = DersSinifSubeOrtalama('S','6','',$readerUTime);
$PUAN['6D_'] = DersSinifSubeOrtalama('D','6','',$readerUTime);
$PUAN['6H_'] = DersSinifSubeOrtalama('','6','',$readerUTime);

$PUAN['7TA'] = DersSinifSubeOrtalama('T','7','A',$readerUTime);
$PUAN['7MA'] = DersSinifSubeOrtalama('M','7','A',$readerUTime);
$PUAN['7FA'] = DersSinifSubeOrtalama('F','7','A',$readerUTime);
$PUAN['7SA'] = DersSinifSubeOrtalama('S','7','A',$readerUTime);
$PUAN['7DA'] = DersSinifSubeOrtalama('D','7','A',$readerUTime);
$PUAN['7HA'] = DersSinifSubeOrtalama('','7','A',$readerUTime);

$PUAN['7TB'] = DersSinifSubeOrtalama('T','7','B',$readerUTime);
$PUAN['7MB'] = DersSinifSubeOrtalama('M','7','B',$readerUTime);
$PUAN['7FB'] = DersSinifSubeOrtalama('F','7','B',$readerUTime);
$PUAN['7SB'] = DersSinifSubeOrtalama('S','7','B',$readerUTime);
$PUAN['7DB'] = DersSinifSubeOrtalama('D','7','B',$readerUTime);
$PUAN['7HB'] = DersSinifSubeOrtalama('','7','B',$readerUTime);

$PUAN['7TC'] = DersSinifSubeOrtalama('T','7','C',$readerUTime);
$PUAN['7MC'] = DersSinifSubeOrtalama('M','7','C',$readerUTime);
$PUAN['7FC'] = DersSinifSubeOrtalama('F','7','C',$readerUTime);
$PUAN['7SC'] = DersSinifSubeOrtalama('S','7','C',$readerUTime);
$PUAN['7DC'] = DersSinifSubeOrtalama('D','7','C',$readerUTime);
$PUAN['7HC'] = DersSinifSubeOrtalama('','7','C',$readerUTime);

$PUAN['7TD'] = DersSinifSubeOrtalama('T','7','D',$readerUTime);
$PUAN['7MD'] = DersSinifSubeOrtalama('M','7','D',$readerUTime);
$PUAN['7FD'] = DersSinifSubeOrtalama('F','7','D',$readerUTime);
$PUAN['7SD'] = DersSinifSubeOrtalama('S','7','D',$readerUTime);
$PUAN['7DD'] = DersSinifSubeOrtalama('D','7','D',$readerUTime);
$PUAN['7HD'] = DersSinifSubeOrtalama('','7','D',$readerUTime);

$PUAN['7T_'] = DersSinifSubeOrtalama('T','7','',$readerUTime);
$PUAN['7M_'] = DersSinifSubeOrtalama('M','7','',$readerUTime);
$PUAN['7F_'] = DersSinifSubeOrtalama('F','7','',$readerUTime);
$PUAN['7S_'] = DersSinifSubeOrtalama('S','7','',$readerUTime);
$PUAN['7D_'] = DersSinifSubeOrtalama('D','7','',$readerUTime);
$PUAN['7H_'] = DersSinifSubeOrtalama('','7','',$readerUTime);

$PUAN['8TA'] = DersSinifSubeOrtalama('T','8','A',$readerUTime);
$PUAN['8MA'] = DersSinifSubeOrtalama('M','8','A',$readerUTime);
$PUAN['8FA'] = DersSinifSubeOrtalama('F','8','A',$readerUTime);
$PUAN['8SA'] = DersSinifSubeOrtalama('S','8','A',$readerUTime);
$PUAN['8DA'] = DersSinifSubeOrtalama('D','8','A',$readerUTime);
$PUAN['8HA'] = DersSinifSubeOrtalama('','8','A',$readerUTime);

$PUAN['8TB'] = DersSinifSubeOrtalama('T','8','B',$readerUTime);
$PUAN['8MB'] = DersSinifSubeOrtalama('M','8','B',$readerUTime);
$PUAN['8FB'] = DersSinifSubeOrtalama('F','8','B',$readerUTime);
$PUAN['8SB'] = DersSinifSubeOrtalama('S','8','B',$readerUTime);
$PUAN['8DB'] = DersSinifSubeOrtalama('D','8','B',$readerUTime);
$PUAN['8HB'] = DersSinifSubeOrtalama('','8','B',$readerUTime);

$PUAN['8TC'] = DersSinifSubeOrtalama('T','8','C',$readerUTime);
$PUAN['8MC'] = DersSinifSubeOrtalama('M','8','C',$readerUTime);
$PUAN['8FC'] = DersSinifSubeOrtalama('F','8','C',$readerUTime);
$PUAN['8SC'] = DersSinifSubeOrtalama('S','8','C',$readerUTime);
$PUAN['8DC'] = DersSinifSubeOrtalama('D','8','C',$readerUTime);
$PUAN['8HC'] = DersSinifSubeOrtalama('','8','C',$readerUTime);

$PUAN['8T_'] = DersSinifSubeOrtalama('T','8','',$readerUTime);
$PUAN['8M_'] = DersSinifSubeOrtalama('M','8','',$readerUTime);
$PUAN['8F_'] = DersSinifSubeOrtalama('F','8','',$readerUTime);
$PUAN['8S_'] = DersSinifSubeOrtalama('S','8','',$readerUTime);
$PUAN['8D_'] = DersSinifSubeOrtalama('D','8','',$readerUTime);
$PUAN['8H_'] = DersSinifSubeOrtalama('','8','',$readerUTime);

$PUAN['_T_'] = DersSinifSubeOrtalama('T','','',$readerUTime);
$PUAN['_M_'] = DersSinifSubeOrtalama('M','','',$readerUTime);
$PUAN['_F_'] = DersSinifSubeOrtalama('F','','',$readerUTime);
$PUAN['_S_'] = DersSinifSubeOrtalama('S','','',$readerUTime);
$PUAN['_D_'] = DersSinifSubeOrtalama('D','','',$readerUTime);
$PUAN['_H_'] = DersSinifSubeOrtalama('','','',$readerUTime);


$pdf->AddPage();

$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',8);
$pdf->SetXY(3,10);
$pdf->Cell(0,2,'ABC ÝLKÖÐRETÝM OKULU',0,0,'C');
$pdf->SetXY(3,11);
$pdf->Cell(0,8,'2010/2011 EÐÝTÝM ÖÐRETÝM YILI SEVÝYE TESPÝT SINAVI',0,0,'C');
$pdf->SetXY(3,12);
$pdf->Cell(0,14,'SINAV SONUÇ RAPORU',0,0,'C');
$pdf->SetXY(10,30);


$pdf->SetXY(15,35);
$pdf->Cell(38,5,'DERSLER',0,0,'C');
$pdf->Cell(38,5,'TÜRKÇE',0,0,'C');
$pdf->Cell(38,5,'MATEMATÝK',0,0,'C');
$pdf->Cell(38,5,'FEN VE TEKNOLOJÝ',0,0,'C');
$pdf->Cell(38,5,'SOSYAL BÝLGÝLER',0,0,'C');
$pdf->Cell(38,5,'ÝNGÝLÝZCE',0,0,'C');
$pdf->Cell(38,5,'TÜM DERSLER',0,0,'C');
$pdf->Rect(15, 35, 266, 5 ,"");
$pdf->Rect(15, 40, 266, 5 ,"");
$pdf->Rect(15, 45, 266, 5 ,"");
$pdf->Rect(15, 50, 266, 5 ,"");
$pdf->Rect(15, 55, 266, 5 ,"");
$pdf->Rect(15, 60, 266, 5 ,"");
$pdf->Rect(15, 65, 266, 5 ,"");
$pdf->Rect(15, 70, 266, 5 ,"");
$pdf->Rect(15, 75, 266, 5 ,"");
$pdf->Rect(15, 80, 266, 5 ,"");
$pdf->Rect(15, 85, 266, 5 ,"");
$pdf->Rect(15, 90, 266, 5 ,"");
$pdf->Rect(15, 95, 266, 5 ,"");
$pdf->Rect(15, 100, 266, 5 ,"");
$pdf->Rect(15, 105, 266, 5 ,"");
$pdf->Rect(15, 110, 266, 5 ,"");

$pdf->Rect(15, 35, 38, 80 ,"");
$pdf->Rect(53, 35, 38, 80 ,"");
$pdf->Rect(91, 35, 38, 80 ,"");
$pdf->Rect(129, 35, 38, 80 ,"");
$pdf->Rect(167, 35, 38, 80 ,"");
$pdf->Rect(205, 35, 38, 80 ,"");

$x=15+9.5*4;
$y=40;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);
$x+=9.5;
$pdf->Line($x, $y, $x, 115);

$pdf->SetLineWidth(0.5);
$x=15;
$y=35;
$pdf->Line($x, $y, $x, 115);
$x+=9.5*4;
$pdf->Line($x, $y, $x, 115);
$x+=9.5*4;
$pdf->Line($x, $y, $x, 115);
$x+=9.5*4;
$pdf->Line($x, $y, $x, 115);
$x+=9.5*4;
$pdf->Line($x, $y, $x, 115);
$x+=9.5*4;
$pdf->Line($x, $y, $x, 115);
$x+=9.5*4;
$pdf->Line($x, $y, $x, 115);
$x+=9.5*4;
$pdf->Line($x, $y, $x, 115);

$x=15+9.5*28;
$pdf->Line(15, $y, $x, $y);
$pdf->Line(15, 115, $x, 115);
$pdf->Line(15, 45, $x, 45);
$pdf->Line(15, 60, $x, 60);
$pdf->Line(15, 65, $x, 65);
$pdf->Line(15, 85, $x, 85);
$pdf->Line(15, 90, $x, 90);
$pdf->Line(15, 105, $x, 105);
$pdf->SetLineWidth(0.4);

$pdf->SetXY(15+9.5*4,40);
$pdf->Cell(9.5,5,'Doðru',0,0,'C');
$pdf->Cell(9.5,5,'Yanlýþ',0,0,'C');
$pdf->Cell(9.5,5,'Net',0,0,'C');
$pdf->Cell(9.5,5,'Baþarý',0,0,'C');
$pdf->Cell(9.5,5,'Doðru',0,0,'C');
$pdf->Cell(9.5,5,'Yanlýþ',0,0,'C');
$pdf->Cell(9.5,5,'Net',0,0,'C');
$pdf->Cell(9.5,5,'Baþarý',0,0,'C');
$pdf->Cell(9.5,5,'Doðru',0,0,'C');
$pdf->Cell(9.5,5,'Yanlýþ',0,0,'C');
$pdf->Cell(9.5,5,'Net',0,0,'C');
$pdf->Cell(9.5,5,'Baþarý',0,0,'C');
$pdf->Cell(9.5,5,'Doðru',0,0,'C');
$pdf->Cell(9.5,5,'Yanlýþ',0,0,'C');
$pdf->Cell(9.5,5,'Net',0,0,'C');
$pdf->Cell(9.5,5,'Baþarý',0,0,'C');
$pdf->Cell(9.5,5,'Doðru',0,0,'C');
$pdf->Cell(9.5,5,'Yanlýþ',0,0,'C');
$pdf->Cell(9.5,5,'Nnet',0,0,'C');
$pdf->Cell(9.5,5,'Baþarý',0,0,'C');
$pdf->Cell(9.5,5,'Doðru',0,0,'C');
$pdf->Cell(9.5,5,'Yanlýþ',0,0,'C');
$pdf->Cell(9.5,5,'Net',0,0,'C');
$pdf->Cell(9.5,5,'Baþarý',0,0,'C');

$pdf->SetXY(15,40);
$pdf->Cell(38,5,'ORTALAMA',0,0,'C');
$pdf->SetXY(15,45);
$pdf->Cell(38,5,'6A',0,0,'C');
$pdf->SetXY(15,50);
$pdf->Cell(38,5,'6B',0,0,'C');
$pdf->SetXY(15,55);
$pdf->Cell(38,5,'6C',0,0,'C');
$pdf->SetXY(15,60);
$pdf->Cell(38,5,'6. SINIFLAR ORTALAMASI',0,0,'C');
$pdf->SetXY(15,65);
$pdf->Cell(38,5,'7A',0,0,'C');
$pdf->SetXY(15,70);
$pdf->Cell(38,5,'7B',0,0,'C');
$pdf->SetXY(15,75);
$pdf->Cell(38,5,'7C',0,0,'C');
$pdf->SetXY(15,80);
$pdf->Cell(38,5,'7D',0,0,'C');
$pdf->SetXY(15,85);
$pdf->Cell(38,5,'7. SINIFLAR ORTALAMASI',0,0,'C');
$pdf->SetXY(15,90);
$pdf->Cell(38,5,'8A',0,0,'C');
$pdf->SetXY(15,95);
$pdf->Cell(38,5,'8B',0,0,'C');
$pdf->SetXY(15,100);
$pdf->Cell(38,5,'8C',0,0,'C');
$pdf->SetXY(15,105);
$pdf->Cell(38,5,'8. SINIFLAR ORTALAMASI',0,0,'C');
$pdf->SetXY(15,110);
$pdf->Cell(38,5,'OKUL ORTALAMASI',0,0,'C');

$pdf->SetXY(15+9.5*4,45);
$pdf->Cell(9.5,5,Round($PUAN['6TA'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TA'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TA'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TA'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MA'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MA'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MA'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MA'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FA'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FA'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FA'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FA'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SA'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SA'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SA'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SA'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DA'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DA'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DA'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DA'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HA'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HA'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HA'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HA'][3], 0).'%',0,0,'C');

$pdf->SetXY(15+9.5*4,50);
$pdf->Cell(9.5,5,Round($PUAN['6TB'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TB'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TB'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TB'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MB'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MB'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MB'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MB'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FB'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FB'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FB'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FB'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SB'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SB'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SB'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SB'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DB'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DB'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DB'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DB'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HB'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HB'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HB'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HB'][3], 0).'%',0,0,'C');

$pdf->SetXY(15+9.5*4,55);
$pdf->Cell(9.5,5,Round($PUAN['6TC'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TC'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TC'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6TC'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MC'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MC'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MC'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6MC'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FC'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FC'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FC'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6FC'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SC'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SC'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SC'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6SC'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DC'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DC'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DC'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6DC'][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HC'][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HC'][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HC'][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN['6HC'][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,60);
$charilk = '6';
$charson = '_';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,65);
$charilk = '7';
$charson = 'A';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,70);
$charilk = '7';
$charson = 'B';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,75);
$charilk = '7';
$charson = 'C';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,80);
$charilk = '7';
$charson = 'D';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,85);
$charilk = '7';
$charson = '_';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,90);
$charilk = '8';
$charson = 'A';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,95);
$charilk = '8';
$charson = 'B';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,100);
$charilk = '8';
$charson = 'C';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,105);
$charilk = '8';
$charson = '_';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');


$pdf->SetXY(15+9.5*4,110);
$charilk = '_';
$charson = '_';
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'T'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'M'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'F'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'S'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'D'.$charson][3], 0).'%',0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][0], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][1], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][2], 2),0,0,'C');
$pdf->Cell(9.5,5,Round($PUAN[$charilk.'H'.$charson][3], 0).'%',0,0,'C');
}
if(isset($_GET['sonuc'])) {
$readerUTime = $_GET['readerUTime'];
$pdf=new FPDF('L','mm','A4');
$tabanhesabi = null;
AddPage($readerUTime);
$pdf->SetXY(15,120);
$pdf->Cell(200,5,"Genel baþarý seviyesi deðerlendirmesidir.",0,0,'L');
$tabanhesabi = 0;
AddPage($readerUTime);
$pdf->SetXY(15,120);
$pdf->Cell(200,5,"Sadece \" $tabanhesabi \" baþarý seviyesinden büyük olanlarýn deðerlendirmesidir.",0,0,'L');
$tabanhesabi =50;
AddPage($readerUTime);
$pdf->SetXY(15,120);
$pdf->Cell(200,5,"Sadece \" $tabanhesabi \" baþarý seviyesinden büyük olanlarýn deðerlendirmesidir.",0,0,'L');


$pdf->SetCompression(true);
$pdf->Output();
}else
{
?>
<html>
<head><title>OMR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" /></head>
<body>
<form id="form1" name="form1" method="get" action="">
<table border="1" cellspacing="0" cellpadding="5">
<tr><td colspan="2">Rapor PDF Çiktisi</td></tr>
<tr><td colspan="2">Optik Form Kayit Tarihi</td>
</tr><tr><td><label for="readerUTime"></label>
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
</select></td><td>
<input type="submit" name="sonuc" id="sonuc" value="Sonuçlari AL" /></td>
</tr>
</table></form></body></html>
<?php
}

function DersSinifSubeOrtalama($ders,$sinif,$sube,$readerUTime)
{
global $tabanhesabi;
$Dogru  = 0;
$Yanlis = 0;
$Net    = 0;
$Basari = 0;
$query = '';
if($ders !='') $query = "`ders` = '".$ders."' AND ".$query;
if($sinif !='') $query = "`sinif` = '".$sinif."' AND ".$query;
if($sube !='') $query = "`sube` = '".$sube."' AND ".$query;
$result = mysql_query("SELECT AVG(dogru),AVG(yanlis),AVG(net),AVG(basari) FROM `d_rapor` WHERE ".$query."`utime` = '".$readerUTime."'".(is_null($tabanhesabi)?'':' AND basari>'.$tabanhesabi));
if (!$result) {
die('Invalid query: ' . mysql_error());
}
if (mysql_num_rows($result) > 0)
{
$Dogru = mysql_result($result, 0, 0);
$Yanlis = mysql_result($result, 0, 1);
$Net = mysql_result($result, 0, 2);
$Basari = mysql_result($result, 0, 3);
}
return array($Dogru,$Yanlis,$Net,$Basari);
}
?>
