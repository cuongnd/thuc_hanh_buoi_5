@extends('layout.master')
@section('content')

    <h3>New product</h3>
    <div class="row">
        @foreach($new_product as $product)
            <div class="col-md-4">
                <div class="product">
                    <h3><a href="{{url('/')}}/san-pham/{{$product->id}}">{{$product->name}}</a></h3>
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
                    <h3><a href="{{url('/')}}/san-pham/{{$product->id}}">{{$product->name}}</a></h3>
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

@endsection
