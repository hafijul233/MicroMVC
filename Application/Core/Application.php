<?php

class Application {

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $routes = $this->parseUrl();
        print_r($routes);
        
//echo 'This is a Application Instance';
    }

    public function parseUrl() {
        $url = NULL;
        if (isset($_GET['url'])) {
            
            $url = rtrim($_GET['url'], '/'); //Removes whitespace or other predefined characters from the right side of a string
            $url = filter_var($url, FILTER_SANITIZE_URL); //FILTER_SANITIZE_URL filter removes all illegal URL characters from a string
            $url = explode('/', $url); //substring the url into string array with / as seperator
            
            return $url;
        }
        //lunch the 404 error working
        return 'Nothing Found in Parseurl';
    }

}
