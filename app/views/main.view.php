<?php

require_once('libs/smarty/libs/Smarty.class.php');

class MainView {



    function showAll($page = 1, $totalPages, $inmuebles, $categorias) {

        $smarty = new Smarty();

        $smarty->assign('totalPages', $totalPages);
        $smarty->assign('pageNumber', $page);
        $smarty->assign('inmuebles', $inmuebles);
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/home.tpl');
    }

    /**
     * Muestra los detalles de un inmueble particular a partir de un id
     * requiere que se le pase una id válida por argumento
     */
    function showSingle($id, $categorias) {

        $smarty = new Smarty();
        $smarty->assign('single', $id);
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/singleDetail.tpl');
    }

    /**
     * Muestra una página con los inmuebles correspondientes a la categoría seleccionada (si existen:)
     */
    function showCat($cat, $categorias, $inmuebles) {
        
        $smarty = new Smarty();
        $smarty->assign('categoria', $cat);
        $smarty->assign('categorias', $categorias);
        if (empty($inmuebles)) {
            $smarty->assign('inmuebles', '');
        } else {
            $smarty->assign('inmuebles', $inmuebles);
        }
        $smarty->display('templates/category.tpl');
        
    }

    /**
     * Muestra un error en una página separada
     * requiere que se le pase un mensaje de error por argumento
     */
    function showError($msg, $categorias) {
        $smarty = new Smarty();

        $smarty->assign('msg', $msg);
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/error.tpl');
    }
}