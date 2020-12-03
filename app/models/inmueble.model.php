<?php

require_once 'app/helpers/db.helper.php';

class InmuebleModel {

    private $db;
    private $dbHelper;

    function __construct() {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    /**
     * Abre conexión a la base de datos;
     */
    //
    // comentada porque se reemplazo por el helper
    //
    // private function connect() {
    //     $db = new PDO('mysql:host=localhost;'.'dbname=tpe_inmobiliaria;charset=utf8', 'root', '');
    //     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //     return $db;
    // }

    public function getTotalPages($itemsPerPage) {

        // consigo la cantidad de filas que tiene la tabla inmueble
        $totalRows = $this->db->prepare('SELECT * FROM inmueble');
        $totalRows->execute();

        $totalPages = ceil($totalRows->rowCount() / $itemsPerPage);
        return $totalPages;
    }

    /**
     * Devuelve todos los inmuebles que existen actualmente.
     */
    public function getAll($page = 1, $itemsPerPage = 6) {

        $pageNumber = intval($page);
        $offset = ($pageNumber-1) * $itemsPerPage;

        $totalPages = $this->getTotalPages($itemsPerPage);


        $query = 'SELECT * FROM inmueble';
        $query .= " LIMIT :min, :max";
        $params[':min'] = $offset; // INTEGER VALUE
        $params[':max'] = $itemsPerPage; // INTEGER VALUE

        $dbRequest = $this->db->prepare($query);

        foreach($params as $key => $value)
        {
            if(is_int($value))
            {
                $dbRequest->bindValue($key, $value, PDO::PARAM_INT);
            }
            else
            {
                $dbRequest->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
        $dbRequest->execute();
        $inmuebles = $dbRequest->fetchAll(PDO::FETCH_OBJ);
        return $inmuebles;


    }
    
    /**
     * Devuelve todos los inmuebles que coincidan con la key
     */
    function getAllByKey($key, $page, $itemsPerPage) {

        $numkey = $key;
        $stringkey = '%'.$key.'%';
        $offset = 0;

        $query = 'SELECT * FROM inmueble WHERE titulo LIKE :titulo OR descripcion 
        LIKE :descript OR direccion LIKE :direcc OR metros_cuadrados 
        LIKE :mts OR precio LIKE :precio ORDER BY id DESC LIMIT :min,:max';
        $params[':min'] = $offset; // INTEGER VALUE
        $params[':max'] = $itemsPerPage; // INTEGER VALUE
        //$query .= ' WHERE titulo LIKE :titulo OR descripcion LIKE :descript OR direccion LIKE :direcc OR metros_cuadrados LIKE :mts OR precio LIKE :precio';
        $params[':titulo'] = $stringkey; // INTEGER VALUE
        $params[':descript'] = $stringkey; // INTEGER VALUE
        $params[':direcc'] = $stringkey; // INTEGER VALUE
        $params[':mts'] = $numkey; // INTEGER VALUE
        $params[':precio'] = $numkey; // INTEGER VALUE
        //$query .= ' LIMIT 1, 6';
        //$query .= ' ORDER BY id DESC';
        
        $dbRequest = $this->db->prepare($query);
        
        foreach($params as $key => $value)
        {
            if(is_int($value))
            {
                $dbRequest->bindValue($key, $value, PDO::PARAM_INT);
            }
            else
            {
                $dbRequest->bindValue($key, $value, PDO::PARAM_STR);
            }
        }

        $dbRequest->execute();
        $inmuebles = $dbRequest->fetchAll(PDO::FETCH_OBJ);
        return $inmuebles;
    }

    /**
     * Devuelve los inmuebles que contienen el id de la categoría recibida
     */
    function getByCat($id_cat) {

        $query = $this->db->prepare('SELECT * FROM inmueble WHERE id_categoria = ?');
        $query->execute([$id_cat]);

        $inmuebles = $query->fetchAll(PDO::FETCH_OBJ);

        return $inmuebles;
    }

    /**
     * devuelve el inmueble especifico (se le pasa la id)
     */
    function getSingle($id) {
        $query = $this->db->prepare('SELECT * FROM inmueble WHERE id = ?');
        $query->execute([$id]);
        $inmueble = $query->fetch(PDO::FETCH_OBJ);
        return $inmueble;
    }

    /**
     * Inserta el inmueble en la base de datos
     * titulo: 64 caracteres max
     * categoria: el tipo de inmueble
     * descripción: texto
     * dirección: 64 caracteres max
     * metros: metros cuadrados de la propiedad o tamaño del terreno/campo
     * precio: en dólares
     * venta: bool (si o no)
     * alquiler: bool (si o no)
     */
    function insertSingle ($idCategoria, $titulo, $descripcion, $direccion, $metros, $precio, $venta, $alquiler) {

        try {
            $query = $this->db->prepare('INSERT INTO inmueble (id_categoria, titulo, descripcion, direccion, metros_cuadrados, precio, venta, alquiler) VALUES (?,?,?,?,?,?,?,?)');
        } catch (Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
        return $query->execute([$idCategoria, $titulo, $descripcion, $direccion, $metros, $precio, $venta, $alquiler]);

    }

    /**
     * Modifica el inmueble en la base de datos
     */
    function updateSingle($idCategoria, $titulo, $descripcion, $direccion, $metros, $precio, $venta, $alquiler, $id) {
        
        try {
            $query = $this->db->prepare('UPDATE inmueble SET id_categoria=?, titulo=?, descripcion=?, direccion=?, metros_cuadrados=?, precio=?, venta=?, alquiler=? WHERE id=?');
        } catch (Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
        return $query->execute([$idCategoria, $titulo, $descripcion, $direccion, $metros, $precio, $venta, $alquiler, $id]);

    }

    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM inmueble WHERE id = ?');
        $query->execute([$id]);
  }
}