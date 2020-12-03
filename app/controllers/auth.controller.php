<?php
include_once 'app/views/auth.view.php';
include_once 'app/models/user.model.php';


class AuthController {

    private $view;
    private $userModel;
    private $catModel;
    private $categorias;

    public function __construct() {
        $this->view = new AuthView();
        $this->userModel = new UserModel();
        $this->catModel = new CategoryModel();
        $this->categorias = $this->catModel->getAll();
        session_start();
    }

    function showLogin($msg = '') {

        if ($msg != '') {
            $this->view->showLoginForm($msg, $this->categorias);
        } else {
            $this->view->showLoginForm('Ingrese sus datos de acceso', $this->categorias);
        }
        
    }

    function logout() {
        session_destroy();
        header('Location: ' . BASE_URL);
        die;
    }

    function showRegister($msg = '') {

        if ($msg != '') {
            $this->view->showRegisterForm($msg, $this->categorias);
        } else {
            $this->view->showRegisterForm('Alta de nuevo usuario', $this->categorias);
        }

    }

    function registerUser() {

        $validData = false;

        $name = $_POST['register-name'];
        $email = $_POST['register-email'];
        $pw = $_POST['register-passwd'];

        if (empty($name) || empty($email) || empty($pw)) {
            $this->showRegister('Debe completar todos los campos', $this->categorias);
        } else {
            
            $user = $this->userModel->getByUserName($name);
            
            if (!empty($user)) {

                $validData = false;

            } else {

                $user = $this->userModel->getByUserEmail($email);

                if (!empty($user)) {

                    $validData = false;

                } else {

                    $validData = true;

                }

            }
        }

        if (!$validData) {

            $this->showRegister('Nombre de usuario o email ya existente', $this->categorias);

        } else  { // la data es válida, procedo a registrar al usuario

            $user = $this->userModel->insertUser($name, $email, $pw);

            if (!empty($user)) { // logueo al usuario automaticamente si todo salio bien
                $_SESSION['ID_USER'] = $user->id;
                $_SESSION['USER_ROLE'] = $user->role;
            } else {

            }
            $this->view->showSuccess('Usuario registrado con éxito.', $this->categorias);

        }
        


    }

    /**
     * Función de login
     */
    function verifyUser() {
        $email = $_POST['email'];
        $pw = $_POST['password'];

        if (empty($email) || empty($pw)) {
            $this->showLogin('Debe completar ambos campos', $this->categorias);
        } else {
            
            $user = $this->userModel->getByUserEmail($email);
            
            if (!empty($user) && password_verify($pw, $user->passwd)) {

                $_SESSION['ID_USER'] = $user->id;
                $_SESSION['USER_ROLE'] = $user->role;
                $_SESSION['USER_NAME'] = $user->username;
                
                header('Location: home');
                die;
            } else {
                $this->showLogin('Datos incorrectos. Intente nuevamente', $this->categorias);
            }
        }

    }
        
}