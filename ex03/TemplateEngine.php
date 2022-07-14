<?php
    class TemplateEngine{
        public function createFile($fileName, Text $Text){
            $file = fopen($fileName, "w");
            fputs($file, '<!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <title>CV</title>
                </head>
                <body>' . $Text->showHtml() . 
                '</body>
                </html>');
            fclose($file);
        }
    }