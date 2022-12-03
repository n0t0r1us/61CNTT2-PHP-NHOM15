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
    $query = "SELECT * FROM hang_sua";
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
            <form class="form1" action="" method="post">
                <h1 align="center" style="color: #4682B4;">THÔNG TIN HÃNG SỮA</h1>
                <table class="table1" align='center' border='1'>
                    <tr>
                        <td>Mã HS</td>
                        <td>Tên hãng sữa</td>
                        <td>Địa chỉ</td>
                        <td>Điện thoại</td>
                        <td>Email</td>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result)!=0){
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                for($i=0;$i<mysqli_num_fields($result);$i++){
                                    echo "<td>$row[$i]</td>";
                                }
                                echo "</tr>"; 
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


