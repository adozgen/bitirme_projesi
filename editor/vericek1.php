<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>tüm derslere ait sorular</title>
</head>
<body bgcolor="">
    <?php
    include 'header.php';
 mysql_connect("localhost","root","");
 mysql_select_db("weblabapp");
 mysql_query("SET NAMES UTF8");
?>
    <center><table width="200" border="1" cellpadding="0" align="center">
        <tr>
            <b><h2><center>TÜM DUYURULAR</center></h2></b>
        </tr>
        <?php 
        $sayici=1;
        $vericek= mysql_query("select * from duyurular");
        while ($kayit = mysql_fetch_array($vericek)) {
            $dersadi=$kayit["duyuru"];
            $mdladi=$kayit["dkonu"];
            $konuadi=$kayit["dtarih"];
    
        
        ?>
        <tr>
            <td><strong><center> duyuru no </center></strong></td>
    <td><strong><center> duyuru içeriği </center></strong></td>
    <td><strong><center> duyuru konusu </center></strong></td>
    <td><strong><center> dtarihi </center></strong></td>
    <td><strong><center> Düzenleme_İşlemleri </center></strong></td>
        </tr>
        <tr>
            <td><center><?php echo $sayici?></center></td>
    <td><center> <?php echo $dersadi?> </center></td>
    <td><center> <?php echo $mdladi?> </center></td>
    <td><center> <?php echo $konuadi?> </center></td>
    <td>
        <a href="http://localhost/MVC/sorular/soruekleme/"> Düzenle || </a>
        <a href="http://localhost/MVC/sorular/sorusil/">  Sil  </a>
    </td>
        </tr>
        <?php 
        $sayici++;
        
        } ?>
    </table></center>

	
</body>
</html>
