<?php
    include("TemplateEngine.php");
    include("Text.php");
    $t = new TemplateEngine();
    $text = new Text(["famous"]);
    $text->showHtml();
    $text->addString("lol");
    $text->showHtml();
    $t->createFile("print.html", $text);