<style>
    table{background-color: #b9eeff; width: 400px;}
    .title{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    .a, .a2{width: 100px;}
    .a2{font-weight: bold;}
    .a1, .a2, .a3{background-color: #faffd7;}
    .a1, .a2{color: red;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
if(isset($_POST['submit'])){
    $year=$_POST['year'];
    if(isset($year) and is_numeric($year) and $year > 0){
        $can=tinh_can($year);
        $chi=tinh_chi($year);
        $am_lich=$can." ".$chi;
        $link=img($year);
    }
    else{
        $error="Năm dương lịch phải là số và lớn hơn 0!";
    }
}
function img($year){
    $a=array("https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-9.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-10.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-11.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-12.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-1.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-2.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-3.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-4.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-5.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-6.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-7.jpg",
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-8.jpg");
    for($i=0;$i<count($a);$i++){
        if($year%12==$i){
            return $a[$i];
        }
    }
}
function tinh_can($year){
    $a=array("Canh","Tân","Nhâm","Quý","Giáp","Ất","Bính","Đinh","Mậu","Kỷ");
    foreach($a as $y=> $can){
        if($year%10==$y){
            return $can;
        }
    }
}
function tinh_chi($year){
    $a=array("Thân","Dậu","Tuất","Hợi","Tý","Sửu","Dần","Mẹo","Thìn","Tỵ","Ngọ","Mùi");
    for($i=0;$i<count($a);$i++){
        if($year%12==$i){
            return $a[$i];
        }
    }
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
        <tr bgcolor="#0f62c6" align="center">
            <td colspan="3" class="title">TÍNH NĂM ÂM LỊCH</td>
        </tr>
        <tr align="center">
            <td>Năm dương lịch</td>
            <td></td>
            <td>Năm âm lịch</td>
        </tr>
        <tr align="center">
            <td><input class="a" type="text" name="year" value="<?php if(isset($year)) echo $year;?>" required></td>
            <td><input class="a1" type="submit" name="submit" value="=>"></td>
            <td><input class="a2" type="text" name="amlich" value="<?php if(isset($am_lich)) echo $am_lich;?>" readonly></td>
        </tr>
        <tr>
            <td colspan="3" align="center" style="color: red;"><?php if(isset($error)) echo $error ?></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><?php if(isset($link)) echo "<img src='$link' width='150px'>" ?></td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <?php if(isset($_POST['submit'])) echo "<input class='a3' type='submit' name='reset' value='Nhập lại'>"?>
            </td>
        </tr>
    </table>
</form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>