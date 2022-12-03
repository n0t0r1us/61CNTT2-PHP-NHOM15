<style>
.container{
    margin-top: 10px;
}
.scrollmenu {
background-color: #333;
overflow: auto;
white-space: nowrap;
}
.scrollmenu a{
display: inline-block;
color: white;
text-align: center;
padding: 14px;
text-decoration: none;
}
.scrollmenu a:hover {
background-color: #777;
}
.footer{
    margin-top: 700px;
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
            <div class="scrollmenu">
                <a href="trangchu.php">Trang chủ</a>
                <a href="gioithieu.php">Giới thiệu</a>
                <a href="tintuc.php">Tin tức</a>
                <a href="lienhe.php">Liên hệ</a>
                <a href="diendan.php">Diễn đàn</a>
            </div>
        </div>
        <?php $this->load->view('site/footer', $this->data); ?>
    <script src="<?php echo public_url('site/'); ?>bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>