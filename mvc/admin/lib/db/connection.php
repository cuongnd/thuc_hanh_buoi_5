<?php
class DB{
    /*
     * kết nối tới cơ sở dữ liệu
     */
    public static function getConnection(){
        return mysqli_connect("localhost","root","mysql","mvc");
    }
}