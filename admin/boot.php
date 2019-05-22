
<?php

use app\Router;

require '../vendor/autoload.php';

$_GET['action'] = 'Test';

##################################################################################
#           Load the router definishing the title, and also the menu.            #
##################################################################################

$baseDir = 'admin';
$location = '../';
$boot = new Router($baseDir, $location);



