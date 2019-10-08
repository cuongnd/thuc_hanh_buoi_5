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
        <div id="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left"><h3>Quản lý bán hàng</h3></div>
                    <div class="pull-right">
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">HTML</a></li>
                                    <li><a href="#">CSS</a></li>
                                    <li><a href="#">JavaScript</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">@include('admin.layout.header')</div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Control panel</h3></div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>

                    </div>
            </div>
            <div class="footer">
                Bản quản thuộc về php1906e
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{url('/')}}admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/')}}admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>





    <script src="{{url('/')}}admin_asset/ckeditor/ckeditor.js"></script>

    @yield('script')
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>
