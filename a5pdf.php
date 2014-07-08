<?php
/*
  $Id$ Yavuz Yasin Düzgün

  PHP Tabanlý Optik Okuyucu ve Optik Form Scripti, Açýk Kaynak Optik Okuyucu Çözümüdür
  http://www.duzgun.com

  Copyright (c) 2011 Duzgun.com

  Released under the GNU General Public License
*/
$liste = <<< EOPA
8/TEST1/TEST2/6/A
21/TEST3/TEST4/6/A
63/TEST5/TEST6/6/A
EOPA;

require('fpdf.php');

function transform($x,$y)
{
global $strleftspace,$spacelen,$startmarginx,$startmarginy;
$setx = $startmarginx + $strleftspace + $spacelen*$x;
$sety = $startmarginy + $strleftspace + $spacelen*$y;
return array($setx,$sety);
}

function AddPage($adi,$soyadi,$numarasi,$sinif,$sube,$tarih)
{
global $pdf,$strleftspace,$spacelen,$startmarginx,$startmarginy;
 
$pdf->AddPage();

$pdf->AddFont('OMRBubblesLC','','OMRBubblesLC.php');
$pdf->SetFont('OMRBubblesLC','',12);

$opticlen      = 4.233;
$strlen        = $pdf->GetStringWidth("*");
$strleftspace  = ($opticlen-$strlen)/2;
$addopticspace = $opticlen/8;
$spacelen      = round($opticlen + $addopticspace,3);
$startmarginx  = 5;
$startmarginy  = 5.5;

$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(0.5);
$pdf->Rect(3, 10, 143, 184 ,"");      //    1, 1, 208, 295
$pdf->Line(31, 84, 31, 194);
$pdf->Line(59.5, 84, 59.5, 194);
$pdf->Line(88, 84, 88, 194);
$pdf->Line(117, 84, 117, 194);
$pdf->Line(3, 90, 146, 90);
$pdf->Line(3, 84, 146, 84);

$pdf->Line(3, 16, 146, 16);

$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',8);
$pdf->SetXY(3,10);
$pdf->Cell(143,6,'Abc Ýlkögretim Okulu Ölçme Degerlendirme Sýnavý Cevap Formu',0,0,'C');

$Kodnumarasi = array();
if($numarasi!="")
{
$Kodnumarasi[0] = substr(sprintf("%04s",$numarasi),0,1);
$Kodnumarasi[1] = substr(sprintf("%04s",$numarasi),1,1);
$Kodnumarasi[2] = substr(sprintf("%04s",$numarasi),2,1);
$Kodnumarasi[3] = substr(sprintf("%04s",$numarasi),3,1);
}
else
{
$Kodnumarasi[0]="";
$Kodnumarasi[1]="";
$Kodnumarasi[2]="";
$Kodnumarasi[3]="";	
}
$pdf->SetXY(119,25);
$pdf->Cell(5,5,$Kodnumarasi[0],0,0,'C');

$pdf->SetXY(124,25);
$pdf->Cell(5,5,$Kodnumarasi[1],0,0,'C');

$pdf->SetXY(129,25);
$pdf->Cell(5,5,$Kodnumarasi[2],0,0,'C');

$pdf->SetXY(134,25);
$pdf->Cell(5,5,$Kodnumarasi[3],0,0,'C');

$pdf->Rect(118, 20, 21.5, 60 ,"");
$pdf->Line(118, 25, 139, 25);
$pdf->Line(118, 30, 139, 30);


$pdf->SetXY(118,20);
$pdf->Cell(21.5,5,'NUMARANIZ',1,0,'C');

$pdf->Line(124, 25, 124, 30);
$pdf->Line(129, 25, 129, 30);
$pdf->Line(134, 25, 134, 30);


$pdf->Rect(68, 20, 45, 5 ,"");
$pdf->SetXY(68,20);
$pdf->Cell(25,5,'Kitapçýk Türü',1,0,'C');


$pdf->Rect(68, 30, 45, 22.5 ,"");
$pdf->SetXY(68,30);
$pdf->Cell(45,5,"DÝKKAT ! ",0,0,'C');
$pdf->SetXY(68,33);
$pdf->Cell(45,5,"Optik form üzerinde",0,0,'C');
$pdf->SetXY(68,36);
$pdf->Cell(45,5,"tüm iþaretlemelerinizde",0,0,'C');
$pdf->SetXY(68,39);
$pdf->Cell(45,5,"kurþun kalem kullanýnýz.",0,0,'C');
$pdf->SetXY(68,42);
$pdf->Cell(45,5,"+",0,0,'C');
$pdf->SetXY(68,45);
$pdf->Cell(45,5,"Kitapçýk türünü iþaretlemeyi",0,0,'C');
$pdf->SetXY(68,48);
$pdf->Cell(45,5,"unutmayýnýz.",0,0,'C');

$pdf->Rect(68, 57.5, 45, 22.5 ,"");
$pdf->SetXY(68,57.5);
$pdf->Cell(45,5,"Cevaplarýnýzý",0,0,'C');
$pdf->SetXY(68,60.5);
$pdf->Cell(45,5,"aþaðýdaki örnek gibi",0,0,'C');
$pdf->SetXY(68,63.5);
$pdf->Cell(45,5,"iþaretleyiniz.",0,0,'C');
$pdf->SetXY(68,69.5);
$pdf->Cell(45,5,"ÖRNEK",0,0,'C');
$pdf->SetXY(68,74.5);
$pdf->AddFont('OMRBubblesLC','','OMRBubblesLC.php');
$pdf->SetFont('OMRBubblesLC','',12);
$pdf->Cell(45,5,"~",0,0,'C');

$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',10);

$pdf->Rect(9, 20, 54, 60 ,"");
$pdf->SetXY(9,25);
$pdf->Cell(19,5,"Adý",0,0,'L');
$pdf->Cell(35,5,":".(($adi=='')?"........................":$adi),0,0,'L');
$pdf->SetXY(9,32);
$pdf->Cell(19,5,"Soyadý",0,0,'L');
$pdf->Cell(35,5,":".(($soyadi=='')?"........................":$soyadi),0,0,'L');
$pdf->SetXY(9,39);
$pdf->Cell(19,5,"Numarasý",0,0,'L');
$pdf->Cell(35,5,":".(($numarasi=='')?"........................":$numarasi),0,0,'L');
$pdf->SetXY(9,46);
$pdf->Cell(19,5,"Sýnýf/Þube",0,0,'L');
$pdf->Cell(35,5,":".(($sinif=='')?"........................":$sinif."/".$sube),0,0,'L');
$pdf->SetXY(9,54);
$pdf->Cell(19,5,"Tarih",0,0,'L');
$pdf->Cell(35,5,":".(($tarih=='')?"........................":$tarih),0,0,'L');

$pdf->Line(9, 64, 63, 64);

$pdf->SetXY(9,65);
$pdf->Cell(19,5,"Ýmza",0,0,'L');
$pdf->Cell(35,5,":",0,0,'L');

$pdf->AddFont('OMRBubblesLC','','OMRBubblesLC.php');
$pdf->SetFont('OMRBubblesLC','',12);


$p = transform(19.0,3.85);$pdf->Text($p[0], $p[1], "A");
$p = transform(21.25,3.85);$pdf->Text($p[0], $p[1], "B");




$satir = 24;
$sutun = 6;
for($i=1;$i<=10;$i++)
{
$p = transform($satir,$sutun);$pdf->Text($p[0], $p[1], (($i==10)?(($Kodnumarasi[0]!="" && $Kodnumarasi[0]==0)?"~":0):(($Kodnumarasi[0]!="" && $Kodnumarasi[0]==$i)?"~":$i)));
$sutun += 1;
}

$satir = 25;
$sutun = 6;
for($i=1;$i<=10;$i++)
{
$p = transform($satir,$sutun);$pdf->Text($p[0], $p[1], (($i==10)?(($Kodnumarasi[1]!="" && $Kodnumarasi[1]==0)?"~":0):(($Kodnumarasi[1]!="" && $Kodnumarasi[1]==$i)?"~":$i)));
$sutun += 1;
}

$satir = 26;
$sutun = 6;
for($i=1;$i<=10;$i++)
{
$p = transform($satir,$sutun);$pdf->Text($p[0], $p[1], (($i==10)?(($Kodnumarasi[2]!="" && $Kodnumarasi[2]==0)?"~":0):(($Kodnumarasi[2]!="" && $Kodnumarasi[2]==$i)?"~":$i)));
$sutun += 1;
}

$satir = 27;
$sutun = 6;
for($i=1;$i<=10;$i++)
{
$p = transform($satir,$sutun);$pdf->Text($p[0], $p[1], (($i==10)?(($Kodnumarasi[3]!="" && $Kodnumarasi[3]==0)?"~":0):(($Kodnumarasi[3]!="" && $Kodnumarasi[3]==$i)?"~":$i)));
$sutun += 1;
}


$sutunlar = 19;

$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',8);

$pdf->SetXY(3,84);
$pdf->Cell(28,6,'TÜRKÇE',0,0,'C');

$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 0;
$p = transform($satir-1,$sutun-1);
$pdf->SetXY($p[0],$p[1]+0.8);
$pdf->Cell(10,5,$i.')',0,0,'R');
$sutun++;
}
$pdf->AddFont('OMRBubblesLC','','OMRBubblesLC.php');
$pdf->SetFont('OMRBubblesLC','',12);
$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 0;
$p = transform($satir+1,$sutun);$pdf->Text($p[0], $p[1], "A");
$p = transform($satir+2,$sutun);$pdf->Text($p[0], $p[1], "B");
$p = transform($satir+3,$sutun);$pdf->Text($p[0], $p[1], "C");
$p = transform($satir+4,$sutun);$pdf->Text($p[0], $p[1], "D");
$sutun++;
}



