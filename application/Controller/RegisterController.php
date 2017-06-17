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

    /**
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        if (Login::isUserLoggedIn()) {
            header('location: ' . URL );
        } else {
            $output = Message::renderFeedbackMessages();
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/register/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    /**
     * POST-request after form submit
     */
    public function addUser()
    {
        $registration_successful = User::addUser();

        if ($registration_successful) {
            header('location: ' . URL );
        } else {
            header('location: ' . URL . 'register');
        }
    }    
}
