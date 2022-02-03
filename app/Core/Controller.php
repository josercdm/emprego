<?php

namespace Cores;

use Modelos\NotificationsModel;
use Modelos\LoginModel;

class Controller {

    public $dataModels;

    public function __construct() {
        $this->dataModels = array();
    }

    // CARREGA O SITE PRINCIPAL
    public function loadTemplate($nameView, $dataView = array()) {
        $this->dataModels = $dataView; // recebe dados do DB via Models

        include URL_PATH . 'app/Views/template.php';
    }

    public function loadViewSite($nameView, $dataView = array()) {

        extract($dataView);        

        include URL_PATH . 'app/Views/' . $nameView . '.php';
    }

    public function loadHeader($nameView, $dataView = array()) {


        extract($dataView);
        include URL_PATH . 'app/Views/header.php';
    }

    public function loadFooter($nameView, $dataView = array()) {

        include URL_PATH . 'app/Views/footer.php';
    }

    //=============================
}
