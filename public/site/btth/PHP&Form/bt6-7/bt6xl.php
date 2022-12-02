<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>
</head>
<style>
    .a, .a1, .b{font-weight: bold;}
    .a, .b{text-align: right;}
    .a{color: #B40431;}
    .a1{color: red;}
    .b{color: blue;}
    .c{color: #B404AE;  font-style: italic;}
</style>
<body>
<?php
if(is_numeric($_POST['a'])){
    $a=(float)$_POST['a'];
    if(is_numeric($_POST['b'])){
        $b=(float)$_POST['b'];
        $pt=$_POST['cal'];
        switch ($pt) {
            case 'cong':
               $s="Cộng";
               $kq=$a+$b;
               break;
            case 'tru':
                $s="Trừ";
                $kq=$a-$b;
                break;
            case 'nhan':
                $s="Nhân";
                $kq=$a*$b;
                break;
            case 'chia':
                $s="Chia";
                if($b!=0)
                {
                    $kq=$a/$b;
                }else{
                    $error3="Không chia được cho 0";
                    header('Location:../bt6-7/bt6.php');
                }
                break;
            default:
                break;
        }
    }else{
        $error2="Vui lòng nhập một số";
        header('Location:../bt6-7/bt6.php');
    } 
}else{
    $error1="Vui lòng nhập một số";
    header('Location:../bt6-7/bt6.php');
} 
?>
<form action="" method="post">
    <table align="center">
        <tr>
            <td colspan="2" align="center"><h3 style="color: #045FB4;">PHÉP TÍNH TRÊN HAI SỐ</h3></td>
        </tr>
        <tr>
            <td class="a">Chọn phép tính: </td>
            <td class="a1"><?php if(isset($s)) echo $s ?></td>
        </tr>
        <tr>
            <td class="b">Số 1: </td>
            <td> <input type="text" size="26px" value="<?php if (isset($a)) echo $a;?>" readonly></td>
        </tr>
        <tr>
            <td class="b">Số 2: </td>
            <td> <input type="text" size="26px" value="<?php if (isset($b)) echo $b;?>" readonly></td>
        </tr>
        <tr>
            <td class="b">Kết quả: </td>
            <td><input type="text" size="26px" value="<?php if (isset($kq)) echo $kq;?>" readonly></td>
        </tr>
        <tr>
            <td></td>
            <td><a class="c" href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
        </tr>
    </table>
</form>
</body>
</html>