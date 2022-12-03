<style>
    .title{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    .btn1{background-color: #faf794; width: 110px;}
    .kq{color: red; background-color: #c5fa93; width: 102px;} 
    .nhap{width: 200px;}
    b{color: red;}
    .table1{background-color: #ccd9cf; width: 400px;}
    td{padding-left: 10px;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
if (isset($_POST['submit'])){ 
    if(isset($_POST['dayso'])){ 
        $s=$_POST['dayso'];
        tach_chuoi($s,$a);
        if(check($a,$dem) == 0){
            $tong=tinh_tong($a);
        }else{
            $error = "Dãy số không hợp lệ! Vui lòng nhập số";
            $tong="";
        }
    }   
}
else if(isset($_POST['reset'])){
    $s="";
    $tong="";
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
function tach_chuoi($s,&$a){
    $a=explode(",",$s);
}
function tinh_tong($a){
    $tong=0;
    for($i=0;$i<count($a);$i++){
        if(is_numeric($a[$i])){
            $tong+=$a[$i];
        }
    }
    return $tong;
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
            <form class="form1" action="" method="POST">
                <table class="table1" align="center">
                    <tr bgcolor="#2d9598" align="center">
                        <td class="title" colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</td>
                    </tr>
                    <tr>
                        <td>Nhập dãy số:</td>
                        <td>
                            <input class="nhap" type="text" name="dayso" value="<?php if(isset($s)) echo $s;?>" required>
                            <b>(*)</b>
                        </td>
                    </tr>
                    <?php if(isset($error)) echo "<tr><td><td><b style='color: red;'>$error</b></td></td></tr>" ?>
                    <tr>
                        <td></td>
                        <td>
                            <input class="btn1" type="submit" name="submit" value="Tổng dãy số">
                            <?php if(isset($_POST['submit'])) echo "<input type='submit' name='reset' value='Nhập lại'>"?>
                        </td>
                    </tr>
                    <tr>
                        <td>Kết quả:</td>
                        <td>
                            <input type="text" name="ketqua" class="kq" readonly
                            value="<?php if (isset($tong)) echo $tong;?>">
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><b>(*)</b> Các số được nhập cách nhau bằng dấu *,*</td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>