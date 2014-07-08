<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kriterlere ait sorular</title>
</head>
<body bgcolor="">
    <form action="<?php echo SITE_URL; ?>/sorular/sorusec" method="post">
    <?php
// session_start();
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
?>
    <center><table width="200" border="1" cellpadding="0" align="center">
        <tr>
            <b><h2><center></br>BELİRLEDİĞİNİZ KRİTERLERE GÖRE SORULAR</center></h2></b>
        </tr>
        <?php 
        $sayici=1;
        $dersadi=$data["dersadi"];
            $mdladi=$data["mdladi"];
            $konuadi=$data["konuadi"];
//            $kadi=$data["kadi"];
            $zder=$data["zder"];
            $adet=$data["adet"];
            
                if (isset($adet)) {
                    $vericek= mysql_query("select soru, dcev, sid from sorular where dersadi='$dersadi' and mdladi='$mdladi' and konuadi='$konuadi' and zder='$zder' order by rand() LIMIT $adet");
                    
                } if (empty ($adet)) {
                    $vericek= mysql_query("select soru, dcev, sid from sorular where dersadi='$dersadi' and mdladi='$mdladi' and konuadi='$konuadi' and zder='$zder' order by rand()");
                }      
            
            
        //$vericek= mysql_query("select soru from sorular where dersadi='$dersadi' or mdladi='$mdladi' or konuadi='$konuadi' or zder='$zder' or kadi='$kadi'");
        
        while ($kayit = mysql_fetch_array($vericek)) {
            $soru=$kayit["soru"];
            $dcev=$kayit["dcev"];
            $sid=$kayit["sid"];           
            
        ?>
        <tr>
            <td><strong><center> soru_no </center></strong></td>
    <td><strong><center> soru </center></strong></td>
    <td><strong><center> cevap </center></strong></td>
    <td><strong><center> İşlemler </center></strong></td>
        </tr>
        <tr>
            <td><center><?php echo $sayici?></center></td>
    <td><center><?php echo $soru?></center></td>
    <td><center><?php echo $dcev?></center></td>
    <td><center>
        
        <input type="checkbox" name="dersler[]" value="<?php echo $sid?>"/><p>
<!--        <a href="http://localhost/MVC/sorular/soruekleme/"> || ekle || </a>-->
    </center>
    </td>
        </tr>
        
        
        <?php 
        $sayici++;
        
        }
                
?>
        <tr>
           
        <?php
 if ($sayici==1) {
     echo "<tr>";
     echo "</br><b><h2><font color='red'>"."HATA:belirtilen kriterlere göre soru bulunamadı...</br> Soru hazırlama ekranına dönmek için lütfen"."</font></h2><b>";
     echo "</tr>";
     echo "<tr>";
     echo "</br><a href='srhazirla'><b><h2><font color='red'><b><h2><font color='blue'>"."tıklayın"."</font></h2><b></a>";
     echo "</tr>";
     
 } 
            ?>
            
        </tr>
    </table></center>
        <?php
        if($sayici!=1) {
     echo "<tr>";
         echo "<center>";
    echo "<input type='submit' value='seçilenleri ekle'/>";
    echo "</center>";
    echo "</tr>";
    echo "</br>";
    
 }
        ?>
    </form>
</body>
</html>
