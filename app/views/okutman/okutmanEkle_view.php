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
     <form action="<?php echo SITE_URL; ?>/okutman/oguncelle" method="post">
        <div class="element">
                <label for="dersadi">DERS ADI(*gerekli)</label>
                <input type="text" name="dersadi" />
        </div>
        <div class="element">
                <label for="username">OKUTMAN ADI(*gerekli)</label>
                <input type="text" name="username" />
        </div>
         <div class="element">
                <label for="parola">PAROLA(*gerekli)</label>
                <input type="text" name="parola" />
        </div>
        <div class="element">
                <label for="ounvan">UNVANI(*gerekli)</label>
                <input type="text" name="ounvan" />
        </div>
         <div class="element">
                <label for="email">EMAİL(*gerekli)</label>
                <input type="text" name="email" />
        </div>
        <div class="entry">
                <button type="submit" class="add">Okutman Güncelle</button>
        </div>
    </form>
</div>
</div>
</body>
</html>

