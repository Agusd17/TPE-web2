<?php
include_once 'app/models/category.model.php';
include_once 'app/models/inmueble.model.php';
include_once 'app/views/main.view.php';

class MainController {

    private $inmModel;
    private $catModel;
    private $view;

    function __construct() {
        $this->inmModel = new InmuebleModel();
        $this->catModel = new CategoryModel();
        $this->view = new MainView();
        // inicio la sesion cuando inicio el controlador, para poder chequear los permisos
        session_start();
    }

    function showPanel() {

        $inmuebles = $this->inmModel->getAll();
        $categorias = $this->catModel->getAll();
        
        if (isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE'] == '1') {
            $this->view->showPanel($inmuebles, $categorias);
        } else {
            $this->view->showError('No posee permisos para acceder a esta sección', $categorias);
        }
    }

    /**
     * Imprime la lista de inmuebles
     */
    function showAll() {

        // obtiene los inmuebles y categorias del modelo
        $inmuebles = $this->inmModel->getAll();
        $categorias = $this->catModel->getAll();

            
        //actualizo la vista
        $this->view->showAll($inmuebles, $categorias);
    }

    /**
     * Pide los inmuebles pertenecientes a la categoría elegida, primero consultando por el id de dicha categoría
     */
    function showCat($cat) {

        $categorias = $this->catModel->getAll();
        $id_cat = $this->catModel->getCatId($cat);
        $inmuebles = $this->inmModel->getByCat($id_cat);

        // si no recibo inmuebles, significa que esa categoría no posee ninguno cargado
        // seteo $inmuebles a '' para que la vista muestre correctamente que no existen inmuebles de ese tipo
        if (count($inmuebles) == 0) {
            $inmuebles = '';
        }

        $this->view->showCat($cat, $categorias, $inmuebles);
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
        $categorias = $this->catModel->getAll();

        if($single) {
            $this->view->showModInm($single, $category, $categorias);
        } else {
            $this->view->showError('Inmueble no encontrado', $categorias);
        }

    }

    function addCat() {
        $categorias = $this->catModel->getAll();

        if (empty($_POST['nombre_cat'])) {
            $this->view->showError('Se requiere un nombre para la categoría', $categorias);
            die;
        }
        $nombre = $_POST['nombre_cat'];

        $success = $this->catModel->insertCat($nombre);
        if ($success) {
            // redirigimos al listado
            header("Location: panel");
            die;
        } else {
            $this->view->showError('Ocurrió un error al intentar insertar en base de datos', $categorias);
            die;
        }

    }


    function updateCat($id) {
        $categorias = $this->catModel->getAll();
        $nombre = $_POST['nombre_cat'];
        if (empty($nombre)) {
            $this->view->showError('Se requiere un nombre para la categoría', $categorias);
        } else {
            
            $success = $this->catModel->updateCat($nombre, $id);
            if ($success) {
                // redirigimos al listado
                header("Location: " . BASE_URL . '/panel');
                die;
            } else {
                $this->view->showError('Ocurrió un error al intentar modificar en base de datos', $categorias);
                die;
            }
        }

    }

    function deleteCat($id) {
        $categorias = $this->catModel->getAll();
        try {
            $success = $this->catModel->removeCat($id);
            if ($success) {
                header("Location: " . BASE_URL . '/panel');
                die;
            } else {
                $this->view->showError('No es posible borrar la categoría, porque la acción está restringida por tratarse de una clave foránea.', $categorias);
                die;
            }
        } catch (error $e) {
            $this->view->showError('Ocurrió un error inesperado al intentar eliminar la categoría.', $categorias);
            die;
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
     * Muestra el detalle del inmueble
     */
    function showDetail($id) {

        $single = $this->inmModel->getSingle($id);
        $categorias = $this->catModel->getAll();

        if($single) {
            $this->view->showSingle($single, $categorias);
        } else {
            $this->view->showError('Inmueble no encontrado', $categorias);
        }
    }

    /**
     * Inserta una tarea en el sistema
     */
    function addSingle() {
        
        $categorias = $this->catModel->getAll();
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
                $this->view->showError('Faltan datos obligatorios', $categorias);
                die;
        } // endif
            
            // inserto el inmueble en la DB
        $success = $this->inmModel->insertSingle($catId, $titulo, $descripcion, $direccion, $metros, $precio, $venta, $alquiler);
        if ($success) {
            // redirigimos al listado
            header("Location: " . BASE_URL . 'panel');
            die; 
        } else {
            $this->view->showError('Ocurrió un error al intentar insertar en base de datos', $categorias);
        die;
        }
        
    }

    function updateSingle($id) {
        $categorias = $this->catModel->getAll();
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
                $this->view->showError('Faltan datos obligatorios', $categorias);
                die;
        } // endif
            
            // envio la peticion al model
        $success = $this->inmModel->updateSingle($catId, $titulo, $descripcion, $direccion, $metros, $precio, $venta, $alquiler, $id);
        if ($success) {
            // redirigimos al listado
            header("Location: " . BASE_URL . 'panel');
            die; 
        } else {
            $this->view->showError('Ocurrió un error al intentar modificar en base de datos', $categorias);
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