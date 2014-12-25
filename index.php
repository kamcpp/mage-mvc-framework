<?php

require_once("fw/Request.php");
require_once("fw/Engine.php");
require_once("fw/BaseController.php");

$request = new Request();
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

$engine = new Engine();
$response = $engine->process($request);

echo $response;

 