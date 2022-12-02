<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="quanly_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    // $query = "SELECT * FROM sua";
    // $result = mysqli_query($conn,$query);
    // $numRows = mysqli_num_rows($result);
    // $rowsPerPage=2; // So mau tin tren moi trang , trong truong hop nay cho bang 5
    // // Tinh tong so trang
    // $maxPage = ceil($numRows/$rowsPerPage);
    // if(!isset($_GET['page']))
    // {
    //     $_GET['page']='1';
    // }
    // // Vi tri cua mau tin dau tien tren moi trang
    // $offset = ($_GET['page']-1)*$rowsPerPage;
    $query = "SELECT a.Ten_sua,b.Ten_hang_sua,a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,a.Hinh FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua";
    $result = mysqli_query($conn,$query);
    if(isset($_POST['find'])){
        $keyword = $_POST['keyword'];
        $query = "SELECT a.Ten_sua,b.Ten_hang_sua,a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,a.Hinh FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua WHERE a.Ten_sua like '%$keyword%'";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm thông tin sữa</title>
</head>
<style>
    .table{width: 800px; background-color: #fdfef0;}
    .table-sp{border-collapse: collapse;width: 600px;border: 3px solid #bd2307;}
    .table-sp td{border: 0.1px solid black;}
    .header{
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
    .a, .b{padding-top: 5px;}
    ul{list-style-type: none;margin: 10px 0 10px -35px;padding-right: 5px;}
    img{height: 150px;}
    .sp{
        height: 240px;
    }
    .b{color: red;}
    i{color: black;}
    .btn{background-color: #fecccd;}
</style>
<body>
    <form action="" method="POST">
        <table align="center" class="table">
            <tr align="center" bgcolor='#fecccd'>
                <td class="header1">TÌM KIẾM THÔNG TIN SỮA</td>
            </tr>
            <tr align="center" bgcolor='#fecccd'>
                <td>
                    <b style="color:#bd2307;">Tên sữa:</b>        
                    <input type="text" name="keyword" value="<?php if(isset($keyword)) echo $keyword; ?>">
                    <input type="submit" name="find" class="btn" value="Tìm kiếm">
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
                                    <tr bgcolor='#ffeee6' class='header'>
                                        <td colspan='2'>$row[0] - $row[1]</td>
                                    </tr> 
                                    <tr class='sp'>
                                        <td align='center'><img src='Hinh_sua/$row[6]' alt=''></td>
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
</body>
</html>