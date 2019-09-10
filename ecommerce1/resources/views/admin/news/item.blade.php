@extends('admin.layout.master')
@section('content')
    <div id="page-wrapper">
        <h3>Thêm tin tức</h3>
        <form action="" method="post">
            <table style="margin: 30px auto" border="1">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" id="title"></td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><textarea name="content" id="content"></textarea></td>
                </tr>
                <tr>
                    <td>Publish</td>
                    <td>
                        <select name="publish" id="publish">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="send-data">Send data</button>
                    </td>
                </tr>
                 {{csrf_field()}}
            </table>
        </form>
    </div>
@endsection
@section('script')
    <script src="admin_asset/abc.js"></script>
@endsection
