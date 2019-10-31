<?php

class Controller
{
    public function getModel($model_name)
    {
        if ($model_name!="user" &&  file_exists(ADMIN_PATH_ROOT . "/models/{$model_name}Model.php")) {
                require_once ADMIN_PATH_ROOT . "/models/{$model_name}Model.php";
                $class_model = "{$model_name}Model";
                $class_model = new $class_model();
                return $class_model;
        }else if($model_name=="user"){
            return new UserModel();
        }

        return false;
    }
    public function view($layout){
        if(file_exists(ADMIN_PATH_ROOT."/views/$layout.php"))
            include_once ADMIN_PATH_ROOT."/views/$layout.php";
    }
}