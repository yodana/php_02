<?php
    include("TemplateEngine.php");
    include("Elem.php");
    include ("MyException.php");
    $e = new Elem("html");
    $e->pushElement(new Elem('body'));
    $e->pushElement(new Elem('p', 'Lorem ipsum', ['class' => 'text-muted']));
    $e->getHtml();
