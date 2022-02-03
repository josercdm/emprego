<?php

namespace Controles;

use Cores\Controller;
use Modelos\CadastrarModel;
use React\ZMQ\Context;

class homeController extends Controller {

    public function index() {
        if (!isset($_SESSION['nivel'])):

            $include = 'login';
        else:
            if ($_SESSION['nivel'] == 'admin') :
                $cd = new CadastrarModel();
                $read = $cd->read();
                $readOnline = $cd->readOnline(1);
                
                $dataView['read'] = $read;
                $dataView['readOnline'] = $readOnline;
                $dataView['nivel'] = 'admin';
            else:
                $dataView['readOnline'] = array(0);
                $dataView['nivel'] = 'member';
            endif;
            $include = 'home';
        endif;        

        $dataView['nulo'] = true;
        $this->loadTemplate($include, $dataView);
    }

}
