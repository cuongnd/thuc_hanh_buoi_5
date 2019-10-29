@extends('layout.master')
@section('content')
    <div class="view-detail">
        <div class="row">
            <div class="col-md-3">
                nhom san pham
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">show anh</div>
                    <div class="col-md-6">
                        {{$product->name}}
                        <div class="price">{{$product->price}} vnđ</div>
                        <div class="quality">
                            Số lượng
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
                </div>
            </div>
        </div>
    </div>
@endsection
