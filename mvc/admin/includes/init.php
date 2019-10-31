<?php

// server protocol
$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';

// domain name
$domain = $_SERVER['SERVER_NAME'];
// base url
// server port
$port = $_SERVER['SERVER_PORT'];
$script_name = $_SERVER['SCRIPT_NAME'];
$script_name=str_replace("/index.php","",$script_name);
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
// put em all together to get the complete base URL
$url = "${protocol}://${domain}${disp_port}/$script_name/";
define("ADMIN_PATH_WEB",$url);
require_once ADMIN_PATH_ROOT."/includes/framwork.php";
