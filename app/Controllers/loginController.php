<?php
namespace Controles;

use Cores\Controller;

class loginController extends Controller {

    public function index() {
               
        $this->loadTemplate('login');
    }   
    

}

