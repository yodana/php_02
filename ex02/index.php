<?php
    include("TemplateEngine.php");
    include("HotBeverage.php");
    include("Tea.php");
    include("Coffee.php");
    $drink = new Coffee();
    $t = new TemplateEngine();
    print_r($drink->name);
    $t->createFile($drink);