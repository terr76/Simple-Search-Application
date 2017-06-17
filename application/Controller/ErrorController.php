<?php

/**
 * Class Error
 * 
 * 404 response with an additional HTML page behind when something does not exist.
 */

namespace Mini\Controller;

class ErrorController
{
    /**
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/error/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
