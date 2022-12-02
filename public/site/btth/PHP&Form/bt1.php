<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diện tích hình chữ nhật</title>
</head>
<style>
    table{background-color: #fffada; width: 300px;}
    .header{
        font-size: 20px; 
        color: #a24e0b; 
        padding: 5px; 
        font-weight: bold;
    }
    td{padding-left: 10px;}
    .a, .a1{width: 150px;}
    .a1{background-color: #fdd9d9;}
</style>
<body>
<?php
if (isset($_POST['submit'])){
    $l=$_POST['length'];
    $w=$_POST['width'];
    if (isset($l) and is_numeric($l)){
        if (isset($w) and is_numeric($w)){
            $s=round($l*$w);
        }else{
            $w="Chiều rộng phải là số và lớn hơn 0";
        }  
    }else{
        $l="Chiều dài phải là số và lớn hơn 0";
    }
}
if (isset($_POST['reset'])){
    $l="";
    $w="";
    $s="";
}
?>
<form action="" method="post">
    <table align="center">
        <tr align="center" bgcolor="#fad772">
            <td colspan="2" class="header">DIỆN TÍCH HÌNH CHỮ NHẬT</td>
        </tr>
        <tr>
            <td>Chiều dài</td>
            <td><input class="a" type="text" name="length" value="<?php if (isset($l)) echo $l;?>" required></td>
        </tr>
        <tr>
            <td>Chiều rộng</td>
            <td><input class="a" type="text" name="width" value="<?php if (isset($w)) echo $w;?>" required></td>
        </tr>
        <tr>
            <td>Diện tích</td>
            <td><input class="a1" type="text" name="area" value="<?php if (isset($s)) echo $s; else echo "";?>" readonly >
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input bgcolor="#e4dedf" type="submit" name="submit" value="Tính">
                <?php if(isset($_POST['submit'])) echo "<input type='submit' name=reset' value='Nhập lại'>"?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>