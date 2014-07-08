<html>
    <head>
    <title>Ders Ekle</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/> 
    <script type="text/javascript" src="<?php echo SITE_PUBLIC ?>js/jquery.js"></script>
<script type="text/javascript">
$('document').ready(function() {
	
    
});

	function kontrolet(){
		var dersadi=$('#ders1').val();
			dersadi=jQuery.trim(dersadi);
		var mdladi=$('#mdl1').val(); 
			mdladi=jQuery.trim(mdladi);
		
		if(dersadi==''){
			alert("Lütfen bir ders kodu belirtiniz");
			} 
			else if(mdladi==''){
				alert("lütfen bir ders adı belirtiniz");
				}
			else { $('#form').removeAttr("onsubmit"); }
		}

</script>
</head>
<body>
<div id="main">

<div class="full_w">
    <div class="h_title">Ders Güncelleme</div>
    <form name="kanekle" action="<?php echo SITE_URL?>/panel/guncelle" method="POST" onsubmit="return false;" id="form">
<!--    <form action="<?php echo SITE_URL?>/panel/modulEkleFonks" method="POST">-->
    <table>
        <div class="element">
                <label for="dersadi">DERS KODU(*gerekli)</label>
                <input type="text" name="drskodu" id="ders1"/>
        </div>
        <div class="element">
                <label for="mdladi">DERS ADI(*gerekli)</label>
                <input type="text" name="dersadi" id="mdl1"/>
        </div>
        <div class="entry">
                <button type="submit" onclick="kontrolet()" class="add">DERS GÜNCELLE</button>
        </div>
    </table>
        </form>
    </div>
</div>
</body>
    
       
    
    
</html>

