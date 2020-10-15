<?php 

class UserModel {

    private $db;

    function __construct() {
        $this->db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=tpe_inmobiliaria;charset=utf8', 'root', '');
        return $db;
    }

    /**
     * Crea un nuevo usuario en la tabla users
     * Por defecto, le asigna rol de usuario normal ("0")
     */
    public function insert_user($email, $password) {

        $query = $this->db->prepare('INSERT INTO users (email, passwd) VALUES (?,?)');
        $query->execute([$email, $password]);

        // Obtengo y devuelo el ID del usuario nuevo
        return $this->db->lastInsertId();
    }

    /**
     * Recupera el usuario requerido en base al email proporcionado
     */
    public function getByUserEmail($email) {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $inmueble = $query->fetch(PDO::FETCH_OBJ);
        return $inmueble;
    }
}