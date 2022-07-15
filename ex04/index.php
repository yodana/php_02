<?php
    include("TemplateEngine.php");
    include("Elem.php");
    include ("MyException.php");
    $e = new Elem("html");
    $e->pushElement(new Elem('body'));
    $e->pushElement(new Elem('p', 'Lorem ipsum'));
    $e->pushElement(new Elem('p', 'Lorem ipsum'));
    $b = new Elem("div");
    $b->pushElement(new Elem('h1', 'Yo'));
    $e->pushElement($b);
    $t = new TemplateEngine($e);
