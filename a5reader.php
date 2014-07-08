<?php
session_start();
$ders=$_SESSION["data"]["ders"];
$utime=$_SESSION["data"]["utime"];
if (isset($ders)) {
    $GLOBALS["ders"]=$ders;
}

//$starh=$_POST["starh"];
/*
  $Id$ Yavuz Yasin D�zg�n

  PHP Tabanl� Optik Okuyucu ve Optik Form Scripti, A��k Kaynak Optik Okuyucu ��z�m�d�r
  http://www.duzgun.com

  Copyright (c) 2011 Duzgun.com

  Released under the GNU General Public License
*/
ini_set("memory_limit","800M");//due to image processing we have to increase the memory limit
ini_set("max_execution_time","30000"); // again due to imnage processing

error_reporting(E_ALL & ~E_NOTICE);
include("require/constants.php");
include("optikgorsel.php");
$dbh=mysql_connect($GLOBALS['db_hostname'], $GLOBALS['db_username'], $GLOBALS['db_password']) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ($GLOBALS['db_dbname']);
mysql_query("SET NAMES UTF8");
$GLOBALS['utime'] = "'".Date('Y-m-d H:i:s')."'";
$GLOBALS['invalid'] = 0;
$GLOBALS['showpoints'] = 0;
$GLOBALS['debug'] = 0;
$showimage = 0;
$GLOBALS['tracepoint'] = 0;
$GLOBALS['showlabel'] = 0;


$GLOBALS['xdrift']= 0; //how much is image drifted in x direction
$GLOBALS['ydrift']= 0;//how much is image drifted in y direction

$GLOBALS['V_xtl'] = 0;
$GLOBALS['V_ytl'] = 0;

$GLOBALS['V_xtr'] = 0;
$GLOBALS['V_ytr'] = 0;

$GLOBALS['V_xbl'] = 0;
$GLOBALS['V_ybl'] = 0;

$GLOBALS['V_xbr'] = 0;
$GLOBALS['V_ybr'] = 0;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_GET['auto'])){
	$fileurl = $_POST['userfile'];
	$GLOBALS['imgid'] = $_POST['imgid'];
	$auto = $_GET['auto'];
}
if($auto)
	$img = 'upload\\'.$fileurl.'';
else{
	$img = $_FILES['userfile']['tmp_name'];
}
$showimage = 1;
reader($img);
}
else if(isset($_GET['show']))
{
echo $GLOBALS['show'];
}
else
{
$showimage = 1;
$path = str_replace('\\','/',getcwd());
if ($dh = opendir($path.'/formlar/a5')) {
$files = array();
while (($file = readdir($dh)) !== false) {
if (substr($file, strlen($file) - 4) == '.jpg') {
//array_push($files, $file);
$sonuc = reader($path."/formlar/a5/".$file,$file,$path."/formlar/a5/reader/");
//$fp = fopen("C:/inetpub/wwwroot/wwwroot/omr/formlar/a5/reader/".$file.'.txt', 'w');
//fwrite($fp, serialize($sonuc));
//fclose($fp);
echo "Read ".$path."/formlar/a5/".$file."\r\n";
}
}
closedir($dh);
}

}

