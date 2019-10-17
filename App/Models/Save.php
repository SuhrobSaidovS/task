<?php
namespace App\Models;

use App\Core\Classes\FileDb;

class Save extends FileDb {

    public $links = [];

    public function apply($result) {
        $this->{$this->db}($result, 'plus');
        $this->{$this->db}($result, 'minus');
    }

    public function file($data, $operation) {

        $this->links[] = PROTOCOL .'://' . WEB_URI . PUBLIC_FOLDER . date('YmdHis').'_'. $operation .'.txt';
        $fp = fopen(
            ROOT . PUBLIC_FOLDER . date('YmdHis').'_'. $operation .'.txt', 'w'
        );
        fwrite($fp, implode($data[$operation],PHP_EOL));
        fclose($fp);
    }

}

?>