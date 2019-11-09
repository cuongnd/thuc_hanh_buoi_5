@extends('admin.layout.master')
@section('content')
    <form action="{{route('post-add-product')}}" enctype="multipart/form-data"  method="post">
        <table class="table table-bordered">
            <tr>
                <th>Product name</th>
                <td><input class="form-control" name="product_name" type="text" value=""></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><input class="form-control" name="image_product" type="file" value=""></td>
            </tr>
            <tr>
                <th>short description</th>
                <td>
                    <textarea name="short_description" class="form-control"></textarea>
                </td>
            </tr>
            <tr>
                <th>Full description</th>
                <td>
                    <textarea name="full_description" class="form-control"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" class="btn btn-primary pull-right">Submit</button></td>
            </tr>
        </table>
        {{csrf_field()}}
    </form>
@endsection
