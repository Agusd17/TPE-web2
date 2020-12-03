<?php

require_once 'app/models/comment.model.php';
require_once 'app/api/api.view.php';

class ApiCommentsController  {
    
    private $model;
    private $view;

    function __construct() {
        $this->view = new ApiView();
        $this->model = new CommentModel();
        $this->data = file_get_contents("php://input");
    }

    function getData(){ 
        return json_decode($this->data); 
    }

    public function error404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }

    public function getAll($params = null) {
        $parametros = [];

        if (isset($_GET['sort'])) {
            $parametros['sort'] = $_GET['sort'];
        }

        if (isset($_GET['order'])) {
            $parametros['order'] = $_GET['order'];
        }

        $comments = $this->model->getAll($parametros);
        $this->view->response($comments, 200);
    }

    public function getAllOfItem($params = null) {
        $id_inmueble = $params[':ID'];
        $comments = $this->model->getAllByItem($id_inmueble);
        if ($comments)
            $this->view->response($comments, 200);
        else
            $this->view->response('', 404);
    }

    public function add($params = null) {
        $body = $this->getData();
        
        $id_inmueble = $body->id_inmueble;
        $author = $body->author;
        $contenido = $body->contenido;
        $puntaje = $body->puntaje;

        $id = $this->model->insert($id_inmueble, $author, $contenido, $puntaje);

        if ($id > 0) {
            $comment = $this->model->get($id);
            $this->view->response($comment, 200);
        }
        elseif ($id === false) {
            $this->view->response("Manipulacion de datos no permitida", 403);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }

    public function delete($params = null) {
        $id = $params[':ID'];
        $response = $this->model->delete($id);

        if ($response === true) {
            $this->view->response("Comentario eliminado exitosamente", 200);
        } else {
            $this->view->response("No se pudo eliminar el comentario", 500);
        }
        

    }
    
}