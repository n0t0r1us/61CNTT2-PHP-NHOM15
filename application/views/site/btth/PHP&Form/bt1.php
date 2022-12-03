<style>
    .table1{background-color: #fffada; width: 300px;}
    .title{
        font-size: 20px; 
        color: #a24e0b; 
        padding: 5px; 
        font-weight: bold;
    }
    td{padding-left: 10px;}
    .a, .a1{width: 150px;}
    .a1{background-color: #fdd9d9;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
if (isset($_POST['submit'])){
    $l=$_POST['length'];
    $w=$_POST['width'];
    if (isset($l) and is_numeric($l)){
        if (isset($w) and is_numeric($w)){
            $s=round($l*$w);
        }else{
            $w="Chiều rộng phải là số và lớn hơn 0";
        }  
    }else{
        $l="Chiều dài phải là số và lớn hơn 0";
    }
}
if (isset($_POST['reset'])){
    $l="";
    $w="";
    $s="";
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
                        <td colspan="2" class="title">DIỆN TÍCH HÌNH CHỮ NHẬT</td>
                    </tr>
                    <tr>
                        <td>Chiều dài</td>
                        <td><input class="a" type="text" name="length" value="<?php if (isset($l)) echo $l;?>" required></td>
                    </tr>
                    <tr>
                        <td>Chiều rộng</td>
                        <td><input class="a" type="text" name="width" value="<?php if (isset($w)) echo $w;?>" required></td>
                    </tr>
                    <tr>
                        <td>Diện tích</td>
                        <td><input class="a1" type="text" name="area" value="<?php if (isset($s)) echo $s; else echo "";?>" readonly >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input bgcolor="#e4dedf" type="submit" name="submit" value="Tính">
                            <?php if(isset($_POST['submit'])) echo "<input type='submit' name=reset' value='Nhập lại'>"?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>