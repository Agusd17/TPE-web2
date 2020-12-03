<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comments.controller.php';


$router = new Router();


// traigo todos los comentarios
$router->addRoute('comments', 'GET', 'ApiCommentsController', 'getAll');
// traigo los comentarios que corresponden al id del item (inmueble)
$router->addRoute('comments/:ID', 'GET', 'ApiCommentsController', 'getAllOfItem');
// borro un comentario
$router->addRoute('comments/:ID', 'DELETE', 'ApiCommentsController', 'delete');
// subo un nuevo comentario
$router->addRoute('comments', 'POST', 'ApiCommentsController', 'add');
// modifico un comentario
$router->addRoute('comments/:ID', 'PUT', 'ApiCommentsController', 'update');


$router->setDefaultRoute('ApiCommentsController','error404');


$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);