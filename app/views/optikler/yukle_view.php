<?php
/* �NCEL�KLE POST ED�LEN B�R FORMUMUZ VARMI KONTROL EDEL�M */
if(isset($_POST["yukle"])){ /* POST'UN BA�INDAK� ^ KARAKTER�N� S�L�N�Z. */
 
    /* DAHA SONRA CLASS.UPLOAD.PHP DOSYAMIZI SAYFAMIZA DAH�L EDEL�M. */
    require_once ('class.upload.php');
 
    /* RES�MLER�M�Z D�NG� ��ER�S�NDE UPLOAD EDECE��M�Z ���N �NCE KA� TANE RES�M GELMEKTE ONU BULUYOR VE $resim_sayisi DE���KEN�NE ATIYORUZ. */
    $resim_sayisi   = count($_FILES["resim"]["name"]);
 
    /* FOR D�NG�M�Z� OLU�TURUYORUZ $i DE���KEN� D�Z� �ND�S�M�Z� BEL�RLEYECEK VE GELEN RES�M SAYISI KADAR D�NG�M�Z D�ND�K�E HER B�R D�N��TE 1 ARTACAK */
    for($i=0; $i<$resim_sayisi; $i++) {
 
        /* FORMUMUZDAN GELEN RES�MLER�N B�LG�LER�N� ALALIM */
        $name       = $_FILES["resim"]["name"][$i];     /* RESM�M�Z�N �SM�*/
        $type       = $_FILES["resim"]["type"][$i];     /* RESM�M�Z�N DOSYA UZANTISI*/
        $tmp_name   = $_FILES["resim"]["tmp_name"][$i]; /* RESM�M�Z�N GE��C� DOSYA YOLU */
        $error      = $_FILES["resim"]["error"][$i];    /* RESM�M �LE �LG�L� VARSA HATA KODU */
        $size       = $_FILES["resim"]["size"][$i];     /* RESM�M�Z�N BOYUTU */
 
        /* T�M BU ALDI�IMIZ B�LG�LER� Y�KLEME YAPAB�LMEK ���N ARRAY ��ER�S�NDE TOPLAYIP $resim �SM�NDE B�R DE���KENE ATIYORUZ. */
        $resim = array('name' => $name , 'type' => $type , 'tmp_name' => $tmp_name , 'error' => $error ,'tmp_name' => $tmp_name , 'size' => $size);
 
        /* RES�MLER�N Y�KLENECE�� KLAS�R �SM�N� $klasor DE���KEN�NE ATIYORUZ */
//        $urll=SITE_URL;
        $klasor = "formlar/a5";
 
        /* CLASS.UPLOAD.PHP ��ER�S�NDEK� Y�KLEME FONKS�YONLARIMIZI KULLANMAYA BA�LIYORUZ. */
 
        /* SINIFIMIZI BA�LATIYORUZ */
        $yukle = new upload(@$resim);           
 
        /* E�ER Y�KLEME ��LEM�M�Z GER�EKLE�T� �SE */
            if($yukle->uploaded){
 
                $yukle->process($klasor);    /* RESM�M�Z�N TA�INACA�I KLAS�R */
 
                /* OPS�YONEL SE�ENEKLER VEROT.NET DEN DAHA FAZLA �ZELL��E ULA�AB�L�RS�N�Z. */
                $yukle->image_resize = true; /* RES�M BOYUTLANDIRMAYI AKT�FLE�T�R�YORUZ */
                $yukle->image_x = 250;           /* GEN��L�K DE�ER� */
                $yukle->image_y = 200;           /* Y�KSEKL�K DE�ER� */
 
                /* OPS�YONEL ��LEMLER BA�ARILI OLDU �SE */
                if($yukle->processed){
 
                    /* Y�KLENEN DOSYA �SM�N� ALIP $yuklenen_resim DE���KEN�NE ATIYORUZ */
                    $yuklenen_resim = $yukle->file_dst_name;
 
                    /* Y�KLENEN RESM�M�Z� EKRANA BASIYORUZ (BU KISIMDA VER�TABANINA DA YAZDIRAB�L�RS�N�Z AMACINIZA UYGUN KULLANAB�L�RS�N�Z.)*/
                    //print '<img src="resimler/'.$yuklenen_resim.'" />';
 
                    /* EN SON $yukle DE���KEN�M�Z� TEM�ZL�YORUZ */
                    $yukle->clean(); 
                } /* 3. �F B�T�� */
 
            } /* 2.�F B�T�� */
 
    } /* FOR B�T�� */
 
}/* 1.�F B�T�� */
?>