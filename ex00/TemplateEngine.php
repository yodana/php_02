<?php
    class TemplateEngine{
        public function createFile($fileName, $templateName, $parameters){
            $file = fopen($fileName, "w");
            $template = fopen($templateName, "r");
            while($line = fgets($template)){
                if (strpos($line, "{") && strpos($line,"}")){
                    fputs($file, str_replace('{' . explode('{',explode('}', $line)[0])[1] . '}',$parameters[explode('{',explode('}', $line)[0])[1]], $line));

                }
                else
                    fputs($file, $line);
            }
            fclose($template);
            fclose($file);
        }
    }