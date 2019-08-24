<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/news.css" rel="stylesheet">
    <script
            src="js/jquery-3.4.1.js"
           ></script>
    <title>Sửa tin tức</title>
</head>
<body>
    <?php
    include_once "connection.php";
    if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id']!=0){
        $id=$_GET['id'];
        $sql="SELECT * FROM `tin_tuc` WHERE id=$id";
        $kq=mysqli_query($connection,$sql);
        $data=mysqli_fetch_array($kq);


    }
    if(isset($_POST['cap-nhat'])){
        $id=$_POST['id'];
        $tieu_de=$_POST['tieu-de'];
        $noi_dung_ngan=$_POST['noi-dung-ngan'];
        $noi_dung=$_POST['noi-dung'];
        $an_hien=$_POST['an-hien'];
        $category_id=$_POST['category_id'];
        
        //cap nhật ảnh
        $anh_dai_dien=$_FILES['anh_dai_dien'];
        $sql_update_anh="";
        if($anh_dai_dien['name']){
            $name=$anh_dai_dien['name'];
            $a_anh_dai_dien="anh_dai_dien_{$id}_$name";
            $tmp_name=$anh_dai_dien['tmp_name'];
            move_uploaded_file($tmp_name,"images/news/$a_anh_dai_dien");
            $sql_update_anh=",anh_dai_dien='images/news/$a_anh_dai_dien'";
        }


        $sql="UPDATE  `tin_tuc`
        SET tieu_de='$tieu_de'$sql_update_anh,noi_dung_ngan='$noi_dung_ngan',noi_dung='$noi_dung',category_id='$category_id',trang_thai='$an_hien'
    WHERE id='$id'";
        mysqli_query($connection,$sql);
        header("location:tintuc.php");
    }
    $sql="SELECT * FROM `categories`";
    $kq=mysqli_query($connection,$sql);

    ?>
    <div class="sua-tin-tuc">
        <form action="sua_tin_tuc.php" method="post" enctype="multipart/form-data">
            <table border="1" style="margin: 20px auto" >
                <tr>
                    <td>Tiêu đề tin tức</td>
                    <td><input class="tieu-de" name="tieu-de" value="<?php echo $data['tieu_de'] ?>"></td>
                </tr>
                <tr>
                    <td>Ảnh đại diện</td>
                    <td>
                        <div class="wrapper-content-anh-dai-dien">
                            <img id="anh-dai-dien" class="anh-dai-dien" src="<?php echo $data['anh_dai_dien'] ?>">
                            <button  type="button"  class="xoa <?php echo $data['anh_dai_dien']?'':' hide ' ?>" >Xóa</button>

                        </div>
                        <input type="file" class="anh_dai_dien" name="anh_dai_dien">
                    </td>
                </tr>
                <tr>
                    <td>Nội dung ngắn</td>
                    <td><textarea class="noi-dung-ngan" name="noi-dung-ngan" ><?php echo $data['noi_dung_ngan'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td><textarea class="noi-dung" name="noi-dung" ><?php echo $data['noi_dung'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <select name="an-hien">
                            <option <?php echo $data['an_hien']==1? ' selected ':'' ?> value="0">Ẩn</option>
                            <option <?php echo $data['an_hien']==0? ' selected ':'' ?> value="1">Hiện</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nhóm tin tức</td>
                    <td>
                        <select name="category_id">
                            <?php while($row = mysqli_fetch_array($kq)){ ?>
                                <option <?php echo $data['category_id']==$row['id']?' selected ':'' ?> value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="cap-nhat" value="cap-nhat">Cập nhật</button></td>
                    <td><button type="submit" name="huy" value="huy">Hủy</button></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        </form>
    </div>
    <script type="text/javascript">
        var root_image="<?php echo $data['anh_dai_dien'] ?>";
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#anh-dai-dien').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $=jQuery;
        $('.wrapper-content-anh-dai-dien .xoa').click(function (event) {
            $('#anh-dai-dien').attr('src','');
            $('.wrapper-content-anh-dai-dien .xoa').addClass('hide');
            $('.sua-tin-tuc .anh_dai_dien').val("");

        });
        $('.sua-tin-tuc .anh_dai_dien').change(function (event) {
            readURL(this);
            $('.wrapper-content-anh-dai-dien .xoa').removeClass('hide');
        });
    </script>
</body>
</html>