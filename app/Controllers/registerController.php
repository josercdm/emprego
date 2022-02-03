<?php
namespace Controles;

use Cores\Controller;

class registerController extends Controller {

    public function index() {
               
        $this->loadTemplate('register');
    }   
    

}

