<?php
namespace Core\Entity;

class Entity { 
    
    public function __get($key) { // permet de comprendre url au lieu de getUrl(), facilite l'ecriture sur la view.
        $method = 'get' . ucfirst($key);
        $this -> $key = $this->$method();
        return $this -> $key;
    }
}