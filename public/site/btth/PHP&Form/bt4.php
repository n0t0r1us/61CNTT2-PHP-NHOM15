<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kết quả thi đại học</title>
</head>
<style>
    table{background-color: #ffe8fa; width: 350px;}
    .header{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    td{padding-left: 10px;}
    .a{background-color: #fffee7;}
    .btn{width: 120px; background-color: #ede8e2;}
</style>
<body>
<?php
if (isset($_POST['submit'])){
    if(is_numeric($_POST['toan']) and $_POST['toan']>=0){
        $t=$_POST['toan'];
        if(is_numeric($_POST['ly']) and $_POST['ly']>=0){
            $l=$_POST['ly'];
            if(is_numeric($_POST['hoa']) and $_POST['hoa']>=0){
                $h=$_POST['hoa'];
                if(is_numeric($_POST['dchuan']) and $_POST['dchuan']>=0){
                    $c=$_POST['dchuan'];
                    $tong=$t+$l+$h;
                    if($tong>=$c){
                        $kq="Đậu";
                    }else{
                        $kq="Rớt";
                    }
                }else $c = "Vui lòng nhập số >= 0";
            }else $h = "Vui lòng nhập số >= 0";
        }else $l = "Vui lòng nhập số >= 0";
    }else $t = "Vui lòng nhập số >= 0";
}
if (isset($_POST['reset'])){
    $t="";
    $l="";
    $h="";
    $c="20";
    $tong="";
    $kq="";
}
?>
<form action="" method="post">
    <table align="center">
        <tr align="center" bgcolor="#e74d7d">
            <td colspan="2" class="header">KẾT QUẢ THI ĐẠI HỌC</h2></td>
        </tr>
        <tr>
            <td>Toán:</td>
            <td> <input type="text" name="toan" value="<?php if (isset($t)) echo $t;?>" required></td>
        </tr>
        <tr>
            <td>Lý:</td>
            <td><input type="text" name="ly" value="<?php if (isset($l)) echo $l;?>" required></td>
        </tr>
        <tr>
            <td>Hóa:</td>
            <td><input type="text" name="hoa" value="<?php if (isset($h)) echo $h;?>" required></td>
        </tr>
        <tr>
            <td>Điểm chuẩn:</td>
            <td><input type="text" name="dchuan" style="color: red;" value="<?php if (isset($c)) echo $c;else echo"20"?>"></td>
        </tr>
        <tr>
            <td>Tổng điểm:</td>
            <td><input class="a" type="text" name="tong" value="<?php if (isset($tong)) echo $tong; else echo "";?>" readonly></td>
        </tr>
        <tr>
            <td>Kết quả:</td>
            <td><input class="a" type="text" name="ketqua" value="<?php if (isset($kq)) echo $kq; else echo "";?>" readonly></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input class="btn" type="submit" name="submit" value="Xem kết quả">
                <?php if(isset($_POST['submit'])) echo "<input class='btn' type='submit' name='reset' value='Nhập lại'>"?>
            </td>
        </tr>
    </table>
</form>

</body>
</html>