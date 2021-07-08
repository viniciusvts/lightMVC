<?php
    /**
     * verifica se existe um controller disponível, chama seu arquivo e retorna o seu nome
     * @param array $urlExploded array com a url splitada
     */
    function getController($urlExploded) {
        // se vazio, o controller é o index
        $name = !empty($urlExploded[0]) ? $urlExploded[0] : 'index';
        $controllerName = ucfirst($name) . 'Controller';
        if ( file_exists(ROOTDIR . '/controllers/' . $controllerName . '.php') ) {
            require_once ROOTDIR . '/controllers/' . $controllerName . '.php';
            return $controllerName;
        } else {
            return false;
        }
    }

    /**
     * verifica se existe o metodo conrrespondente no controller
     * @param array $urlExploded array com a url splitada
     * @param string $controller já validado
     */
    function getMethod($urlExploded, $controller){
        // metodo deve ser o segundo parametro
        $name = isset($urlExploded[1]) && !empty($urlExploded[1]) ? $urlExploded[1] : 'index';
        return method_exists($controller, $name) ? $name : false;
    }

    /**
     * verifica se existe parametros disponíveis
     * @param array|null $urlExploded array com a url splitada
     */
    function getParams($urlExploded){
        if (count($urlExploded) > 2) {
            $params = array_slice($urlExploded, 2);
            $paramsLenght = count($params);
            $paramResp = [];
            for ($i=0; $i < $paramsLenght; $i+=2) {
                if(isset($params[$i+1])){
                    $paramResp[$params[$i]] = $params[$i+1];
                }
            }
            return $paramResp;
        }
        return [];
    }