function reader($img,$filename='',$readerdir='')
{
global $showimage;

$image = imagecreatefromjpeg($img);

$GLOBALS['transform'] = 0;
$GLOBALS['rotated'] = 0;

$cetvel = array(array(30,300),array(30,1320),array(250,50),array(850,50),array(250,1550),array(850,1550),array(1140,300),array(1140,1320));

//setpixelfull($image,$cetvel);

$radian = checkalign($image,$cetvel,false);
$degree = $radian* (180/3.141592654);

$bgc = imagecolorallocate($image, 255, 255, 255);
$image = imagerotate($image, -$degree, $bgc);

$fgcolor = imagecolorallocate($image,00,00,255);
imagestring($image, 2, 100, 100, $GLOBALS['ver_line'], $fgcolor);

//setpixelfull($image,$cetvel);

$GLOBALS['rotated'] = 1;

getcorner($image,$cetvel);

$GLOBALS['transform'] = 1;

$ax =693;  //     59
$ay =597;  //   123
$point = transform($ax, $ay);

imagestring($image, 2, 200, 45,$point[0]."x".$point[1], $fgcolor);

$ismark = ismarkcircle($image,$point[0],$point[1],13);
imagestring($image, 2, 300, 45,$ismark[0]." - ".$ismark[1]." - ".$ismark[2], $fgcolor);

imagefilledcircle($image,$point[0],$point[1],13,$ismark[0]);

$Form = array();
//kitap�ik t�r�

$kitapcikTuru['A'] = array(742, 213);
$kitapcikTuru['B'] = array(820, 213);
$kitapcik = "";
foreach ($kitapcikTuru as $key=>$val)
{
$point = transform($val[0], $val[1]);

$ismark = ismarkcircle($image,$point[0],$point[1],13);
$Form['kitapcikturu'][$key] = $ismark[0]." - ".$ismark[1]." - ".$ismark[2];
if($ismark[0]==1)$kitapcik = $key;
imagefilledcircle($image,$point[0],$point[1],13,$ismark[0]);
}


// numara basla
$leftspace = 915;
$topspace  = 280;
$horizontal=$topspace;
$horizontal+=5;
$Numara[0][1] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[0][2] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[0][3] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[0][4] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[0][5] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[0][6] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[0][7] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[0][8] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[0][9] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[0][0] = array($leftspace, $horizontal);


$leftspace = 950;
$topspace  = 280;
$horizontal=$topspace;
$horizontal+=5;
$Numara[1][1] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[1][2] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[1][3] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[1][4] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[1][5] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[1][6] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[1][7] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[1][8] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[1][9] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[1][0] = array($leftspace, $horizontal);


$leftspace = 984;
$topspace  = 280;
$horizontal=$topspace;
$horizontal+=5;
$Numara[2][1] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[2][2] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[2][3] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[2][4] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[2][5] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[2][6] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[2][7] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[2][8] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[2][9] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[2][0] = array($leftspace, $horizontal);



$leftspace = 1018;
$topspace  = 280;
$horizontal=$topspace;
$horizontal+=5;
$Numara[3][1] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[3][2] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[3][3] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[3][4] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[3][5] = array($leftspace, $horizontal);
$horizontal+=35;
$Numara[3][6] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[3][7] = array($leftspace, $horizontal);
$horizontal+=34;
$Numara[3][8] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[3][9] = array($leftspace, $horizontal);
$horizontal+=33;
$Numara[3][0] = array($leftspace, $horizontal);

$ogrnumstr = "";
$ogrnum = 0;
for($i=0;$i<count($Numara);$i++)
{
$selectnum = 0;
for($j=0;$j<count($Numara[$i]);$j++)
{
$point = transform($Numara[$i][$j][0], $Numara[$i][$j][1]);

$ismark = ismarkcircle($image,$point[0],$point[1],13);
$Form['numara'][$i][$j] = $ismark[0]." - ".$ismark[1]." - ".$ismark[2];
if($ismark[0]==1)$selectnum = $j;
imagefilledcircle($image,$point[0],$point[1],13,$ismark[0]);
}
$ogrnumstr = $ogrnumstr.$selectnum;
}
$ogrnum = (int)$ogrnumstr;
$sql = "INSERT INTO `d_reader` (`num`, `file`, `puan`, `utime`) VALUES ('".$ogrnum."', '".$filename."', 0, ".$GLOBALS['utime'].");";
mysql_query($sql) or die(mysql_error());


// T�RK�E
$leftspace = 108;
$topspace = 700;
$extraAspace =0;
$extraBspace =0;
$extraCspace =0;
$extraDspace =0;
$horizontal  =$topspace;
$horizontal +=25;
$Cevaplar[0]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[0]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[0]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[0]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[1]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[1]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[1]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[1]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[2]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[2]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[2]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[2]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[3]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[3]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[3]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[3]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[4]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[4]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[4]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[4]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=34;
$Cevaplar[5]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[5]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[5]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[5]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=34;
$Cevaplar[6]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[6]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[6]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[6]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=34;
$Cevaplar[7]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[7]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[7]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[7]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=34;
$Cevaplar[8]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[8]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[8]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[8]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=33;
$Cevaplar[9]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[9]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[9]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[9]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=34;
$Cevaplar[10]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[10]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[10]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[10]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[11]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[11]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[11]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[11]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=36;
$Cevaplar[12]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[12]['B'] = array($extraBspace+$leftspace+53, $horizontal);
$Cevaplar[12]['C'] = array($extraCspace+$leftspace+88, $horizontal);
$Cevaplar[12]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[13]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[13]['B'] = array($extraBspace+$leftspace+54, $horizontal);
$Cevaplar[13]['C'] = array($extraCspace+$leftspace+89, $horizontal);
$Cevaplar[13]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[14]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[14]['B'] = array($extraBspace+$leftspace+54, $horizontal);
$Cevaplar[14]['C'] = array($extraCspace+$leftspace+89, $horizontal);
$Cevaplar[14]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[15]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[15]['B'] = array($extraBspace+$leftspace+54, $horizontal);
$Cevaplar[15]['C'] = array($extraCspace+$leftspace+89, $horizontal);
$Cevaplar[15]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=34;
$Cevaplar[16]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[16]['B'] = array($extraBspace+$leftspace+54, $horizontal);
$Cevaplar[16]['C'] = array($extraCspace+$leftspace+89, $horizontal);
$Cevaplar[16]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=35;
$Cevaplar[17]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[17]['B'] = array($extraBspace+$leftspace+54, $horizontal);
$Cevaplar[17]['C'] = array($extraCspace+$leftspace+89, $horizontal);
$Cevaplar[17]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=34;
$Cevaplar[18]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[18]['B'] = array($extraBspace+$leftspace+54, $horizontal);
$Cevaplar[18]['C'] = array($extraCspace+$leftspace+89, $horizontal);
$Cevaplar[18]['D'] = array($extraDspace+$leftspace+123, $horizontal);
$horizontal +=34;
$Cevaplar[19]['A'] = array($extraAspace+$leftspace+20, $horizontal);
$Cevaplar[19]['B'] = array($extraBspace+$leftspace+54, $horizontal);
$Cevaplar[19]['C'] = array($extraCspace+$leftspace+89, $horizontal);
$Cevaplar[19]['D'] = array($extraDspace+$leftspace+123, $horizontal);

for($i=0;$i<count($Cevaplar);$i++)
{
$dersadi=$GLOBALS["ders"];
//$utime=$GLOBALS["utime"];
$cevap = array();
foreach($Cevaplar[$i] as $key=>$val)
{
$point = transform($val[0], $val[1]);

$ismark = ismarkcircle($image,$point[0],$point[1],13);
//$Form['turkce'][$i][$key] = $ismark[0]." - ".$ismark[1]." - ".$ismark[2];
$cevap[$key] = $ismark[0];
imagefilledcircle($image,$point[0],$point[1],13,$ismark[0]);
}
$sql = "INSERT INTO `d_cevaplar` (`id`, `ogrnum`, `ders`, `kitap`, `cevapnum`, `A`, `B`, `C`, `D`, `utime`) VALUES (NULL, '".$ogrnum."', '".$dersadi."', '".$kitapcik."', '".($i+1)."', '".$cevap['A']."', '".$cevap['B']."', '".$cevap['C']."', '".$cevap['D']."', ".$GLOBALS['utime'].");";
mysql_query($sql) or die(mysql_error());
}


// MATEMATIK


if($showimage){
if($filename !=''){
ob_start();
imagejpeg($image);
$i = ob_get_clean();
$fp = fopen($readerdir.$filename, 'w');
fwrite($fp, $i);
fclose($fp);
}
else
{
header('Content-type: image/jpeg');
imagejpeg($image);
}
}
return $Form;
}

