<?php
require_once("../config.php");

if (isset($_POST['msg']) && strlen($_POST['msg']) > 0)
{
    $name = null;
    $user = $_SESSION["user_id"];
    $text = $_POST["msg"];
    $place = null;
    if (isset($_POST["lng"]) && isset($_POST["lt"]) && strlen($_POST["lng"]) > 0 && strlen($_POST["lt"] > 0))
        $place = $_POST["lng"] . ':' . $_POST["lt"];
    if (isset($_POST['img']) && strlen($_POST['img']) > 0)
    {
        $data = $_POST['img'];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $type = explode('/', $type);

        $name = '../uploaded/' . hash('tiger192,3', date('Y-m-d h:i:s') . $user) . '.' . $type[1];
        file_put_contents($name, $data);
    }
    try {
        $loc = getPlaceName($_POST["lt"], $_POST["lng"]);
        $db->insert(
            'posts',
        [
            'user_id' => $user,
            'images' => $name,
            'text' => $text,
            'place' => $place,
            'place_name' => $loc,
        ]
        );
    }
    catch (Exception $e)
    {
        echo false;
    }
    echo true;

}
else
    echo false;


