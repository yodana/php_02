<?php
    class TemplateEngine{
        public function createFile(HotBeverage $text){
            $reflector = new ReflectionClass($text);
            $file = fopen($text->name . ".html", "w");
            $template = fopen('template.html', "r");
            $methods = $reflector->getMethods();
            $properties = $reflector->getProperties();
            $attributs = ["description", "commentaire", "nom", "prix", "resistance"];
            $i = 0;
            while($line = fgets($template)){
                if (strpos($line, "{") && strpos($line,"}")){
                    while ($i <= 4 && (explode("{",explode('}', $line)[0])[1]) != $attributs[$i])
                        $i++;
                    fputs($file, str_replace('{' . explode("{",explode('}', $line)[0])[1] . '}', $reflector->getMethod("get" .  ucfirst($properties[$i]->getName()))->invoke($text), $line));
                    $i = 0;
                }
                else
                    fputs($file, $line);
            }
        }
    }