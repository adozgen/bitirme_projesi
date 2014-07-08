
<!-- �NCEL�KLE FORM TAGIMIZI A�IYORUZ ACTION=YUKLE.PHP , METHOD=POST VE ENCTYPE=MULTIPART/FORM-DATA OLARAK AYARLIYORUZ. -->
<html lang="tr">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
</head>
<form action="<?php echo SITE_URL; ?>/Optik/optikyukle" method="post" enctype="multipart/form-data">
 
    <fieldset>
        <legend>Resim Yükle</legend>
        <p>
            <label>Resimleri Seçiniz :</label>
            <!-- 
                F�LE �NPUTUMUZU OLU�TURUYORUZ BURADA D�KKAT ED�LECEK 2 NOKTA VAR ; 
                    1. NAME KISMIMIZDA VERD���M�Z �SM�N SONUNA [] KARAKTERLER�N� YAZMAK , BU RES�MLER�M�Z� D�Z� HAL�NDE YOLLAMAMIZI SA�LAYACAK.
                    2. MULT�PLE=MULT�PLE YAZARAK RES�M SE�ERKEN CTRL YARDIMI �LE �STED���M�Z KADAR RES�M SE�EB�LECE��Z. (SON S�R�M TARAYICILARDA SORUN �IKARMAMAKTA)
            -->
            <input type="file" name="resim[]" multiple="multiple" />
        </p>
        <!-- SON OLARAK SUBM�T BUTONUMUZU OLU�TURUP FORM KISMINI B�T�R�YORUZ. -->
        <input type="submit" name="yukle" value="Resimleri Yükle" />
    </fieldset>
 
</form>
</html>