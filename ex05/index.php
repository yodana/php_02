<?php
    include("TemplateEngine.php");
    include("Elem.php");
    include ("MyException.php");
    // no complete
    $e = new Elem("html");
    $e->pushElement(new Elem('head'));
    $e->pushElement(new Elem('body'));
    $e->getHtml();
    $t = new TemplateEngine($e);
    echo $e->validPage();
    // correct
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $e->pushElement(new Elem('body'));
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();
    // correct with p 
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $body->pushElement(new Elem('p', "lol"));
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();

    // p in p
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $p = new Elem('p', 'lol');
    $p->pushElement(new Elem('p', "lol"));
    $body->pushElement($p);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();

    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();
    