function setpixelfull(&$image,$cetvel){
setpixel($image,$cetvel[0][0],$cetvel[0][1]);
setpixel($image,$cetvel[1][0],$cetvel[1][1]);
setpixel($image,$cetvel[2][0],$cetvel[2][1]);
setpixel($image,$cetvel[3][0],$cetvel[3][1]);
setpixel($image,$cetvel[4][0],$cetvel[4][1]);
setpixel($image,$cetvel[5][0],$cetvel[5][1]);
setpixel($image,$cetvel[6][0],$cetvel[6][1]);
setpixel($image,$cetvel[7][0],$cetvel[7][1]);
}


function setpixel(&$image,$px,$py){
$img = imagecreatetruecolor(100,100);
$red = imagecolorallocate($img, 255, 0, 0);
$i =0;
$j =0;
for ($j = 0; $j < 20; $j++) {
for ($i = 0; $i < 20; $i++) {
imagesetpixel($image, $px+$i,$py+$j, $red);
}
}
imagestring($image, 2, ($px+$i+2), $py, $px."x".$py, $red);
}

function setpixelone(&$image,$px,$py){
$img = imagecreatetruecolor(100,100);
$red = imagecolorallocate($img, 255, 0, 0);
$i =0;
$j =0;
for ($j = 0; $j < 5; $j++) {
for ($i = 0; $i < 5; $i++) {
imagesetpixel($image, $px+$i,$py+$j, $red);
}
}
imagestring($image, 2, ($px+$i+2), $py, $px."x".$py, $red);
}

