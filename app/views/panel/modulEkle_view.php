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
			alert("Lütfen bir ders adi belirtiniz");
			} 
			else if(mdladi==''){
				alert("lütfen bir modul belirtiniz");
				}
			else { $('#form').removeAttr("onsubmit"); }
		}

</script>
</head>
<body>
<div id="main">

<div class="full_w">
    <div class="h_title">Derse Modul Ekle</div>
    <form name="kanekle" action="<?php echo SITE_URL?>/panel/modulEkleFonks" method="POST" onsubmit="return false;" id="form">

    <table>
        <?php
        foreach ($dersidg as $key => $value) {
                session::set("dersadi", $value["dersadi"]);
          
           
        }
        ?>
        <div class="element">
                <label for="dersadi">DERS ADI(*gerekli)</label>
                <input type="text" name="dersadi" id="ders1" value="<?php echo session::get("dersadi")?>"/>
        </div>
        <div class="element">
                <label for="mdladi">MODUL ADI(*gerekli)</label>
                <input type="text" name="mdladi" id="mdl1"/>
        </div>
        <div class="entry">
                <button type="submit" onclick="kontrolet()" class="add">Modul Ekle</button>
        </div>
    </table>
        </form>
    </div>
</div>
</body>
    
       
    
    
</html>

