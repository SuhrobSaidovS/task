<?php
namespace App\Core\Classes;

abstract class FileDb {

    protected $db;

    function __construct () {

        $this->db = 'file';
        
    }

}

?>