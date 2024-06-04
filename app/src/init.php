<?php
require_once __DIR__ . "/config.php";

mb_internal_encoding('UTF-8');
session_start();
date_default_timezone_set('Europe/Paris');

function zdebug() {
    $args = func_get_args();
    if(count($args) == 1) {
        echo("<pre>" . print_r($args[0], true) . "</pre>");
    }
    else if (count($args) == 2) {
        $title = $args[0];
        $data = $args[1];
        echo("<pre>" . ($title ? $title . "\n" : "") . print_r($data, true) . "</pre>");
    }
    else {
        echo("<pre>" . print_r($args, true) . "</pre>");
    }
}

function zlog($data) {
    $filepath = __DIR__ . "/../logs/" . date("Ymd") . ".log";
    $txt = date("H:i:s") . "\n" . print_r($data, true) . "\n\n";
    file_put_contents($filepath, $txt, FILE_APPEND);
}

zlog("let's start logging");


require_once(__DIR__ . "/../vendor/autoload.php");

use Simplimmo\Classes\Database;
$database = new Database();

require_once __DIR__ . "/router.php";

/*
use Controllers\Property;

$property = new Property();
*/
/*
$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/assets/twig_tpl');
$twig = new Twig\Environment($loader, [
    'cache' => __DIR__ . '/assets/twig_compil',
]);
$template = $twig->load('index.html');
echo $template->render();
*/