<?php

/**
 * Class HomeController
 * 
 * This cotroller shows search form for the loggedin user. 
 */

namespace Mini\Controller;

use Mini\Core\Session;
use Mini\Model\User;

class HomeController
{

    public function __construct()
    {
        //
    }

    /**
     * This method controls what happens when you move to '/' or '/home/index'.
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
