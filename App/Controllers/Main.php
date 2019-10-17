<?php
namespace App\Controllers;

use App\Core\Classes\Controller;

class Main extends Controller {

    function Index () {
        $this->view('template/header');
        $this->view('template/main');
        $this->view('template/footer');
    }
}

?>