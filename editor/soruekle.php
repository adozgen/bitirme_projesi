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
if(isset($_SESSION["loginoktmn"])){
        include 'headeroktmn.php';
    }
    if (isset($_SESSION["login"])) {
        include 'header.php';
    }
if((!isset($_SESSION["login"])) AND (!isset($_SESSION["loginoktmn"]))) {
header("Location:http://localhost/mvc");
exit();
}
ob_end_flush();
?> 
<?php
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
?>
    
	
    <form id="kaydet" name="kaydet" method="post">
        <center><table><tr>
            <b><h2><center>SORU HAZIRLAMA EKRANI</center></h2></b>
            </tr>
            <tr>
             <div style="margin-left">
                     <td><b>Ders Adı:</b></td>
                     <td><select name="ders" id="ders">
                                       
<!--                                        <option value="1">Ders Seçiniz</option>-->
                                     
                                        <?php
                                                                                if (isset($_SESSION["sid"])) {
                                                                                    $sid=$_SESSION["sid"];
                                                                                    $cek=  mysql_query("select dersadi from sorular where sid='$sid'");
                                                                                    $yaz = mysql_fetch_array($cek);
                                                                                    echo  "<option value='".$yaz["dersadi"]."'>".$yaz["dersadi"]."</option>"; 
                                                                                }
                                                                                else {
                                        $cek=  mysql_query("select * from dersler");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                         echo  "<option value='".$yaz["dersadi"]."'>".$yaz["dersadi"]."</option>";          
                                                                                } }                              
                                        ?>
                         </select></td>
             </div>
                     <div style="margin-left:20%;">
                         <td><b>Modul Adı:</b></td>
                         <td><select name="mdl" id="mdl">
<!--                                        <option value="1">modul seciniz</option>-->
                                        <?php
                                                                                if (isset($_SESSION["sid"])) {
                                                                                    $sid=$_SESSION["sid"];
                                                                                    $cek=  mysql_query("select mdladi from sorular where sid='$sid'");
                                                                                    $yaz = mysql_fetch_array($cek);
                                                                                    echo  "<option value='".$yaz["mdladi"]."'>".$yaz["mdladi"]."</option>"; 
                                                                                }
                                                                                else {
                                        $cek=  mysql_query("select * from moduller");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                         echo  "<option value='".$yaz["mdladi"]."'>".$yaz["mdladi"]."</option>";          
                                                                                } }                              
                                        ?>
                                         
                             </select></td>
                     </div>
            
            <div style="margin-left:50%;">
                         <td><b>Konu Adı:</b></td>
                         <td><select name="konu" id="konu">
<!--                                        <option value="1">konu seciniz</option>-->
                                        <?php
                                                                                if (isset($_SESSION["sid"])) {
                                                                                    $sid=$_SESSION["sid"];
                                                                                    $cek=  mysql_query("select konuadi from sorular where sid='$sid'");
                                                                                    $yaz = mysql_fetch_array($cek);
                                                                                    echo  "<option value='".$yaz["konuadi"]."'>".$yaz["konuadi"]."</option>"; 
                                                                                }
                                                                                else {
                                        $cek=  mysql_query("select * from konular");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                         echo  "<option value='".$yaz["konuadi"]."'>".$yaz["konuadi"]."</option>";          
                                                                                } }                              
                                        ?>
                                         
                             </select></td>
                     </div>
            <div style="margin-left:50%;">
                <td><b>Zorluk Derecesi:</b></td>
             <td><select name="zder" id="zder">
                     <?php 
                     if (isset($_SESSION["sid"])) {
                                                                                    $sid=$_SESSION["sid"];
                                                                                    $cek=  mysql_query("select zder from sorular where sid='$sid'");
                                                                                    $yaz = mysql_fetch_array($cek);
                                                                                    echo  "<option value='".$yaz["zder"]."'>".$yaz["zder"]."</option>"; 
                                                                                }
                      else {
                  echo "<option>KOLAY</option>";
                  echo "<option>ORTA</option>";
                  echo "<option>ZOR</option>";
                      }
    ?>
                </select>
             </td>
            </div>
            
            <div style="margin-left:50%;">
            <td><b>Okutman Adı:</b></td>
             <td><select name="kadi" id="kadi">
                     
                     <?php
                    // Sessionu başlatalım
                    //session_start();
                     echo "<option>".$_SESSION["name"]."</option>";
//                     echo "<option>".$_SESSION["sid"]."</option>";
                     ?>
                </select>
             </td></div>
    <div style="margin-left:50%;">
            <td><b>Doğru Yanıt:</b></td>
             <td><select name="dcev" id="dcev">
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                  <option>E</option>
                </select>
             </td></div>
        </tr>
      <tr>
		<p>
			<textarea class="ckeditor" cols="100" id="editor1" name="editor1" rows="100">
                      <?php 
                                        $sid=$_SESSION["sid"];
                                        $cek=  mysql_query("select soru from sorular where sid='$sid'");
                                        $yaz = mysql_fetch_array($cek);
                                        echo $yaz["soru"];
                                                                           
                                        ?>
			</textarea></br>
		</p>
    
            
        <tr>
        <center><input type="button" id="tik" value="Soruyu Ekle"/></center></br>
        </tr>                
            </table></center>  		
	</form>
    <script language="javascript" type="text/javascript">
        CKEDITOR.replace('editor1',{   
            language: 'tr',
filebrowserBrowseUrl: '/mvc/editor/browser/browse.php',
filebrowserImageBrowseUrl: '/mvc/editor/browser/browse.php?type=Images',
filebrowserUploadUrl: '/mvc/editor/uploader/upload.php',
filebrowserImageUploadUrl: '/mvc/editor/uploader/upload.php?type=Images',
filebrowserWindowWidth: '700',
filebrowserWindowHeight: '900',
filebrowserBrowseUrl: '/mvc/editor/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl: '/mvc/editor/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl: '/mvc/editor/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl: '/mvc/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl: '/mvc/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl: '/mvc/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
    </script>
<script type="text/javascript">
$(document).ready(function(){
 
    $('#tik').click(function(){
        /* $ Can Alan Kısım Başladı () */
        for(var kaydet in CKEDITOR.instances)
        CKEDITOR.instances[kaydet].updateElement();
        /* $ Can Alan Kısım Bitti () */
        $.ajax({
        type: 'POST',
        url: 'kaydet.php',
        cache: false,
        data: $('#kaydet').serialize(),
        success: function(hesapCevap) {
        $('#sonuc').html(hesapCevap);
        }});       
 
                return false;
 
    });
});
</script>
	
</body>
</html>
