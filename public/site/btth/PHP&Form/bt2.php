<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chu vi & Diện tích</title>
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
    .a{background-color: #fdd9d9;}
</style>
<body>
<?php
define('PI',3.14);
if (isset($_POST['submit'])){
    $r=$_POST['radius'];;
    if (isset($r) and is_numeric($r) and $r>0){
        $s=round(PI*$r*$r,1);
        $p=round(2*PI*$r,1);
    }else{
        $r="Bán kính phải là số và lớn hơn 0";
    }
}
if (isset($_POST['reset'])){
    $s="";
    $p="";
    $r="";
}
?>
<form action="" method="post">
    <table align="center">
        <tr align="center" bgcolor="#fad772">
            <td colspan="2" class="header">DIỆN TÍCH và CHU VI<br> HÌNH TRÒN</td>
        </tr>
        <tr>
            <td>Bán Kính</td>
            <td><input type="text" name="radius" value="<?php if (isset($r)) echo $r;?>" required></td>
        </tr>
        <tr>
            <td>Diện tích</td>
            <td><input class="a" type="text" name="area" readonly
                        value="<?php if (isset($s)) echo $s; else echo "";?>">
            </td>
        </tr>
        <tr>
            <td>Chu vi</td>
            <td><input class="a" type="text" name="chuvi" readonly
                        value="<?php if (isset($p)) echo $p;echo "";?>" >
            </td>
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