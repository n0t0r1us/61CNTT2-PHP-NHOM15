<style>
    .table1{width: 600px; background-color: #feece2;}
    .table-sp{border-collapse: collapse;width: 600px; background-color: white; border: 3px solid #bd2307;}
    .table-sp td{border: 0.1px solid black;}
    .title{
        font-size: 25px; 
        color: #f7791d;
        padding: 5px; 
        font-weight: bold;
        text-align: center;
    }
    .header1{
        font-size: 30px; 
        color: #f3325d;
        padding: 5px; 
        font-weight: bold;
        text-align: center;
    }
    .btn1{background-color: #fdccc9;}
    .a, .b{padding-top: 5px;}
    ul{list-style-type: none;margin: 10px 0 10px -35px;padding-right: 5px;}
    .img{height: 150px;}
    .sp{
        height: 240px;
    }
    .b{color: #bd2307;}
    i{color: black;}
    .container{
        margin-top: 10px;
    }
    .footer{
    margin-top: 20px;
    }
</style>
<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="quanly_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $query = "SELECT a.Ten_sua,b.Ten_hang_sua,a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,a.Hinh FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua";
    $result = mysqli_query($conn,$query);
    if(isset($_POST['find'])){
        $keyword = $_POST['keyword'];
        $loaisua = $_POST['loai_sua'];
        $hangsua = $_POST['hang_sua'];
        $query = "SELECT a.Ten_sua,b.Ten_hang_sua,a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,a.Hinh,a.Ma_hang_sua,a.Ma_loai_sua FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua WHERE a.Ten_sua like '%$keyword%' and a.Ma_hang_sua = '$hangsua' and a.Ma_loai_sua = '$loaisua'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)!=0){
            $num = mysqli_num_rows($result);
            $kq="Có $num sản phẩm được tìm thấy";
        }
        else
            $kq="Không tìm thấy sản phẩm này";
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
                    <tr align="center">
                        <td class="title">TÌM KIẾM THÔNG TIN SỮA</td>
                    </tr>
                    <tr align="center" bgcolor='white'>
                        <td>
                            <b class="b">Loại sữa:</b>
                            <?php
                            $query1 = "SELECT * FROM loai_sua";
                            $result1 = mysqli_query($conn,$query1);
                            if(mysqli_num_rows($result1)!=0){
                                echo " <select name='loai_sua' id='loai_sua'>";
                                while($row=mysqli_fetch_array($result1)){
                                    echo "<option value='".$row["Ma_loai_sua"]."'>".$row["Ten_loai"]."</option>";
                                }
                                echo "</select>";
                            }?>
                            <b style="padding-left: 10px;" class="b">Hãng sữa:</b>
                            <?php
                            $query2 = "SELECT * FROM hang_sua";
                            $result2 = mysqli_query($conn,$query2);
                            if(mysqli_num_rows($result2)!=0){
                                echo " <select name='hang_sua' id='hang_sua'>";
                                while($row=mysqli_fetch_array($result2)){
                                    echo "<option value='".$row["Ma_hang_sua"]."'>".$row["Ten_hang_sua"]."</option>";
                                }
                                echo "</select>";
                            }?>
                        </td>
                    </tr>
                    <tr align="center" bgcolor='white'>
                        <td>
                            <b class="b">Tên sữa:</b>        
                            <input style="width: 230px;" type="text" name="keyword" value="<?php if(isset($keyword)) echo $keyword; ?>">
                            <input type="submit" name="find" class="btn1" value="Tìm kiếm">
                        </td>
                    </tr>
                    <tr align="center">
                        <td><b><?php if(isset($kq)) echo $kq;?></b></td>
                    </tr>
                    <tr>
                        <td>
                            <table align="center" class="table-sp">
                            <?php 
                                if(mysqli_num_rows($result)!=0){
                                    while ($row=mysqli_fetch_row($result)){
                                        echo "
                                            <tr bgcolor='#ffeee6' class='title'>
                                                <td colspan='2'>$row[0] - $row[1]</td>
                                            </tr> 
                                            <tr class='sp'>
                                                <td align='center'><img class='img' src='$row[6]' alt=''></td>
                                                <td>
                                                    <ul>
                                                        <li><b><i>Thành phần dinh dưỡng:</i></b></li>
                                                        <li>$row[2]</li>
                                                        <li class='a'><b><i>Thành phần dinh dưỡng:</i></b></li>
                                                        <li>$row[3]</li>
                                                        <li class='b'><b><i>Trọng lượng: </i></b>$row[4] gr - <b><i>Đơn giá: </i></b>$row[5] VNĐ</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }
                            ?> 
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>