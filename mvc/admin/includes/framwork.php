<?php
require_once ADMIN_PATH_ROOT."/controllers/Controller.php";
require_once ADMIN_PATH_ROOT."/models/UserModel.php";
$controller=isset($_GET['controller'])?$_GET['controller']:'index';
$task=isset($_GET['task'])?$_GET['task']:'index';
$msg=isset($_GET['msg'])?$_GET['msg']:'';
$error_type=isset($_GET['error_type'])?$_GET['error_type']:'';
if(file_exists(ADMIN_PATH_ROOT."/controllers/{$controller}Controller.php"))
    require_once ADMIN_PATH_ROOT."/controllers/{$controller}Controller.php";
$class_controller="{$controller}Controller";
$class_controller=new $class_controller();
$method_name=$task;
ob_start();
if(method_exists("{$controller}Controller",$method_name)) {
    call_user_func(array($class_controller, $method_name));
}
$content=ob_get_clean();
