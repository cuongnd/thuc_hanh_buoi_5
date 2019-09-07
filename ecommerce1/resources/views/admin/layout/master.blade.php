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
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bootstrap/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- customCSS -->
    <link href="admin_asset/custom.css" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        
        @yield('content')
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
