<?php

/**
 * Class HomeController
 * 
 * This cotroller shows search form for the loggedin user. 
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

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    public function index()
    {
        // getting all users and amount of users
        if(isset($_GET['search']) && $_GET['search'] != null) {
            $users = User::searchKeywords($_GET['search']);
        // getting all users and amount of users
        } else {
            $users = User::getAllUsers();    
        }
        
        $user_logged_in = Session::userIsLoggedIn();
        $user_info = Session::get('name');

        $output = Message::renderFeedbackMessages();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
