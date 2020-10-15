<?php
include_once 'app/models/category.model.php';
include_once 'app/models/inmueble.model.php';
include_once 'app/views/admin.view.php';
include_once 'resources/php/functions.php';

class AdminController {

    private $inmModel;
    private $catModel;
    private $view;
    private $categorias;
    
    function __construct() {
        $this->inmModel = new InmuebleModel();
        $this->catModel = new CategoryModel();
        $this->view = new AdminView();

        $this->categorias = $this->catModel->getAll();
        
        if (!checkIfAdmin()) {
            $this->view->showError('No posee permisos para acceder a esta sección', $this->categorias);
            die;
        }
        
    }
    
    function showPanel() {
        
        $inmuebles = $this->inmModel->getAll();

        $this->view->showPanel($inmuebles, $this->categorias);
    }
    
    /**
     * Llama al panel de modificación para categoría
     */
    function panelModCat($id) {
        $categoria = $this->catModel->getCat($id);
        $this->view->showModCat($categoria);
    }

    /**
     * Llama al panel de modificación para categoría
     */
    function panelModInm($id) {

        $single = $this->inmModel->getSingle($id);
        $category = $this->catModel->getCat($single->id_categoria);

        if($single) {
            $this->view->showModInm($single, $category, $this->categorias);
        } else {
            $this->view->showError('Inmueble no encontrado', $this->categorias);
        }

    }

    /**
     * 
     */
    function getCatId($categoria) {
        
        // traigo la id de la categoría seleccionada
        // primero me fijo que sea una categoría real, y no un intento de inyección SQL
        $categorias = $this->catModel->getAll();
        foreach ($categorias as $key => $value) {
            if ($value->nombre == $categoria) {
                return $value->id;
            break;
            }
        }
        return 'none';
    }

    /**
     * Agrega una nueva categoría
     */
    function addCat() {

        if (empty($_POST['nombre_cat'])) {
            $this->view->showError('Se requiere un nombre para la categoría', $this->categorias);
            die;
        }
        $nombre = $_POST['nombre_cat'];

        $success = $this->catModel->insertCat($nombre);
        if ($success) {
            // redirigimos al listado
            header("Location: panel");
            die;
        } else {
            $this->view->showError('Ocurrió un error al intentar insertar en base de datos', $this->categorias);
            die;
        }

    }

    /**
     * Modifica una categoría preexistente
     */
    function updateCat($id) {
        $nombre = $_POST['nombre_cat'];
        if (empty($nombre)) {
            $this->view->showError('Se requiere un nombre para la categoría', $this->categorias);
        } else {
            
            $success = $this->catModel->updateCat($nombre, $id);
            if ($success) {
                // redirigimos al listado
                header("Location: " . BASE_URL . '/panel');
                die;
            } else {
                $this->view->showError('Ocurrió un error al intentar modificar en base de datos', $this->categorias);
                die;
            }
        }

    }

    /**
     * Elimina una categoría
     */
    function deleteCat($id) {
        try {
            $success = $this->catModel->removeCat($id);
            if ($success) {
                header("Location: " . BASE_URL . '/panel');
                die;
            } else {
                $this->view->showError('No es posible borrar la categoría, porque la acción está restringida por tratarse de una clave foránea.', $this->categorias);
                die;
            }
        } catch (error $e) {
            $this->view->showError('Ocurrió un error inesperado al intentar eliminar la categoría.', $this->categorias);
            die;
        }

    }

    /**
     * Inserta un inmueble en el sistema
     */
    function addSingle() {
        
        $titulo = $_POST['titulo'];
        if (empty($_POST['descripcion'])) {
            $descripcion = 'Sin descripción';
        } else  {
            $descripcion = $_POST['descripcion'];
        };
        $categoria = $_POST['categoria'];
        $direccion = $_POST['direccion'];
        $metros = $_POST['metros'];
        $precio = $_POST['precio'];
        $alquiler = $_POST['alquiler'];
        $venta = $_POST['venta'];
        $catId = $this->getCatId($categoria);
        
        
        // verifico campos obligatorios
        if (
            empty($titulo) 
            || empty($direccion) 
            || empty($metros) 
            || ( empty($categoria) || $catId == 'none')
            || empty($precio) 
            || ( empty($alquiler) && $alquiler != 0) 
            || ( empty($venta) && $venta != 0 )
            ) {
                $this->view->showError('Faltan datos obligatorios', $this->categorias);
                die;
        } // endif
            
            // inserto el inmueble en la DB
        $success = $this->inmModel->insertSingle($catId, $titulo, $descripcion, $direccion, $metros, $precio, $venta, $alquiler);
        if ($success) {
            // redirigimos al listado
            header("Location: " . BASE_URL . 'panel');
            die; 
        } else {
            $this->view->showError('Ocurrió un error al intentar insertar en base de datos', $this->categorias);
        die;
        }
        
    }

    /**
     * Modifica un inmueble
     */
    function updateSingle($id) {
        
        $titulo = $_POST['titulo'];
        if (empty($_POST['descripcion'])) {
            $descripcion = 'Sin descripción';
        } else  {
            $descripcion = $_POST['descripcion'];
        };
        $categoria = $_POST['categoria'];
        $direccion = $_POST['direccion'];
        $metros = $_POST['metros'];
        $precio = $_POST['precio'];
        $alquiler = $_POST['alquiler'];
        $venta = $_POST['venta'];
        $catId = $this->getCatId($categoria);
        
        
        // verifico campos obligatorios
        if (
            empty($titulo) 
            || empty($direccion) 
            || empty($metros) 
            || ( empty($categoria) || $catId == 'none')
            || empty($precio) 
            || ( empty($alquiler) && $alquiler != 0) 
            || ( empty($venta) && $venta != 0 )
            ) {
                $this->view->showError('Faltan datos obligatorios', $this->categorias);
                die;
        } // endif
            
            // envio la peticion al model
        $success = $this->inmModel->updateSingle($catId, $titulo, $descripcion, $direccion, $metros, $precio, $venta, $alquiler, $id);
        if ($success) {
            // redirigimos al listado
            header("Location: " . BASE_URL . 'panel');
            die; 
        } else {
            $this->view->showError('Ocurrió un error al intentar modificar en base de datos', $this->categorias);
        die;
        }
    }

    /**
     * Elimina el inmueble del sistema
     */
    function deleteSingle($id) {
        $this->inmModel->remove($id);
        header("Location: " . BASE_URL); 
    }

}