@extends('admin.layout.master')
@section('content')
<form action="{{route('suadanhmuc',$id)}}">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" value="{{$id}}"></td>
        </tr>
    </table>
</form>
@endsection