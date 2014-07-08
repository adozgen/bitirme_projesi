<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sınavın cevap anahtarı</title>
</head>
<body bgcolor="">
    <form action="<?php echo SITE_URL; ?>/sorular/sinavm" method="post">
    <?php
// session_start();
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
?>
    <center><table width="200" border="1" cellpadding="0" align="center">
        <?php 
        $sayici=1;
        if (isset($_SESSION["sinid"])) {
        $sinid=$_SESSION["sinid"]; 
        $vericek= mysql_query("select scev from ssorular where sinid=$sinid");
        
              
        
                   
            
            
        //$vericek= mysql_query("select soru from sorular where dersadi='$dersadi' or mdladi='$mdladi' or konuadi='$konuadi' or zder='$zder' or kadi='$kadi'");
        echo "<tr>";
            echo "<td><strong><center> soru_no </center></strong></td>";
            echo "<td><strong><center> cevap </center></strong></td>";
        echo "</tr>";
        while ($kayit = mysql_fetch_array($vericek)) {
            $scev=$kayit["scev"];        
            
        ?>
        
        <tr>
            <td><center><?php echo $sayici?></center></td>
    <td><center><?php echo $scev?></center></td>
        </tr>
        
        
        <?php 
        $sayici++;
        
        }
        }
 ?>
            
        </tr>
    </table></center>
    </form>
</body>
</html>
