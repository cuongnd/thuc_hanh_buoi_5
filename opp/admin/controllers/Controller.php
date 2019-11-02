<?php
class Controller{
    function view($layout){
        $layout=explode(".",$layout);
        $layout=implode("/",$layout);
        include_once ADMIN_PATH_ROOT."/views/$layout.php";
    }
}