<?php

require_once 'app/helpers/db.helper.php';

class CommentModel {

    private $db;
    private $dbHelper;

    function __construct() {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    public function getAll($parametros = null) {
        $sql = 'SELECT * FROM comentario';

        if (isset($parametros['order'])) {
            $sql .= ' ORDER BY '.$parametros['order'];

            if (isset($parametros['sort'])) {
                $sql .= ' '.$parametros['sort'];
            }
    
        }

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare($sql);
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $comments = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de tareas
        return $comments;
    }

    public function getAllByItem($id) {
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id_inmueble = ?');
        $query->execute([$id]);
        $task = $query->fetchAll(PDO::FETCH_OBJ);
        return $task;
    }

    public function get($id) {
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id = ?');
        $query->execute([$id]);
        $comment = $query->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    public function insert($id_inmueble, $author, $contenido, $puntaje) {

        // si el puntaje está fuera de rango, no se agregará el comentario
        if ($puntaje < 1 || $puntaje > 5) {
            return false;
        }
        
        $sql = "INSERT INTO comentario (id_inmueble, author, contenido, puntaje) VALUES (?,?,?,?)";
        $params = [$id_inmueble, $author, $contenido, $puntaje];

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare($sql);
        $query->execute($params);

        // 3. Obtengo y devuelo el ID del comentario nuevo
        return $this->db->lastInsertId();
    }

    public function delete($id) {

        $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
        $result = $query->execute([$id]); 
        return $result;
    }

}