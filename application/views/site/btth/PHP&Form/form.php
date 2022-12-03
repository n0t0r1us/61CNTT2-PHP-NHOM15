<style>
    .footer{
    margin-top: 200px;
    }
</style>
<script>
    function dieu_huong(){
        location.assign("form.php");
    }
</script>
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
            <form action="config.php" method="post" style="width: 500px; margin: 5% 32%;">
                <fieldset class="fieldset1">
                    <legend><b>Enter Your Information</b></legend>
                    <table>
                        <tr>
                            <td>Fullname</td>
                            <td><input type="text" name="fname" required></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" required></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" required></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <input type="radio" name="gender" value= "nam" checked>Nam
                                <input type="radio" name="gender" value= "nu">Nữ
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>
                                <select name= "country" id= "country">
                                    <option value= "Việt Nam">Việt Nam</option>
                                    <option value= "Nhật Bản">Nhật Bản</option>
                                    <option value= "Hàn Quốc">Hàn Quốc</option>
                                    <option value= "Thái Lan">Thái Lan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Study</td>
                            <td>
                                <input type= "checkbox" name= "study1" value="PHP&MySQL">
                                <label for="study1">PHP & MySQL</label>   
                                <input type= "checkbox" name= "study2" value="APS.NET">
                                <label for="study1">APS.NET</label>   
                                <input type= "checkbox" name= "study3" value="CCNA">
                                <label for="study1">CCNA</label>   
                                <input type= "checkbox" name= "study4" value="Security+">
                                <label for="study1">Security+</label>   
                            </td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td><textarea rows="5" cols="48" name="note"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type ="submit" name ="submit" value ="Gửi">
                                <button type="button" onclick="dieu_huong()">Hủy</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
        <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>