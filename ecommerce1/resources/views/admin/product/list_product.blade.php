@extends('admin.layout.master')
@section('content')
    <div class="view-add-product">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product name</th>
                    <th>Product image</th>
                    <th>short description</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td><img class="image_product" src="{{$product->image_product}}"></td>
                    <td>{{$product->short_description}}</td>
                    <td><a href="{{route('edit-product',$product->id)}}" class="btn btn-link">Edit</a><a class="btn btn-link" href="">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
