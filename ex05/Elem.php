<?php
    class Elem{
        public $html = [];
        public function __construct($element, $balise="", $attributes=[]){
            new MyException($element);
            $this->html[] = array("element" => $element,
                "balise" => $balise,
                "attributes" => $attributes,
                "index" => 0,
                "tab" => 0);
            $this->html[] = array("element" => '/' . $element,
                "balise" => "",
                "attributes" => [],
                "index" => 1,
                "tab" => 0);
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
                $attributes = "";
                for($j = 0; $j < $this->html[$k]["tab"]; $j++){
                    if ($j == 0)
                        $t = "\t";
                    else
                        $t = $t . "\t";
                }
                foreach($this->html[$k]["attributes"] as $key => $value){
                    $attributes = $attributes . " " . $key . "=". $value;
                }
                if($k < count($this->html) -1 && ('/' . $this->html[$k]["element"] == ($this->html[$k+1]["element"]) && $this->html[$k+1]["index"] == 1)){
                    $line = $t . '<' . $this->html[$k]["element"] . $attributes . '>' . $this->html[$k]["balise"];
                    $end = 1;
                }
                else if ($end == 0){
                    $line = $t . '<' . $this->html[$k]["element"] . $attributes . '>' . $this->html[$k]["balise"] . PHP_EOL;
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