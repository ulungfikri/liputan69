<?php

include_once('app.php');

//error_log(sprintf("server: %s\n", print_r($_SERVER, true)));
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$domainName = $_SERVER['HTTP_HOST'].'/index.php';
if($debug) echo 'Http Host:'.$_SERVER['HTTP_HOST'].'<br>';
$_GET['appTitle'] = APP_TITLE;
$_GET['appPageName'] = APP_PAGENAME . ' - Home';
$_GET['appNextPageHref'] = '/about.php';
$_GET['appNextPageText'] = 'ABOUT';
$_GET['appSsoVer'] = APP_SSOVERSION;
$_GET['appClientKey'] = MERCHANT_CLIENT_KEY;
$_GET['mncDigitalUrl'] = MNC_DIGITAL_URL;
$_GET['userFullname'] = 'not login yet';
$_GET['userEmail'] = '';
$_GET['username'] = '';

// error_log(sprintf("cookies: %s\n", print_r($_COOKIE, true)));
if(isset($_COOKIE['ZxnsQxZ6IoI22OoX'])) {
    $cuuid = $_COOKIE['ZxnsQxZ6IoI22OoX'];
    $cpath = $_SERVER['DOCUMENT_ROOT']."/data/".$cuuid;
    if($debug) echo 'cuuid:'.$cuuid.'<br>';
    if($debug) echo 'Doc Root:'.$_SERVER['DOCUMENT_ROOT'].'<br>';
    if($debug) echo 'cpath:'.$cpath.'<br>';
    if(file_exists($cpath)) {
        $scallback = file_get_contents($cpath."/callback.json");
        $jcallback = json_decode($scallback);
        if($jcallback != null) {
            if(array_key_exists('profile', $jcallback)) {
                $_GET['username'] = $jcallback->username;
                $sprofile = urldecode($jcallback->profile);
                $jprofile = json_decode($sprofile);
                if($jprofile != null) {
                    $_GET['userFullname'] = $jprofile->firstname . " " . $jprofile->lastname;
                    $_GET['userEmail'] = $jprofile->email;
                    $_GET['gender'] = $jprofile->gender;
                    $_GET['date_of_birth'] = $jprofile->date_of_birth;
                    $_GET['url_profile'] = $jprofile->url_profile;
                    $_GET['address'] = $jprofile->address;
                    $_GET['phone_number'] = $jprofile->phone_number;
                    $_GET['s_id'] = $jprofile->s_id;
                    if($debug) echo 'userFullname:'.$jprofile->firstname . " " . $jprofile->lastname.'<br>';
                    if($debug) echo 'userEmail:'.$jprofile->email.'<br>';
                }
            }
        }
    }
}else{
    echo 'Cookies ZxnsQxZ6IoI22OoX Not Found<br>';
}

?> 
