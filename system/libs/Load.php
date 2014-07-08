<?php
class Load {
    public function __construct() {
        
    }
    public function viewhtml($fileName,$data=false) {
        if ($data==true) {
            extract($data);
        }
        include 'editor/'.$fileName.'.html';
        
    }
    public function view($fileName,$data=false) {
        if ($data==true) {
            extract($data);
        }
        include 'app/views/'.$fileName.'_view.php';
        
    }
    public function model($fileName) {
        include 'app/models/'.$fileName.".php";
        return new $fileName();
        
    }
    public function otherClasses($fileName){
        include "app/otherClasses/" . $fileName . ".php";
        return new $fileName();
    }
    public function editor($fileName){
        include "editor/" . $fileName . ".php";
        return new $fileName();
    }
}
