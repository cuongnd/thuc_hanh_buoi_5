<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['da_dang_nhap']) ||  !$_SESSION['da_dang_nhap']=="ok"){
    header('location:login.php');
}
$profile=$_SESSION['profile'];
$username=$profile["username"];
$password=$profile["password"];
include_once "connection.php";
$sql="SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
$kq=mysqli_query($connection,$sql);
$user=mysqli_fetch_array($kq);


?>
<table border="1" style="margin: 20px auto">
    <tr>
        <td colspan="2">Profile</td>
    </tr>
    <tr>
        <td>username</td>
        <td><?php echo $user['username'] ?></td>
    </tr>
    <tr>
        <td>Full name</td>
        <td><?php echo $user['full_name'] ?></td>
    </tr>
</table>
</body>
</html>