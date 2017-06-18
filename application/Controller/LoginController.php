<?php

/**
 * Class LoginController
 * 
 * Controls everything that is authentication-related
 */

namespace Mini\Controller;

use Mini\Core\Message;
use Mini\Core\Session;
use Mini\Model\Login;

class LoginController
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
        // if user is logged in redirect to main-page, if not show the view
        if (Login::isUserLoggedIn()) {
            header('location: ' . URL );
        } else {

            $message = Message::renderFeedbackMessages();
            $data = ['message' => $message];

            // Create new Plates instance
            $templates = new \League\Plates\Engine(APP . 'view'); 

            // Assign directly to a template object
            echo $templates->render('login/index', $data);

        }
    }

    /**
     * The login action, when you do login/login
     */
    public function login()
    {
        // perform the login method, put result (true or false) into $login_successful
        $login_successful = Login::index($_POST['email'], $_POST['password']);

        // check login status: if true, then redirect user to user/index, if false, then to login form again
        if ($login_successful) {
            header('location: ' . URL . urldecode($_POST['redirect']));
        } else {
            header('location: ' . URL . urldecode($_POST['redirect']));
        }
    }

    /**
     * The logout action
     * Perform logout, redirect user to main-page
     */
    public function logout()
    {
        Session::destroy();
        header('location: ' . URL );
    }
  
}
