<?php
session_start();
define("ROOT",str_replace("/admin","",ADMIN_PATH_ROOT));

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
$controller=isset($_GET['controller'])?$_GET['controller']:'index';


$task=isset($_GET['task'])?$_GET['task']:'index';

require_once ADMIN_PATH_ROOT."/includes/framework.php";
$controller_path="/controllers/$controller.php";

if(file_exists(ADMIN_PATH_ROOT.$controller_path)) {
    require_once ADMIN_PATH_ROOT.$controller_path;
    $method_name=$task;
    if(method_exists($controller."Controller",$method_name)){
        $class_controller=$controller."Controller";
        $class_controller=new $class_controller();
        call_user_func(array($class_controller, $method_name));
    }
}
$content=ob_get_clean();

?>