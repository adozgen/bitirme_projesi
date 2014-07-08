<?php
ini_set("max_execution_time","30000");
class Optik extends Controller{
    public function __construct() {
        parent::__construct();
        
    }
    public function veritaban() {
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
    }
    public function tumkatagoriler() {
        $this->load->view("anasayfa/home_3");
    }
    public function sonucmail() {
        $this->load->view("anasayfa/home_3");
        $this->load->view("anasayfa/sonucmail");
    }
    public function sonucgonder() {
        $konu=$_POST["konu"];
        $baslik=$_POST["mesaj"];
        $this->veritaban();
        $result=  mysql_query("select email,basari from d_ogrenciler o, d_rapor r where o.num=r.ogrnum") or die('Invalid query: ' . mysql_error());
if ($result)
{
    while ($row = mysql_fetch_array($result)) {
                $mail=$row["email"];
                $mesaj=$row["basari"];
//                $mail = explode(",",$mail);
                mail($mail, $konu, $mesaj,$baslik);
//                header("refresh:3;url=http://localhost/mvc/panel/toplumail");
                
    }
                   
                
    }
            echo 'mesajınız başarıyla iletilmiştir';
            header("refresh:10;url=http://localhost/mvc/optik/tumkatagoriler");
            die('10 saniye sonra anasayfaya gideceksiniz. Bu süreyi beklememek için
            <a href="http://localhost/mvc/panel/home">buraya tıklayın</a>'); 
    }
    public function resimyukle(){
        $this->load->view("anasayfa/home_1");
        $this->load->view("optikler/ogroptikler");
    }
    public function optikyukle(){
        $this->load->view("anasayfa/home_2");
        $this->load->view("optikler/yukle");
        echo 'islem basarıyla gerçekleşti.';
    }
    public function sinavBilgiler(){
        $this->load->view("anasayfa/home_2");
        $this->load->view("cvpAnahtar/cevap");
        
    }
    public function sinavBilg(){
        set_time_limit(0);
        session_start();
        $stipi=$_POST["stipi"];
        $ders=$_POST["ders"];
        $starh=$_POST["starh"];
        $kturu=$_POST["kturu"];
        $data=array(
            "stipi"=>$stipi,
            "ders"=>$ders,
            "utime"=>$starh,
            "kturu"=>$kturu
        );
        $_SESSION["data"]=$data;
        header("Location: ". SITE_URL ."/a5reader.php");
    }
    public function a5reader(){
        header("Location: ". SITE_URL ."/a5reader.php");
    }
    public function a5sonuc(){
        header("Location: ". SITE_URL ."/a5pdfsonuc.php");
    }
}