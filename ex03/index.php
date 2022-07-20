<?php
    include("TemplateEngine.php");
    include("Elem.php");
    $elem = new Elem('html');
    $head = new Elem('head');
    $elem->pushElement($head);
    $body = new Elem('body');
    $body->pushElement(new Elem('p', 'Lorem ipsum'));
    $body->pushElement(new Elem('p', 'Lorem ipsum'));
    $newbody = new Elem('body');
    $newbody->pushElement(new Elem('p', 'Lorem ipsum'));
    $body->pushElement($newbody);
    $elem->pushElement($body);
    $t = new TemplateEngine($elem);
    $t->createFile("myHtml");

    