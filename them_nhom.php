<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm nhóm tin tức</title>
</head>
<body>
<?php
    include_once "connection.php";
    $ten_the_loai="";
    $thu_tu=0;
    $an_hien=1;
    if(isset($_POST['luu'])){
        $ten_the_loai=$_POST['ten_the_loai'];
        $thu_tu=$_POST['thu_tu'];
        $an_hien=$_POST['an_hien'];
        $sql="INSERT INTO `news`.`category2` (`id`, `category_name`, `thu_tu`, `status`) VALUES (NULL, '$ten_the_loai', '$thu_tu', '$an_hien');";
        mysqli_query($connection,$sql);
    }else if($_POST['huy']){
        //thuc hien lenh huy
    }
?>
    <form action="them_nhom.php" method="post">
        <table style="margin: 20px auto" border="1">
            <tr>
                <td>Tên thể loại</td>
                <td><input type="text" name="ten_the_loai"></td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="number" name="thu_tu"></td>
            </tr>
            <tr>
                <td>Ẩn hiện</td>
                <td>
                    <select name="an_hien">
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button name="luu" value="submit" type="submit">Lưu</button></td>
                <td><button name="huy" value="huy" type="submit">Hủy</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
