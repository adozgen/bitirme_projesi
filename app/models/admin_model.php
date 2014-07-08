<?php

class admin_model extends model{
    public function __construct() {
        parent::__construct();
    }
    
    public function userControl($array = array()){
        $sql = "SELECT * FROM kullanicilar WHERE kadi = :kadi AND parola = :parola";
        $count = $this->db->affectedRows($sql, $array);
        
        if($count > 0){
            $sql = "SELECT * FROM kullanicilar WHERE kadi = :kadi AND parola = :parola";
            return $this->db->select($sql, $array);
        }else{
            return false;
        }
    }
    public function okutmanKontrol($array = array()){
        $sql = "SELECT * FROM okutman WHERE username = :username AND parola = :parola";
        $count = $this->db->affectedRows($sql, $array);
        
        if($count > 0){
            $sql = "SELECT * FROM okutman WHERE username = :username AND parola = :parola";
            return $this->db->select($sql, $array);
        }else{
            return false;
        }
    }
    
}