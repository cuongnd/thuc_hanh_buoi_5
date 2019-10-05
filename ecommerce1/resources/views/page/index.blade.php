@extends('layout.master')
@section('content')
    <h3>New product</h3>
    <div class="row">
        @foreach($new_product as $product)
            <div class="col-md-4">
                <div class="product">
                    <h3>{{$product->name}}</h3>
                    <button class="btn btn-primary">Add to cart</button>
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
                    <button class="btn btn-primary">Add to cart</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection