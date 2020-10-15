<?php

require_once('libs/smarty/libs/Smarty.class.php');

class AdminView {

    /**
     * Muestra el panel de administración
     */
    function showPanel($inmuebles, $categorias) {
        
        $smarty = new Smarty();
        $smarty->assign('inmuebles', $inmuebles);
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/panel_admin.tpl');
    }

    /**
     * Muestra el panel de modificación para inmuebles
     */
    function showModInm($inmueble, $category, $categorias) {
        $smarty = new Smarty();
        $smarty->assign('modInm', true);
        $smarty->assign('inmueble', $inmueble);
        $smarty->assign('categoria', $category);
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/panel_modify.tpl');
    }

    /**
     * Muestra el panel de modificación para categorías
     */
    function showModCat($category) {
        $smarty = new Smarty();
        $smarty->assign('modCat', true);
        $smarty->assign('categoria', $category);
        $smarty->display('templates/panel_modify.tpl');
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