@extends('layout.master')
@section('content')

    <h3>New product</h3>
    <div class="row">
        @foreach($new_product as $product)
            <div class="col-md-4">
                <div class="product">
                    <h3>{{$product->name}}</h3>
                    Price:{{$product->price}}
                    <div class="wrapper-content-add-to-cart">
                        <select class="form-control pull-left"  name="quality">
                            <?php for($i=1;$i<=10;$i++){ ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                        <button data-product_id="{{$product->id}}" class="btn btn-primary btn-add-cart pull-left">Add to cart</button>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <h3>promotion product</h3>
    <div class="row">
        @foreach($sale_product as $product)
            <div class="col-md-4">
                <div class="product">
                    <h3>{{$product->name}}</h3>
                    Price:{{$product->price}}
                    <div class="wrapper-content-add-to-cart">
                        <select class="form-control pull-left"  name="quality">
                            <?php for($i=1;$i<=10;$i++){ ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                        <button data-product_id="{{$product->id}}" class="btn btn-primary btn-add-cart pull-left">Add to cart</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.btn-add-cart').click(function (e) {
                var $wrapper_content_cart=$(this).closest('.wrapper-content-add-to-cart');
                var quality=$wrapper_content_cart.find('select[name="quality"]').val();
                var product_id=$(this).data("product_id");
                var data_post={
                    "_token": "{{ csrf_token() }}",
                    "product_id":product_id,
                    "quality":quality,

                };
                $.ajax({
                    url: "{{url('/')}}/ajax/add-to-cart",
                    type: "post",
                    dataType: 'json',
                    data: data_post,
                    async: true,
                    beforeSend: function()
                    {

                    },
                    success: function(response)
                    {
                        if(response.result==="success"){
                            var product=response.data[0];
                            var $html_item_product_cart=$(`
                                    <li>
                                            <div class="row">
                                                <div class="col-sm-3"><img src=""></div>
                                                <div class="col-sm-9">
                                                    <h4>${product.name}</h4>
                                                    ${product.price}*${product.qty} vnđ
                                                </div>
                                            </div>
                                        </li>
                                `);
                            $html_item_product_cart.appendTo($('.wrapper-content-cart ul.list-cart'));
                            alert('da them thanh cong');
                        }
                    }
                });
            });
        });
    </script>
@endsection
