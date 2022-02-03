<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';
require_once dirname(dirname(dirname(__FILE__))) . '/config.php';

use Modelos\CadastrarModel;

if (isset($_POST['deletar'])) {
    $userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_NUMBER_INT);

   
        
        $delete = new CadastrarModel();
        $param['id'] = $userid;        
        
        $deleted = $delete->delete($param);
        
        $json['status'] = $deleted;

    echo json_encode($json);
}

