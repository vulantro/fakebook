<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
        _request('../views/mainPage.php');
        break;
    case '/':
        _request('../views/mainPage.php');
        break;
    case '/logout':
        _request('../views/logout.php');
        break;
    case '/login':
        _request('../views/login.php');
        break;
    case '/invite':
        _request('../views/invite.php');
        break;
    case '/mainPage':
        _request('../views/mainPage.php');
        break;
    case '/savePost':
        require('../assets/savePost.php');
        break;
    case '/changeProfile':
        _request('../views/changeProfile.php');
        break;
    case '/invite':
        _request('../views/invite.php');
        break;
    case '/profile':
        _request('../views/profile.php');
        break;
    case '/userAvatar':
        require('../assets/userAvatar.php');
        break;
    case '/deletePost':
        require('../assets/deletePost.php');
        break;
    case (preg_match('/\/serveImage[_.\/A-Za-z0-9]*/', $request) ? true : false):
        require('../assets/serveImage.php');
        break;
    case (preg_match('/\/register\/[A-Za-z0-9]{48}/', $request) ? true : false):
        _request('../views/register.php');
        break;
    default:
        http_response_code(404);
        require '../views/php404.php';
        break;
}

function _request($path)
{
    require_once '../views/header.php';
    require_once $path;
    require_once '../views/footer.php';
}
