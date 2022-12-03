<style>
    .a, .a1, .b{font-weight: bold;}
    .a, .b{text-align: right;}
    .a{color: #B40431;}
    .a1{color: red;}
    .b{color: blue;}
    .c{color: #B404AE;  font-style: italic;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
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
                    header('Location:../bai-tap-form/bt6');
                }
                break;
            default:
                break;
        }
    }else{
        $error2="Vui lòng nhập một số";
        header('Location:..//bai-tap-form/bt6');
    } 
}else{
    $error1="Vui lòng nhập một số";
    header('Location:..//bai-tap-form/bt6');
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
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>