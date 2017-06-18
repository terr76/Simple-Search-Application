<?php

/**
 * Class HomeController
 * 
 * This cotroller has search form for the loggedin user. 
 */

namespace Mini\Controller;

use Mini\Core\Message;
use Mini\Core\Session;
use Mini\Model\User;

class HomeController
{

    public function __construct()
    {
        Session::init();
    }

    public function index()
    {
        // getting all users and amount of users
        if(isset($_GET['search']) && $_GET['search'] != null){
            $users = User::searchKeywords($_GET['search']);
        // getting all users and amount of users
        } else {
            $users = User::getAllUsers();    
        }
        
        $user_logged_in = Session::userIsLoggedIn();
        $name = Session::get('name');

        $message = Message::renderFeedbackMessages();

        $data = [
            'users'             => $users,
            'name'              => $name,
            'message'           => $message,
            'user_logged_in'    => $user_logged_in,
        ];

        // Create new Plates instance
        $templates = new \League\Plates\Engine(APP . 'view'); 

        // Assign directly to a template object
        echo $templates->render('home/index', $data);


    }

}
