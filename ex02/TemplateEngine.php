<?php
    class TemplateEngine{
        public function createFile(HotBeverage $text){
            $reflector = new ReflectionClass($text);
            $file = fopen($text->name . ".html", "w");
            $template = fopen('template.html', "r");
            $methods = $reflector->getMethods();
            $properties = $reflector->getProperties();
            //print_r($methods[1]);
            foreach($methods as $m){
                //print($m);
                //print($m->invoke($text));
            }
            //print_r($properties[0]->getName());
            $i = 0;
            while($line = fgets($template)){
                if (strpos($line, "{") && strpos($line,"}")){
                    if ((explode("{",explode('}', $line)[0])[1]) == "resistance"){
                        fputs($file, str_replace('{' . explode("{",explode('}', $line)[0])[1] . '}', $reflector->getMethod("getResistence")->invoke($text), $line));
                    }
                    else if((explode("{",explode('}', $line)[0])[1]) != NULL){
                        while ($properties[$i]->getName() != (explode("{",explode('}', $line)[0])[1]) && $i <= 4)
                            $i++;
                        if ($i <= 4){
                            fputs($file, str_replace('{' . explode("{",explode('}', $line)[0])[1] . '}', $methods[$i + 1], $line));
                        }
                        $i = 0;
                    }
                }
                else
                    fputs($file, $line);
            }
        }
    }