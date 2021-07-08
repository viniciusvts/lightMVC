<?php
require_once 'models/Filme.php';

class FilmeController
{
    public function index($params = []){
        $filme = new Filme();
        $filmes = $filme->getAll($params);
        $_REQUEST['filmes'] = $filmes;
        require_once 'views/filme/index.php';
    }
}