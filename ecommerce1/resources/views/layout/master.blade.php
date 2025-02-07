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
    <base href="{{asset('')}}">
    <link href="{{url('/')}}/frontend_asset/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- customCSS -->
    <link href="{{url('/')}}/frontend_asset/custom.css" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<!-- /#wrapper -->
<script type="text/javascript">
    var _token="{{ csrf_token() }}",root_url="{{url('/')}}";
</script>
<!-- jQuery -->
<script src="{{url('/')}}/frontend_asset/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{url('/')}}/frontend_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<script src="{{url('/')}}/frontend_asset/ckeditor/ckeditor.js"></script>
<script src="{{url('/')}}/frontend_asset/custom.js"></script>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="logo"><h3><a href="{{url('/')}}"><img class="logo"
                                                              src="{{url('/')}}/frontend_asset/images/logo.png"></a>
                </h3></div>
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <ul class="top-right-links">
                    <li class="cart-link"><a href="{{url('/')}}/gio-hang" data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false">
                            Cart <span class="label label-success total-item">{{Cart::count()}}</span></a>
                        <div class="dropdown-menu wrapper-content-cart-dropdown">
                            <div class="wrapper-content-cart">
                                @if (Cart::count()==0)
                                    <div class="empty-cart">
                                        không có sản nào trong giỏ hàng
                                    </div>
                                @endif

                                <ul class="list-cart">
                                    @foreach(Cart::content() as $cart)
                                        <?php

                                        $cart_product = App\Product::find($cart->id);


                                        ?>
                                        <li data-product_id="{{$cart_product->id}}">
                                            <div class="row">
                                                <div class="col-sm-3"><img class="product-image" src="{{url('/')}}/frontend_asset/images/no-image.jpeg"></div>
                                                <div class="col-sm-9">
                                                    <div><b>{{$cart->name}}</b></div>
                                                    {{$cart->price}} * <span class="cart-quality">{{$cart->qty}}</span> vnđ
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div><a href="{{url('/')}}/gio-hang">Giỏ hàng</a></div>
            </div>
        </div>
        </li>
        <li><a href="{{url('/')}}/dang-ky">Đăng ký</a></li>
        <li><a href="{{url('/')}}/dang-nhap">Đăng nhập</a></li>
        </ul>
    </div>
</div>
</div>
<div class="wrapper-content-menu-ngang">
    <div class="row">
        <div class="col-md-12">
            <ul class="menu-ngang">
                <li><a class="active" href="{{url('/')}}">Trang chủ</a></li>
                <li><a href="{{url('/')}}/danh-muc/8">Giày nữ</a></li>
                <li><a href="{{url('/')}}/danh-muc/9">Giày nam</a></li>
                <li><a href="{{url('/')}}">Giới thiệu</a></li>
                <li><a href="{{url('/')}}">Liên hệ</a></li>
            </ul>
        </div>
    </div>
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

@yield('script')
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>
