<?php

/**
 * Class Error
 * 
 * 404 response with an additional HTML page behind when something does not exist.
 */

namespace Mini\Controller;

use Mini\Core\Session;

class ErrorController
{
    public function __construct()
    {
        Session::init();
    }

    /**
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // Create new Plates instance
        $templates = new \League\Plates\Engine(APP . 'view'); 

        // Assign directly to a template object
        echo $templates->render('error/index');
    }
}
