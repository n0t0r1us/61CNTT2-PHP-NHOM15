<style>
    td{padding-left: 10px;}
    .arr, .kq{width: 250px;}
    .kq{width: 250px; background-color: #cdfbfc; color: red; font-weight: bold;}
    .n{width: 72px;}
    .title{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    .table1{background-color: #d1ded4; width: 450px;}
    .btn1{background-color: #95ccfa; width: 80px;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
if(isset($_POST["find"])){
    if(isset( $_POST['arr'])){
        $s = $_POST['arr'];
        $n=$_POST['n'];
        tach_chuoi($s,$a);
        if(check($a,$dem) == 0){
            if(is_numeric($n)){
                $mang=xuat_mang($a);
                $kq=tim_kiem($a,$n);
                if($kq>0){
                    $in_kq="Tìm thấy $n tại vị trí thứ $kq của mảng";
                }
                else{$in_kq="Không tìm thấy $n trong mảng";}
            }else{  
                $error2="Không hợp lệ! Vui lòng nhập số";
            }   
        }else{
            $error1="Mảng không hợp lệ! Vui lòng nhập số";
        }
    }
}
else if(isset($_POST["reset"])){
    $s="";
    $n="";
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
        $mang.="$a[$i], ";
    }
    $mang.=$a[count($a)-1];
    return $mang;
}
function tim_kiem($a,$n){
    $x=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i] == $n){
            $x+=$i+1;
        }
    }
    return $x;
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
                <table class="table1" align="center">
                    <tr bgcolor="#39959e">
                        <td class="title" colspan="2" align="center">TÌM KIẾM</td>
                    </tr>
                    <tr>
                        <td>Nhập mảng:</td>
                        <td><input type="text" class="arr" name="arr" value="<?php if(isset($s)) echo $s; ?>" required></td>
                    </tr>  
                    <?php if(isset($error1)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$error1</b></td></td></tr>" ?>
                    <tr>
                        <td>Nhập số cần tìm:</td>
                        <td><input type="text" class="n" name="n" value="<?php if(isset($n)) echo $n;?>" required></td>
                    </tr>
                    <?php if(isset($error2)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$error2</b></td></td></tr>" ?>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="btn1" name="find" value="Tìm kiếm">
                            <?php if(isset($_POST['find'])) echo "<input class='btn1' type='submit' name='reset' value='Nhập lại'>"?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mảng:</td>
                        <td><input type="text" class="arr" name="arr_kq" value="<?php if(isset($mang)) echo $mang; ?>"></td>
                    </tr>
                    <tr>
                        <td>Kết quả tìm kiếm:</td>
                        <td><input type="text" class="kq" name="kq" value="<?php if(isset($in_kq)) echo $in_kq; ?>"></td>
                    </tr>
                    <tr bgcolor="#75d0d2">
                        <td colspan="2" align="center">(Các phần tử trong mảng sẽ cách nhau bằng dấu *,*)</td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>