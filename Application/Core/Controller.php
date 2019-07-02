<?php

class Controller {
    public function model($model) {
        require_once '../Application/Models/' . $model . '.php';
        
        return new $model(); //create a dynamic class object and send back to the calling controller
    }
    
    public function view($view, $data = []) {
        require_once '../Application/Views/' . $view . '.php';
        
        return ;
    }
}
