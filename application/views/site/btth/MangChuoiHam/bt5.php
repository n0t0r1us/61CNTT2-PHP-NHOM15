<style>
    .title{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    .table1{width: 500px; background-color: #fff5ff;}
    .a1, .a2{padding-left: 10px;}
    .a, .a2{background-color: #fedaf4;}
    .a3{width: 250px;}
    .btn1{background-color: #fffea9;width: 83px;}
    .a1{width: 250px;}
    .b{background-color: #fba9a9;width: 250px;}
    b{color: red;}
    .a, .b{margin-right: 20px;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
if(isset($_POST["submit"])){
    if(isset( $_POST['arr'])){
        $s = $_POST['arr'];
        $x=$_POST['x'];
        $y=$_POST['y'];
        tach_chuoi($s,$a);
        if(check($a,$dem) == 0){
            if(is_numeric($x)){
                if(is_numeric($y)){
                    $mangcu=xuat_mang($a);
                    thay_the($a,$x,$y);
                    $mangmoi=xuat_mang($a);
                }else{
                    $error3 = "Không hợp lệ! Vui lòng nhập số";   
                }                 
            }else{
                $error2 = "Không hợp lệ! Vui lòng nhập số";
            }
        }else{
            $error1 = "Mảng không hợp lệ! Vui lòng nhập số";
        }
    }
}
else if(isset($_POST["submit"])){
    $s="";
}
function tach_chuoi($s,&$a){
    $a=explode(",",$s);
}
function check($a,&$dem){
    $dem=0;
    for($i=0;$i<count($a);$i++){
        if(!is_numeric($a[$i])){
            $dem++;
        }
    }
    return $dem;
}
function xuat_mang($a){
    $mang="";
    for($i=0;$i<count($a)-1;$i++){
        $mang.="$a[$i] ";
    }
    $mang.=$a[count($a)-1];
    return $mang;
}
function thay_the(&$a,$x,$y){
    for($i=0;$i<count($a);$i++){
        if($a[$i] == $x){
            $a[$i] = $y;
        }
    }
    return $a;
}
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('site/head', $this->data); ?>
    </head>
    <body>
        <div style="padding-left: 100px;padding-right: 100px">
            <?php $this->load->view('site/header', $this->data); ?>
        </div>
        <div class="container">
        <form action="" method="post">
    <table class="table1" align="center"  style="width: 500px;" bgcolor="#fff5ff">
        <tr bgcolor="#a10971">
            <td class="title" colspan="2" align="center">THAY THẾ</td>
        </tr>
        <tr>
            <td class="a2">Nhập các phần tử:</td>
            <td class="a"><input type="text" class="a3" name="arr" value="<?php if(isset($s)) echo $s; ?>" required></td>
        </tr>
        <?php if(isset($error1)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$error1</b></td></td></tr>" ?>
        <tr>
            <td class="a2">Giá trị cần thay thế:</td>
            <td class="a"><input type="text" name="x" value="<?php if(isset($x)) echo $x;?>" required></td>
        </tr>
        <?php if(isset($error2)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$error2</b></td></td></tr>" ?>
        <tr>
            <td class="a2">Giá trị thay thế:</td>
            <td class="a"><input type="text" name="y" value="<?php if(isset($y)) echo $y;?>" required></td>
        </tr>
        <?php if(isset($error3)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$error3</b></td></td></tr>" ?>
        <tr>
            <td class="a"></td>
            <td class="a">
                <input class="btn1" type="submit" name="submit" value="Thay thế">
                <?php if(isset($_POST['submit'])) echo "<input class='btn1' type='submit' name='reset' value='Nhập lại'>"?>
            </td>
        </tr>
        <tr>
            <td class="a1">Mảng cũ:</td>
            <td><input type="text" class="b" name="old" value="<?php if(isset($mangcu)) echo $mangcu; ?>"></td>
        </tr>
        <tr>
            <td class="a1">Mãng sau khi thay thế:</td>
            <td><input type="text" class="b" name="new" value="<?php if(isset($mangmoi)) echo $mangmoi; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">(<b>Ghi chú: </b>Các phần tử trong mảng sẽ cách nhau bằng dấu *,*)</td>
        </tr>
    </table>
</form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>