function setpixeloneup(&$image,$px,$py){
$img = imagecreatetruecolor(100,100);
$red = imagecolorallocate($img, 255, 0, 0);
$i =0;
$j =0;
for ($j = 0; $j < 5; $j++) {
for ($i = 0; $i < 5; $i++) {
imagesetpixel($image, $px+$i,$py+$j, $red);
}
}
imagestringup($image, 2, $px-5, $py-5, $px."x".$py, $red);
}

function imagefilledcircle(&$im, $cx, $cy, $r,$renk=0) {
$fgcolor = imagecolorallocate($im,00,00,255);
$fgcolorred = imagecolorallocate($im,255,00,00);
for ( $x = $cx - $r; $x <= $cx + $r; $x++ ) {
for ( $y = $cy - $r; $y <= $cy + $r; $y++ ) {
$rx = $x - $cx;
$ry = $y - $cy;
$or = sqrt(( $rx == 0 ? 0 : pow($rx + 0.5*abs($rx)/$rx, 2) ) + ( $ry == 0 ? 0 : pow($ry + 0.5*abs($ry)/$ry, 2) ));
if ( $or <= $r ) {
if($renk!=0)
//imagesetpixel($im, $x, $y, $fgcolor);
//else
imagesetpixel($im, $x, $y, $fgcolorred);
}
}
}
}

function DrawLine(&$im,$x1,$y1,$x2,$y2)
{
$fgcolor = imagecolorallocate($im, 255, 0, 0);
for ($x=$x1; $x<=$x2; $x++) {
$y = $y1 +  ($x-$x1)*($y2-$y1)/($x2-$x1);
imagesetpixel($im, $x, round($y), $fgcolor);
}
}

function ismarkcircle(&$image, $cx, $cy, $r) {
$w = 0;
$b = 0;
if ($image) {
for ( $x = $cx - $r; $x <= $cx + $r; $x++ ) {
for ( $y = $cy - $r; $y <= $cy + $r; $y++ ) {
$rx = $x - $cx;
$ry = $y - $cy;
$or = sqrt(( $rx == 0 ? 0 : pow($rx + 0.5*abs($rx)/$rx, 2) ) + ( $ry == 0 ? 0 : pow($ry + 0.5*abs($ry)/$ry, 2) ));
if ( $or <= $r ) {
if(isblack($image,$x,$y))
$b = $b + 1;
else
$w = $w + 1;
}
}
}
if(($w) > $b)
return array(0,$w,$b);   //0
else
return array(1,$w,$b);   //1
}
}

function isblack(&$image,$x_old,$y_old){
if ($image) {
$x = $x_old;
$y = $y_old;

/*
if($GLOBALS['transform'] == 1){
$point = transform($x_old, $y_old);
$x = $point[0];
$y = $point[1];
}
else{
$x = $x_old;
$y = $y_old;
}*/
$thiscol = imagecolorat($image, $x, $y);
$rgb = imagecolorsforindex($image, $thiscol);
$red = $rgb['red'];
$green = $rgb['green'];
$blue = $rgb['blue'];
if($red > 200 && $blue > 200 && $green > 200)
return 0;
else
return 1;
}
}

function transcal($x,$x1,$x2,$x3,$x4,$y1,$y2,$y3,$y4){
$y  = $y1+($x-$x1)*($y3-$y1)/($x3-$x1);
$H  = sqrt(pow(($x3-$x1),2)+pow(($y3-$y1),2));
$HV = sqrt(pow(($x4-$x2),2)+pow(($y4-$y2),2));
$Hm = sqrt(pow(($x-$x1),2)+pow(($y-$y1),2));
$HVm = $HV*$Hm/$H;
$Vx = $HVm/sqrt((1+(pow(($y4-$y2),2)/pow(($x4-$x2),2))))+$x2;
$Vy = $y2+($Vx-$x2)*($y4-$y2)/($x4-$x2);
return array ($y,($Vx-$x),($Vy-$y));
}

