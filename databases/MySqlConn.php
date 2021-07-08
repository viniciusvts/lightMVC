<?php
require_once ROOTDIR . '/app/abstract/Database.php';

/**
 * Conexão com o bd mysql
 */
class MySqlConn extends Database
{
    function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_errno) {
            echo "Erro: " . $this->conn->connect_error;
            exit();
          }
    }
    function __destruct(){
        $this->conn->close();
    }
    function query(string $arg){
        if($query = $this->conn->query($arg)){
            $result = [];
            while($obj = $query->fetch_object()){
                $result[] = $obj;
            }
        }
        return $result;
    }
}