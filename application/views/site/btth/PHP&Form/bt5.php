<style>
    .table1{background-color: #03b0b6; width: 350px;}
    .title{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    td{padding-left: 10px;}
    .a, .b{width: 150px;}
    .b{background-color: #fffaaf;}
    .btn1{background-color: #f7fadc;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
if (isset($_POST['submit'])){
    $s=$_POST['start'];
    if(is_numeric($s) and $s>=10 and $s<=24){
        $e=$_POST['end'];
        if(is_numeric($e) and $e>=10 and $e<=24){
            if($e>=$s){
                if($e>17 and $s<17){
                    $t=($e-17)*45000 + (17-$s)*20000;
                }
                else if($s>=17){
                    $t=($e-$s)*45000;
                }else{
                    $t=($e-$s)*20000;
                }
            }else{
                $e="Giờ kết thúc phải lớn hơn giờ bắt đầu";
            }
        }
        else $e="Giờ kết thúc phải là số >10 và <24";
    }
    else $s="Giờ bắt đầu phải là số >10 và <24";
}
if (isset($_POST['reset'])){
    $s="";
    $e="";
    $t="";
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
                    <tr align="center" bgcolor="#008b8e">
                        <td colspan="2" class="title">TÍNH TIỀN KARAOKE</h2></td>
                    </tr>
                    <tr>
                        <td>Giờ bắt đầu:</td>
                        <td><input class="a" type="text" name="start" value="<?php if (isset($s)) echo $s;?>" required> (h)</td>
                    </tr>
                    <tr>
                        <td>Giờ kết thúc:</td>
                        <td><input class="a" type="text" name="end" value="<?php if (isset($e)) echo $e;?>" required> (h)</td>
                    </tr>
                    <tr>
                        <td>Tiền thanh toán:</td>
                        <td><input class="b" type="text" value="<?php if (isset($t)) echo $t; else echo "";?>" readonly> (VNĐ)</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input class="btn1" type="submit" name="submit" value="Tính tiền">
                            <?php if(isset($_POST['submit'])) echo "<input class='btn1' type='submit' name='reset' value='Nhập lại'>"?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>