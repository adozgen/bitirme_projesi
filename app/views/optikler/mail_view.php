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
		if(dersadi==''){
			alert("Lütfen geçerli mail belirtiniz");
			} 
			else if(mdladi==''){
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
<div id="main">

<div class="full_w">
    <div class="h_title">Derse Modul Ekle</div>
    <form name="kanekle" action="<?php echo SITE_URL?>/optik/mailgonder" method="POST" onsubmit="return false;" id="form">
<!--    <form action="<?php echo SITE_URL?>/panel/modulEkleFonks" method="POST">-->
    <table>
        <div class="element">
                <label for="konu">MESAJ KONUSU(*gerekli)</label>
                <input type="text" name="konu" id="konu1"/>
        </div>
        <div class="element">
                <label for="mesaj">MESAJ BAŞLIĞI(*gerekli)</label>
                <input name="mbaslik" id="mesaj1" cols="40" rows="5"></input>
        </div>
        <div class="entry">
                <button type="submit" onclick="kontrolet()" class="add">Mesaj Gönder</button>
        </div>
    </table>
        </form>
    </div>
</div>
</body>
    
       
    
    
</html>



