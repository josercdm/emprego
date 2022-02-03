<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';
require_once dirname(dirname(dirname(__FILE__))) . '/config.php';

use Modelos\LoginModel;

if (isset($_POST['login'])) {
    $form = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
    parse_str($form, $retorno);

    if ($retorno['email'] == "" || empty($retorno['email']) || $retorno['email'] == NULL) {
        $json['status'] = 'Preencha o campo email!';
    } elseif ($retorno['pass'] == "" || empty($retorno['pass']) || $retorno['pass'] == NULL) {
        $json['status'] = 'Preencha o campo senha!';
    } elseif ($retorno['nivel'] == 0) {
        $json['status'] = 'Selecione o nivel de acesso!';
    } else {

        $lg = new LoginModel();
        $param['email'] = $retorno['email'];
        $param['pass'] = $retorno['pass'];

        if ($retorno['nivel'] == 1) {
            $json['status'] = $lg->loginAdm($param);
        }

        if ($retorno['nivel'] == 2) {
            $json['status'] = $lg->login($param);
        }
    }

    echo json_encode($json);
}

if (isset($_POST['logout'])) {
    $userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_NUMBER_INT);
    $lg = new LoginModel();

    echo $lg->logout($userid);
}
