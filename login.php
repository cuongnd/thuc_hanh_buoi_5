<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<?php
    include_once "connection.php";
    session_start();
   if(isset($_SESSION['da_dang_nhap']) && $_SESSION['da_dang_nhap']=="ok"){
       header("location:profile.php");
   }
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT COUNT(*) AS total FROM `users` WHERE `username`='$username' AND `password`='$password' ";
        $kg=mysqli_query($connection,$sql);
        $data=mysqli_fetch_array($kg);
        if($data['total']>=1){
            echo "bạn đã login thành công";
            $_SESSION['da_dang_nhap']="ok";
            $_SESSION['profile']=array(
              "username"=>$username,
              "password"=>$password
            );
             header("location:profile.php");

        }



    }
?>
    <form action="login.php" method="post">
        <table border="1" style="margin: 20px auto">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="login">Login</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>