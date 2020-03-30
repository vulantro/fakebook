<?php
function time_ago_in_php($timestamp)
{

    //date_default_timezone_set("Europe/Budapest");         
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds  
    $hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
    $days = round($seconds / 86400); //86400 = 24 * 60 * 60;  
    $weeks = round($seconds / 604800); // 7*24*60*60;  
    $months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
    $years = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60) {

        return "Just Now";
    }
    else if ($minutes <= 60) {

        if ($minutes == 1) {

            return "one minute ago";
        }
        else {

            return "$minutes minutes ago";
        }
    }
    else if ($hours <= 24) {

        if ($hours == 1) {

            return "an hour ago";
        }
        else {

            return "$hours hrs ago";
        }
    }
    else if ($days <= 7) {

        if ($days == 1) {

            return "yesterday";
        }
        else {

            return "$days days ago";
        }
    }
    else if ($weeks <= 4.3) {

        if ($weeks == 1) {

            return "a week ago";
        }
        else {

            return "$weeks weeks ago";
        }
    }
    else if ($months <= 12) {

        if ($months == 1) {

            return "a month ago";
        }
        else {

            return "$months months ago";
        }
    }
    else {

        if ($years == 1) {

            return "one year ago";
        }
        else {

            return "$years years ago";
        }
    }
}

function imgToBase64($path)
{
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data_img = file_get_contents($path);
    return 'data:image/' . $type . ';base64,' . base64_encode($data_img);
}

function getPlaceName($lat, $long)
{
    if ($lat == '')
        return '';
    // create curl resource
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, "https://eu1.locationiq.com/v1/reverse.php?key=c61a74a3000c5f&lat=" . $lat . "&lon=" . $long . "&format=json");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


    // set the UA
    curl_setopt($ch, CURLOPT_USERAGENT, 'My App (https://eu1.locationiq.com/v1/reverse.php?key=c61a74a3000c5f&lat=40.7487727&lon=-73.9849336&format=json)');

    // Alternatively, lie, and pretend to be a browser
    // curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)');

    // $output contains the output string
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);
    //$ch = curl_init("https://eu1.locationiq.com/v1/reverse.php?key=c61a74a3000c5f&lat=40.7487727&lon=-73.9849336&format=json");
    $json = json_decode($output);
    //echo $json->address->city.', '.$json->address->country;
    return $json->address->suburb . ', ' . $json->address->city . ', ' . $json->address->country;
//  return "valami hely";
}

function redirect($url)
{
    header('Location: ' . $url);
    exit();
}

function base64_to_file($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen($output_file, 'wb');

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode(',', $base64_string);

    // we could add validation here with ensuring count( $data ) > 1
    fwrite($ifp, base64_decode($data[1]));

    // clean up the file resource
    fclose($ifp);

    return $output_file;
}