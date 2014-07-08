<?php
class Paneloktmn extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::init();
        if(Session::get("loginoktmn") == false){
            Session::destroy();
            header("Location: ". SITE_URL ."/okutman/login");
        }
    }
    public function index(){
        $this->homeoktmn();   
    }
    public function soruekleme($sid) {
        Session::init();
        if(Session::get("loginoktmn") == false){
            Session::destroy();
            header("Location: ". SITE_URL ."/okutman/login");
        }
        else {
            session_start();
            $_SESSION["sid"]=$sid;
            header("Location: ". SITE_URL ."/editor/soruekle.php");
        }
        
    }
    public function sorugoster() {
        Session::init();
        if(Session::get("loginoktmn") == false){
            Session::destroy();
            header("Location: ". SITE_URL ."/okutman/login");
        }
        else {
            header("Location: ". SITE_URL ."/editor/vericekoktmn.php");
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
        $this->load->view("panel/leftoktmn");
        $this->load->view("panel/mesaj");
        $this->load->view("panel/footer");
        
        
    }
    public function mailgonderview(){
        $this->load->view("panel/header");
        $this->load->view("panel/leftoktmn");
        $this->load->view("panel/mail");
        $this->load->view("panel/footer");
        
        
    }
    public function homeoktmn(){
        $this->load->view("panel/header");
        $this->load->view("panel/leftoktmn");
        $this->load->view("panel/homeoktmn");
        $this->load->view("panel/footer");
        
        
    }
       
    
}