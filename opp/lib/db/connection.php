<?php
class db{
    static function getConnection(){
        $connection=mysqli_connect("localhost","root","mysql","php1906e_opp");
        return $connection;
    }

}