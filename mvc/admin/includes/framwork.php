<?php
require_once ADMIN_PATH_ROOT."/models/UserModel.php";
$controller=isset($_GET['controller'])?$_GET['controller']:'';
$task=isset($_GET['task'])?$_GET['task']:'';
if(file_exists(ADMIN_PATH_ROOT."/controllers/{$controller}Controller.php"))
    require_once ADMIN_PATH_ROOT."/controllers/{$controller}Controller.php";
$class_controller="{$controller}Controller";
$class_controller=new $class_controller();
$method_name=$task;
if(method_exists("{$controller}Controller",$method_name)) {
    call_user_func(array($class_controller, $method_name));
}