<?php
class model {
    protected $db=array();
    public function __construct() {
        $this->db=new database();
        
    }
}
