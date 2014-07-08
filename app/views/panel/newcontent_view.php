<div id="main">

<div class="full_w">
    <div class="h_title">Yeni İçerik Ekle</div>
    
    <?php
    if(isset($formErrors)){
    ?>
        <div style="color : red; text-size : 16px; border:1px solid red; padding:7px; margin:5px;">
        <?php
            foreach ($formErrors as $key => $value) {
                switch($key){
                    case 'mdladi':
                        foreach ($value as $val) {
                            echo "İÇERİK: " . $val . "<br />";
                        }
                        break;
                    default:
                        break;
                }
            }
        ?>
        </div>
    <?php } ?>
    <?php
        foreach ($dersidg as $key => $value) {
            if (isset($dersidg)) {
                $dat=$value["dersadi"];
            }  else {
                $dersidg=null;
            }
           
        }
        ?>
    <form action="<?php echo SITE_URL; ?>/panel/mdlEklef" method="post">
        
        <div class="element">
                <label for="dersadi">DERS KODU(*gerekli)</label>
                <input type="text" name="drskodu" value="<?php echo $dat?>"/>
        </div>
        <div class="element">
                <label for="mdladi">DERS ADI(*gerekli)</label>
                <input type="text" name="mdladi" />
        </div>
        <div class="entry">
                <button type="submit" class="add">Ekle</button>
        </div>
    </form>
</div>
</div>