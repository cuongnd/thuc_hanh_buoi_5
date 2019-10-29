<?php
class  UserModel{
    public static function check_login(){
        $user= isset($_SESSION['admin_user'])?json_decode($_SESSION['admin_user']):null;
        if(isset($user->id)){
            return true;
        }
        return false;
    }
    public function post_login($data){
        $con=db::getConnection();
        $query="SELECT * FROM users WHERE username='{$data['username']}' AND password='{$data['password']}' ";
        $kq=mysqli_query($con,$query);
        $user=$kq->fetch_assoc();
        if($user['id']){
            $_SESSION['admin_user']=json_encode($user);
        }
        return $user;
    }

}