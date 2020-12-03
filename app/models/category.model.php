<?php 

require_once 'app/helpers/db.helper.php';

class CategoryModel {

    private $db;
    private $dbHelper;

    function __construct() {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    /**
     * Trae todas las categorías existentes en la base de datos
     */
    function getAll() {

        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();

        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    /**
     * Devuelve la categoría seleccionada
     */
    function getCat($id) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id = ?');
        $query->execute([$id]);

        $cat = $query->fetch(PDO::FETCH_OBJ);

        return $cat;
    }

    /**
     * Devuelve el id de la categoría recibida
     */
    function getCatId($cat) {

        $query = $this->db->prepare('SELECT id FROM categoria WHERE nombre = ?');
        $query->execute([$cat]);

        $catItem = $query->fetch(PDO::FETCH_OBJ);

        return $catItem->id;

    }

    /**
     * Inserta la categoría en la base de datos
     * nombre: nombre de la categoría
     */
    function insertCat($nombre) {

            $query = $this->db->prepare('INSERT INTO categoria (nombre) VALUES (?)');
            return $query->execute([$nombre]);
    }

    function updateCat($nombre, $id) {

            $query = $this->db->prepare('UPDATE categoria SET nombre=? WHERE id=?');
            return $query->execute([$nombre, $id]);
    }

    /**
     * Elimina la categoría seleccionada (si es posible)
     */
    function removeCat($id) {
        
        $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
        return $query->execute([$id]); 

    }
}