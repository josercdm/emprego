<?php

namespace Cores;

class Core {

    public function run() {
        if (isset($_GET['url'])) {
            $url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
        }

        if (!empty($url)) {
            $url = explode('/', $url);

            $controller = $url[0] . 'Controller';
            array_shift($url); // remove a posição 0 do array e reposiciona os demais

            if (isset($url[0]) && !empty($url[0])) {
                $metodo = $url[0];
                array_shift($url); // remove a posição 0 do array e reposiciona os demais
            } else {
                $metodo = 'index';
            }

            if (count($url) > 0) { // aqui a terceira posição do array está na primeira
                $parametros = $url;
            }
        } else {
            $controller = 'homeController';
            $metodo = 'index';
        }

        $caminho = URL_PATH . 'app/Controllers/' . $controller . '.php';

        if (!file_exists($caminho) && !method_exists($controller, $metodo)) {
            $controller = 'erro_404Controller';
            $metodo = 'index';
        }

        if (!isset($parametros)) {
            $parametros = array();
        }

        $class = '\Controles\\' . $controller;
        $inst = new $class;
        $inst->{$metodo}($parametros);
    }

}
