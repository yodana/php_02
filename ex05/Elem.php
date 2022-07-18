<?php
    class Elem{
        public $html = [];
        public function __construct($element, $balise="", $attributes=[]){
            new MyException($element);
            $this->html[] = array("element" => $element,
                "balise" => $balise,
                "attributes" => $attributes);
        }

        public function validPage(){
            // valid html
            $body = 0;
            $head = 0;
            $title = 0;
            $meta = 0;
            $next = 0;
            $i = 0;
            if($this->html[0]["element"] != "html")
                return false;
            foreach($this->html as $e){
                if ($e["element"] == "body" && $next != 1)
                    $body += 1;
                if ($next == 1){
                    if ($e["element"] != "body")
                        return false;
                    else
                        $body += 1;
                    $next = 0;
                }
                if ($e["element"] == "head"){
                    $j = $i;
                    while($j < count($this->html)){
                        if ($this->html[$j]["element"] == "title"){
                            if($title > 1)
                                return false;
                            $title += 1;
                        }
                        if ($this->html[$j]["element"] == "meta"){
                            if($meta > 1)
                                return false;
                            $meta += 1;
                        }
                        $j++;
                    }
                    if ($head == 0)
                        $next = 1;
                    $head += 1;
                }
                $i++;
            }
            if ($body == 1 && $head == 1 && $title == 1 && $meta == 1)
                return true;
            return false;
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
                    $line = $t . '<' . $e["element"] . $attributes . '>' . $e["balise"] . PHP_EOL;
                    $end[] = $e["element"];
                }
                else{
                    $attributes = "";
                    foreach($e["attributes"] as $key => $value){
                        $attributes = $attributes . " " . $key . '="' . $value . '"';
                    }
                    $line = $t . '<' . $e["element"] . $attributes . '>' . $e["balise"] . '</' . $e["element"] . '>' . PHP_EOL;
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