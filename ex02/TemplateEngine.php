<?php
    class TemplateEngine{
        public function createFile(HotBeverage $text){
            $reflector = new ReflectionClass($text);
            $file = fopen($text->name . ".html", "w");
            $template = fopen('template.html', "r");
            $methods = $reflector->getMethods();
            print_r($methods);
            $properties = $reflector->getProperties();
            $attributs = ["description", "commentaire", "nom", "prix", "resistence"];
            $i = 0;
            while($line = fgets($template)){
                if (strpos($line, "{") && strpos($line,"}")){
                    while ($i <= 4 && (explode("{",explode('}', $line)[0])[1]) != $attributs[$i]){
                        print_r((explode("{",explode('}', $line)[0])[1]) . PHP_EOL);
                        print_r($attributs[$i]. PHP_EOL);
                        $i++;
                    }
                    if ($i <= 4){
                        print_r($i);
                        print_r($methods[$i+1]);
                        //fputs($file, str_replace('{' . explode("{",explode('}', $line)[0])[1] . '}', $methods[$i+1]("get" . ucfirst($properties[$i]->getName()))->invoke($text), $line));
                    }
                    $i = 0;
                }
                else
                    fputs($file, $line);
            }
        }
    }