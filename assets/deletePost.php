<?
require_once("../config.php");

if(isset($_POST["post_id"])){
    var_dump($_POST);

    $db->delete(
        'posts',
        [
            // where
            'posts_id' => $_POST["post_id"]
           
        ]
    );
}