<?php
define("ADMIN_PATH_ROOT",__DIR__);
require_once "includes/init.php";
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
    </div>
</body>
</html>