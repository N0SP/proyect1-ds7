<?php
require_once("db.php");
require_once('navbar.php');
require_once('functions.php');

class modeloCredencialesDB {
    protected $_db;

    public function __construct() {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->_db->connect_error) {
            die("Fallo al conectar a la base de datos: " . $this->_db->connect_error);
        }
    }
}

?>