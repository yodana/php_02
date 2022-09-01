<?php
    include("TemplateEngine.php");
    include("Elem.php");
    include ("MyException.php");
    // no complete
    $e = new Elem("html");
    $e->pushElement(new Elem('hea'));
    $e->pushElement(new Elem('body'));
    print_r($e->getHtml());
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

    // p in p no correct
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
    
    // table false
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $table = new Elem('table');
    $table->pushElement(new Elem('p'));
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $body->pushElement($table);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();

    //table good
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $table = new Elem('table');
    $table->pushElement(new Elem('tr'));
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $body->pushElement($table);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();
    
    // valid
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $table = new Elem('table');
    $tr = new Elem('tr');
    $tr->pushElement(new Elem('th'));
    $table->pushElement($tr);
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $body->pushElement($table);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();
    
    //ul vide no valid
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $ul = new Elem('ul');
    $body->pushElement($ul);
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();
    
    // ul valid
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $ul = new Elem('ul');
    $li = new Elem('li');
    $li->pushElement(new Elem('p', 'coucou'));
    $ul->pushElement(new Elem('li'));
    $body->pushElement($ul);
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();
    
    // ul no valid
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $ul = new Elem('ul');
    $ul->pushElement(new Elem('p'));
    $body->pushElement($ul);
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();

    //ol no valid
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $ul = new Elem('ol');
    $ul->pushElement(new Elem('p'));
    $body->pushElement($ul);
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();

    // ol valid
    $e = new Elem("html");
    $head = new Elem("head");
    $head->pushElement(new Elem('title'));
    $head->pushElement(new Elem("meta", "", ["charset" => "utf-8"]));
    $e->pushElement($head);
    $body = new Elem('body');
    $ul = new Elem('ol');
    $li = new Elem('li');
    $li->pushElement(new Elem('p', 'coucou'));
    $ul->pushElement(new Elem('li'));
    $body->pushElement($ul);
    $p = new Elem('p', 'lol');
    $body->pushElement($p);
    $e->pushElement($body);
    print_r($e->getHtml());
    $t = new TemplateEngine($e);
    echo $e->validPage();