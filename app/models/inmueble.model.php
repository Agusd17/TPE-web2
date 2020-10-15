<?php

class InmuebleModel {

    private $db;

    function __construct() {
         // Inicio la conexión
        $this->db = $this->connect();
    }

    /**
     * Abre conexión a la base de datos;
     */
    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=tpe_inmobiliaria;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $db;
    }

    /**
     * Devuelve todos los inmuebles que existen actualmente.
     */
    function getAll() {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM inmueble');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $inmuebles = $query->fetchAll(PDO::FETCH_OBJ);

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