function transform($x, $y){
$Tcalc = transcal($x,$GLOBALS['Xtl'],($GLOBALS['V_tl_x'] + $GLOBALS['Xtl']),$GLOBALS['Xtr'],($GLOBALS['V_tr_x'] + $GLOBALS['Xtr']),$GLOBALS['Ytl'],($GLOBALS['V_tl_y'] + $GLOBALS['Ytl']),$GLOBALS['Ytr'],($GLOBALS['V_tr_y'] + $GLOBALS['Ytr']));
$Yt  = $Tcalc[0];
$Vtx = $Tcalc[1];
$Vty = $Tcalc[2];
$Tcalc = transcal($x,$GLOBALS['Xbl'],($GLOBALS['V_bl_x'] + $GLOBALS['Xbl']),$GLOBALS['Xbr'],($GLOBALS['V_br_x'] + $GLOBALS['Xbr']),$GLOBALS['Ybl'],($GLOBALS['V_bl_y'] + $GLOBALS['Ybl']),$GLOBALS['Ybr'],($GLOBALS['V_br_y'] + $GLOBALS['Ybr']));
$Yb  = $Tcalc[0];
$Vbx = $Tcalc[1];
$Vby = $Tcalc[2];
$Vx = ($Vtx + $Vbx) /2;
$Vy = ( $Vby*($y - $Yt) + $Vty*($Yb - $y) )/($Yb - $Yt);
$points = array( round($Vx + $x), round($Vy + $y));
return $points;
}

function checkalign($image,$cetvel,$cordinat){
// $refx = array( $en, $GLOBALS['ref_line_v_end'] );//vertical refernce line (start, end)
//$refy = array( $boy, $GLOBALS['ref_line_h_end'] );//horozontal refernce line (start, end)
$maxlimit = 300;
//Bu b�l�mde ilk dikey kenarinda �st nokta (x, y) rasgele bulur

$x = $cetvel[0][0];
$y = $cetvel[0][1];

$continue = 1;
$limit = $maxlimit;
while($continue && $limit){
$limit --;
if(!isblack($image,$x,$y)){
$x = $x + 2;
}
else{
$x = $x - 1;
if(isblack($image,$x,$y)){
$x = $x + 1;
if(isblack($image,$x,$y))
$continue = 0;
}
}
}
$xT = $x -1;
$yT = $y;

if($cordinat)setpixelone($image,$xT,$yT);

// Bu b�l�m ilk dikey kenar dip noktasinin (x, y) rasgele bulur

$x = $cetvel[1][0];
$y = $cetvel[1][1];

$continue = 1;
$limit = $maxlimit;
while($continue && $limit){
$limit--;
if(!isblack($image,$x,$y)){
$x = $x + 2;
}
else{
$x = $x - 1;
if(isblack($image,$x,$y)){
$x = $x + 1;
if(isblack($image,$x,$y))
$continue = 0;
}
}

}
$xB = $x -1;
$yB = $y;

if($cordinat)setpixelone($image,$xB,$yB);

// Bu b�l�m fisrt yatay kenarina birakilan noktanin (x, y) Randon bulur

$x = $cetvel[2][0];
$y = $cetvel[2][1];

$continue = 1;
$limit = $maxlimit;
while($continue && $limit){
$limit--;
if(!isblack($image,$x,$y)){
$y = $y + 2;
}
else{
$y = $y - 1;
if(isblack($image,$x,$y)){
$y = $y + 1;
if(isblack($image,$x,$y))
$continue = 0;
}
}
}

$xL = $x;
$yL = $y -1;
if($cordinat)setpixelone($image,$xL,$yL);
//This part finds the random (x,y) of right point on first horizontal edge
$x = $cetvel[3][0];
$y = $cetvel[3][1];
$continue = 1;
$limit =$maxlimit;
while($continue && $limit){
$limit--;
if(!isblack($image,$x,$y)){
$y = $y + 2;
}
else{
$y = $y - 1;
if(isblack($image,$x,$y)){
$y = $y + 1;
if(isblack($image,$x,$y))
$continue = 0;
}
}
}
$xR = $x;
$yR = $y -1;
if($cordinat)setpixelone($image,$xR,$yR);

$dx_v = $xB - $xT;
$dy_v = $yB - $yT;
$dx_h = $xR - $xL;
$dy_h = $yL - $yR;
if(!$GLOBALS['rotated']){
$theta_v = atan( $dx_v / $dy_v );	//tilt of vertical line
$theta_h = atan( $dy_h / $dx_h ); //tilt of horizontal line
$evl_theta = ($theta_v + $theta_h)/2; // average tilt
}

//	$GLOBALS['x_ref_drift'] = 3;
//
//	$GLOBALS['y_ref_drift'] = 2;
//
//	$GLOBALS['xdrift']= ($xB + $xT)/2 - $refx[0] - $GLOBALS['x_ref_drift'];
//
//	$GLOBALS['ydrift']= ($yR + $yL)/2 - $refy[0] - $GLOBALS['y_ref_drift'];
//
if($GLOBALS['rotated']){
$GLOBALS['ver_line'] = ($xB + $xT)/2;
$GLOBALS['hor_line'] = ($yR + $yL)/2;
$GLOBALS['xdrift'] = $GLOBALS['ver_line'] - $GLOBALS['ref_line_v_start'];
$GLOBALS['ydrift'] = $GLOBALS['hor_line'] - $GLOBALS['ref_line_h_start'];
}
if(!$GLOBALS['rotated']){
$theta = $evl_theta - $GLOBALS['ref_theta'];
return $theta;
}
}

