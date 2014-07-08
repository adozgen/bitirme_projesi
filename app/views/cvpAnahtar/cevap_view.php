<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<!--	<meta charset="UTF-8">-->
	<title>soru ekleme ekranı</title>
</head>
<body>
    <p>
<center>
    </br></br><b><h2>OKUTMAK İSTEDIGINIZ SINAV BILGILERI</h2><b></br></br>

    </p>
<?php

 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");

?>
    
	
    <form action="<?php echo SITE_URL; ?>/optik/sinavBilg" method="POST"> 
        
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
                                         <option name="dersadi"><?=$yaz["dersadi"]?></option>
                                         <?php 
                         
                                          }                                    
                                        ?>
                         </select></td>
                         <div style="margin-left:50%;">
                <td><b>Kitapçık:</b></td>
             <td><select name="kturu" >
                  <option>A</option>
                  <option>B</option>   
                </select>
             </td>
            </div>
             </div></td> </table></br>

    <legend><b><h3>Özel Kriterler:</h3></b></legend>
<table><td>
            <div style="margin-left:50%;">
                <td><b>Sınav Dönemi:</b></td>
             <td><select name="stipi">
                  <option>VİZE</option>
                  <option>FİNAL</option>
                  <option>BÜT</option>
    
                </select>
             </td>
            </div>
            <div style="margin-left:50%;">
            <td><b>sınav tarihi:</b></td>
            <td><input type="date" name="starh"/>
             </td></div>
        </tr>
        
            </br>          
        </table>	</br></br>
        <input type="submit" name="islem" value="Optik Okut"/>
	</form>
    
</body>
</html>