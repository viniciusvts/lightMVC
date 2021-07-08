<?php
require_once ROOTDIR . '/config.php';
/**
 * interface de conexão com o banco de dados.
 * Dependa de abstrações não de objetos concretos
 */
abstract class Database
{
    /**
     * A conecção com o banco
     */
    protected $conn;
    
    abstract public function __construct();
    abstract public function __destruct();

    /**
     * execução das querys
     */
    abstract public function query(string $arg);
}
