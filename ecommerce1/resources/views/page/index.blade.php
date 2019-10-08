@extends('layout.master')
@section('content')
    <h3>New product</h3>
    <div class="row">
        @foreach($new_product as $product)
            <div class="col-md-4">
                <div class="product">
                    <h3>{{$product->name}}</h3>
                    <button data-product_id="{{$product->id}}" class="btn btn-primary btn-add-cart">Add to cart</button>
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
                    <button data-product_id="{{$product->id}}" class="btn btn-primary btn-add-cart">Add to cart</button>
                </div>
            </div>
        @endforeach
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.btn-add-cart').click(function (e) {
                var product_id=$(this).data("product_id");
                var data_post={
                    "_token": "{{ csrf_token() }}",
                    "product_id":product_id,

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
                    success: function(data)
                    {
                        console.log("data",data);
                    }
                });
            });
        });
    </script>
@endsection