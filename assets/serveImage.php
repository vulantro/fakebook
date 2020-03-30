<?php
require_once '../config.php';
$hash = explode('/', $_SERVER['REQUEST_URI']);
//if (isset($_GET["hash"])) {

if (isset($hash[sizeof($hash) - 1]) && strlen($hash[sizeof($hash) - 1]) > 0 && isset($_SESSION["user_id"]))
{
    $path = '../uploaded/' . $hash[sizeof($hash) - 1];
    $type = 'image/' . pathinfo($path, PATHINFO_EXTENSION);
    header('Content-Type:' . $type);
    header('Content-Length: ' . filesize($path));
    readfile($path);
}