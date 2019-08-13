<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The loai tin tuc</title>
</head>
<body>
<?php
include_once "connection.php";
$sql="SELECT * FROM `category2`";
$kq=mysqli_query($connection,$sql);
if(isset($_GET["action"]) && $_GET["action"]=="delete"){
    $id=$_GET["id"];
    $sql1="DELETE FROM `category2` WHERE id=$id";
    mysqli_query($connection, $sql1);
}





?>
<table border="1" style="margin: 20px auto">
    <tr>
        <td>Id</td>
        <td>Ten the loai</td>
        <td>thu tu</td>
        <td>an hien</td>
        <td colspan="2"><a href="them_nhom.php">Thêm nhóm mới</a></td>
    </tr>
    <?php while($row = mysqli_fetch_array($kq)){ ?>

    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['category_name'] ?></td>
        <td><?php echo $row['thu_tu'] ?></td>
        <td>
            <?php if($row['status']==1){ ?>
                Hiện
            <?php }else{ ?>
                Ẩn
            <?php } ?>
        </td>
        <td><a href="sualoai.php?action=edit&id=<?php echo $row['id'] ?>">sửa</a></td>
        <td><a href="theloai.php?action=delete&id=<?php echo $row['id'] ?>">Xóa</a></td>
    </tr>
    <?php } ?>

</table>
</body>
</html>