function findcolor($image, $x_start, $y_start, $dire, $color, $limit){

$continue = 1;
$end = $limit;

$x = $x_start;
$y = $y_start;

if($color =="black")
$c = 1;
if($color =="white")
$c = 0;

if( $dire == "x" || $dire == "-x" )
$axis = 1;
if( $dire == "y" || $dire == "-y" )
$axis = 0;

if( $dire == "x" || $dire == "y" )
$dir = 1;
if( $dire == "-x" || $dire == "-y" )
$dir = -1;

while($continue && $end){
$end --;

$b = isblack($image,$x,$y);
$d = (!$b)*($c) + ($b)*(!$c) ;
if($d){

if($axis)
$x = $x + 2*$dir;
else
$y = $y + 2*$dir;
}
else{

if($axis)
$x = $x - (1*$dir);
else
$y = $y - (1*$dir);

$b = isblack($image,$x,$y);
if( ( (!$b)*(!$c) + ($b)*($c) ) ){

if($axis)
$x = $x + (2*$dir);
else
$y = $y + (2*$dir);

$b = isblack($image,$x,$y);
if( ( (!$b)*(!$c) ) + ( ($b)*($c) ) )
$continue = 0;
}
}

}
if(!$end)
{
$point = array(null, null);
}
else
{
if($axis)
$x = $x - (2*$dir);
else
$y = $y - (2*$dir);

//echo "<br/>End: ".$end;
$point = array($x, $y);
}
return $point;

}

