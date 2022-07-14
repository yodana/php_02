<?php
    class Elem{
        private $authorized = ["meta", "img", "hr", "br", "html", "head",
        "body", "title", "h1", "h2", "h3", "h4", "h5", "h6", "p", "span", "div"];
        public $html = [];
        public function __construct($element, $balise=""){
            try{
                if (!in_array($element, $this->authorized)){
                    throw new Exception("Element balise not authorized");
                }
                else{
                    echo "ca marche";
                }
            }
            catch(Exception $e){
               echo $e . PHP_EOL; 
            }
        }
    }