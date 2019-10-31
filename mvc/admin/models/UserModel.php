<?php
class UserModel{
    public function post_login($data){
        $connection=db::getConnection();
        $query="SELECT * FROM users WHERE user_name='{$data['user_name']}' AND password='{$data['password']}'";
        $kq=mysqli_query($connection,$query);
        $user=$kq->fetch_assoc();
        if(!$user){
            return false;
        }else{
            $_SESSION['admin_user']=json_encode($user);
            return true;
        }
    }
    public static function check_login(){
        $admin_user=isset($_SESSION['admin_user'])?$_SESSION['admin_user']:null;
        $admin_user=json_decode($admin_user);
        if($admin_user->id){
            return true;
        }
        return false;
    }
}