<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>soru ekleme ekranı</title>
	<script src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
</head>
<body>
		<textarea class="ckeditor" cols="100" id="editor1" name="editor1" rows="100">
			</textarea>
    <script language="javascript" type="text/javascript">
        CKEDITOR.replace('editor1',{         
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
