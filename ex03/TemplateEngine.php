<?php
    class TemplateEngine{
        public $elem;
        public function __construct(Elem $elem){
            $this->elem = $elem;
        }

        public function createFile($fileName){
            $file = fopen($fileName . ".html", "w");
            fputs($file, $this->elem->getHtml());
            fclose($file);
        }
    }