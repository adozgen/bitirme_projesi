<html>
    <head>
    <title>Ders Ekle</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>    
    <script type="text/javascript" src="<?php echo SITE_PUBLIC ?>js/jquery.js"></script>
<script type="text/javascript">
$('document').ready(function() {
	
    
});

	function kontrolet(){
		var mdladi=$('#mdl1').val();
			mdladi=jQuery.trim(mdladi);
		var konuadi=$('#konu1').val(); 
			konuadi=jQuery.trim(konuadi);
		
		if(mdladi==''){
			alert("Lütfen bir modul adi belirtiniz");
			} 
			else if(konuadi==''){
				alert("lütfen bir konu belirtiniz");
				}
			else { $('#form').removeAttr("onsubmit"); }
		}

</script>
</head>
<body>
<div id="main">

<div class="full_w">
    <div class="h_title">Derse Modul Ekle</div>
    <form name="kanekle" action="<?php echo SITE_URL?>/panel/konuEkleFonks" method="POST" onsubmit="return false;" id="form">
<!--    <form action="<?php echo SITE_URL?>/panel/modulEkleFonks" method="POST">-->
    <table>
        <?php
        foreach ($mdladigoster as $key => $value) {
            session::set("mdladi", $value["mdladi"]);
        }
        ?>
        <div class="element">
                <label for="dersadi">MODUL ADI(*gerekli)</label>
                <input type="text" name="mdladi" id="mdl1" value="<?php echo session::get("mdladi")?>"/>
        </div>
        <div class="element">
                <label for="mdladi">KONU ADI(*gerekli)</label>
                <input type="text" name="konuadi" id="konu1"/>
        </div>
        <div class="entry">
                <button type="submit" onclick="kontrolet()" class="add">Konu Ekle</button>
        </div>
<!--    <form action="<?php echo SITE_URL?>/panel/konuEkleFonks" method="POST">
    <table>
        //<?php
//        foreach ($mdladigoster as $key => $value) {
//            session::set("mdladi", $value["mdladi"]);
//        }
//        ?>
        <tr>
            <td> Modul Adı: </td>
            <td>
        <input type="text" name="mdladi" value="//<?php echo session::get("mdladi")?>"/>
            </td>
        </tr>
        <tr>
            <td> Konu Adı: </td>
            <td>
                <input type="text" name="konuadi"/>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit">Modul Ekle</button>
            </td>
        </tr>
-->    </table>
        </form>
</div>
</div>
</body>
    
        
    
    
</html>

