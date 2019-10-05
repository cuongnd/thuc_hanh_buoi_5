<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trang admin</title>
    <base href="{{asset('')}}" >
    <link href="{{url('/')}}/admin_asset/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- customCSS -->
    <link href="{{url('/')}}/admin_asset/custom.css" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="logo"><h3>Php1906e</h3></div>
            </div>
            <div class="col-md-6">
                khu vuc tim kiem
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">menu ngang o day</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                chan trang o day
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>





    <script src="admin_asset/ckeditor/ckeditor.js"></script>

    @yield('script')
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>
