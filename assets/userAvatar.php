<?php
require_once '../config.php';
if (isset($_SESSION["user_id"]))
{
    $user = $_SESSION["user_id"];
    $avatar_path = $db->selectValue("SELECT  avatar_path from users where user_id=" . $user);
    $type = 'image/' . pathinfo($avatar_path, PATHINFO_EXTENSION);
    header('Content-Type:' . $type);
    header('Content-Length: ' . filesize($avatar_path));
    readfile($avatar_path);
}
