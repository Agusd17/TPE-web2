<?php
include_once 'app/views/auth.view.php';
include_once 'app/models/user.model.php';


class AuthController {

    private $view;
    private $userModel;

    public function __construct() {
        $this->view = new AuthView();
        $this->userModel = new UserModel();
        session_start();
    }

    function showLogin($msg = '') {

        if ($msg != '') {
            $this->view->showLoginForm($msg);
        } else {
            $this->view->showLoginForm('Ingrese sus datos de acceso');
        }
        
    }

    function logout() {
        session_destroy();
        header('Location: ' . BASE_URL);
        die;
    }

    function verifyUser() {
        $email = $_POST['email'];
        $pw = $_POST['password'];

        if (empty($email) || empty($pw)) {
            $this->showLogin('Debe completar ambos campos');
        } else {
            
            $user = $this->userModel->getByUserEmail($email);
            
            if (!empty($user) && password_verify($pw, $user->passwd)) {

                $_SESSION['ID_USER'] = $user->id;
                $_SESSION['USER_ROLE'] = $user->role;
                
                header('Location: home');
                die;
            } else {
                $this->showLogin('Datos incorrectos. Intente nuevamente');
            }
        }

    }
        
}