<style>
    table{border-collapse: collapse;width: 600px;}
    .header{
        font-size: 25px; 
        color: #f96409;
        padding: 5px; 
        font-weight: bold;
        text-align: center;
    }
    .a, .b{padding-top: 5px;}
    .b{text-align: end; padding-right: 5px;}
    ul{list-style-type: none;margin: 10px 0 10px -35px;padding-right: 5px;}
    img{height: 150px;}
</style>
<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="quanly_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    if(!isset($_GET['id'])){
        header("Location:../Bai2/2_7.php");
    }
    $id = $_GET['id'];
    $query = "SELECT a.Ten_sua,b.Ten_hang_sua,a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,a.Hinh FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua where Ma_sua = '$id'";
    $result = mysqli_query($conn,$query);
    $row=mysqli_fetch_row($result);
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
        <form action="">
        <table align="center" border="1">
            <tr bgcolor='#ffeee6' class="header">
                <td colspan="2"><?php echo "$row[0] - $row[1]" ?></td>
            </tr>
            <tr>
                <td><img src="<?php echo "Hinh_sua/$row[6]" ?>" alt=""></td>
                <td>
                    <ul>
                        <li><b><i>Thành phần dinh dưỡng:</i></b></li>
                        <li><?php echo $row[2] ?></li>
                        <li class="a"><b><i>Thành phần dinh dưỡng:</i></b></li>
                        <li><?php echo $row[3] ?></li>
                        <li class="b"><?php echo "<b><i>Trọng lượng: </i></b>$row[4] gr - <b><i>Đơn giá: </i></b>$row[5] VNĐ" ?></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td align="end"><a style='color: purple;' href='javascript:window.history.back(-1);'>Quay về</a></td>
                <td></td>
            </tr>
            <?php

            ?>
        </table>
    </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>