function getcorner($image,$cetvel){
$limit = 300;
$minilimit = 10;
$distance = 8;
$stepbyspace = 20;

/*
         B                    F
      +--------------------------+
  A   |                          |   E
      |                          |
      |                          |
      |                          |
      |                          |
      |                          |
  C   |                          |   G
      +--------------------------+
          D                   H
*/

/*(A)*/$tl1 = findcolor($image, $cetvel[0][0], $cetvel[0][1], "x", "black", $limit);
$temp[0] = $tl1[0];
$temp[1] = $tl1[1];
$A = array();
for($k=1;$k<50;$k=$k+1)
{
$x =$temp[0];
$y =$temp[1];
$temp = findcolor($image, $x-$distance, $y-$stepbyspace, "x", "black", $minilimit);
if($temp[0] == null && $temp[1] == null)
{
$temp[0] = $x;
$temp[1] = $y;
break;
}
else
{
$A[0][] = $temp[0];
$A[1][] = $temp[1];
setpixelone($image,$temp[0],$temp[1]);
}
}
$Ax = $temp[0];
$Ay = $temp[1];

/*(B)*/$tl2 = findcolor($image, $cetvel[2][0], $cetvel[2][1], "y", "black", $limit);
$temp[0] = $tl2[0];
$temp[1] = $tl2[1];
$B = array();
for($k=1;$k<50;$k=$k+1)
{
$x =$temp[0];
$y =$temp[1];
$temp = findcolor($image, $x-$stepbyspace, $y-$distance, "y", "black", $minilimit);
if($temp[0] == null && $temp[1] == null)
{
$temp[0] = $x;
$temp[1] = $y;
break;
}
else
{
$B[0][] = $temp[0];
$B[1][] = $temp[1];
setpixeloneup($image,$temp[0],$temp[1]);
}
}
$Bx = $temp[0];
$By = $temp[1];

/*(C)*/$bl2 = findcolor($image, $cetvel[1][0], $cetvel[1][1], "x", "black", $limit);
$temp[0] = $bl2[0];
$temp[1] = $bl2[1];
$C = array();
for($k=1;$k<50;$k=$k+1)
{
$x =$temp[0];
$y =$temp[1];
$temp = findcolor($image, $x-$distance, $y+$stepbyspace, "x", "black", $minilimit);
if($temp[0] == null && $temp[1] == null)
{
$temp[0] = $x;
$temp[1] = $y;
break;
}
else
{
$C[0][] = $temp[0];
$C[1][] = $temp[1];
setpixelone($image,$temp[0],$temp[1]);
}
}
$Cx = $temp[0];
$Cy = $temp[1];

/*(D)*/$bl1 = findcolor($image, $cetvel[4][0], $cetvel[4][1], "-y", "black", $limit);
$temp[0] = $bl1[0];
$temp[1] = $bl1[1];
$D = array();
for($k=1;$k<50;$k=$k+1)
{
$x =$temp[0];
$y =$temp[1];
$temp = findcolor($image, $x-$stepbyspace, $y+$distance, "-y", "black", $minilimit);
if($temp[0] == null && $temp[1] == null)
{
$temp[0] = $x;
$temp[1] = $y;
break;
}
else
{
$D[0][] = $temp[0];
$D[1][] = $temp[1];
setpixeloneup($image,$temp[0],$temp[1]);
}
}
$Dx = $temp[0];
$Dy = $temp[1];

/*(E)*/$tr2 = findcolor($image, $cetvel[6][0], $cetvel[6][1], "-x", "black", $limit);
$temp[0] = $tr2[0];
$temp[1] = $tr2[1];
$E = array();
for($k=1;$k<50;$k=$k+1)
{
$x =$temp[0];
$y =$temp[1];
$temp = findcolor($image, $x+$distance, $y-$stepbyspace, "-x", "black", $minilimit);
if($temp[0] == null && $temp[1] == null)
{
$temp[0] = $x;
$temp[1] = $y;
break;
}
else
{
$E[0][] = $temp[0];
$E[1][] = $temp[1];
setpixelone($image,$temp[0],$temp[1]);
}
}
$Ex = $temp[0];
$Ey = $temp[1];

/*(F)*/$tr1 = findcolor($image, $cetvel[3][0], $cetvel[3][1], "y", "black", $limit);
$temp[0] = $tr1[0];
$temp[1] = $tr1[1];
$F = array();
for($k=1;$k<50;$k=$k+1)
{
$x =$temp[0];
$y =$temp[1];
$temp = findcolor($image, $x+$stepbyspace, $y-$distance, "y", "black", $minilimit);
if($temp[0] == null && $temp[1] == null)
{
$temp[0] = $x;
$temp[1] = $y;
break;
}
else
{
$F[0][] = $temp[0];
$F[1][] = $temp[1];
setpixeloneup($image,$temp[0],$temp[1]);
}
}
$Fx = $temp[0];
$Fy = $temp[1];

/*(G)*/$br1 = findcolor($image, $cetvel[7][0], $cetvel[7][1], "-x", "black", $limit);
$temp[0] = $br1[0];
$temp[1] = $br1[1];
setpixelone($image,$temp[0],$temp[1]);
$G = array();
for($k=1;$k<50;$k=$k+1)
{
$x =$temp[0];
$y =$temp[1];
$temp = findcolor($image, $x+$distance, $y+$stepbyspace, "-x", "black", $minilimit);
if($temp[0] == null && $temp[1] == null)
{
$temp[0] = $x;
$temp[1] = $y;
break;
}
else
{
$G[0][] = $temp[0];
$G[1][] = $temp[1];
setpixelone($image,$temp[0],$temp[1]);
}
}
$Gx = $temp[0];
$Gy = $temp[1];

/*(H)*/$br2 = findcolor($image, $cetvel[5][0], $cetvel[5][1], "-y", "black", $limit);
$temp[0] = $br2[0];
$temp[1] = $br2[1];
$H = array();
for($k=10;$k<300;$k=$k+5)
{
$x =$temp[0];
$y =$temp[1];
$temp = findcolor($image, $x+$stepbyspace, $y+$distance, "-y", "black", $minilimit);
if($temp[0] == null && $temp[1] == null)
{
$temp[0] = $x;
$temp[1] = $y;
break;
}
else
{
$H[0][] = $temp[0];
$H[1][] = $temp[1];
setpixeloneup($image,$temp[0],$temp[1]);
}
}
$Hx = $temp[0];
$Hy = $temp[1];

//Top left corner
//$tl = findcolor($image, $tl1[0], $tl1[1], "-y", white, $limit);
//$Xtl = $tl1[0];
//$Ytl = $tl2[1];
$Xtl = $Ax;
$Ytl = $By;

//Bottom left corner
//$bl = findcolor($image, $bl1[0], $bl1[1], "-x", white, $limit);
//$Xbl = $bl2[0];
//$Ybl = $bl1[1];
$Xbl = $Cx;
$Ybl = $Dy;

//Top right corner
//$tr = findcolor($image,$tr1[0], $tr1[1], "x", white, $limit);
//$Xtr = $tr2[0];
//$Ytr = $tr1[1];
$Xtr = $Ex;
$Ytr = $Fy;

//Bottom Right corner
//$br = findcolor($image, $br1[0], $br1[1], "y", white, $limit);
//$Xbr = $br1[0];
//$Ybr = $br2[1];
$Xbr = $Gx;
$Ybr = $Hy;
/*Orjinal Hesap Basla*/
$red = imagecolorallocate($image, 255, 0, 0);
imagestring($image, 2, 10, 0, "Photoshop Skew Orjinal", $red);
imagestring($image, 2, 10, 10, "ust Y = ".($Ytl-$Ytr)." px", $red);
imagestring($image, 2, 10, 20, "sol X = ".($Xtl-$Xbl)." px", $red);
imagestring($image, 2, 10, 30, "alt Y = ".($Ybl-$Ybr)." px", $red);
imagestring($image, 2, 10, 40, "sag X = ".($Xtr-$Xbr)." px", $red);
/*Orjinal Hesap Bitis*/
setpixelone($image,$Xtl,$Ytl);
setpixelone($image,$Xtr,$Ytr);
setpixelone($image,$Xbl,$Ybl);
setpixelone($image,$Xbr,$Ybr);

$GLOBALS['SpaceTop'] = ($Ytl<$Ytr)?$Ytl:$Ytr;
$GLOBALS['SpaceLeft'] = ($Xtl<$Xtr)?$Xtl:$Xtr;
$GLOBALS['SpaceBottom'] = (($Ybl>$Ybr)?$Ybl:$Ybr)-$GLOBALS['SpaceTop'];
$GLOBALS['SpaceRight'] = (($Xbl>$Xbr)?$Xbl:$Xbr)-$GLOBALS['SpaceLeft'];

//imagestring($image, 2, 200, 15, "Xtl = ".$Xtl.", Ytl = ".$Ytl.", Xbl = ".$Xbl.", Ybl = ".$Ybl.", Xtr = ".$Xtr.", Ytr = ".$Ytr.", Xbr = ".$Xbr.", Ybr = ".$Ybr, $red);
//imagestring($image, 2, 200, 30, "GLOBALS Xtl = ".$GLOBALS['Xtl'].", Ytl = ".$GLOBALS['Ytl'].", Xbl = ".$GLOBALS['Xbl'].", Ybl = ".$GLOBALS['Ybl'].", Xtr = ".$GLOBALS['Xtr'].", Ytr = ".$GLOBALS['Ytr'].", Xbr = ".$GLOBALS['Xbr'].", Ybr = ".$GLOBALS['Ybr'], $red);

$GLOBALS['V_tl_x'] = $Xtl - $GLOBALS['Xtl'];
$GLOBALS['V_tl_y'] = $Ytl - $GLOBALS['Ytl'];
$GLOBALS['V_tr_x'] = $Xtr - $GLOBALS['Xtr'];
$GLOBALS['V_tr_y'] = $Ytr - $GLOBALS['Ytr'];
$GLOBALS['V_bl_x'] = $Xbl - $GLOBALS['Xbl'];
$GLOBALS['V_bl_y'] = $Ybl - $GLOBALS['Ybl'];
$GLOBALS['V_br_x'] = $Xbr - $GLOBALS['Xbr'];
$GLOBALS['V_br_y'] = $Ybr - $GLOBALS['Ybr'];
//imagestring($image, 2, 200, 0, "V_tl_x = ".$GLOBALS['V_tl_x'].", V_tl_y = ".$GLOBALS['V_tl_y'].", V_tr_x = ".$GLOBALS['V_tr_x'].", V_tr_y = ".$GLOBALS['V_tr_y'].", V_bl_x = ".$GLOBALS['V_bl_x'].", V_bl_y = ".$GLOBALS['V_bl_y'].", V_br_x = ".$GLOBALS['V_br_x'].", V_br_y = ".$GLOBALS['V_br_y'], $red);
}
?>