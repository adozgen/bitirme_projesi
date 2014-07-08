<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<!--	<meta charset="UTF-8">-->
	<title>soru ekleme ekranı</title>
        <script type="text/javascript">
$('document').ready(function() {
	
    
});

	function kontrolet(){
		var starh=$('#starh1').val(); 
			starh=jQuery.trim(starh);
		if(starh==''){
				alert("lütfen tarih belirtiniz");
				}
			else { $('#form').removeAttr("onsubmit"); }
		}

</script>
</head>
<body>
    <p>
<center>
    </br></br><b><h2>SINAV BİLGİLERİNİ GİRİNİZ</h2><b></br></br>

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
	
    <form action="<?php echo SITE_URL?>/sinavlar/snvhazirlama" method="POST" onsubmit="return false;" id="form"> 
     
            <legend><b><h3>Genel Kriterler:</h3></b></legend>
        
        <table>
            
		
		
            <tr><td>
             <div style="margin-left">
                 
                     <td><b>Ders Adı:</b></td>
                     <td><select id="ders1" name="ders">
                                       
<!--                                        <option value="0">Ders Seçiniz</option>-->
                                     
                                        <?php
                                        $cek=  mysql_query("select dersid,dersadi from dersler");
                                        while ($yaz = mysql_fetch_array($cek)) {
                                            ?>
                                         <option name="ders"><?=$yaz["dersadi"]?></option>
                                         <?php 
                         
                                          }                                    
                                        ?>
                         </select></td>
             </div>
            <div style="margin-left:50%;">
                <td><b>Kitapçık:</b></td>
             <td><select name="kturu" >
                  <option>A</option>
                  <option>B</option>   
                </select>
             </td>
            </div>
            </td> </table></br>

    <legend><b><h3>Özel Kriterler:</h3></b></legend>
<table><td>
            <div style="margin-left:50%;">
                <td><b>Sınav Dönemi:</b></td>
             <td><select name="stipi" id="stipi1">
                  <option>VİZE</option>
                  <option>FİNAL</option>
                  <option>BÜT</option>
    
                </select>
             </td>
            </div>
            <div style="margin-left:50%;">
            <td><b>sınav tarihi:</b></td>
            <td><input type="date" name="starh" id="starh1"/>
             </td></div>
        </tr>
        
            </br>          
        </table>	</br></br>   
        <input type="submit" onclick="kontrolet()" value="Bilgileri Ekle"/>
        </br></br>
        <tr>
    <td><center><h3><font color='blue'><b>varolan bir sınavda değişiklik yapmak için lütfen</b></font></h3></center></td>
</tr><tr>
    <td><center><a href="<?php echo SITE_URL?>/sorular/srhazirla"> </br><h3><font color="red">TIKLAYIN</font></h3></a></center></td>
             
     </tr>
	</form>
    
</body>
</html>