@extends('admin.layout.master')
@section('content')
    <div class="view-edit-product">
        <form action="{{route('post-edit-product',$product->id)}}" enctype="multipart/form-data"  method="post">
            <table class="table table-bordered">
                <tr>
                    <th>Product id</th>
                    <td>{{$product->id}}</td>
                </tr>
                <tr>
                    <th>Product name</th>
                    <td><input class="form-control" name="product_name" type="text" value="{{$product->product_name}}"></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        @if ($product->image_product)
                            <img class="image-product" src="{{$product->image_product}}">
                        @endif
                        <input class="form-control" name="image_product" type="file" value="">
                    </td>
                </tr>
                <tr>
                    <th>short description</th>
                    <td>
                        <textarea name="short_description" class="form-control">{{$product->short_description}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th>Full description</th>
                    <td>
                        <textarea name="full_description" class="form-control">{{$product->full_description}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-primary pull-right">Submit</button></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="{{$product->id}}">
            {{csrf_field()}}
        </form>
    </div>
@endsection
