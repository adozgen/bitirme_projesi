<?php

// System dosyalarını otomatik include ediyoruz.
function __autoload($className){
    include_once 'system/libs/' . $className . '.php';
}

// Config dosyasını include ediyoruz.
include_once 'app/config/config.php';

// Bootstrap Bölümü
$boot = new Bootstrap();
?>