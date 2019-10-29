<?php
class UserController{
    function post_login(){
        $post=$_POST;
        $data=array(
            'username'=>isset($_POST['username'])?$_POST['username']:'',
            'password'=>isset($_POST['password'])?$_POST['password']:'',
        );
        $user_model=$this->getModel('user');
        if($user=$user_model->post_login($data)){
            header("location:index.php");
        }


    }
    protected function getModel($model_name){
        if(file_exists(ADMIN_PATH_ROOT."/models/$model_name.php"))
        {
            require_once ADMIN_PATH_ROOT."/models/$model_name.php";
            $class_controller=$model_name."Model";
            $class_controller=new $class_controller();
            return $class_controller;
        }
    }
    function test_task(){
        echo "hello test_task";
        die;
    }
}
