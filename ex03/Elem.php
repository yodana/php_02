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
                    "index" => 0);
                    $this->html[] = array("element" => '/' . $element,
                   "balise" => "",
                    "index" => 1);
                }
            }
            catch(Exception $e){
               echo $e . PHP_EOL; 
            }
        }
        public function pushElement(Elem $elem){
            $save = array_pop($this->html);
            foreach($elem->html as $e){
                $this->html[] = $e;
            }
            $this->html[] = $save;
            print_r($this->html);
        }
        public function getHtml(){
            $resultat = "";
            $i = 0;
            $k = 0;
            $end = 0;
            while($k < count($this->html)-1){
                $t = "";
                for($j = 0; $j < $i; $j++){
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
                if ($this->html[$k]["index"] == 1){
                    $i--;
                }
                /*if ($i < count($this->html)-1){
                    $line = $t . '<' . $e$this->html[$k]["element"] . '>' . $e["balise"] . PHP_EOL;
                    $end[] = $e["element"];
                }
                else
                    $line = $t . '<' . $e["element"] . '>' . $e["balise"] . '</' . $e["element"] . '>' . PHP_EOL;*/
                $resultat = $resultat . $line;
                $k++;
                $i++;
            }
            /*$i = 2;
            foreach(array_reverse($end) as $e){
                $t = "";
                for($j = count($this->html) - $i; $j > 0; $j--){
                    if ($j == count($this->html) - 1)
                        $t = "\t";
                    else
                        $t = $t . "\t";
                }
                $line = $t . '</' . $e . '>' . PHP_EOL;
                $resultat = $resultat . $line;
                $i++;
            }*/
            return $resultat;
        }
    }