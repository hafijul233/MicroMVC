<?php

/**
 * Description of chair
 *
 * @author hafiz
 */

class chair {
    
    protected $wheel;
    protected $weight;
    protected $height;
    
    public function info() {
        $this->wheel = 4;
        $this->weight = 125;
        $this->height = 100;
        
        echo 'Wheel: ' . $this->wheel . "<br>Weight: " . $this->weight . "<br>Height: " . $this->height;
    }
}
