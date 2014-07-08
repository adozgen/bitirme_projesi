<?php
class Sorular extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::init();
        if(Session::get("login") == false){
            Session::destroy();
            header("Location: ". SITE_URL ."/admin/login");
        }
    }
    public function soruekleme($sid) {
        Session::init();
        if(Session::get("login") == false){
            Session::destroy();
            header("Location: ". SITE_URL ."/admin/login");
        }
        else {
            session_start();
            $_SESSION["sid"]=$sid;
            header("Location: ". SITE_URL ."/editor/soruekle.php");
        }
        
    }
    public function sorusil($sid) {
        $s_m=  $this->load->model("soru_model");
        $result=$s_m->sorusil($sid);
        if ($result==1) {
                $mesaj="işlemi başarıyla gerçekleşti";
                
        }else {
            
                $mesaj="işlemi sırasında hata gerçekleşti";
                
        }
        session::set("mesaj", $mesaj);
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/mesaj");
        $this->load->view("panel/footer");
        
        
    }
    public function sorugoster() {
        Session::init();
        if(Session::get("login") == false){
            Session::destroy();
            header("Location: ". SITE_URL ."/admin/login");
        }
        else {
            header("Location: ". SITE_URL ."/editor/vericek.php");
        }
        
    }
//    public function soruhazirla() {
//        $this->load->view("panel/header");
////        $this->load->view("panel/left");
//        $this->load->view("sorular/sorular");
////        $this->load->view("panel/footer");
//        
//    }
    public function srhazirla() {
        $this->load->view("panel/header");
//        $this->load->view("panel/left");
        $this->load->view("sinavsoru/sorular");
//        $this->load->view("panel/footer");
        
    }
   public function sinavv() {
        $this->load->view("panel/header");
//        $this->load->view("panel/left");
        $this->load->view("sorular/sinavyap");
//        $this->load->view("panel/footer");
        
    }
    public function srgoster() {
        $drsadi=$_POST['ders'];
        $knuadi=$_POST['konu'];
        $mdladi=$_POST['mdl'];
        $zder=$_POST['zder'];
//        $kadi=$_POST['kadi'];
        $adet=$_POST['ssayi'];
        $data=array(
            "dersadi"=>$drsadi,
            "konuadi"=>$knuadi,
            "mdladi"=>$mdladi,
            "zder"=>$zder,
//            "kadi"=>$kadi,
            "adet"=>$adet
                
        );
        $this->load->view("panel/header");
        $this->load->view("sinavsoru/sinav",$data);
        $this->load->view("panel/footer");
        
        
    }
//    public function sinav() {
//        $sno=$_POST["sno"];
//        $_SESSION["sno"]=$sno;
//        $drsadi=$_POST['ders'];
//        $knuadi=$_POST['konu'];
//        $mdladi=$_POST['mdl'];
//        $zder=$_POST['zder'];
////        $kadi=$_POST['kadi'];
//        $adet=$_POST['ssayi'];
//        $data=array(
//            "dersadi"=>$drsadi,
//            "konuadi"=>$knuadi,
//            "mdladi"=>$mdladi,
//            "zder"=>$zder,
////            "kadi"=>$kadi,
//            "adet"=>$adet
//                
//        );
//        $this->load->view("panel/header");
//        $this->load->view("sorular/sinav",$data);
//        $this->load->view("panel/footer");
//        
//        
//    }
//   public function sinavm() {
//   if(isset($_POST['dersler'])) {
//     $sorularr=$_POST["dersler"];
//     $s_m=  $this->load->model("soru_model");
//     $result=$s_m->sinavEkle($sorularr);
//     if ($result) {
//            echo 'sorular eklendi';
//            header("refresh:2;url=http://localhost/mvc/Sorular/soruhazirla");
//            die(' 2 saniye sonra soru hazırlama ekranına gideceksiniz.');
//                
//        }
//        else {
//            header("refresh:2;url=http://localhost/mvc/Sorular/soruhazirla");
//            die(' 2 saniye sonra soru hazırlama ekranına gideceksiniz.');
//                
//        }
//   }
//   else {
//       echo 'hiç soru seçimi yapmadınız';
//       header("refresh:2;url=http://localhost/mvc/Sorular/soruhazirla");
//       die(' 2 saniye sonra soru hazırlama ekranına gideceksiniz.');
//   }
//   
//   }
   public function sorusec() {
   if(isset($_POST['dersler'])) {
     $sorularr=$_POST["dersler"];
     $s_m=  $this->load->model("soru_model");
     $result=$s_m->snvEkle($sorularr);
     if ($result) {
            echo 'sorular eklendi';
            header("refresh:2;url=http://localhost/mvc/Sorular/srhazirla");
            die(' 2 saniye sonra soru hazırlama ekranına gideceksiniz.');
                
        }
        else {
            header("refresh:2;url=http://localhost/mvc/Sorular/srhazirla");
            die(' 2 saniye sonra soru hazırlama ekranına gideceksiniz.');
                
        }
   }
   else {
       echo 'hiç soru seçimi yapmadınız';
       header("refresh:2;url=http://localhost/mvc/Sorular/srhazirla");
       die(' 2 saniye sonra soru hazırlama ekranına gideceksiniz.');
   }
   
   }
    }
