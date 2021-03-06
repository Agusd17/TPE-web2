<?php
include_once 'app/controllers/auth.controller.php';
include_once 'app/controllers/main.controller.php';
include_once 'app/controllers/admin.controller.php';


// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);


// maneja la paginación
$itemsPerPage = 6;
if (!empty($_GET['page'])) {
    $pageNumber = $_GET['page'];
} else {
    $pageNumber = '1';
}


// maneja el buscador selectivo
if (!empty($_GET['search-key'])) {
    $searchKey = $_GET['search-key'];
} else {
    $searchKey = '';
}
$queries = explode('/', $searchKey);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'verify_login':
        $controller = new AuthController();
        $controller->verifyUser();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->showRegister();
        break;
    case 'on_register':
        $controller = new AuthController();
        $controller->registerUser();
        break;
    case 'give_admin':
        $controller = new AdminController();
        $id = $params[1];
        $controller->giveAdmin($id);
        break;
    case 'remove_admin':
        $controller = new AdminController();
        $id = $params[1];
        $controller->removeAdmin($id);
        break;
    case 'remove_user':
        $controller = new AdminController();
        $id = $params[1];
        $controller->removeUser($id);
        break;
    case 'panel':
        $controller = new AdminController();
        $controller->showPanel();
        break;
    case 'home':
        $controller = new MainController();
        $page = $pageNumber;
        $controller->showAll($page, $itemsPerPage);
        break;
    case 'home_search':
        $controller = new MainController();
        $key = $queries[0];
        $page = 1; // hardcodeada para testear
        $controller->showBySearch($key, $page, $itemsPerPage);
        break;
    case 'cat':
        $controller = new MainController();
        $cat = $params[1];
        $controller->showCat($cat);
        break;
    case 'insertar_cat':
        $controller = new AdminController();
        $controller->addCat();
        break;
    case 'modificar_cat':
        $controller = new AdminController();
        $id = $params[1];
        $controller->panelModCat($id);
        break;
    case 'eliminar_cat': // eliminar/:ID
        $controller = new AdminController();
        $id = $params[1];
        $controller->deleteCat($id);
        break;
    case 'new_single':
        $controller = new AdminController();
        $controller->addSingle();
        break;
    case 'modificar_single':
        $controller = new AdminController();
        $id = $params[1];
        $controller->panelModInm($id);
        break;
    case 'delete_single':
        $controller = new AdminController();
        $id = $params[1];
        $controller->deleteSingle($id);
        break;
    case 'ver':
        $controller = new MainController();
        $id = $params[1];
        $controller->showDetail($id);
        break;
    case 'modInm':
        $controller = new AdminController();
        $id = $params[1];
        $controller->updateSingle($id);
        break;
    case 'modCat':
        $controller = new AdminController();
        $id = $params[1];
        var_dump($_POST);
        $nombre = $_POST['nombre_cat'];
        $controller->updateCat($id, $nombre);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found');
        break;
}