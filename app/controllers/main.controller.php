<?php
include_once 'app/models/category.model.php';
include_once 'app/models/inmueble.model.php';
include_once 'app/views/main.view.php';

class MainController {

    private $inmModel;
    private $catModel;
    private $view;
    private $categorias;

    function __construct() {
        $this->inmModel = new InmuebleModel();
        $this->catModel = new CategoryModel();
        $this->view = new MainView();
        $this->categorias = $this->catModel->getAll();
        // inicio la sesion cuando inicio el controlador, para poder chequear los permisos
        session_start();
    }

    /**
     * Imprime la lista de inmuebles
     */
    function showAll($page, $itemsPerPage) {

        // maneja la cantidad de items que se verán por página
        $totalPages = $this->inmModel->getTotalPages($itemsPerPage);
        // obtiene los inmuebles y categorias del modelo
        $inmuebles = $this->inmModel->getAll($page, $itemsPerPage);

            
        //actualizo la vista
        $this->view->showAll($page, $totalPages, $inmuebles, $this->categorias);
    }

    public function showBySearch($key, $page, $itemsPerPage) {

        $totalPages = $this->inmModel->getTotalPages($itemsPerPage);

        $inmuebles = $this->inmModel->getAllByKey($key, $page, $itemsPerPage);
        $this->view->showAll(1, $totalPages, $inmuebles, $this->categorias);
    }

    /**
     * Pide los inmuebles pertenecientes a la categoría elegida, primero consultando por el id de dicha categoría
     */
    function showCat($cat) {

        $id_cat = $this->catModel->getCatId($cat);
        $inmuebles = $this->inmModel->getByCat($id_cat);

        // si no recibo inmuebles, significa que esa categoría no posee ninguno cargado
        // seteo $inmuebles a '' para que la vista muestre correctamente que no existen inmuebles de ese tipo
        if (count($inmuebles) == 0) {
            $inmuebles = '';
        }

        $this->view->showCat($cat, $this->categorias, $inmuebles);
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

        if($single) {
            $this->view->showSingle($single, $this->categorias);
        } else {
            $this->view->showError('Inmueble no encontrado', $this->categorias);
        }
    }

}