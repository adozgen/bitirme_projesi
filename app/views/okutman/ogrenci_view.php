<html>
    <head>
    <title>Ders Ekle</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>    
</head>
<body>
<div id="main">

<div class="full_w">
    <div class="h_title">Yeni Okutman Ekle</div>
    
    <?php
    if(isset($formErrors)){
    ?>
        <div style="color : red; text-size : 16px; border:1px solid red; padding:7px; margin:5px;">
        <?php
            foreach ($formErrors as $key => $value) {
                switch($key){
                    case 'dersadi':
                        foreach ($value as $val) {
                            echo "DERS ADI: " . $val . "<br />";
                        }
                        break;
                    case 'username':
                        foreach ($value as $val) {
                            echo "OKUTMAN ADI: " . $val . "<br />";
                        }
                        break;
                        case 'parola':
                        foreach ($value as $val) {
                            echo "PAROLA: " . $val . "<br />";
                        }
                        break;
                        case 'ounvan':
                        foreach ($value as $val) {
                            echo "OKUTMAN ÜNVANI: " . $val . "<br />";
                        }
                        break;
                        case 'email':
                        foreach ($value as $val) {
                            echo "OKUTMAN MAİL: " . $val . "<br />";
                        }
                        break;
                    default:
                        break;
                }
            }
        ?>
        </div>
    <?php } ?>
     <form action="<?php echo SITE_URL; ?>/admin/ogrencikyt" method="post">
        <div class="element">
                <label for="no">NUMARANIZ(*ilk iki ve son iki hanesi)</label>
                <input type="text" name="no" />
        </div>
        <div class="element">
                <label for="ad"> ADI(*gerekli)</label>
                <input type="text" name="ad" />
        </div>
         <div class="element">
                <label for="soyad"> SOYADI(*gerekli)</label>
                <input type="text" name="soyad" />
        </div>
         <div class="element">
                <label for="sinif">SINIF(*gerekli)</label>
                <input type="text" name="sinif" />
        </div>
        <div class="element">
                <label for="bolum">BÖLÜM(*gerekli)</label>
                <input type="text" name="bolum" />
        </div>
         <div class="element">
                <label for="email">EMAİL(*gerekli)</label>
                <input type="text" name="email" />
        </div>
        <div class="entry">
                <button type="submit" class="add">Kaydet</button>
        </div>
    </form>
</div>
</div>
</body>
</html>

