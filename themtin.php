<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/news.css" rel="stylesheet">
    <title>them tin</title>
</head>
<body>
<?php
include_once "connection.php";
if (isset($_POST['luu'])) {
    $tieu_de = $_POST['tieu_de'];
    $noi_dung_ngan = $_POST['noi_dung_ngan'];
    $noi_dung = $_POST['noi_dung'];
    $an_hien = $_POST['an_hien'];
    $tin_noi_bat = $_POST['tin_noi_bat'];
    $sql = "INSERT INTO `tin_tuc` (`id`, `tieu_de`, `noi_dung_ngan`, `noi_dung`, `trang_thai`, `tin_noi_bat`, `tin_lien_quan`, `danh_gia`) VALUES (NULL, '$tieu_de', '$noi_dung_ngan','$noi_dung', '$an_hien', '$tin_noi_bat', '', '');";

    mysqli_query($connection, $sql);
    header("location:tintuc.php");

}
?>
<div class="them-tin">
    <form action="themtin.php" method="post">
        <table style="margin: 20px auto" border="1">
            <tr>
                <td>Tieu de</td>
                <td><input type="text" name="tieu_de"></td>
            </tr>
            <tr>
                <td>Nội dung ngắn</td>
                <td><textarea class="noi-dung-ngan" name="noi_dung_ngan"></textarea></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td><textarea class="noi-dung" name="noi_dung"></textarea></td>
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
                <td>Tin nổi bật</td>
                <td>
                    <select name="tin_noi_bat">
                        <option value="1">Có</option>
                        <option value="0">Không</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>anh dai dien</td>
                <td><input type="file" name="anh_dai_dien"></td>
            </tr>
            <tr>
                <td>
                    <button name="luu" value="submit" type="submit">Lưu</button>
                </td>
                <td>
                    <button name="huy" value="huy" type="submit">Hủy</button>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
