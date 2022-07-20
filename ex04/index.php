<?php
    include("TemplateEngine.php");
    include("Elem.php");
    include ("MyException.php");
    $e = new Elem("html");
    $body = new Elem("body");
    $body->pushElement(new Elem('p', 'Lorem ipsum',  ['class' => 'text-muted', "style" => "background:red"]));
    $e->pushElement(new Elem('p', 'Lorem ipsum', ['class' => 'text-muted', "style" => "background:red"]));
    $e->getHtml();
    $t = new TemplateEngine($e);
    $t->createFile("myHtml");