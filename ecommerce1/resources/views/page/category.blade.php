@extends('layout.master')
@section('content')
    <div class="view-category">
        <div class="row">
            <div class="col-md-3">
                <div class="categories">show category</div>
                <div class="fillter">show filter</div>

            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">giay nu</div>
                    <div class="col-md-9">
                        <div class="pull-right">
                            sorting
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($list_new_product as $product)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
