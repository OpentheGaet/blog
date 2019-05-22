<?php
session_start();

use app\Security\RandGenerator;
use app\Security\AESTools;
use app\Security\TokenFactory;
use app\Router\QueryRouter;
use app\Router\Router;

require __DIR__.'/vendor/autoload.php';

##################################################################################
#                      Definish the controller's directory                       #
##################################################################################

$baseDir = 'user';

##################################################################################
#    Load the ordinary and the AJAX request as entry point and generate token    #
##################################################################################

if (isset($_POST['ajax']) OR isset($_POST['php'])) {
    $query = new QueryRouter(new AESTools, $baseDir, $_POST, $_SESSION['query']);
    if(isset($_POST['ajax'])) {
        $response = $query->AJAXResponse();
        echo $response;
    }
    exit;
}
RandGenerator::setPass();
TokenFactory::setAJAXSessions();
TokenFactory::setPagesSessions();

##################################################################################
#           Load the router definishing the title, and also the menu.            #
##################################################################################

require('controller/user/includes/Header.php');
require('views/user/includes/header.inc.php');

$boot = new Router($baseDir, null, $_GET);

require('views/user/includes/footer.inc.php');

