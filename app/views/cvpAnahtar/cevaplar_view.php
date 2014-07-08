<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>sınavın cevap anahtarı</title>
</head>
<body bgcolor="">
    <form action="<?php echo SITE_URL; ?>/okuyucu/cvpanahtari" method="post">
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
   //         $cvpid=$_SESSION["sinid"];
        }
        $sql= mysql_query("select * from ssorular where sinid='$sinid'");
        $tplam=  mysql_num_rows($sql);
        //$i=1;
            $stipi=$data["stipi"];
            $ders=$data["ders"];
            $starh=$data["utime"];
            $kturu=$data["kturu"];
            $result = mysql_query("SELECT id FROM `d_cevapanahtari` WHERE utime='$starh' AND ders='$ders' AND stipi='$stipi' AND kturu='$kturu' LIMIT 1");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
if (mysql_num_rows($result) > 0)
{
    echo "bu cevap anahtari daha once $starh de olusturulmustur.</br>";
}
 else {
        for ( $i = 1; $i <= $tplam; $i++ ) {
            $stipi=$data["stipi"];
            $ders=$data["ders"];
            $starh=$data["utime"];
            $kturu=$data["kturu"];
            $ekle=mysql_query("INSERT INTO d_cevapanahtari (stipi,ders,cevapnum,utime,kturu) VALUES ('".$stipi."','".$ders."','".$i."','".$starh."','".$kturu."')");
            if (!$ekle) {
                die('Invalid query: ' . mysql_error());   
            }
            //$i++;    
            
}
            }
                   
            
            
        //$vericek= mysql_query("select soru from sorular where dersadi='$dersadi' or mdladi='$mdladi' or konuadi='$konuadi' or zder='$zder' or kadi='$kadi'");
        echo "<tr></br>";
            echo "<td><strong><center> soru_no </center></strong></td>";
            echo "<td><strong><center> cevap </center></strong></td>";
        echo "</tr>";
        if(isset($sinid)){
            echo  "<input type='hidden' name='stipi' value='$stipi'/>";
            echo  "<input type='hidden' name='ders' value='$ders'/>";
            echo  "<input type='hidden' name='utime' value='$starh'/>";
            echo  "<input type='hidden' name='sinid' value='$sinid'/>";
            echo  "<input type='hidden' name='kturu' value='$kturu'/>";
            //$sql=mysql_query("select scev from ssorular where sinid='$sinid'");
            
            if ($sql) {
                while ($kayit = mysql_fetch_array($sql)) {
            $scev=$kayit["scev"];        
            
        ?>
            <tr>
            <td><center><?php echo $sayici?></center></td>
            <td><center><?php echo $scev?></center></td>
        </tr>
        
        
        <?php 
        $sayici++;
        
        }
        //$_COOKIE["sayici"]=$sayici;
                
            }
        
        }else {
            echo 'hata';
        }
?>
        <tr>
           
        <?php
 if ($sayici==1) {
     
     echo "<tr>";
     echo 'Bu bilgilerle alakalı herhangi bir sınav bulunmamaktadır.';
            header("refresh:2;url=http://localhost/mvc/okuyucu/cvpAnhtrHazirla");
            die(' 2 saniye sonra bir önceki sayfaya yönlendirileceksiniz.');
     echo "</tr>";
     
 } 
            ?>
            
        </tr>
    </table></center>
        </br>
<!--        <input type='text' name='sinid' value='<?php echo $sinid?>'/>-->
        <center><input type="submit" name="islem" value="Cevapları Kaydet"/></center>
    </form>
</body>
</html>


