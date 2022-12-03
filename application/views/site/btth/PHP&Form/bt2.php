<style>
    .table1{background-color: #fffada; width: 300px;}
    .title{
        font-size: 20px; 
        color: #a24e0b; 
        padding: 5px; 
        font-weight: bold;
    }
    td{padding-left: 10px;}
    .a{background-color: #fdd9d9;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
define('PI',3.14);
if (isset($_POST['submit'])){
    $r=$_POST['radius'];;
    if (isset($r) and is_numeric($r) and $r>0){
        $s=round(PI*$r*$r,1);
        $p=round(2*PI*$r,1);
    }else{
        $r="Bán kính phải là số và lớn hơn 0";
    }
}
if (isset($_POST['reset'])){
    $s="";
    $p="";
    $r="";
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
                    <tr align="center" bgcolor="#fad772">
                        <td colspan="2" class="title">DIỆN TÍCH và CHU VI<br> HÌNH TRÒN</td>
                    </tr>
                    <tr>
                        <td>Bán Kính</td>
                        <td><input type="text" name="radius" value="<?php if (isset($r)) echo $r;?>" required></td>
                    </tr>
                    <tr>
                        <td>Diện tích</td>
                        <td><input class="a" type="text" name="area" readonly
                                    value="<?php if (isset($s)) echo $s; else echo "";?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Chu vi</td>
                        <td><input class="a" type="text" name="chuvi" readonly
                                    value="<?php if (isset($p)) echo $p;echo "";?>" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Tính">
                            <?php if(isset($_POST['submit'])) echo "<input type='submit' name='reset' value='Nhập lại'>"?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>