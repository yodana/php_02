<?php
    include("TemplateEngine.php");
    $t = new TemplateEngine();
    $p = array("name" => "Harry", 
    "auteur" => "JJK",
    "description" => "test",
    "prix" => "100");
    $t->createFile("test", "book_description.html", $p);