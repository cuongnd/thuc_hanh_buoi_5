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
    <?php include_once ADMIN_PATH_ROOT."/components/head.php"; ?>
</head>
<body>
    <div class="container">
        <?php if($msg){ ?>
            <div class="alert <?php echo $error_type?'alert-'.$error_type:'' ?>">
                <?php echo $msg ?>
            </div>
        <?php } ?>
        <?php echo $content ?>
    </div>

</body>
</html>