<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh toán tiền điện</title>
</head>
<style>
    table{background-color: #fffada; width: 370px;}
    .header{
        font-size: 20px; 
        color: #a24e0b; 
        padding: 5px; 
        font-weight: bold;
    }
    td{padding-left: 10px;}
    .a{background-color: #fdd9d9;}
</style>
<body>
<?php
if (isset($_POST['submit'])){
    $n=$_POST['name'];
    if(isset($_POST['iold']) and is_numeric($_POST['iold']) and $_POST['iold']>=0){
        $io=$_POST['iold'];
        if(isset($_POST['inew']) and is_numeric($_POST['inew']) and $_POST['inew']>=$io){
            $in=$_POST['inew'];
            if(isset($_POST['price']) and is_numeric($_POST['price']) and $_POST['price']>=0){
                $p=$_POST['price'];
                $i=$in-$io;
                $kq=$p*$i;
            }else{
                $p = "Đơn giá phải là số và >= 0!";
            }
        }else{
            $in = "Chỉ số mới phải là số và >= chỉ số cũ!";
        }
    }else{
        $io = "Chỉ số phải là số và >= 0!";
    }

}
if (isset($_POST['reset'])){
    $n="";
    $io="";
    $in="";
    $p="20000";
    $kq="";
}
?>
<form action="" method="post">
    <table align="center">
        <tr align="center" bgcolor="#fcdb72">
            <td colspan="2" class="header">THANH TOÁN TIỀN ĐIỆN</td>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td><input type="text" name="name" value="<?php if (isset($n)) echo $n;?>" required></td>
        </tr>
        <tr>
            <td>Chỉ số cũ:</td>
            <td><input type="text" name="iold" value="<?php if (isset($io)) echo $io;?>" required> (Kw)</td>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td><input type="text" name="inew" value="<?php if (isset($in)) echo $in;?>" required> (Kw)</td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td><input type="text" name="price" value="<?php if (isset($p)) echo $p;else echo"20000"?>"> (VNĐ)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td><input class="a" type="text" name="area" value="<?php if (isset($kq)) echo $kq; else echo "";?>" readonly> (VNĐ)</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính">
                <?php if(isset($_POST['submit'])) echo "<input type='submit' name='reset' value='Nhập lại'>"?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>