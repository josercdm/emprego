<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';
require_once dirname(dirname(dirname(__FILE__))) . '/config.php';

use Modelos\CadastrarModel;

if (isset($_POST['update'])) {
    $userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

    $up = new CadastrarModel();
    $param['id'] = $userid;
    $param['name'] = $name;

    $update = $up->update($param);

    $json['status'] = $update;

    echo json_encode($json);
}

