<?php
class Okutman extends Controller{
    public function __construct() {
        parent::__construct();
//        
        // Oturum Kontrolü
//        Session::init();
//        if(Session::get("loginoktmn") == false){
//            Session::destroy();
//            header("Location: ". SITE_URL ."/okutman/login");
//        }
    }
    public function index(){
        $this->login();   
    }
    public function login(){
        // Oturum Kontrolü
        Session::init();
        if(Session::get("loginoktmn") == true){
            header("Location: ". SITE_URL ."/Paneloktmn/homeoktmn");
        }
        
        $this->load->view("admin/loginFormoktmn");
    }
    public function runLogin(){
        $data1 = array(
            ":username" => $_POST["username"],
            ":parola" => $_POST["password"]
        );
        $admin_model = $this->load->model("admin_model");
        $result1 = $admin_model->okutmanKontrol($data1);
        if($result1 == false){
               header("Location:". SITE_URL ."/okutman/login"); 
            
        }else{
            Session::init();
            Session::set("loginoktmn", true);
            Session::set("username", $result1[0]["username"]);
            Session::set("userId", $result1[0]["oid"]);
            header("Location:". SITE_URL ."/paneloktmn/homeoktmn");
            
        }
    }
    public function okutmanekle($data) {
        session::set("oid",$data);
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("okutman/okutmanEkle");
        $this->load->view("panel/footer");
    }
    public function okutmanSil($where) {
        $i_m=  $this->load->model("index_model");
        session::set("okodu",$where);
        $okodu=session::get("okodu");
        $result=$i_m->okutmansil($okodu);
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
    public function okutmanekleme() {
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("okutman/okutmanekleme");
        $this->load->view("panel/footer");
    }
    public function oguncelle() {
        $form = $this->load->otherClasses('Form');
        
        $form   ->post('dersadi')
                ->isEmpty()
                ->length(0,100);
        
        $form   ->post('username')
                ->isEmpty();
        $form   ->post('parola')
                ->isEmpty()
                ->length(0,100);
        
        $form   ->post('ounvan')
                ->isEmpty();
        $form   ->post('email')
                ->isMail();
        
        if($form->submit()){
            $data = array(
                'dersadi' => $form->values['dersadi'],
                'username' => $form->values['username'],
                'parola' => $form->values['parola'],
                'ounvan' => $form->values['ounvan'],
                'email' => $form->values['email']
            );
            
            $i_m=  $this->load->model("index_model");
            $result=$i_m->oguncelle($data);
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
            $this->load->view("okutman/okutmanekle",$data);
            $this->load->view("panel/footer");
        }
        
    
        
    }
    public function okutmanEkleFonks() {
        $form = $this->load->otherClasses('Form');
        
        $form   ->post('dersadi')
                ->isEmpty()
                ->length(0,100);
        
        $form   ->post('username')
                ->isEmpty();
        $form   ->post('parola')
                ->isEmpty()
                ->length(0,100);
        
        $form   ->post('ounvan')
                ->isEmpty();
        $form   ->post('email')
                ->isMail();
        
        if($form->submit()){
            $data = array(
                'dersadi' => $form->values['dersadi'],
                'username' => $form->values['username'],
                'parola' => $form->values['parola'],
                'ounvan' => $form->values['ounvan'],
                'email' => $form->values['email']
            );
            
            $i_m=  $this->load->model("index_model");
            $result=$i_m->okutmanEkle($data);
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
            $this->load->view("okutman/okutmanekleme",$data);
            $this->load->view("panel/footer");
        }
        
    }
    public function okutmanEkleF() {
        $i_m=  $this->load->model("index_model");
        $dersadi=$_POST["dersadi"];
        $kuladi=$_POST["username"];
        $parola=  md5($_POST["parola"]);
        $unvan=$_POST["ounvan"];
        $data=array(
            "dersadi"=>$dersadi,
            "username"=>$kuladi,
            "parola"=>$parola,
            "ounvan"=>$unvan
                
        );
        $result=$i_m->okutmanEkle($data);
        if ($result==1) {
                $mesaj="işlemi başarıyla gerçekleşti";
        }else {
            
                $mesaj="işlemi sırasında hata gerçekleşti";
        }
        session::set("mesaj", $mesaj);
        //$this->home();
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/mesaj");
        $this->load->view("panel/footer");
    }
    public function okutmanListele() {
        $i_m=  $this->load->model("index_model");
        $data["okutmanListele"]=$i_m->okutmanListele();
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("okutman/okutmanListele",$data);
        $this->load->view("panel/footer");
        
        
    }
    
}
