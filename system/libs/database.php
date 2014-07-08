<?php
class database extends PDO{
    public function __construct() {
        $dsn="mysql:dbname=mvc;host=localhost";
        $username="root";
        $passwd="";
        parent::__construct($dsn, $username, $passwd);
        $this->query("set names 'utf8'");
        $this->query("set character set utf8");
        
    }
    
    public function selecdersid($sql,$where,$fetchmode=  PDO::FETCH_ASSOC) {
        $sth=  $this->prepare($sql);
        $sth->bindParam(1, $where, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetchAll($fetchmode);
    }
    public function select($sql, $array=  array(), $fetchmode=  PDO::FETCH_ASSOC) {
        $sth=  $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue($key, $value);
            
        }
        $sth->execute();
        return $sth->fetchAll($fetchmode);
    }
    public function affectedRows($sql, $array=array()) {
        $sth=  $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue($key, $value);
            
        }
        $sth->execute();
        return $sth->rowCount();
        
    }
    public function insert($tableName,$data) {
        $fieldKeys=  implode(",", array_keys($data));
        $fieldsValues=":".implode(", :", array_keys($data));
        $sql="insert into $tableName($fieldKeys) values($fieldsValues)";
        $sth=  $this->prepare($sql);
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
            
        }
        return $sth->execute();
        
    }
    
    public function update($tableName,$data,$where) {
        $updateKeys=null;
        foreach ($data as $key => $value) {
            $updateKeys=$updateKeys."$key=:$key,";
            
        }
        $updateKeys=  rtrim($updateKeys,",");
        $sql="update $tableName set $updateKeys where $where";
        $sth=$this->prepare($sql);
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        return $sth->execute();
    }
    public function delete($tableName,$where) {
        
        return $this->exec("delete from $tableName where $where");
        
    }
    
    
}
