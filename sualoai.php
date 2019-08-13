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
if(isset($_POST['luu']) && $_POST['luu']=='sua'){
    echo "thuc hanh dong sua";
    die;
}
if(isset($_GET['action']) && $_GET['action']=="edit"){
    //lay ra id cua nhom
    $id=$_GET['id'];
    $sql="SELECT * FROM `category2` WHERE id=".$id;
    $kq=mysqli_query($connection,$sql);
    $data=mysqli_fetch_array($kq);



    ?>
<form action="sualoai.php" method="post">
    <table style="margin: 20px auto" border="1">
        <tr>
            <td>Tên thể loại</td>
            <td><input type="text" name="ten_the_loai" value="<?php echo $data['category_name'] ?>"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="number" name="thu_tu" value="<?php echo $data['thu_tu'] ?>"></td>
        </tr>
        <tr>
            <td>Ẩn hiện</td>
            <td>
                <select name="an_hien">
                    <option <?php echo $data['status']==1?' selected ':'' ?>  value="1">Hiện</option>
                    <option <?php echo $data['status']==0?' selected ':'' ?> value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><button name="luu" value="sua" type="submit">Lưu</button></td>
            <td><button name="huy" value="huy" type="submit">Hủy</button></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
</form>
<?php } ?>
</body>
</html>
