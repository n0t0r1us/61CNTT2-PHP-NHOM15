<style>
    .table1{border-collapse: collapse;width: 500px;}
    .title{
        font-size: 25px; 
        color: #f96409;
        padding: 5px; 
        font-weight: bold;
        text-align: center;
    }
    ul{list-style-type: none; margin-left: -35px;}
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
    $query = "SELECT a.Ten_sua,b.Ten_hang_sua,c.Ten_loai,a.Trong_luong,a.Don_gia,a.Hinh FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua JOIN loai_sua c ON a.Ma_loai_sua = c.Ma_loai_sua";
    $result = mysqli_query($conn,$query);
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
                <table class="table1" align='center' border="1">
                    <tr bgcolor='#ffeee6'>
                        <td colspan="2" class="title">THÔNG TIN CÁC SẢN PHẨM</td>
                    </tr>  
                    <?php
                    if(mysqli_num_rows($result)!=0){
                        while ($row=mysqli_fetch_row($result)){
                            echo "<tr>";
                            echo "<td align='center'><img src='$row[5]' height='80px''</td>";
                            echo "<td>
                                    <ul>
                                        <li style='padding-bottom: 10px;'><b>$row[0]</b></li>
                                        <li>Nhà sản xuất: $row[1]</li>
                                        <li>$row[2] - $row[3] gr - $row[4] VNĐ</li>
                                    </ul>
                                </td>";
                        }
                    }
                    ?>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>