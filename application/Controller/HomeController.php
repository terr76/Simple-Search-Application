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
        $user_logged_in = Session::userIsLoggedIn();
        $name = Session::get('name');
        $isSearch = self::isSearch();

        // getting all users and amount of users
        if($isSearch){
            $users = User::searchKeywords($_GET['search']);
        // getting all users and amount of users
        } else {
            $users = User::getAllUsers();    
        }

        // get message for search result or login failed
        $message = Message::renderFeedbackMessages();

        $data = [
            'users'             => $users,
            'name'              => $name,
            'message'           => $message,
            'isSearch'          => $isSearch,
            'user_logged_in'    => $user_logged_in,
        ];

        // Create new Plates instance
        $templates = new \League\Plates\Engine(APP . 'view'); 

        // Assign directly to a template object
        echo $templates->render('home/index', $data);
    }

    public function isSearch()
    {
        if(isset($_GET['search']) && $_GET['search'] != null){
            return true;
        } else {
            return false;
        }
    }

}
