<html>
    <head>
    <title>Ders Ekle</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/> 
    <script type="text/javascript" src="<?php echo SITE_PUBLIC ?>js/jquery.js"></script>
<script type="text/javascript">
$('document').ready(function() {
	
    
});

	function kontrolet(){
		var dersadi=$('#email1').val();
			dersadi=jQuery.trim(dersadi);
		var mdladi=$('#konu1').val(); 
			mdladi=jQuery.trim(mdladi);
		var msj=$('#mesaj1').val(); 
			msj=jQuery.trim(msj);
			if(mdladi==''){
				alert("lütfen bir konu adı belirtiniz");
				}
                        else if(msj==''){
				alert("lütfen bir mesaj belirtiniz");
				}
			else { $('#form').removeAttr("onsubmit"); }
		}

</script>
</head>
<body>
    <form name="kanekle" action="<?php echo SITE_URL?>/optik/sonucgonder" method="POST" onsubmit="return false;" id="form">
<!--    <form action="<?php echo SITE_URL?>/panel/modulEkleFonks" method="POST">-->
    <center><table border="2">
        <tr>
            <td><label for="konu">KONU ADI(*gerekli)</label></td>
            <td><input type="text" name="konu" id="konu1"/></td>
        </tr>
        <tr>
            <td><label for="mesaj">MESAJINIZIN BAŞLIĞI(*gerekli)</label></td>
        <td><textarea name="mesaj" id="mesaj1" cols="40" rows="5"></textarea></td>
        </tr>
        <tr>
            <td><button type="submit" onclick="kontrolet()" class="add">Mesaj Gönder</button></td>
        </tr>
    </table>
        </form>
</body>  
</html>



