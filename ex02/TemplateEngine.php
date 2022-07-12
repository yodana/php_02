<?php
    class TemplateEngine{
        public function createFile(HotBeverage $text){
            $reflector = new ReflectionClass($text);
            $file = fopen($text->name . ".html", "w");
            $template = fopen('template.html', "r");
            print_r()
            $methods = $reflector->getMethods(ReflectionMethod::IS_PUBLIC);
            $properties = $reflector->getProperties();
            //print_r($methods);
            //print_r($properties);
            while($line = fgets($template)){
                if (strpos($line, "{") && strpos($line,"}")){
                    print_r(explode('}', $line), $line);
                }
                else
                    fputs($file, $line);
            }
        }
    }