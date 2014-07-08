<?php
class Sinavlar extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::init();
        if(Session::get("login") == false){
            Session::destroy();
            header("Location: ". SITE_URL ."/admin/login");
        }
    }
//    public function sinavhazirla() {
//        $this->load->view("panel/header");
////        $this->load->view("panel/left");
//        $this->load->view("sinavlar/sinavhaz");
////        $this->load->view("panel/footer");
//        
//    }
    public function sinavkagt() {
  //      $this->load->view("panel/header");
//        $this->load->view("panel/left");
        $this->load->view("sinavlar/kitabcik");
//        $this->load->view("panel/footer");
        
    }
    public function sinavhazir() {
        $this->load->view("panel/header");
//        $this->load->view("panel/left");
        $this->load->view("sinavlar/sinavyap");
        
//        $this->load->view("panel/footer");
        
    }
    public function snvhazirla() {
        $this->load->view("panel/header");
//        $this->load->view("panel/left");
        $this->load->view("sinavsoru/sinavhaz");
//        $this->load->view("panel/footer");
        
    }
    public function snvhazirlama() {
        $i_m=  $this->load->model("index_model");
     //   $this->veritaban();
        mysql_connect("localhost","root","");
        mysql_select_db("mvc");
        mysql_query("SET NAMES UTF8");
        $stipi=$_POST["stipi"];
        $ders=$_POST["ders"];
        $starh=$_POST["starh"];
        $kturu=$_POST["kturu"];
        $_SESSION["starh"]=$starh;
        $_SESSION["sdonem"]=$stipi;
        $_SESSION["sders"]=$ders;
        $_SESSION["kturu"]=$kturu;
$result = mysql_query("SELECT sinid FROM `ssinavlar` WHERE kturu='$kturu' AND starh='$starh' AND dersadi='$ders' AND stipi='$stipi' LIMIT 1") or die('Invalid query: ' . mysql_error());
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
if (mysql_num_rows($result) > 0)
{
    while ($row = mysql_fetch_assoc($result)) {
                $_SESSION["sinid"]=$row["sinid"];
                $sinid=$_SESSION["sinid"];              
         }
         echo 'böyle bir sınav sistemde bulunmaktadır.';
            header("refresh:2;url=http://localhost/mvc/sinavlar/snvhazirla");
            die(' 2 saniye sonra sinav seçim ekranına döneceksiniz.');
//         $this->load->view("anasayfa/home");
//         $this->load->view("cvpAnahtar/cevaplar",$data);
}
//if ($result) {
//        while ($row = mysql_fetch_assoc($result)) {
//                $_SESSION["sinid"]=$row["sinid"];              
//         }
//    echo 'böyle bir sınav sistemde bulunmaktadır.';
//            header("refresh:2;url=http://localhost/mvc/sinavlar/snvhazirla");
//            die(' 2 saniye sonra sınav kitapçığınız hazırlanacaktır.');   
//}
 else {
     $ekle=mysql_query("INSERT INTO ssinavlar (dersadi,stipi,starh,kturu) VALUES ('".$ders."','".$stipi."','".$starh."','".$kturu."')") or die (mysql_Error());
        if ($ekle) {
            $_SESSION["sinid"] = mysql_insert_id();
            echo 'bilgiler eklendi';
            header("refresh:2;url=http://localhost/mvc/sorular/srhazirla");
            die(' 2 saniye sonra soru seçme ekranına yönlendirileceksiniz.');
                
        }
          
//            $this->load->view("panel/header");
//            $this->load->view("sorular/sorular",$data);
 }
 
    }
       
    }