$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',8);

$pdf->SetXY(31,84);
$pdf->Cell(29,6,'MATEMATÝK',0,0,'C');

$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 6;
$p = transform($satir-1,$sutun-1);
$pdf->SetXY($p[0],$p[1]+0.8);
$pdf->Cell(10,5,$i.')',0,0,'R');
$sutun++;
}
$pdf->AddFont('OMRBubblesLC','','OMRBubblesLC.php');
$pdf->SetFont('OMRBubblesLC','',12);
$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 6;
$p = transform($satir+1,$sutun);$pdf->Text($p[0], $p[1], "A");
$p = transform($satir+2,$sutun);$pdf->Text($p[0], $p[1], "B");
$p = transform($satir+3,$sutun);$pdf->Text($p[0], $p[1], "C");
$p = transform($satir+4,$sutun);$pdf->Text($p[0], $p[1], "D");
$sutun++;
}


$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',8);

$pdf->SetXY(59.5,84);
$pdf->Cell(29,6,'FEN',0,0,'C');

$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 12;
$p = transform($satir-1,$sutun-1);
$pdf->SetXY($p[0],$p[1]+0.8);
$pdf->Cell(10,5,$i.')',0,0,'R');
$sutun++;
}
$pdf->AddFont('OMRBubblesLC','','OMRBubblesLC.php');
$pdf->SetFont('OMRBubblesLC','',12);
$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 12;
$p = transform($satir+1,$sutun);$pdf->Text($p[0], $p[1], "A");
$p = transform($satir+2,$sutun);$pdf->Text($p[0], $p[1], "B");
$p = transform($satir+3,$sutun);$pdf->Text($p[0], $p[1], "C");
$p = transform($satir+4,$sutun);$pdf->Text($p[0], $p[1], "D");
$sutun++;
}


