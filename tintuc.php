<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách tin tức</title>
</head>
<body>
<?php
include_once "connection.php";
$sql="SELECT * FROM `tin_tuc`";
$kq=mysqli_query($connection,$sql);

?>
<div class="danh-sach-tin-tuc">
    <form action="tintuc.php" method="post">
        <table border="1" style="margin: 20px auto">
            <thead>
                <tr>
                    <td>Stt</td>
                    <td>Tiêu đề</td>
                    <td>Nhóm tin tức</td>
                    <td>Nội dung ngắn</td>
                    <td>Ảnh đại diện</td>
                    <td>Trạng thái</td>
                    <td colspan="2">Thêm tức</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            ?>
            <?php while($row = mysqli_fetch_array($kq)){ ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['tieu_de'] ?></td>
                    <td><?php echo $row['tieu_deu'] ?></td>
                    <td><?php echo $row['noi_dung_ngan'] ?></td>
                    <td><?php echo $row['anh_dai_dien'] ?></td>
                    <td><?php echo $row['trang_thai']==1? "Hiện":"Ẩn" ?></td>
                    <td><a href="tintuc.php?action=xoa&id=<?php echo $row['id'] ?>">Xóa</a></td>
                    <td><a href="sua_tin_tuc.php?action=sua&id=<?php echo $row['id'] ?>">Sửa</a></td>
                </tr>
            <?php $i++; ?>
            <?php } ?>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>