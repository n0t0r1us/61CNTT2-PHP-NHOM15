<style>
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
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
        <form>
<body>
<?php
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $address=$_POST['address'];
        $sphone=$_POST['phone'];
        if(is_numeric($sphone)){
            $phone=substr($sphone,0,-3)."xxx";
        }else{
            $phone = "Số điện thoại không hợp lệ!";
        }
        if($_POST['gender'] == 'nam'){
            $gender = 'Nam';
        }else{$gender='Nữ';}
        $country=$_POST['country'];
        $note=$_POST['note'];
        echo "Bạn đã nhập thành công dưới đây là những thông tin bạn đã nhập:<br>";
        echo "Họ tên: $fname<br>Address: $address<br>Phone: $phone<br>Gender: $gender<br>Country: $country<br>Note: $note"; 
    }else{
        header("Location:../bt8/form.htm");
    }
?>
<br>
<a class="c" href="javascript:window.history.back(-1);">Quay về</a></td>
</form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>