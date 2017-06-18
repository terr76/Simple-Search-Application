<?php

/**
 * Class RegisterController
 * 
 * Register new user
 */

namespace Mini\Controller;

use Mini\Core\Message;
use Mini\Core\Session;
use Mini\Model\User;
use Mini\Model\Login;

class RegisterController
{
    public function __construct()
    {
        Session::init();
    }

    public function index()
    {
        if (Login::isUserLoggedIn()) {
            header('location: ' . URL );
        } else {
            $message = Message::renderFeedbackMessages();
            $data = ['message' => $message];

            // Create new Plates instance
            $templates = new \League\Plates\Engine(APP . 'view'); 

            // Assign directly to a template object
            echo $templates->render('register/index', $data);
        }
    }

    /**
     * after register form submit
     */
    public function addUser()
    {
        $registration_successful = User::addUser();

        if ($registration_successful) {
            header('location: ' . URL . 'login');
        } else {
            header('location: ' . URL . 'register');
        }
    }    
}
