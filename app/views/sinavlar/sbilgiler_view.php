<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>    
</head>
<body>
    <?php 
    $mesaj=null;
    if ((isset($_SESSION["starh"])) OR (isset($_SESSION["sders"])) OR (isset($_SESSION["sdonem"])) OR (isset($_SESSION["kturu"]))) {
        $starh=$_SESSION["starh"]; 
        $sders=$_SESSION["sders"];
        $sdonem=$_SESSION["sdonem"]; 
        $kturu=$_SESSION["kturu"]; 
        $mesaj=True;
        } else {
            $mesaj=False;
        }
    ?>
<div id="main">
<div class="full_w">
    <div class="h_title">Sinav Kagıdı </div>
        <div style="color : blue; text-size : 20px; border:1px solid padding7px; margin:3px;">
     <form>
         <?php 
             if ($mesaj==TRUE) {
                 
             
         ?>
          <div class="element" align="right">
              <b>Sınav Tarihi: </b>  </b><input type="text" value="<?php echo $starh?>" />
            
        </div>
         <div class="element">
            <b>Adı ve Soyadı: </b>  
        </div>
        <div class="element">
            <b>Öğrenci Numarası: 
        </div>
         <center>
             ONDOKUZMAYIS ÜNİVERSİTESİ MÜHENDİSLİK FAKULTESİ</br></br>
             <input type="text" value="<?php echo $sders?>"/> <input type="text" value="<?php echo $sdonem?>"/></br>
             </br><center>SINAVI</center>
             </br><center><?php echo $kturu?></center>
             <?php } 
             else {
                 echo 'HATA:hiçbir sınav seçimi yapmadan bu ekrana geldiniz lütfen sınav secimi yapınız';
             }
?>
    </form>
            
            
</div>
</div>
</body>
</html>



