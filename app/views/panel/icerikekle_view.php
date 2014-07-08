<html>
    <head>
    <title>Ders Ekle</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>    
</head>
<body>
<div id="main">

<div class="full_w">
    <div class="h_title">Yeni Ders Ekle</div>
    
    <?php
    if(isset($formErrors)){
    ?>
        <div style="color : red; text-size : 16px; border:1px solid red; padding:7px; margin:5px;">
        <?php
            foreach ($formErrors as $key => $value) {
                switch($key){
                    case 'drskodu':
                        foreach ($value as $val) {
                            echo "DERSKODU: " . $val . "<br />";
                        }
                        break;
                    case 'dersadi':
                        foreach ($value as $val) {
                            echo "DERSADI: " . $val . "<br />";
                        }
                        break;
                    default:
                        break;
                }
            }
        ?>
        </div>
    <?php } ?>
     <form action="<?php echo SITE_URL; ?>/panel/dersEklef" method="post">
        <div class="element">
                <label for="drskodu">DERS KODU(*gerekli)</label>
                <input type="text" name="drskodu" />
        </div>
        <div class="element">
                <label for="dersadi">DERS ADI(*gerekli)</label>
                <input type="text" name="dersadi" />
        </div>
        <div class="entry">
                <button type="submit" class="add">Ders Ekle</button>
        </div>
    </form>
</div>
</div>
</body>
</html>

