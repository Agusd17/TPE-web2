<?php

class DBHelper {

    public function __construct() {
        $this->host = 'localhost';
        $this->database = 'tpe_inmobiliaria';
        $this->user = 'root';
        $this->pw = '';
    }

    public function connect() {
        $db = new PDO("mysql:host={$this->host};"."dbname={$this->database};charset=utf8", $this->user, $this->pw);
        return $db;
    }
}