<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bai 7</title>
</head>
<body>
<?php
$mang_so= array();

function tao_mang($n)
{
    $mang_so=array();
    for($i =0; $i< $n; $i++)
    {
        $mang_so[$i]=mt_rand(0,20);
    }
    return $mang_so;
}
function xuat_mang($mang_so)
{
    echo implode(",", $mang_so);
}
function tim_max($mang_so)
{
    return max($mang_so);
}
function tim_min($mang_so)
{
    return min($mang_so);
}
function tinh_tong($mang_so)
{
   return array_sum($mang_so);
}
if(isset($_POST['tinh_toan'])){
    $n=$_POST['so_phan_tu'];
    $mang_so=tao_mang($n);
}
?>
<form action="bai_7.php" method="POST">
    <table>
        <thead>
        <tr>
            <td colspan="2"> Phat sinh mang va tinh</td>
        </tr>
        </thead>
        <tr>
                <td> <input type="text" name="so_phan_tu"></td>
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" name="tinh_toan" value="phat sinh"></td>
        </tr>
        <tr>
            <td> Mang:</td>
            <td><input type="text" name="mang_so" disabled="disabled" value="<?php echo  xuat_mang($mang_so); ?>"> </td>
        </tr>
        <tr>
            <td> gtln trong mang:</td>
            <td> <input type="text" name="gtln" disabled="disabled" value="<?php echo  tim_max($mang_so); ?>"></td>
        </tr>
        <tr>
            <td> gtnn trong mang</td>
            <td> <input type="text" name="gtnn" disabled="disabled" value="<?php echo  tim_min($mang_so); ?>"></td>
        </tr>
        <tr>
            <td> tong mang:</td>
            <td> <input type="text" name="tong" disabled="disabled" value="<?php echo  tinh_tong($mang_so); ?>"></td>
        </tr>
    </table>
</form>

</body>
</html>
