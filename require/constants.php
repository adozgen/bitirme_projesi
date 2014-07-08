<?php
/*
  $Id$ Yavuz Yasin D�zg�n

  PHP Tabanl� Optik Okuyucu ve Optik Form Scripti, A��k Kaynak Optik Okuyucu ��z�m�d�r
  http://www.duzgun.com

  Copyright (c) 2011 Duzgun.com

  Released under the GNU General Public License
*/
//DATABASE CONNECTION INFO

	
$GLOBALS['db_hostname']="localhost";
$GLOBALS['db_username']="root";
$GLOBALS['db_password']="";
$GLOBALS['db_dbname']="mvc";

$GLOBALS['string_length'] = 12;
$GLOBALS['db']="mysql"; // valid option are mysql and odbc

$GLOBALS['header'] = "<html>\n
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>\n
<head>\n
<link href='styles/form.css' rel='stylesheet' type='text/css'>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />\n";

$GLOBALS['show'] ="<html>
<head><title>OMR</title></head>
<body>
<form enctype='multipart/form-data' name='form' action='a5reader.php?auto=' method='post'>
<input type='hidden' name='MAX_FILE_SIZE' value='2000000' /><table width='600'>
<tr><td><label>File:<input type='file' name='userfile'  /></label></td></tr>
<tr><td><input type='submit' name ='submit' value='submit' /></td></tr></table></form></body></html>";

$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	
$url = "http://" . $host . $uri;

//Parameters for geting ID

$GLOBALS['idbox_height'] = 12;
$GLOBALS['idbox_length'] = 11.6;

$GLOBALS['idbox_dist_h'] = 28;
$GLOBALS['idbox_dist_v'] = 11;

$GLOBALS['ref_line_h_start'] = 373;
$GLOBALS['ref_line_h_end'] = 377;

$GLOBALS['ref_line_v_start'] = 236;
$GLOBALS['ref_line_v_end'] = 240;

$GLOBALS['idbox_start_x'] = 1121;
$GLOBALS['idbox_start_y'] = 449;

$GLOBALS['form_length'] = 1032;
$GLOBALS['form_height'] = 1324;
$GLOBALS['ref_theta'] = 0;//0.00145348427787;
//B1

//$GLOBALS['optbox_start_x'] = 10;
//$GLOBALS['optbox_start_y'] = 11;

$GLOBALS['dist_optbox_ref_x'] = 96;
$GLOBALS['dist_optbox_ref_y'] = 189;

/*
$GLOBALS['Xtl'] = 113;//270;
$GLOBALS['Ytl'] = 133;//390;

$GLOBALS['Xtr'] = 1543;//1575;
$GLOBALS['Ytr'] = 133;//391;

$GLOBALS['Xbl'] = 113;//272;
$GLOBALS['Ybl'] = 2223;//1911;

$GLOBALS['Xbr'] = 1543;//1568;
$GLOBALS['Ybr'] = 2223;//1906;
*/
/*
$GLOBALS['Xtl'] = 144;//270;
$GLOBALS['Ytl'] = 72;//390;

$GLOBALS['Xtr'] = 1555;//1575;
$GLOBALS['Ytr'] = 72;//391;

$GLOBALS['Xbl'] = 144;//272;
$GLOBALS['Ybl'] = 2127;//1911;

$GLOBALS['Xbr'] = 1555;//1568;
$GLOBALS['Ybr'] = 2127;//1906;

*/

//a5
$GLOBALS['Xtl'] = 59;//270;     352
$GLOBALS['Ytl'] = 123;//390;   143

$GLOBALS['Xtr'] = 1091;//1575;  1383
$GLOBALS['Ytr'] = 122;//391;  143

$GLOBALS['Xbl'] = 60;//272;  353
$GLOBALS['Ybl'] = 1446;//1911;   1463

$GLOBALS['Xbr'] = 1092;//1568;  1384
$GLOBALS['Ybr'] = 1445;//1906;  1463


?>
