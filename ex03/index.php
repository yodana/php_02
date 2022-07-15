<?php
    include("TemplateEngine.php");
    include("Elem.php");
    $e = new Elem("html");
    $e->pushElement(new Elem('body'));
    print_r($e);
    $e->getHtml();
