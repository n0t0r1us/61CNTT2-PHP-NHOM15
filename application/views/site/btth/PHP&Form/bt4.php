<style>
    .table1{background-color: #ffe8fa; width: 350px;}
    .title{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    td{padding-left: 10px;}
    .a{background-color: #fffee7;}
    .btn1{width: 120px; background-color: #ede8e2;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
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
                    <tr align="center" bgcolor="#e74d7d">
                        <td colspan="2" class="title">KẾT QUẢ THI ĐẠI HỌC</h2></td>
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
                            <input class="btn1" type="submit" name="submit" value="Xem kết quả">
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