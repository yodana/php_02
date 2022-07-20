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
                   "balise" => $balise,
                    "index" => 0,
                    "tab" => 0);
                    $this->html[] = array("element" => '/' . $element,
                   "balise" => "",
                    "index" => 1,
                    "tab" => 0);
                }
            }
            catch(Exception $e){
               echo $e . PHP_EOL; 
            }
        }
        public function pushElement(Elem $elem){
            $save = array_pop($this->html);
            foreach($elem->html as $e){
                $e["tab"] = $e["tab"] + 1;
                $this->html[] = $e;
            }
            $this->html[] = $save;
        }
        public function getHtml(){
            $resultat = "";
            $k = 0;
            $end = 0;
            while($k < count($this->html)){
                $t = "";
                for($j = 0; $j < $this->html[$k]["tab"]; $j++){
                    if ($j == 0)
                        $t = "\t";
                    else
                        $t = $t . "\t";
                }
                if($k < count($this->html) -1 && ('/' . $this->html[$k]["element"] == ($this->html[$k+1]["element"]) && $this->html[$k+1]["index"] == 1)){
                    $line = $t . '<' . $this->html[$k]["element"] . '>' . $this->html[$k]["balise"];
                    $end = 1;
                }
                else if ($end == 0){
                    $line = $t . '<' . $this->html[$k]["element"] . '>' . $this->html[$k]["balise"] . PHP_EOL;
                }
                else if ($end == 1){
                    $line = '<' . $this->html[$k]["element"] . '>' . PHP_EOL;
                    $end = 0;
                }
                $resultat = $resultat . $line;
                $k++;
            }
            return $resultat;
        }
    }