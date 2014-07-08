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
        $vericek= mysql_query("select * from ssorular where sinid='$sinid'");
        $tplam=  mysql_num_rows($vericek);
        while ($kayit = mysql_fetch_array($vericek)) {
            $soru=$kayit["ssoru"];        
            
        ?>  
        <?php 
        echo '<tr>';
        if ($sayici<=$tplam/2) {
        ?>
        <tr><left><?php echo $sayici?></left></tr>
         <tr><left><?php echo $soru?></left></tr>
        
        
        <?php
    }
    echo '</tr>';
        $sayici++;
        }
                
?>
        <tr>
          <center> 
        <?php
 if ($sayici==1) {
     echo "<tr>";
     echo "</br><b><h2><font color='red'>"."HATA:belirtilen kriterlere göre soru bulunamadı...</br> Soru hazırlama ekranına dönmek için lütfen"."</font></h2><b>";
     echo "</tr>";
     echo "<tr>";
     echo "</br><a href='../sorular/srhazirla'><b><h2><font color='red'><b><h2><font color='blue'>"."tıklayın"."</font></h2><b></a>";
     echo "</tr>";
     
 } 
        }         
		
		?>
           </center> 
        </tr>
		
		
		
    </table></center>
	
    </form>
	
</body>
</html>
