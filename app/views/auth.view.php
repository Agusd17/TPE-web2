<?php
require_once 'libs/smarty/libs/Smarty.class.php';

class AuthView {

    function showLoginForm($msg = '') {
        $smarty = new Smarty();
        $smarty->assign('message', $msg);
        $smarty->display('templates/form_login.tpl');
    }
}