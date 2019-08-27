<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/my_style.css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <title>Product</title>
</head>
<body>
<?php
include_once "connection.php";

session_start();

if (!isset($_SESSION['list_cart'])) {
    $_SESSION['list_cart'] = array();
}
if(isset($_GET['action']) && $_GET['action']=='addcart'){
    //add to cart
    $product_id=$_GET['product_id'];
    $sql="SELECT * FROM `products` WHERE id='$product_id'";
    $kq=mysqli_query($connection,$sql);
    $product=mysqli_fetch_array($kq);
    $obj_product=array(
            'id'=>$product['id'],
            'product_name'=>$product['product_name'],
            'product_price'=>$product['product_price'],
    );
    $check_enable_add=true;


    foreach ($_SESSION['list_cart'] as $a_product){
        if($a_product['id']==$product_id){
            $check_enable_add=false;
        }
    }
    if($check_enable_add){
        array_push($_SESSION['list_cart'],$obj_product);
    }
}
$sql = "SELECT * FROM `products`";
$kq = mysqli_query($connection, $sql);
?>

<div class="view-products">
    <div class="list-product">
        <div class="row">
            <?php while ($row = mysqli_fetch_array($kq)) { ?>
                <div class="col-md-3">
                    <div class="product-item">
                        <h3><?php echo $row['product_name'] ?></h3>
                        <label>Price:<?php echo $row['product_price'] ?> đ</label>
                        <a href="products.php?action=addcart&product_id=<?php echo $row['id'] ?>"  class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="cart">
        <table border="1" class="table" style="margin: 20px auto">
            <thead>
            <tr>
                <th colspan="3">Your car</th>
            </tr>
            <tr>
                <th>Product name</th>
                <th>Quality</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['list_cart'] as $item_product){ ?>
                    <tr>
                        <td><?php echo $item_product['product_name'] ?></td>
                        <td>1</td>
                        <td><?php echo $item_product['product_price'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>
</body>
</html>