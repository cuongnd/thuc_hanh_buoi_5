<?php
define("ADMIN_PATH_ROOT",__DIR__);
require_once "includes/init.php";
$content=ob_get_clean();
?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once ADMIN_PATH_ROOT."/components/head.php"; ?>
</head>
<body>
<?php if($controller!=="user" && $task!="login"&&!UserModel::check_login()){
    header("location:index.php?controller=user&task=login");
} ?>
<div class="container">
<div class="row">
    <div class="col-md-3"><img src="<?php echo ADMIN_PATH_WEB ?>assets/images/logo.png"></div>
    <div class="col-md-9"></div>
</div>
    <?php if($controller=="user" && $task=="login") { ?>


            <div class="row">
                <div class="col-md-12">
                    <div class="view-login">
                        <form action="index.php?controller=user&task=post_login" method="post">
                            <table class="table table-bordered ">
                                <tr>
                                    <th>Username</th>
                                    <td><input class="form-control" type="text" name="username"></td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td><input class="form-control" type="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="btn btn-primary">Login</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

    <?php }else{ ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group list-group-menu">
                        <a href="<?php echo ADMIN_PATH_WEB ?>index.php" class="list-group-item">
                            Dashboard
                        </a>
                        <a href="<?php echo ADMIN_PATH_WEB ?>index.php?controller=product&task=listing" class="list-group-item">List product</a>
                        <a href="<?php echo ADMIN_PATH_WEB ?>index.php?controller=category&task=listing" class="list-group-item">Categories</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php
                        echo $content;
                    ?>
                </div>
            </div>

    <?php } ?>
</div>
</body>
</html>