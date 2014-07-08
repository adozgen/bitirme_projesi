<?php
class soru_model extends model {
    public function __construct() {
        parent::__construct();
        
    }
    public function sorulistele() {
        $sql = "select dersadi from dersler"; 
        return $this->db->select($sql);
        
    }
    public function sorugoster($where) {
         $sql="select dersadi from dersler where dersadi=?";
         return $this->db->selecdersid($sql,$where);        
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
    public function sorusil($sid) {
        return $this->db->delete("sorular","sid='$sid'");
        
    }
    public function sinavEkleme($data) {
        mysql_connect("localhost","root","");
        mysql_select_db("mvc");
        foreach($data as $key => $value)
     {
         $sno=$value["sno"];
         $dersadi=$value["dersadi"];
         $sdonem=$value["sdonem"];
         $starh=$value["starh"];
     }
             
         $ekle=mysql_query("INSERT INTO sinsorular (dersadi,sno,sdonem,starh) VALUES ('".$dersadi."','".$sno."','".$sdonem."','".$starh."')") or die (mysql_Error());  
                     
    }
    public function sinavEkle($sorularr) {
     mysql_connect("localhost","root","");
     mysql_select_db("mvc");
     $sno=$_SESSION["sno"];
     foreach($sorularr as $key => $value)
     {
         $sid=$value;
         $query= mysql_query("SELECT * FROM sorular WHERE sid = '$sid'") or die(mysql_error());
         while($sql= mysql_fetch_array($query)){
             $scev=$sql["dcev"];
             $ssoru=$sql["soru"];
             $query= mysql_query("SELECT ssoru FROM sinavlar WHERE ssoru = '$ssoru' and scev='$scev' and sno='$sno'") or die(mysql_error());
             $cek= mysql_fetch_array($query);
             $soru=$cek["ssoru"];
             if ($soru==$ssoru) {
                 echo "<font color='red'>"."HATA:bu soru daha önce eklendi</br>"."</font>";
             } else {
                 $ekle=mysql_query("INSERT INTO sinavlar (ssoru,scev,sno) VALUES ('".$ssoru."','".$scev."','".$sno."')") or die (mysql_Error());  
             }          
    }   
 }       
    }
    public function snvEkle($sorularr) {
     mysql_connect("localhost","root","");
     mysql_select_db("mvc");
     $sinid=$_SESSION["sinid"];
     foreach($sorularr as $key => $value)
     {
         $sid=$value;
         $query= mysql_query("SELECT * FROM sorular WHERE sid = '$sid'") or die(mysql_error());
         while($sql= mysql_fetch_array($query)){
             $scev=$sql["dcev"];
             $ssoru=$sql["soru"];
             $query= mysql_query("SELECT ssoru FROM ssorular WHERE sinid='$sinid' and ssoru = '$ssoru' and scev='$scev'") or die(mysql_error());
             $cek= mysql_fetch_array($query);
             $soru=$cek["ssoru"];
             if ($soru==$ssoru) {
                 echo "<font color='red'>"."HATA:bu soru daha önce eklendi</br>"."</font>";
             } else {
                 $ekle=mysql_query("INSERT INTO ssorular (sinid,ssoru,scev) VALUES ('".$sinid."','".$ssoru."','".$scev."')") or die (mysql_Error());  
             }          
    }   
 }       
    }
    
}
