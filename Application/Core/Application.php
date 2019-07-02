<?php

class Application
{

    protected $controller = 'homeController'; //Default Controller for all only Method
    protected $method = 'index'; //Default Method for all Controller
    protected $params = [];

    public function __construct() 
    {
        $routes = $this->parseUrl();
        
        if(file_exists('../Application/Controllers/' . $routes[0] . '.php') == TRUE) 
        {
            $this->controller = $route[0];
        }
        else 
        {
            $this->controller = 'errorController';
        }
        
        require_once '../Application/Controllers/' . $this->controller . '.php';
    }

    public function parseUrl() 
    {
        $url = NULL;
        if (isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/'); //Removes whitespace or other predefined characters from the right side of a string
            $url = filter_var($url, FILTER_SANITIZE_URL); //FILTER_SANITIZE_URL filter removes all illegal URL characters from a string
            $url = explode('/', $url); //substring the url into string array with / as seperator
            
            return $url;
        }
    }

}
