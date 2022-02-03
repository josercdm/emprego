<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';
require_once dirname(dirname(dirname(__FILE__))) . '/config.php';

use Modelos\CadastrarModel;

if (isset($_POST['register'])) {
    $form = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
    parse_str($form, $retorno);

    if ($retorno['name'] == "" || empty($retorno['name']) || $retorno['name'] == NULL) {
        $json['status'] = 'Preencha o campo nome!';
    } elseif ($retorno['email'] == "" || empty($retorno['email']) || $retorno['email'] == NULL) {
        $json['status'] = 'Preencha o campo email!';
    } elseif ($retorno['pass'] == "" || empty($retorno['pass']) || $retorno['pass'] == NULL) {
        $json['status'] = 'Preencha o campo senha!';
    } elseif ($retorno['pass2'] == "" || empty($retorno['pass2']) || $retorno['pass2'] == NULL) {
        $json['status'] = 'Preencha o campo senha 2!';
    } elseif ($retorno['pass'] != $retorno['pass2']) {
        $json['status'] = 'As senhas estão diferentes!';
    } else {
        
        $create = new CadastrarModel();
        $param['name'] = $retorno['name'];
        $param['email'] = $retorno['email'];
        $param['pass'] = password_hash($retorno['pass'], PASSWORD_BCRYPT);
        $param['data'] = date('Y-m-d G:i:s');
        
        $created = $create->create($param);
        
        $json['status'] = $created;
    }

    echo json_encode($json);
}

