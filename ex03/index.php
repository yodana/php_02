<?php
    include("TemplateEngine.php");
    include("Elem.php");
    $elem = new Elem('html');
    $head = new Elem('head');
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem('meta'));
    $elem->pushElement($head);
    $body = new Elem('body');
    $body->pushElement(new Elem('p', 'Lorem ipsum'));
    $elem->pushElement($body);
    echo $elem->getHTML();
    