$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',8);

$pdf->SetXY(88,84);
$pdf->Cell(29,6,'SOSYAL',0,0,'C');


$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 18;
$p = transform($satir-1,$sutun-1);
$pdf->SetXY($p[0],$p[1]+0.8);
$pdf->Cell(10,5,$i.')',0,0,'R');
$sutun++;
}
$pdf->AddFont('OMRBubblesLC','','OMRBubblesLC.php');
$pdf->SetFont('OMRBubblesLC','',12);
$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 18;
$p = transform($satir+1,$sutun);$pdf->Text($p[0], $p[1], "A");
$p = transform($satir+2,$sutun);$pdf->Text($p[0], $p[1], "B");
$p = transform($satir+3,$sutun);$pdf->Text($p[0], $p[1], "C");
$p = transform($satir+4,$sutun);$pdf->Text($p[0], $p[1], "D");
$sutun++;
}

$pdf->AddFont('verdana','','verdana.php');
$pdf->SetFont('verdana','',8);

$pdf->SetXY(117,84);
$pdf->Cell(29,6,'DÝL',0,0,'C');


$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 24;
$p = transform($satir-1,$sutun-1);
$pdf->SetXY($p[0],$p[1]+0.8);
$pdf->Cell(10,5,$i.')',0,0,'R');
$sutun++;
}
$pdf->AddFont('OMRBubblesLC','','OMRBubblesLC.php');
$pdf->SetFont('OMRBubblesLC','',12);
$sutun = $sutunlar;
for($i=1;$i<21;$i++)
{
$satir = 24;
$p = transform($satir+1,$sutun);$pdf->Text($p[0], $p[1], "A");
$p = transform($satir+2,$sutun);$pdf->Text($p[0], $p[1], "B");
$p = transform($satir+3,$sutun);$pdf->Text($p[0], $p[1], "C");
$p = transform($satir+4,$sutun);$pdf->Text($p[0], $p[1], "D");
$sutun++;
}
}

$pdf=new FPDF('P','mm','A5');
AddPage('','','','','','');
$liste1 = explode("\n",$liste);
for($i=0;$i<count($liste1);$i++)
{
$liste2 =  explode("/",trim($liste1[$i]));
AddPage($liste2[1],$liste2[2],$liste2[0],$liste2[3],$liste2[4],'');
}

$pdf->SetCompression(true);
$pdf->Output();
?>
