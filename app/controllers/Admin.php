<?php

class Admin extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->login();
    }
    
    public function login(){
        // Oturum Kontrolü
        Session::init();
        if(Session::get("login") == true){
            header("Location: ". SITE_URL ."/panel/home");
        }
        
        $this->load->view("admin/loginForm");
    }
    public function loginoptik(){
        // Oturum Kontrolü
        Session::init();
        if(Session::get("login") == true){
            header("Location:". SITE_URL ."/index/anasayfaoptik");
        }
        $this->load->view("admin/loginFormo");
    }
    
    public function runLogin(){
        $optik=$_POST["giris"];
        $data = array(
            ":kadi" => $_POST["username"],
            ":parola" => $_POST["password"]
        );
        $admin_model = $this->load->model("admin_model");
        $result = $admin_model->userControl($data);
        if($result == false){
               header("Location:". SITE_URL ."/admin/login"); 
            
        }else{
            Session::init();
            Session::set("login", true);
            Session::set("username", $result[0]["kadi"]);
            Session::set("userId", $result[0]["id"]);
            if (isset($optik)) {
                header("Location:". SITE_URL ."/index/anasayfaoptik");
            } else {
            header("Location:". SITE_URL ."/panel/home");
            }
        }
    }
    public function mailgonder() {
        
        mail(
     'tapolat13@gmail.com',
     'Works!',
     'An email has been generated from your localhost, congratulations!');
        
    }
    public function logout(){
        Session::init();
        Session::destroy();
        header("Location:". SITE_URL ."");
    }
    public function ogrencekle(){
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("okutman/ogrenci");
        $this->load->view("panel/footer");
    }
    public function ogrencikyt(){
        
        $form = $this->load->otherClasses('Form');
        
        $form   ->post('no')
                ->isEmpty()
                ->length(0,4);
        
        $form   ->post('ad')
                ->isEmpty();
        $form   ->post('soyad')
                ->isEmpty()
                ->length(0,100);
        
        $form   ->post('sinif')
                ->isEmpty();
        $form   ->post('bolum')
                ->isEmpty();
        $form   ->post('email')
                ->isMail();
        if($form->submit()){
            $data = array(
                'num' => $form->values['no'],
                'ad' => $form->values['ad'],
                'soyad' => $form->values['soyad'],
                'sinif' => $form->values['sinif'],
                'sube' => $form->values['bolum'],
                'email' => $form->values['email']
            );
            
            $i_m=  $this->load->model("index_model");
            $result=$i_m->ogrenciEkle($data);
            if ($result) {
                $mesaj="işlemi başarıyla gerçekleşti";
                
        }else {
            
                $mesaj="işlemi sırasında hata gerçekleşti";
                
        }
        session::set("mesaj", $mesaj);
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/mesaj");
        $this->load->view("panel/footer");
            
        }else{
            $data["formErrors"] = $form->errors;
            $this->load->view("panel/header");
            $this->load->view("panel/left");
            $this->load->view("okutman/ogrenci",$data);
            $this->load->view("panel/footer");
        }
    }
}