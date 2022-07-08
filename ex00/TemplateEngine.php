<?php
    class TemplateEngine{
        public function createFile($fileName, $templateName, $parameters){
            $file = fopen($fileName, "w");
            $template = fopen($templateName, "r");
            while($line = fgets($template)){
                if (strpos($line, "{") && strpos($line,"}"))
                    fputs($file, explode($line, '{')[0]);
                else
                    fputs($file, $line);
            }
            fclose($template);
            fclose($file);
        }
    }