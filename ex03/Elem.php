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
                   $this->html[] = array("element" => $element,
                   "balise" => $balise);
                }
            }
            catch(Exception $e){
               echo $e . PHP_EOL; 
            }
        }

        public function pushElement(Elem $elem){
            foreach($elem->html as $e){
                $this->html[] = $e;
            }
        }

        public function getHtml(){
            $i = 0;
            foreach($this->html as $e){
                $t = "";
                for($j = 0; $j < $i; $j++){
                    if ($j == 0)
                        $t = "\t";
                    else
                        $t = $t . "\t";
                }
                if ($e["balise"] == "")
                    $line = $t . '<' . $e["element"] . '>' . PHP_EOL;
                //else
                //    $line = $t . '<' . $e["element"] 
                print_r($line);
                $i++;
            }
        }
    }