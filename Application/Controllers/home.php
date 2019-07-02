<?php

class Home extends Controller {

    public function index($params = []) {
//        echo 'Home/Index';
//        print_r($params);
        $chair_model  = $this->model('chair');
        
        $chair_model->info();
        
        $this->view('home/index');
        
    }
    
    public function contact() {
        echo 'home/contact';
    }
    
    public function about() {
        echo 'home/about';
    }

}
