<style>
    .table1{background-color: #fed6f1; width: 450px;}
    .table1 td{padding-left: 10px;}
    .title{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    .n, .a{width: 92px;}
    .btn1{width: 100px; background-color: lightyellow;}
    .mang, .b{width: 250px;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php 
if(isset($_POST['submit'])){
    $n=$_POST['n'];
    if(isset($n) and is_numeric($n) and $n>0){ 
        tao_mang($n,$a); 
        $in=in_mang($a); 
        $chan=dem_chan($a);
        $nho=dem_nho($a);
        $tong=tong_am($a);
        $vitri=vi_tri_0($a);
        sap_xep($a);
        $sapxep=in_mang($a);
    }
    else{
        $error="n phải là số và lớn hơn 0!";
    }
}
else if(isset($_POST['reset'])){ 
    $n="";
}
function tao_mang($n,&$a){
    for($i=0;$i<$n;$i++){
        $a[$i]=rand(-500,500); 
    }
    return $a;
}
function in_mang($a){
    $mang="";
    for($i=0;$i<count($a);$i++){ // đếm số phần tử của mảng 
        $mang .= $a[$i]." ";
    }
    return $mang;
}
function dem_chan($a){
    $dem=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i]%2==0){ // phần tử trong mảng chia hết cho 2 thì đếm 
            $dem++;
        }
    }
    return $dem; // trả về
}
function dem_nho($a){
    $dem=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i]<100){ // phần tử trong mảng <100 thì đếm
            $dem++;
        }
    }
    return $dem;
}
function tong_am($a){
    $tong=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i]<0){
            $tong+=$a[$i];
        }
    }
    return $tong;
}
function vi_tri_0($a){
    $vitri="";
    for($i=0;$i<count($a);$i++){ 
        if($a[$i]==0){
            $s=$i+1; // cho $i bằng 0 nên vị trí bằng i+1
            $vitri.=$s." "; 
        }
    }
    return $vitri;
}
function sap_xep(&$a){
    for($i=0;$i<count($a)-1;$i++){
        for($j=$i+1;$j<count($a);$j++){ 
            if($a[$i]>$a[$j]){
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
            <form action="" method="POST">
                <table class="table1" align="center">
                    <tr align="center" bgcolor="#a70f74">
                        <td colspan="2" class="title">BÀI TẬP 1</td>
                    </tr>
                    <tr>
                        <td>Nhập n: </td>
                        <td>
                            <input class="n" type="text" name="n" value="<?php if(isset($n)) echo $n;?>" required>
                            <b style="color:red;"><?php if(isset($error)) echo $error;?></b>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input class="btn1" type="submit" name="submit" value="Thực hiện">
                            <?php if(isset($_POST['submit'])) echo "<input class='btn1' type='submit' name='reset' value='Nhập lại'>"?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mảng phát sinh:</td>
                        <td><input class="mang" type="text" value="<?php if(isset($in)) echo $in; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Số phần tử chẵn:</td>
                        <td><input class="a" type="text" value="<?php if(isset($chan)) echo $chan; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Số phần tử < 100:</td>
                        <td><input class="a" type="text" value="<?php if(isset($nho)) echo $nho; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Tổng phần tử âm:</td>
                        <td><input class="a" type="text" value="<?php if(isset($tong)) echo $tong; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Vị trí phần tử = 0:</td>
                        <td><input class="b" type="text" value="<?php if(isset($vitri)) echo $vitri; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Mảng tăng dần:</td>
                        <td><input class="mang" type="text" value="<?php if(isset($sapxep)) echo $sapxep; ?>" readonly></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>