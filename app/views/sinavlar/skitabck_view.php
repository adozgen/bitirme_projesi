<?php
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
 $sayici=1;
 if (isset($_SESSION["sinid"])) {    
 $sinid=$_SESSION["sinid"]; 
 $vericek= mysql_query("select * from ssorular where sinid=$sinid");
 $tplam=  mysql_num_rows($vericek);
 echo  "<div id='container' style='width:900px'>";
include_once 'sbilgiler_view.php';
 while ($kayit = mysql_fetch_array($vericek)) {
            $soru=$kayit["ssoru"];                           
        
        if ($sayici<=$tplam) {
        
            if ($sayici%2!=0) {
        ?>
         <div id="menu" style="width:400px;float:left;">
      
         <tr>
             <td><left><b><h3><?php echo $sayici.'.'?></h3></b></left></td>
         <td><left><?php echo $soru?></left></td>
         </tr>
       
         </div>      
        <?php
    } else { 
        ?>
        <div id="content" style="width:400px;float:right;">
        
         <tr> 
        <td><left><b><h3><?php echo $sayici.'.'?></h3></b></left></td>
         <td><left><?php echo $soru?></left></td>
        </tr>
        </div>
<?php
    }
    
        }
   
        $sayici++;
        }
        
        echo '</div>';
        }
               
?>