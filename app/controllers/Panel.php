<?php
class Panel extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::init();
        if(Session::get("login") == false){
            Session::destroy();
            header("Location: ". SITE_URL ."/admin/login");
        }
    }
    public function index(){
        $this->home();   
    }
    public function mailgonderview(){
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/mail");
        $this->load->view("panel/footer");
        
        
    }
    public function mailtopluview(){
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/mailtplu");
        $this->load->view("panel/footer");
        
        
    }
    public function istatistik(){
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("istatistik/sayac");
        $this->load->view("panel/footer");
        
        
    }
    public function mailgonder(){
        $mail=$_POST["email"];
        $konu=$_POST["konu"];
        $mesaj=$_POST["mesaj"];
        $baslik="sinav notunuz"; 
        if (mail($mail, $konu, $mesaj,$baslik)) {
            echo 'mesajınız başarıyla iletilmiştir';
            header("refresh:10;url=http://localhost/mvc/panel/home");
            die('10 saniye sonra anasayfaya gideceksiniz. Bu süreyi beklememek için
            <a href="http://localhost/mvc/panel/home">buraya tıklayın</a>');         
        }  else {
            echo 'hata mesajınız gönderilememiştir. ';
            header("refresh:10;url=http://localhost/mvc/panel/home");
            die('10 saniye sonra anasayfaya gideceksiniz. Bu süreyi beklememek için
            <a href="http://localhost/mvc/panel/home">buraya tıklayın</a>');
        }
    }
     public function toplumail(){
        $konu=$_POST["konu"];
        $mesaj=$_POST["mesaj"];
        mysql_connect("localhost","root","");
        mysql_select_db("mvc");
        mysql_query("SET NAMES UTF8");
        $result=  mysql_query("select * from okutman") or die('Invalid query: ' . mysql_error());
if ($result)
{
    while ($row = mysql_fetch_array($result)) {
                $mail=$row["email"];
//                $mail = explode(",",$mail);
                mail($mail, $konu, $mesaj);
//                header("refresh:3;url=http://localhost/mvc/panel/toplumail");
                
    }
                   
                
    }
            echo 'mesajınız başarıyla iletilmiştir';
            header("refresh:10;url=http://localhost/mvc/panel/home");
            die('10 saniye sonra anasayfaya gideceksiniz. Bu süreyi beklememek için
            <a href="http://localhost/mvc/panel/home">buraya tıklayın</a>');         
        
     }
    public function home(){
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/home");
        $this->load->view("panel/footer");
        
        
    }
    
    public function modulEkleFonks() {
        $i_m=  $this->load->model("index_model");        
        $dersadi=session::get("dersadi");
        $mdladi=$_POST["mdladi"];
        $data=array(
            "dersadi"=>$dersadi,
            "mdladi"=>$mdladi
        );
        $result=$i_m->modulEkle($data);
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
    public function konuEkleFonks() {
        $i_m=  $this->load->model("index_model");
        
        $mdladi=session::get("mdladi");
        $konuadi=$_POST["konuadi"];
        $data=array(
            "mdladi"=>$mdladi,
            "konuadi"=>$konuadi
        );
        $result=$i_m->konuEkle($data);
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
    public function guncelle() {
        $i_m=  $this->load->model("index_model");
        $drskodu=$_POST["drskodu"];
        $dersadi=$_POST["dersadi"];
        $data=array(
            "drskodu"=>$drskodu,
            "dersadi"=>$dersadi
        );
        $result=$i_m->guncelle($data);
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
    public function dersSil($where) {
        $i_m=  $this->load->model("index_model");
        session::set("dkodu",$where);
        $sdkodu=session::get("dkodu");
        $result=$i_m->sil($sdkodu);
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
    public function modulSil($where) {
        $i_m=  $this->load->model("index_model");
        session::set("mkodu",$where);
        $dmkodu=session::get("mkodu");
        $result=$i_m->modulsil($dmkodu);
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
    public function konuSil($where) {
        $i_m=  $this->load->model("index_model");
        session::set("kkodu",$where);
        $kkodu=session::get("kkodu");
        $result=$i_m->konusil($kkodu);
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
    public function dersListele() {
        $i_m=  $this->load->model("index_model");
        $data["dersListele"]=$i_m->dersListele();
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/dersListele",$data);
        $this->load->view("panel/footer");
        
        
    }
    public function dmListele() {
        $i_m=  $this->load->model("index_model");
        $data["dmListele"]=$i_m->dmListele();
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/dmListele",$data);
        $this->load->view("panel/footer");
        
        
    }
    public function mkListele() {
        $i_m=  $this->load->model("index_model");
        $data["mkListele"]=$i_m->mkListele();
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/mkListele",$data);
        $this->load->view("panel/footer");    
    }
    public function dguncelle($data) {
        session::set("dkodu",$data);
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/guncelle");
        $this->load->view("panel/footer");
    }
    public function icerikekle() {
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/icerikekle");
        $this->load->view("panel/footer");
        
    }
    public function modulEkle($where) {
        $i_m=  $this->load->model("index_model");
        $data["dersidg"]=$i_m->getdersId($where);

        //session::set("dersadi", $where);
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/modulEkle",$data);
        $this->load->view("panel/footer");
        
    }
    public function konuEkle($where) {
        $i_m=  $this->load->model("index_model");
        $data["mdladigoster"]=$i_m->getmdlId($where);

        //session::set("dersadi", $where);
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/konuEkle",$data);
        $this->load->view("panel/footer");
        
    }
    public function contentekle() {

        //session::set("dersadi", $where);
        $this->load->view("panel/header");
        $this->load->view("panel/left");
        $this->load->view("panel/newcontent");
        $this->load->view("panel/footer");
        
    }
    public function dersEklef() {
        $form = $this->load->otherClasses('Form');
        
        $form   ->post('drskodu')
                ->isEmpty()
                ->length(0,100);
        
        $form   ->post('dersadi')
                ->isEmpty();
        
        if($form->submit()){
            $data = array(
                'drskodu' => $form->values['drskodu'],
                'dersadi' => $form->values['dersadi']
            );
            
            $i_m=  $this->load->model("index_model");
            $result = $i_m->dersEkle($data);
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
            $this->load->view("panel/icerikekle",$data);
            $this->load->view("panel/footer");
        }
        
    }
    public function mdlEklef() {
        $form = $this->load->otherClasses('Form');
        
        $form   ->post('mdladi')
                ->isEmpty();
        $dersadi=session::get("dersadi");
        if($form->submit()){
            $data = array(
                'dersadi' => $dersadi,
                'mdladi' => $form->values['mdladi']
            );
            
            $i_m=  $this->load->model("index_model");
            $result = $i_m->modulEkle($data);
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
            $this->load->view("panel/newcontent",$data);
            $this->load->view("panel/footer");
        }
        
    }
       
    
}