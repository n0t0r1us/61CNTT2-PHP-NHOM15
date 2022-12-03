<style>
    .a, .b{
        text-align: right;
        font-weight: bold;
    }
    .a{color: #B40431;}
    .b{color: blue;}
    .container{
        margin-top: 50px;
    }
    .footer{
    margin-top: 200px;
    }
</style>
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
            <form action="bt6xl.php" method="post">
                <table align="center">
                    <tr>
                        <td colspan="2" align="center"><h3 style="color: #045FB4;">PHÉP TÍNH TRÊN HAI SỐ</h3></td>
                    </tr>
                    <tr>
                        <td class="a">Chọn phép tính: </td>
                        <td style="color: red;">
                            <input type="radio" name="cal" value= "cong" checked>Cộng
                            <input type="radio" name="cal" value= "tru">Trừ
                            <input type="radio" name="cal" value= "nhan">Nhân
                            <input type="radio" name="cal" value= "chia">Chia
                        </td>
                    </tr>
                    <tr>
                        <td class="b">Số thứ nhất: </td>
                        <td>
                            <input type="text" name="a" size="26px" required> 
                        </td>
                    </tr>
                    <?php if(isset($error1)) echo "<tr><td><td><b style='color: red;'>$error1</b></td></td></tr>" ?>
                    <tr>
                        <td class="b">Số thứ nhì: </td>
                        <td><input type="text" name="b" size="26px" required></td>
                    </tr>
                    <?php if(isset($erro2)) echo "<tr><td><td><b style='color: red;'>$error2</b></td></td></tr>" ?>
                    <?php if(isset($error3)) echo "<tr><td><td><b style='color: red;'>$error3</b></td></td></tr>" ?>
                    <tr>
                        <td></td>
                        <td align="left">
                            <input type="submit" name="submit" value="Tính">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>