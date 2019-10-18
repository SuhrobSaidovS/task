<?php

namespace App\Controllers;

use App\Core\Classes\Controller;
use App\Models\Save;

class Calculate extends Controller {

    public $result = [];

    public $operation;

    public $data;

    function Index () {

        $this->view('template/header');
        $this->view('calculation/index');
        $this->view('template/footer');
        
    }

    function procces ($parameter = '') {
        $this->view('template/header');

        if(empty($_FILES['fupload']['name']) || empty($_POST['type'])){
            $this->view('calculation/error');
        } else {

            $file = file($_FILES['fupload']['tmp_name']);
            $operation = $_POST['type'];
            $c = count($file);
            for($i = 0; $i < $c; $i++)
            {
                $line = explode(' ', $file[$i]);
                $this->{$operation}($line); // tut saves to data
                $this->sort($line); // save v result
            }

            $save = new Save();
            $save->apply($this->result);
            $this->view('calculation/success', [
                "links" => $save->links
            ]);
        }
        $this->view('calculation/index');
        $this->view('template/footer');

    }

    public function sort($line) {
        $this->result[$this->data > 0 ? 'plus' : 'minus'][$line[0] . $this->operation . $line[1]] = $this->data;
    }

    public function multiply($params){
        $this->data = $params[0] * $params[1];
    }


    public function devide($params){
        $this->data = $params[0] / $params[1];
    }

    public function plus($params){
        $this->data = $params[0] + $params[1];
    }

    public function minus($params){
        $this->data = $params[0] - $params[1];
    }

}

?>