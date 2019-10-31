<?php
define("ADMIN_PATH_ROOT",__DIR__);
?>
<?php
 require_once ADMIN_PATH_ROOT."/includes/init.php";
 if($controller!="user" & $task!="login" && !UserModel::check_login()){
     header("location:index.php?controller=user&task=login");
 }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
hello admin
</body>
</html>