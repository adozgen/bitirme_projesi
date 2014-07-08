<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<!--	<meta charset="UTF-8">-->
	<title>soru ekleme ekranı</title>
</head>
<body>
    <p>
<center>
    </br></br><b><h2>AŞAĞIDAKİ KRİTERLERE GÖRE SORU BELİRLEMESİ YAPABİLİRSİNİZ</h2><b></br></br>

    </p>
    <?php
//ob_start();
////session_start();
//if($_SESSION["login"] != true) {
//header("Location:http://localhost/mvc/admin/login");
//exit();
//}
//ob_end_flush();
//?> 
<?php
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
?>
    
	
    <form action="<?php echo SITE_URL?>/sorular/srgoster" method="POST"> 
        <fieldset>
            <legend><b><h3>Genel Kriterler:</h3></b></legend>
        
        <table>
            
		
		
            <tr><td>
             <div style="margin-left">
                 
                     <td><b>Ders Adı:</b></td>
                     <td><select id="ders" name="ders">
                                       
<!--                                        <option value="0">Ders Seçiniz</option>-->
                                     
                                        <?php
                                        $cek=  mysql_query("select dersid,dersadi from dersler");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                            ?>
                                         <option value="<?=$yaz["dersadi"]?>"><?=$yaz["dersadi"]?></option>
                                         <?php 
                         
                                          }                                    
                                        ?>
                         </select></td>
             </div>
                     <div style="margin-left:20%;">
                         <td><b>Modul Adı:</b></td>
                         <td><select name="mdl" id="mdl">
<!--                                        <option value="1">modul seciniz</option>-->
                                        <?php
                                        $cek=  mysql_query("select * from moduller");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                            ?>
                                         <option value="<?=$yaz["mdladi"]?>"><?=$yaz["mdladi"]?></option>
                                         <?php 
                         
                                          }                                    
                                        ?>
                                         
                             </select></td>
                     </div>
            
            <div style="margin-left:50%;">
                         <td><b>Konu Adı:</b></td>
                         <td><select name="konu" id="konu">
<!--                                        <option value="1">konu seciniz</option>-->
                                        <?php
                                        $cek=  mysql_query("select * from konular");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                            ?>
                                         <option value="<?=$yaz["konuadi"]?>"><?=$yaz["konuadi"]?></option>
                                         <?php 
                         
                                          }                                    
                                        ?>
                                         
                             </select></td>

            </div> </td> </table></fieldset></br>
<fieldset>
    <legend><b><h3>Özel Kriterler:</h3></b></legend>
<table><td>
            <div style="margin-left:50%;">
                <td><b>Zorluk Derecesi:</b></td>
             <td><select name="zder" id="zder">
                  <option>KOLAY</option>
                  <option>ORTA</option>
                  <option>ZOR</option>
    
                </select>
             </td>
            </div>
            <div style="margin-left:50%;">
            <td><b>Soru Sayısı:</b></td>
            <td><input type="text" name="ssayi"/>
             </td></div>
        </tr>
            </br>          
        </table></fieldset>	</br></br>
        <fieldset>
    <legend><b><h3>işlemler:</h3></b></legend>
<table><tr>
                <td><center><input type="submit" value="Soruları Göster"/></center></td>
            
</tr>
<td><center><h3><font color='blue'><b>belirtmiş oldugunuz kriterlere göre sınav kağıdınız oluşturuldu görmek için lütfen</b></font></h3></center></td>
</tr><tr>
    <td><center><a href="<?php echo SITE_URL?>/sinavlar/sinavhazir"> </br><h3><font color="red">tıklayın</font></h3></a></center></td>
             
     </tr>
        </table></fieldset>
	</form>
    </center>
	
</body>
</html>