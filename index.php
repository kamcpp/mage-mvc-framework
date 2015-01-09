<?php

spl_autoload_register(function ($class) {
    if ($class == "Smarty") {
        require_once("lib/smarty/Smarty.class.php");
        return true;
    }
    $dirs = array('fw',
        'fw/orm',
        'model',
        'lib',
        'fw/di',
        'controllers',
        'biz',
        'biz/membership');
    foreach ($dirs as $dir) {
        $filename = "$dir/" . $class . ".php";
        if (file_exists($filename)) {
            require_once($filename);
            return true;
        }
    }
    return false;
});

date_default_timezone_set("UTC");

Context::wire();

$request = new \Request();
$request->setPath($_GET['path']);
$request->addToParams($_GET);
$request->addToParams($_POST);
$request->addToCookies($_COOKIE);
session_start();
unset($_GET);
unset($_POST);
unset($_COOKIE);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $request->setGet(true);
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request->setPost(true);
} else {
    die('Method is not supported.');
}

$engine = new \Engine();
$response = $engine->process($request);

echo $response;

 