<?php

    header("Content-Type: text/plain");
    $retstat = 404;

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['status'])) {

        // username is a url encoded user's email
        // example: jim@bas.com would be shown as jim%40bas.com
        $cusername = urldecode($_POST['username']);

        // status: login, logout, profile
        $cstatus = $_POST['status'];

        switch($cstatus) {
            case 'logout':
                // user has just logout in MNC Digital page
                break;
            case 'login':
                // user has just login in MNC Digital page
                $ctoken = $_POST['token'];
                // ctoken contains encrypted user's profile. you need to post-request the token back,
                // along with your ServerKey to <MncDigitalUrl>/token/extract to extract it
                break;
            case 'profile':
                // user has just changes his/her profile in MNC Digital page
                $ctoken = $_POST['token'];
                // ctoken contains encrypted user's profile. you need to post-request the token back,
                // along with your ServerKey to <MncDigitalUrl>/token/extract to extract it
                break;
            default:
                break;
        }
        $retstat = 200;
    }

    http_response_code($retstat);
    print('.'); // response body will be ignored