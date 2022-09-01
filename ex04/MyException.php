<?php
    class MyException extends Exception{
        private $authorized = ["meta", "img", "hr", "br", "html", "head",
        "body", "title", "h1", "h2", "h3", "h4", "h5", "h6", "p", "span", "div", "table", "tr", "th", "td", "ul", "ol", "li"];

        public function __construct($elem){
            try{
                if (!in_array($elem, $this->authorized)){
                    throw new Exception("Element balise not authorized");
                }
                else{
                }
            }
            catch(Exception $e){
               echo $e . PHP_EOL; 
            }
        }
    }