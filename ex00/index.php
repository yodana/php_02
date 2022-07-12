<?php
    include("TemplateEngine.php");
    $t = new TemplateEngine();
    $p = array("nom" => "Harry", 
    "auteur" => "JJK",
    "description" => "test",
    "prix" => "100");
    $t->createFile("book.html", "book_description.html", $p);