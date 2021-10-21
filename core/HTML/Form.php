<?php 
namespace Core\HTML;

class Form{ 

    private $data;
    public $surround = 'p';

    public function __construc($data=array()){
        $this->data = $data;
    }
    private function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }
    public function input($name, $placeholder = null, $value = null) {
        return $this->surround('<input type="text" name="' . $name . '"placeholder="'. $placeholder .'" value="'. $value .'">');
    }
    public function submit($name, $html) {
        return $this->surround('<button name="'. $name .'"type="submit">'. $html .'</button>');
    }
    public function password($name, $placeholder = null){
        return $this->surround('<input type="password" name="' . $name . '"placeholder="'. $placeholder .'">');
    }
}