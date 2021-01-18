<?php
session_start();
require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = md5($_POST['password']);

        $_SESSION['user'] = $this->userRepository->getUser($_SESSION['email']);

        if (!$_SESSION['user']) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($_SESSION['user']->getEmail() !== $_SESSION['email']) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($_SESSION['user']->getPassword() !== $_SESSION['password']) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        $_SESSION['zalogowany'] = true;
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/events");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        if($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        //$_SESSION['zalogowany'] = false;
        $user = new User($email, md5($password), $name, $surname);
        $user->setPhone($phone);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registered!']]);
    }
    public function logout(){
        session_start();
        session_unset();

        if (!$this->isPost()) {
            return $this->render('logout');
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");

    }
}