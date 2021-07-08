<?php
require_once ROOTDIR . '/app/abstract/Model.php';

class Filme extends Model
{
    protected $table = 'filmes';
    public function getAll(array $params = []){
        // "SELECT * FROM Orders LIMIT 15 OFFSET 10";
        $limit = isset($_GET['per_page']) ? $_GET['per_page'] : '10';
        $page = isset($params['page']) ? $params['page'] : '1';
        $offset = intval($limit) * (intval($page)-1);
        $queryStatement = 'SELECT * FROM ' . $this->table;
        $queryStatement .= ' LIMIT '. $limit .' OFFSET ' . $offset;
        $result = $this->conn->query($queryStatement);
        return $result;
    }
}