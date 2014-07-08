<?php
class index_model extends model {
    public function __construct() {
        parent::__construct();
        
    }
    
    public function getdersId($where) {
         $sql="select dersadi from dersler where dersadi=?";
         return $this->db->selecdersid($sql,$where);        
    }
    public function getdersadi($where) {
         $sql="select dersadi from okutman where dersadi=?";
         return $this->db->selecdersid($sql,$where);        
    }
    public function getmdlId($where) {
         $sql="select mdladi from moduller where mdladi=?";
         return $this->db->selecdersid($sql,$where);      
    }
    
    public function isimListele() {
        $sql = "select * from isimler"; 
        return $this->db->select($sql);
        
    }
    public function dersEkle($data) {
            return $this->db->insert("dersler",$data);
           
    }
    public function okutmanEkle($data) {
        return $this->db->insert("okutman",$data);
        
    }
    public function ogrenciEkle($data) {
            return $this->db->insert("d_ogrenciler",$data);
        
        
    }
    public function modulEkle($data) {
        return $this->db->insert("moduller",$data);
        
    }
    public function konuEkle($data) {
        return $this->db->insert("konular",$data);
        
    }
    public function oguncelle($data) {       
        $oid=session::get("oid");
        return $this->db->update("okutman",$data,"oid='$oid'");
        
    }
    public function guncelle($data) {       
        $sdkodu=session::get("dkodu");
        return $this->db->update("dersler",$data,"dersid='$sdkodu'");
        
    }
    public function sil($sdkodu) {
        return $this->db->delete("dersler","dersid='$sdkodu'");
        
    }
    public function modulsil($dmkodu) {
        return $this->db->delete("moduller","mdladi='$dmkodu'");
        
    }
     public function okutmansil($okodu) {
        return $this->db->delete("okutman","username='$okodu'");
        
    }
    public function konusil($kkodu) {
        return $this->db->delete("konular","konuadi='$kkodu'");
        
    }
    public function okutmanListele() {
        $sql = "select oid, dersadi, username, ounvan, email from okutman"; 
        return $this->db->select($sql);
        
    }
    public function dmListele() {
        $sql = "select dersadi,mdladi from moduller"; 
        return $this->db->select($sql);
        
    }
    public function mkListele() {
        $sql = "select mdladi,konuadi from konular"; 
        return $this->db->select($sql);
        
    }
    public function dersListele() {
        $sql = "select * from dersler"; 
        return $this->db->select($sql);
        
    }
   public function cvpgoster($where) {
        $sql="select scev from sinavlar where sno=?";
        return $this->db->selecdersid($sql,$where);
        
    }
    public function guncellecvp($data,$utime) {
//        if (isset($_SESSION["utime"])) {
//            $utime=$_SESSION["utime"];
            return $this->db->update("d_cevapanahtari",$data,"cevapnum='$utime'");
  //      }
//        else {
//            echo 'hata';
//            echo $utime;
//        }
        
    }
    public function cevapekle($data) {
        return $this->db->insert("d_cevapanahtari",$data);
        
    }
}
