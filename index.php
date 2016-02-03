<?php

namespace school;

require_once  dirname(__FILE__) . "/library/autoload.php";

use school\library\Application;
//var_dump($_SERVER['REQUEST_URI']);die;
$config = require_once CONFIG . DS . "main.php";

$app = new Application($config);
$app->run();

?>



