<?php
require_once(dirname(__FILE__ ) . '/../config.php');
if (!isset($_SESSION["user_id"]))
    redirect('login');
$user = $_SESSION["user_id"];
$username = $db->selectValue('SELECT name FROM users where user_id=' . $user);
$post = $db->select('SELECT * FROM posts where user_id=' . $user . ' order by created desc');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>

    </style>
    <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
</head>

<body>


<?php
require_once('../views/navigation.php');
?>
    <div class="container">
        <div class="offset-lg-2 col-lg-8">

            <div class="card my-3">
              
                <div id="postarea" class="card-body py-2">
                    <div class="d-flex">
                        <div>
                        <?php
$avatar_path = $db->selectValue("SELECT  avatar_path from users where user_id=" . $user);

echo '<img class="rounded-circle" width="50" src="serveImage//' . $avatar_path . '">';
?>
                        </div>
                        <div class="col">
                            <form action="#">
                                <div class="form-group mb-0">
                                    <label class="sr-only" for="exampleFormControlTextarea1">Example textarea</label>
                                    <textarea class="form-control border-0" id="postArea" rows="2"
                                        placeholder="Write your thoughts.."></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="demo"></div>
                <div class="card-footer p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col">
                            <button type="button" onclick=getLocation() class="btn btn-fposts btn-block btn-sm"> <i class="fas fa-map-marker-alt"
                                    aria-hidden="true"></i> Location</button>
                        </div>
                        <div class="col">
                            <button type="button" onclick="fileUpload()" class="btn btn-fposts btn-block btn-sm"><i class="fas fa-image"
                                    aria-hidden="true"></i> Image</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-fposts btn-block btn-sm"><i class="fa fa-user-plus"
                                    aria-hidden="true"></i> Tag friends</button>
                        </div>
                        <div class="col">
                            <button type="button" onclick="sendPost()" class="btn btn-fposts btn-block btn-sm"><i class="fas fa-share-square" aria-hidden="true"></i>Post</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ITEM -->
            <?php

foreach ($post as $data) {
    $name = $db->selectRow("SELECT name, avatar_path from users where user_id=" . $data["user_id"]);
    $place = null;
    if ($data["place"] != null) {
        // list($long,$lat) = explode(':',$data["place"]);
        // $place = getPlaceName($lat,$long);
        $place = $data["place_name"];
    }


    if ($data["images"] != '')
        echo '<user-post post-id="' . $data["posts_id"] . '" avatar_path="serveImage//' . $name["avatar_path"] . '" username="' . $name["name"] . '" time="' . time_ago_in_php($data["created"]) . '" user_id="' . $data["user_id"] . '" text="' . $data["text"] . '" image="serveImage//' . $data["images"] . '" map="' . $place . '" likes_count="432"></user-post>';
    else
        echo '<user-post post-id="' . $data["posts_id"] . '" avatar_path="serveImage//' . $name["avatar_path"] . '" username="' . $name["name"] . '" time="' . time_ago_in_php($data["created"]) . '" user_id="' . $data["user_id"] . '" text="' . $data["text"] . '" image="" map="' . $place . '" likes_count="432"></user-post>';

}
?>
          
     
        </div>
    </div>

</body>

</html>