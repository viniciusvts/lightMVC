<?php
require_once ROOTDIR . '/app/abstract/Database.php';
if ( file_exists(ROOTDIR . '/databases/' . DATABASE . '.php') ) {
    require_once ROOTDIR . '/databases/' . DATABASE . '.php';
} else {
    echo 'Configuração DATABASE especificada não foi implementada';
    die;
}

abstract class Model
{
    protected $conn;
    
    public function __construct(){
        $dataBaseName = DATABASE;
        $this->conn = new $dataBaseName();
        if(!($this->conn instanceof Database)){
            echo 'Configuração DATABASE especificada inválida';
            die;
        }
    }
}