<style>
    .table1{border-collapse: collapse;width: 750px;}
    .title{
        font-size: 25px; 
        color: #f96409;
        padding: 5px; 
        font-weight: bold;
        text-align: center;
    }
    td{border: 1px solid black;}
    ul{list-style-type: none; margin-left: -35px;}
    .listsp{width: 150px; height: 200px;}
    a{color: purple;}
    .a, .b{font-size: 15px;}
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
    $query = "SELECT Ma_sua,Ten_sua,Trong_luong,Don_gia,Hinh FROM sua";
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
            <form action="chi_tiet_sp.php" method="get">
                <table class="table1" align='center'>
                    <tr bgcolor='#ffeee6'>
                        <td colspan="5" class="title">THÔNG TIN CÁC SẢN PHẨM</td>
                    </tr>   
                    <?php
                    if(mysqli_num_rows($result)>0){       
                        $sosp1hang = 5;
                        $sohang = 0;
                        $dem = 0;
                        while ($row=mysqli_fetch_row($result)){
                            if($dem == $sosp1hang){
                                echo "<tr>";
                            }
                            echo "<td class='listsp'>
                            <ul align='center'>
                                <li class='a'><a href='chi_tiet_sp.php?id=$row[0]'><b>$row[1]</b></a></li>
                                <li class='b'>$row[2] gr - $row[3] VNĐ</li>
                                <li><img src='$row[4]' height='100px''</li>'
                            </ul>
                            </td>";
                            if($dem == $sosp1hang -1){
                                echo '</tr>';
                                $dem = 0;
                            }
                            else $dem +=1;
                        }
                    }?>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>