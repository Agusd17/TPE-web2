<?php
require_once 'libs/smarty/libs/Smarty.class.php';

class AuthView {

    function showLoginForm($msg = '', $categorias = '') {
        $smarty = new Smarty();
        $smarty->assign('message', $msg);
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/form_login.tpl');
    }
    
    function showRegisterForm($msg = '', $categorias = '') {
        $smarty = new Smarty();
        $smarty->assign('message', $msg);
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/form_register.tpl');
    }

    /**
     * Muestra un mensaje de éxito en una página separada
     * requiere que se le pase un mensaje por argumento
     */
    function showSuccess($msg, $categorias) {
        $smarty = new Smarty();

        $smarty->assign('msg', $msg);
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/success.tpl');
    }
}