<?php
    include("TemplateEngine.php");
    include("HotBeverage.php");
    include("Tea.php");
    include("Coffee.php");
    $drink = new Tea();
    $t = new TemplateEngine();
    $t->createFile($drink);
    $drink = new Coffee();
    $t = new TemplateEngine();
    $t->createFile($drink);