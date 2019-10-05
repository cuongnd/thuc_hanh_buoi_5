<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('/')}}/admin_asset/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- customCSS -->
    <link href="{{url('/')}}/admin_asset/custom.css" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    <div class="container">

        <div class="wrapper-content-login">
            <div class="alert-danger">
                {{session('loi')}}
            </div>
            <form action="" method="post">
                <table class="table table-bordered">
                    <tr>
                        <th>Username</th>
                        <td><input type="text" value="admin@gmail.com" class="form-control" name="txtEmail"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" value="123456" class="form-control" name="txtPass"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn btn-primary">Login</button>
                        </td>
                    </tr>
                </table>
                {{csrf_field()}}
            </form>
        </div>
    </div>
</body>
</html>