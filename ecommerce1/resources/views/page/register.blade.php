@extends('layout.master')
@section('content')
    <div class="area-dang-ky">
       <h3>Thông tin đăng ký</h3>
        <form action="" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>Họ và tên</th>
                    <td><input class="form-control" type="text" name="full_name"></td>
                </tr>
                <tr>
                    <th>Tên đăng nhập</th>
                    <td><input class="form-control" type="text" name="user_name"></td>
                </tr>
                <tr>
                    <th>Mật khẩu</th>
                    <td><input class="form-control" type="password" name="txtPass"></td>
                </tr>
                <tr>
                    <th>Nhập lại mật khẩu</th>
                    <td><input class="form-control" type="password" name="txtConfirmPass"></td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button class="btn btn-primary">Đăng ký</button>
                    </th>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
    </div>
@endsection