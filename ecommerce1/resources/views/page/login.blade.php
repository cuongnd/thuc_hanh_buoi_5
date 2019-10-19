@extends('layout.master')
@section('content')
    <div class="area-dang-nhap">
        <h3>Thông tin đăng nhập</h3>
        <form action="" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>Tên đăng nhập</th>
                    <td><input class="form-control" type="text" name="txtEmail"></td>
                </tr>
                <tr>
                    <th>Mật khẩu</th>
                    <td><input class="form-control" type="password" name="txtPassword"></td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button class="btn btn-primary">Đăng nhập</button>
                    </th>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
    </div>
@endsection
