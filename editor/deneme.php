<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>soru ekleme ekranı</title>
	<script src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
</head>
<body>
    <?php
ob_start();
session_start();
if($_SESSION["login"] != true) {
header("Location:http://localhost/mvc/admin/login");
exit();
}
ob_end_flush();
?> 
<?php
 include 'editor.php';
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
?>
    
	
    <form id="kaydet" name="kaydet" method="post"> 
        <table>
            
		
		
            <tr>
             <div style="margin-left">
                     <td><b>Ders Adı:</b></td>
                     <td><select id="ders" name="ders">
                                       
                                        <option value="0">Ders Seçiniz</option>
                                     
                                        <?php
                                        $cek=  mysql_query("select dersid,dersadi from dersler");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                            ?>
                                         <option value="<?=$yaz["dersid"]?>"><?=$yaz["dersadi"]?></option>
                                         <?php 
                         
                                          }                                    
                                        ?>
                         </select></td>
             </div>
                     <div style="margin-left:20%;">
                         <td><b>Modul Adı:</b></td>
                         <td><select name="mdl" id="mdl">
                                        <option value="1">modul seciniz</option>
                                        <?php
                                        $cek=  mysql_query("select * from moduller");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                            ?>
                                         <option value="<?=$yaz["mdlid"]?>"><?=$yaz["mdladi"]?></option>
                                         <?php 
                         
                                          }                                    
                                        ?>
                                         
                             </select></td>
                     </div>
            
            <div style="margin-left:50%;">
                         <td><b>Konu Adı:</b></td>
                         <td><select name="konu" id="konu">
                                        <option value="1">konu seciniz</option>
                                        <?php
                                        $cek=  mysql_query("select * from konular");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                            ?>
                                         <option value="<?=$yaz["konuid"]?>"><?=$yaz["konuadi"]?></option>
                                         <?php 
                         
                                          }                                    
                                        ?>
                                         
                             </select></td>
                     </div>
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
            <td><b>Okutman Adı:</b></td>
             <td><select name="kadi">
                     
                     <?php
                    // Sessionu başlatalım
                    //session_start();
                     echo "<option>".$_SESSION["name"]."</option>";
    
                     ?>
                </select>
             </td></div>
        </tr>
            </br> 
        <tr>
			<input type="button" id="tik" value="Soruyu Ekle"/></br></br></br>
          
        </tr>
            
            
        </table>	
	</form>
    
	
</body>
</html>