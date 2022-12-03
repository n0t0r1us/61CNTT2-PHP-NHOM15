<style>
    .table1{
        width: 70%;
    }
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="quanly_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    if(!$conn){
        die("connect failed: ". mysqli_connect_error());
    }
    $query = "SELECT * FROM khach_hang";
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
        <form action="" method="post">
            <h1 align="center" style="color: #4682B4;">THÔNG TIN HÃNG SỮA</h1>
            <table class="table1" align='center' width='50%' border='1'>
                <tr style="color: #bd2307; background-color: #fefefe; font-weight: bold; text-align: center;">
                    <td>Mã KH</td>
                    <td>Tên khách hàng</td>
                    <td>Giới tính</td>
                    <td>Địa chỉ</td>
                    <td>Số điện thoại</td>
                </tr>
                <?php
                    if(mysqli_num_rows($result)!=0){
                        $a=1;
                        while($row = mysqli_fetch_array($result)){
                            if($a==1){
                                $color="#fee0c1";
                                $a=2;
                            }else{
                                $color="#fefefe";
                                $a=1;
                            }
                            echo "<tr bgcolor='$color'>";
                            for($i=0;$i<mysqli_num_fields($result)-1;$i++){
                                if($i==2){
                                    echo "<td align='center'>$row[$i]</td>";
                                }else
                                    echo "<td>$row[$i]</td>";
                            }
                        }
                        echo "</tr>"; 
                    }  
                ?>
            </table>
        </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
