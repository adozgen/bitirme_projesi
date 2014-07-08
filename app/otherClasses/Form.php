<?php

class Form{
    public $currentValue;
    public $values = array();
    public $errors = array();
    
    public function __construct() {}
    public function post($key){
        $this->values[$key]     = trim($_POST[$key]);
        $this->currentValue    = $key;
        return $this;
    }
    public function isEmpty(){
        if(empty($this->values[$this->currentValue])){
            $this->errors[$this->currentValue]['empty'] = "Lütfen bu alanı boş bırakmayınız.";
        }
        return $this;
    }
    public function length($min = 0, $max){
        if(strlen($this->values[$this->currentValue]) < $min OR strlen($this->values[$this->currentValue]) > $max){
            $this->errors[$this->currentValue]['length'] = "Lütfen " . $min . " ve " . $max . " karakter arasında bir yazı giriniz.";
        }
        return $this;
    }
    public function isMail() {
        if(!filter_var($this->values[$this->currentValue], FILTER_VALIDATE_EMAIL)){
            $this->errors[$this->currentValue]['mail'] = "Lütfen geçerli bir mail adresi giriniz.";
        }
    }
    
    public function submit(){
        if(empty($this->errors)){
            return true;
        }else{
            return false;
        }
    }
}
?>
