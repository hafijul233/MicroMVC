<?php

class Application {

    protected $controller = 'home'; //Default Controller for all only Method
    protected $method = 'index'; //Default Method for all Controller
    protected $params = [];

    public function __construct() {
        $routes = [];
        $routes = $this->parseUrl();
        
        //Check if the controller file exist on controller folder
        
        if (file_exists('../Application/Controllers/' . $routes[0] . '.php') == TRUE) {
            $this->controller = $routes[0];
            
            unset($routes[0]); //erase th Controller from url
        }
        require_once '../Application/Controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;
        
        //cheking th method really exit from url
        if(isset($routes[1])) {
            if(method_exists($this->controller, $routes[1])) {
                $this->method = $routes[1];
       
                unset($routes[1]);
            }
        }
        
        //cheking any addational parameters exit the compress into array
        if(!empty($routes)) {
            $this->params = $routes ? array_values($routes) : [];
        }
        
        //lunch the controller and it's function
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //Removes whitespace or other predefined characters from the right side of a string
            $url = filter_var($url, FILTER_SANITIZE_URL); //FILTER_SANITIZE_URL filter removes all illegal URL characters from a string
            $url = explode('/', $url); //substring the url into string array with / as seperator

            return $url;
        }

        return NULL;
    }

}
