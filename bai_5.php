<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phương trình bậc 2</title>
</head>
<body>
<?php
$nghiem = "";
$a="";
$b="";
$c="";
if (isset($_GET['xuat'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];
    if ($a != 0) {
        $detal = $b * $b - 4 * $a * $c;
        if($detal>0){
            $x1 = (-$b + sqrt($detal)) / (2 * $a);
            $x2 = (-$b - sqrt($detal)) / (2 * $a);
            $nghiem = "Phương trình có 2 nghiệm phân biệt x1=$x1 , x2= $x2";
        }else if($detal==0){
            $x=-$b/(2*$a);
            $nghiem="Phương trình có nghiệm kép x1=x2=$x";
        }else if($detal<0){
            $nghiem="Phương trình vô nghiệm";
        }
    } else {
        if($b==0){
            if($c!=0){
                $nghiem="Phương trình vô nghiệm";
            }else{
                $nghiem="Phương trình vô số nghiệm";
            }
        }else{
            $x=-$c/$b;
            $nghiem="Phương trình có 1 nghiệm x=$x";
        }
    }
}
?>
<form action="bai_5.php" method="get">
    <table border="1" style="margin: 40px auto">
        <tr>
            <td colspan="4">Giải phương trình bậc 2</td>
        </tr>
        <tr>
            <td>Phương trình</td>

            <td><input type="text" value="<?php echo $a ?>" name="a">X^2 +</td>
            <td><input type="text" value="<?php echo $b ?>" name="b">X +</td>
            <td><input type="text" value="<?php echo $c ?>" name="c"> = 0</td>
        </tr>
        <tr>
            <td colspan="4">Nghiệm <input style="width: 300px" type="text" value="<?php echo $nghiem ?>" disabled name="nghiem"></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <button style="padding: 10px" type="submit" value="tinh_toan" name="xuat">Xuất</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>