<style>
    .table1{
        background-color: #d1ded4;
        width: 410px;
    }
    b{color: red;}
    .title{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    .btn2{background-color: white; width: 150px;}
    .btn1{background-color: white; width: 74px;}
    .a, .a1{background-color: #cce6e3;}
    .a, .a2{padding-left: 10px; width: 130px;}
    .b{background-color: #cbfbfd;}
    .b, .b1{width: 220px;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
if(isset($_POST["sapxep"])){
    if(isset($_POST['arr'])){
        $s = $_POST['arr'];
        tach_chuoi($s,$a);
        $n=count($a);
        if(check($a,$dem) == 0){
            sap_xep_tang($a,$n);
            $mangtang=xuat_mang($a);
            sap_xep_giam($a,$n);
            $manggiam=xuat_mang($a);
        }else{
            $error = "Mảng không hợp lệ! Vui lòng nhập số";
        }
    }
}
else if(isset($_POST["reset"])){
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
        $mang.="$a[$i], ";
    }
    $mang.=$a[count($a)-1];
    return $mang;
}
function sap_xep_tang(&$a,$n){
    for($i=0;$i<$n-1;$i++){
        for($j=$i+1;$j<$n;$j++){
            if($a[$i]>$a[$j]){
                $tg = $a[$i];
                $a[$i] = $a[$j];
                $a[$j] = $tg;        
            }
        }
    }
    return $a;
}
function sap_xep_giam(&$a,$n){
    for($i=0;$i<$n-1;$i++){
        for($j=$i+1;$j<$n;$j++){
            if($a[$i]<$a[$j]){
                $tg = $a[$i];
                $a[$i] = $a[$j];
                $a[$j] = $tg;        
            }
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
                <table class="table1" align="center">
                    <tr bgcolor="#2f9b97">
                        <td class="title" colspan="2" align="center">SẮP XẾP MẢNG</td>
                    </tr>
                    <tr>
                        <td class="a2">Nhập mảng:</td>
                        <td><input type="text" class="b1" name="arr" value="<?php if(isset($s)) echo $s; ?>" required><b> (*)</b></td>
                    </tr>
                    <?php if(isset($error)) echo "<tr><td><td><b style='color: red;'>$error</b></td></td></tr>" ?>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="btn2" name="sapxep" value="Sắp xếp tăng/giảm">
                            <?php if(isset($_POST['sapxep'])) echo "<input class='btn1' type='submit' name='reset' value='Nhập lại'>"?>
                        </td>
                    </tr>
                    <tr>
                        <td class="a"><b>Sau khi sắp xếp:</b></td>
                        <td class="a1"></td>
                    </tr>
                    <tr>
                        <td class="a">Tăng dần:</td>
                        <td class="a1"><input type="text" class="b" name="tang" value="<?php if(isset($mangtang)) echo $mangtang; ?>"></td>
                    </tr>
                    <tr>
                        <td class="a">Giảm dần:</td>
                        <td class="a1"><input type="text" class="b" name="giam" value="<?php if(isset($manggiam)) echo $manggiam; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><b>(*)</b> Các số được nhập cách nhau bằng dấu *,*</td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>