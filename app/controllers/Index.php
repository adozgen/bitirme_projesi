<?php
class Index extends Controller{
    public function __construct() {
        parent::__construct();
        
    }
    public function index(){
        $this->anasayfa();
    }
    public function anasayfa() {
        $this->load->view("anasayfa");
        
    }
    public function anasayfaoptik() {
        $this->load->view("anasayfa/home");
        
    }
    public function isimListele() {
        $i_m=  $this->load->model("index_model");
        $data["isimListele"]=$i_m->isimListele();
        $this->load->view("isimListele",$data);
        
    }
    public function yeniMakale() {
        $this->load->view("yeniMakale");
        
    }
    public function dersEkle() {
        $i_m=  $this->load->model("index_model");
        $drskodu=$_POST["drskodu"];
        $dersadi=$_POST["dersadi"];
        $data=array(
            "drskodu"=>$drskodu,
            "dersadi"=>$dersadi
        );
        $result=$i_m->dersEkle($data);
        if ($result==1) {
            $data["mesaj"]=array(
                "mesaj"=>"kayıt işlemi başarıyla gerçekleşti"
            );   
        }else {
            $data["mesaj"]=array(
                "mesaj"=>"kayıt işlemi sırasında hata gerçekleşti"
            );
        }
        $this->load->view("panel/icerikekle",$data);
    }
    public function guncelle() {
        $i_m=  $this->load->model("index_model");
        $i_m->guncelle();
        
    }
    public function sil() {
        $i_m=  $this->load->model("index_model");
        $i_m->sil();
        
    }
    public function makaleListele() {
        $i_m=  $this->load->model("index_model");
        $data["makaleListele"]=$i_m->makaleListele();
        $this->load->view("makaleListele",$data);
        
    }
}
