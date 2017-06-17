<?php
namespace Mini\Core;

class Application
{
    private $controller = null;
    private $action = null;

    public function __construct()
    {
        // It will become true after 
        $cancontroll = false;

        // Fetches the $_GET from 'url'
        $url = "";
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
        }
        $params = explode('/', $url);
        $counts = count($params);

        // Set default Controller as Home
        $this->controller = "Home";

        // Load controller from first segment
        if(isset($params[0])) {
            if($params[0]) $this->controller = $params[0];
        }

        // if controller is existing then, load this file and create controller
        if (file_exists(APP . 'Controller/' . $this->controller . 'Controller.php')) {
            require APP . 'Controller/' . $this->controller . 'Controller.php';
            $controller = "\\Mini\\Controller\\" . ucfirst($this->controller) . 'Controller';
            $this->controller = new $controller();
            $this->action = "index"; // load start-page
            if(isset($params[1])) {
                if($params[1]) $this->action = $params[1];
            }

            // If a method is passed in the GET url paremter
            //  http://localhost/controller/method/(param)/(param)/(param)            
            if (method_exists($this->controller, $this->action)) {
                $cancontroll = true;
                switch ($counts) {
                    case '0':
                    case '1':
                    case '2':
                        $this->controller->{$this->action}();
                        break;
                    case '3':
                        $this->controller->{$this->action}($params[2]);
                        break;
                    case '4':
                        $this->controller->{$this->action}($params[2],$params[3]);
                        break;
                    case '5':
                        $this->controller->{$this->action}($params[2],$params[3],$params[4]);
                        break;
                }   
            }
        }
        // return error page when the url is wrong
        if($cancontroll === false) 
            header('location: ' . URL . 'error');
    }
}
