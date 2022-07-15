<?php
    include("TemplateEngine.php");
    include("Elem.php");
    $e = new Elem("html");
    $e->pushElement(new Elem('body'));
    $e->pushElement(new Elem('p', 'Lorem ipsum'));
    print_r($e);
    $e->getHtml();
