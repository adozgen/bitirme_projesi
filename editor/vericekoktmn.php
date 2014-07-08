<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>tüm derslere ait sorular</title>
</head>
<body bgcolor="">
    <?php
    session_start();
    include 'headeroktmn.php';
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
?>
    <center><table width="200" border="1" cellpadding="0" align="center">
        <tr>
            <b><h2><center>TÜM SORULAR</center></h2></b>
        </tr>
        <?php 
        $sayici=1;
        if (isset($_SESSION["name"])) {
    $name=$_SESSION["name"];
}
        
        $vericek= mysql_query("select * from sorular where kadi='$name'");
        while ($kayit = mysql_fetch_array($vericek)) {
            $sid=$kayit["sid"];
            $dersadi=$kayit["dersadi"];
            $mdladi=$kayit["mdladi"];
            $konuadi=$kayit["konuadi"];
            $kadi=$kayit["kadi"];
            $zder=$kayit["zder"];
            $dcev=$kayit["dcev"];
            $soru=$kayit["soru"];
    
        
        ?>
        <tr>
            <td><strong><center> soru_no </center></strong></td>
    <td><strong><center> ders adı </center></strong></td>
    <td><strong><center> Modül adı </center></strong></td>
    <td><strong><center> konu adı </center></strong></td>
    <td><strong><center> soru </center></strong></td>
    <td><strong><center>doğru cevap</center></strong></td>
    <td><strong><center> ekleyen okutman </center></strong></td>
    <td><strong><center> zorluk </center></strong></td>
    <td><strong><center> Düzenleme_İşlemleri </center></strong></td>
        </tr>
        <tr>
            <td><center><?php echo $sayici?></center></td>
    <td><center> <?php echo $dersadi?> </center></td>
    <td><center> <?php echo $mdladi?> </center></td>
    <td><center> <?php echo $konuadi?> </center></td>
    <td><center><?php echo $soru?></center></td>
    <td><center><?php echo $dcev?></center></td>
    <td><center> <?php echo $kadi?> </center></td>
    <td><center> <?php echo $zder?> </center></td>
    <td>
        <a href="http://localhost/MVC/paneloktmn/soruekleme/<?php echo $sid?>"> Düzenle || </a>
        <a href="http://localhost/MVC/paneloktmn/sorusil/<?php echo $sid?>">  Sil  </a>
    </td>
        </tr>
        <?php 
        $sayici++;
        
        } ?>
    </table></center>

	
</body>
</html>
