<?php
class UserController extends Controller {
    public function login(){
       self::view("user/login");
    }
        public function register(){
            self::view("user/register");
    }

    public function post_login(){
        $userModel=self::getModel('user');
        $data=array(
            'user_name'=>isset($_POST['user_name'])?$_POST['user_name']:'',
            'password'=>isset($_POST['password'])?$_POST['password']:''
        );
        if($userModel->post_login($data)){
            header("location:index.php?controller=index&task=index");
        }else{
            $msg="Lỗi đăng nhập";
            header("location:index.php?controller=user&&task=login&error_type=danger&msg=".$msg);
        }
    }
}
