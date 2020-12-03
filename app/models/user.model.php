<?php 

require_once 'app/helpers/db.helper.php';

class UserModel {

    private $db;
    private $dbHelper;

    function __construct() {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    public function getAll() {

        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    /**
     * Crea un nuevo usuario en la tabla users
     * Por defecto, le asigna rol de usuario normal ("0")
     */
    public function insertUser($username, $email, $password) {

        $hash = password_hash($password, PASSWORD_DEFAULT); 

        $query = $this->db->prepare('INSERT INTO users (username, email, passwd) VALUES (?,?,?)');
        $query->execute([$username, $email, $hash]);

        $user = $this->getById($this->db->lastInsertId());
        // Obtengo y devuelo el usuario nuevo
        return $user;
    }

    /**
     * Recupera el usuario requerido en base al id proporcionado
     */
    public function getById($id) {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$id]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    /**
     * Recupera el usuario requerido en base al email proporcionado
     */
    public function getByUserName($username) {
        $query = $this->db->prepare('SELECT * FROM users WHERE username = ?');
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    
    /**
     * Recupera el usuario requerido en base al email proporcionado
     */
    public function getByUserEmail($email) {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function giveAdmin($id) {
        $query = $this->db->prepare('UPDATE users SET role=1 WHERE id=?');
        $user = $query->execute([$id]);
        return $user;
    }
    
    public function removeAdmin($id) {
        $query = $this->db->prepare('UPDATE users SET role=0 WHERE id=?');
        $user = $query->execute([$id]);
        return $user;
    }
}