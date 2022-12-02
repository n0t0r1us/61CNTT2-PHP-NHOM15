<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phát sinh & Tính toán mảng</title>
</head>
<body>
<style>
    table{
        border: 1px solid black;
        width: 500px;
        background-color: #fffbff;
    }
    .header{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    .a1, .a2{
        padding-left: 10px;
    }
    .btn{background-color: #fffea9; width: 180px;}
    .btn1{background-color: #fffea9; width: 74px;}
    .a, .a2{background-color: #fedaf4;} 
    .b, .arr{background: #fba9a9;}
    .arr{width: 250px;}
    .b{width: 130px;}
    .nhap{width: 210px;}
    b{color: red;}
</style>
<?php
if(isset($_POST['submit'])){
    $n=$_POST['n'];
    if(isset($n) and is_numeric($n) and $n>0){
        tao_mang($n,$a);
        $mang_kq=xuat_mang($a);
        $max=tim_max($a);
        $min=tim_min($a);
        $tong=tinh_tong($a);
    }
    else{
        $error="n phải là số và lớn hơn 0";
    }
}
else if(isset($_POST['reset'])){
    $n="";
}
function tao_mang($n,&$a){
    for($i=0;$i<$n;$i++){
        $a[$i]=rand(0,20);
    }
    return $a;
}
function xuat_mang($a){
    $s="";
    for($i=0;$i<count($a);$i++){
        $s.=$a[$i]." ";
    }
    return $s;
}
function tim_max($a){
    $max=$a[0];
    for($i=0;$i<count($a);$i++){
        if($a[$i] > $max){
            $max = $a[$i];
        }
    } 
    return $max;
}
function tim_min($a){
    $min=$a[0];
    for($i=0;$i<count($a);$i++){
        if($a[$i] < $min){
            $min = $a[$i];
        }
    } 
    return $min;
}
function tinh_tong($a){
    $tong=0;
    for($i=0;$i<count($a);$i++){
        $tong+=$a[$i];
    }
    return $tong;
}
?>
<form action="" method="post">
    <table align="center">
        <tr bgcolor="#a70f74" align="center">
            <td class="header" colspan="2">PHÁT SINH MẢNG VÀ TÍNH TOÁN</td>
        </tr>
        <tr>
            <td class="a2">Nhập số phần tử:</td>
            <td class="a"> <input class="nhap" type="text" name="n" value="<?php if (isset($n)) echo $n?>" required></td>
        </tr>
        <?php if(isset($error)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$error</b></td></td></tr>" ?>
        <tr>
            <td class="a"></td>
            <td class="a">
                <input class="btn" type="submit" name="submit" value="Phát sinh và tính toán">
                <?php if(isset($_POST['submit'])) echo "<input class='btn1' type='submit' name='reset' value='Nhập lại'>"?>
            </td>
        </tr>
        <tr>
            <td class="a1">Mảng:</td>
            <td> <input type="text" class="arr" name="arr" value="<?php if(isset($mang_kq)) echo $mang_kq; else echo ""; ?>"></td>
        </tr>
        <tr>
            <td class="a1">GTLN (MAX) trong mảng:</td>
            <td> <input type="text" class="b" name="max" value="<?php if (isset($max)) echo $max;?>"></td>
        </tr>
        <tr>
            <td class="a1">GTNN (MIN) trong mảng:</td>
            <td> <input type="text" class="b" name="min" value="<?php if (isset($min)) echo $min;?>"></td>
        </tr>
        <tr>
            <td class="a1">Tổng mảng:</td>
            <td> <input type="text" class="b" name="price" value="<?php if (isset($tong)) echo $tong;?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">(<b>Ghi chú: </b>Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
        </tr>
    </table>
</form>
</body>
</html>