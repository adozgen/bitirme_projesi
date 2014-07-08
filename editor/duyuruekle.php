<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>soru ekleme ekranı</title>
	<script src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
</head>
<body>
 


    
	
    <form id="kaydet" name="kaydet" method="post">
     <center><table><tr>
            <b><h2><center>DUYURU HAZIRLAMA EKRANI</center></h2></b>
            </tr>
            <tr>
             <div style="margin-left">
                     <td><b>duyuru konusu:</b></td>
                     <td><input type="text" name="dkonu" id="dkonu"/></td>
             </div>
             <td><b>duyuru tarihi:</b></td>
            <td><input type="date" name="dtarih"/>
             </td></div>        
        
      <tr> 
      
                                      
    
          
		<p>
			<textarea class="ckeditor" cols="100" id="editor1" name="editor1" rows="100">
                      
			</textarea></br>
		</p>
<tr>
        <center><input type="button" id="tik" value="Duyuruyu Ekle"/></center></br>
        </tr>  		
	</form>
	
    <script language="javascript" type="text/javascript">
        CKEDITOR.replace('editor1',{   
            language: 'tr',
filebrowserBrowseUrl: '/yesilev1/browser/browse.php',
filebrowserImageBrowseUrl: '/yesilev1/browser/browse.php?type=Images',
filebrowserUploadUrl: '/yesilev1/uploader/upload.php',
filebrowserImageUploadUrl: '/yesilev1/uploader/upload.php?type=Images',
filebrowserWindowWidth: '700',
filebrowserWindowHeight: '900',
filebrowserBrowseUrl: '/yesilev1/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl: '/yesilev1/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl: '/yesilev1/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl: '/yesilev1/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl: '/yesilev1/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl: '/yesilev1/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
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
        url: 'kaydet1.php',
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
