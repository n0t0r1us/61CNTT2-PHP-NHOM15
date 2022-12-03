<style>
    .table1{border-collapse: collapse;width: 600px;}
    .title{
        font-size: 25px; 
        color: #f96409;
        padding: 5px; 
        font-weight: bold;
        text-align: center;
    }
    .a, .b{padding-top: 5px;}
    ul{list-style-type: none;margin: 10px 0 10px -35px;padding-right: 5px;}
    .img{height: 150px;}
    .sp{
        height: 240px;
    }
    .b{color: red;}
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
    $query = "SELECT * FROM sua";
    $result = mysqli_query($conn,$query);
    $numRows = mysqli_num_rows($result);
    $rowsPerPage=2; // So mau tin tren moi trang , trong truong hop nay cho bang 5
    // Tinh tong so trang
    $maxPage = ceil($numRows/$rowsPerPage);
    if(!isset($_GET['page']))
    {
        $_GET['page']='1';
    }
    // Vi tri cua mau tin dau tien tren moi trang
    $offset = ($_GET['page']-1)*$rowsPerPage;
    $query = "SELECT a.Ten_sua,b.Ten_hang_sua,a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,a.Hinh FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua LIMIT $offset,$rowsPerPage";
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
                <table class="table1" align="center" border="1">
                    <?php 
                        if(mysqli_num_rows($result)!=0){
                            while ($row=mysqli_fetch_row($result)){
                                echo "
                                    <tr bgcolor='#ffeee6' class='title'>
                                        <td colspan='2'>$row[0] - $row[1]</td>
                                    </tr> 
                                    <tr class='sp'>
                                        <td><img class='img' src='$row[6]' alt=''></td>
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
                <div align='center' style="margin-top: 20px;">
                    <a href="2_8.php?page=1"><?php if($_GET['page']==1) echo ""; else echo '<<';?></a>
                    <a href="2_8.php?page=<?php echo $_GET['page']-1;?>"><?php if($_GET['page']==1) echo ""; else echo '<';?></a>
                    <?php for($i=1;$i<=$maxPage;$i++){ ?>
                    <a href="2_8.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                    <?php } ?>
                    <a href="2_8.php?page=<?php echo $_GET['page']+1;?>"><?php if($_GET['page']==$maxPage) echo ""; else echo '>';?></a>
                    <a href="2_8.php?page=<?php echo $maxPage?>"><?php if($_GET['page']==$maxPage) echo ""; else echo '>>';?></a>
                </div>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>