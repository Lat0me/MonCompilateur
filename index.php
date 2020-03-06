<?php

require './src/Service.php';

use CompilateurController\CompilateurController;

$compilateur = new CompilateurController();

$dir = __DIR__;
$compilateur->start($argv, $dir);
