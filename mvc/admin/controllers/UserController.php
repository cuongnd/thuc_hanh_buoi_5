<?php
class UserController{
    public function login(){
       self::view("user/login");
    }
        public function register(){
        echo "hello UserController register";
        die;
    }
    public function view($layout){
        if(file_exists(ADMIN_PATH_ROOT."/views/$layout.php"))
            include_once ADMIN_PATH_ROOT."/views/$layout.php";
    }
}
