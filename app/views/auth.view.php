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
}