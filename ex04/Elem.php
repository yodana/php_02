<?php
    class Elem{
        public $html = [];
        public function __construct($element, $balise="", $attributes=[]){
            new MyException($element);
            $this->html[] = array("element" => $element,
                "balise" => $balise,
                "attributes" => $attributes);
        }

        public function pushElement(Elem $elem){
            foreach($elem->html as $e){
                $this->html[] = $e;
            }
        }

        public function getHtml(){
            $i = 0;
            $end = [];
            $resultat = "";
            foreach($this->html as $e){
                $t = "";
                for($j = 0; $j < $i; $j++){
                    if ($j == 0)
                        $t = "\t";
                    else
                        $t = $t . "\t";
                }
                if ($i < count($this->html)-1){
                    $attributes = "";
                    foreach($e["attributes"] as $key => $value){
                        $attributes = $attributes . " " . $key . '="' . $value . '"';
                    }
                    $line = $t . '<' . $e["element"] . '>' . $e["balise"] . PHP_EOL;
                    $end[] = $e["element"];
                }
                else{
                    $keys = array_keys($e["attributes"]);
                    $values =  array_values($e["attributes"]);
                    print_r($keys);
                    print_r($values);
                    $line = $t . '<' . $e["element"] . '>' . $e["balise"] . '</' . $e["element"] . '>' . PHP_EOL;
                }
                $resultat = $resultat . $line;
                $i++;
            }
            $i = 2;
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
            }
            return $resultat;
        }
    }