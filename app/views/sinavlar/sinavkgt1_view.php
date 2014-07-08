<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sinav kağıdınız</title>
</head>
<body bgcolor="">
    <form>
    <?php
// session_start();
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
?>
    <center><table>
        <?php 
        $sayici=1;
        if (isset($_SESSION["sinid"])) {    
        $sinid=$_SESSION["sinid"]; 
        $vericek= mysql_query("select * from ssorular where sinid=$sinid");
        $tplam=  mysql_num_rows($vericek);
        
        while ($kayit = mysql_fetch_array($vericek)) {
            $soru=$kayit["ssoru"];        
            
        ?>  
        <?php 
        echo "<tr>";
        if (($sayici>=$tplam/2+1) and ($sayici<=$tplam)) {
        ?>
            <tr><left><?php echo $sayici?></left></tr>
         <tr><left><?php echo $soru?></left></tr>
         
        
        <?php
    }
    echo "</tr>";
        $sayici++;
        }
        }
               
?>
    </table></center>
    </form>
</body>
</html>
