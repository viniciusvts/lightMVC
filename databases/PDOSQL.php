<?php
require_once ROOTDIR . '/app/abstract/Database.php';

/**
 * Conexão com o bd mysql
 */
class PDOSQL extends Database
{
    public function __construct(){
        try{
            $this->conn = new PDO( 'mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            print "Erro!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function __destruct(){
        $this->conn = null;
    }
    public function query(string $query, array $parameters = []){
        $stmt = $this->conn->prepare($query);
        foreach( $parameters as $key => $value ) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}