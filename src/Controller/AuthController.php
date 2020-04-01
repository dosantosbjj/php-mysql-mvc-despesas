<?php

namespace Code\Controller;

use Code\Authenticator\Authenticator;
use Code\DB\Connection;
use Code\Entity\User;
use Code\Session\Flash;
use Code\View\View;

class AuthController
{

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            var_dump($_POST);
            $user = new User(Connection::getInstance());
            $authenticator = new Authenticator($user);

            if(!$authenticator->login($_POST)){
                Flash::add("warning","Credenciais inválidas!");
                return header('Location: ' . HOME . '/auth/login');    
            }

            Flash::add("success", "Usuário logado!!!");
            return header('Location: ' . HOME . '/myexpenses');
        }

        $view = new View('auth/index.phtml');
        return $view->render();
    }

    public function logout()
    {
        $auth = (new Authenticator())->logout();  
        Flash::add("success","Usuário deslogado!");
        return header('Location: ' . HOME . '/auth/login');

    }

}

