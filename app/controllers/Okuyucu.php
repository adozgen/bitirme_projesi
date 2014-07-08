<?php
class Okuyucu extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
      //  Session::init();
      //  if(Session::get("login") == false){
         //   Session::destroy();
           // header("Location: ". SITE_URL ."/admin/login");
       // }
    }
    public function veritaban() {
 mysql_connect("localhost","root","");
 mysql_select_db("mvc");
 mysql_query("SET NAMES UTF8");
    }
    public function anasayfa() {
        $this->load->view("anasayfa/home_3");
    }
    public function cvpAnhtrHazirla() {
     //   $this->load->view("panel/header");
//        $this->load->view("panel/left");
        $this->load->view("anasayfa/home_1");
          $this->load->view("cvpAnahtar/cAnahtar");
 //         $this->load->view("cvpAnahtar/cevaplar");

        
//        $this->load->view("panel/footer");
        
    }
    public function cvpanahtari() {    
        $i_m=  $this->load->model("index_model");
        $sinid=$_POST["sinid"];
        $utime=$_POST["utime"];
        $ders=$_POST["ders"];
        $stipi=$_POST["stipi"];
        $kturu=$_POST["kturu"];
        $this->veritaban();
        $i=1;
        $k=1; 
        $result = mysql_query("SELECT id FROM `d_cevapanahtari` WHERE kturu='$kturu' AND utime='$utime' AND ders='$ders' AND stipi='$stipi' LIMIT 1") or die('Invalid query: ' . mysql_error());
if ($result) {
    $sql=mysql_query("select scev from ssorular where sinid='$sinid'");
                if ($sql) {
                while ($kayit = mysql_fetch_array($sql)) {
                      $scev=$kayit["scev"]; 
                      switch ($scev) {
                          case 'A':
                              $data=array(
                          "stipi"=>$stipi,
                          "ders"=>$ders,
                          "kturu"=>$kturu,
                          "cevapnum"=>$i,
                          "A"=>$k     
                      );
                              break;
                          case 'B':
                              $data=array(
                          "stipi"=>$stipi,
                          "ders"=>$ders,
                          "kturu"=>$kturu,
                          "cevapnum"=>$i,
                          "B"=>$k     
                      );
                              break;
                          case 'C':
                              $data=array(
                          "stipi"=>$stipi,
                          "ders"=>$ders,
                          "kturu"=>$kturu,
                          "cevapnum"=>$i,
                          "C"=>$k     
                      );
                              break;
                          case 'D':
                              $data=array(
                          "stipi"=>$stipi,
                          "ders"=>$ders,
                          "kturu"=>$kturu,
                          "cevapnum"=>$i,
                          "D"=>$k     
                      );
                              break;

                          default:
                              break;
                      }
                      $result=$i_m->guncellecvp($data,$i);
                      $i++;
                      
                }
            }

            $this->load->view("anasayfa/home_1");
                      }


 else {
    echo 'olmayan veri güncellenmeye çalışıldı';
}

    }
    public function cvpGoster() {
        $i_m=  $this->load->model("index_model");
     //   $this->veritaban();
        $this->veritaban();
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
$result = mysql_query("SELECT sinid FROM `ssinavlar` WHERE kturu='$kturu' AND starh='$starh' AND dersadi='$ders' AND stipi='$stipi' LIMIT 1");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
if (mysql_num_rows($result) > 0)
{
    while ($row = mysql_fetch_assoc($result)) {
                $_SESSION["sinid"]=$row["sinid"];
                $sinid=$_SESSION["sinid"];              
         }
         $this->load->view("anasayfa/home_1");
         $this->load->view("cvpAnahtar/cevaplar",$data);
}
 else {
            echo 'böyle bir sınav sistemde bulunmamaktadır.';
            header("refresh:2;url=http://localhost/mvc/okuyucu/cvpAnhtrHazirla");
            die(' 2 saniye sonra bir önceki sayfaya yönlendirileceksiniz.');
 }
 
    }

    
}
