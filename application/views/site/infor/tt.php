<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="public/site/css/infor.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <section>
        <div class="swiper mySwiper container">
            <div class="swiper-wrapper content">
                <div class="swiper-slide card">
                    <div class="card-content">
                        <div class="image">
                            <img src="upload/avatar/vu.jpg" alt="">
                        </div>
                        <div class="name-profession">
                            <span class="name">Phan Nguyễn Đình Vũ</span>
                            <span class="profession">Leader</span>
                            <span class="information">MSSV: 61131562</span>
                        </div>
                        <div class="media-icons">
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-google"></i>
                            <a class="bi bi-github" href="https://github.com/n0t0r1us"></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide card">
                    <div class="card-content">
                        <div class="image">
                            <img src="upload/avatar/nghia.jpg" alt="">
                        </div>
                        <div class="name-profession">
                            <span class="name">Trương Tấn Nghĩa</span>
                            <span class="profession">Web Developer</span>
                            <span class="information">MSSV: 61131950</span>
                        </div>
                        <div class="media-icons">
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-google"></i>
                            <a class="bi bi-github" href="https://github.com/TruongTanNghia"></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide card">
                    <div class="card-content">
                        <div class="image">
                            <img src="upload/avatar/phuong.jpg" alt="">
                        </div>
                        
                        <div class="name-profession">
                            <span class="name">Nguyễn Anh Phương</span>
                            <span class="profession">Web Developer</span>
                            <span class="information">MSSV: 61133153</span>
                        </div>
                        <div class="media-icons">
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-google"></i>
                            <a class="bi bi-github" href="https://github.com/nguyenanhphuong69"></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide card">
                    <div class="card-content">
                        <div class="image">
                            <img src="upload/avatar/bang.jpg" alt="">
                        </div>
                        <div class="name-profession">
                            <span class="name">Phan Lương Bằng</span>
                            <span class="profession">Web Developer</span>
                            <span class="information">MSSV: 61130045</span>
                        </div>
                        <div class="media-icons">
                            <a class="bi bi-facebook" href="https://www.facebook.com/profile.php?id=100023496561790"></a>
                            <i class="bi bi-google"></i>
                            <a class="bi bi-github" href="https://github.com/bangphan303"></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide card">
                    <div class="card-content">
                        <div class="image">
                            <img src="upload/avatar/khanh.jpg" alt="">
                        </div>
                        <div class="name-profession">
                            <span class="name">Hồ Ngô Quốc Khánh</span>
                            <span class="profession">Web Developer</span>
                            <span class="information">MSSV: 61130045</span>
                        </div>
                        <div class="media-icons">
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-google"></i>
                            <a class="bi bi-github" href="https://github.com/KhanhHoNgoQuoc"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlider: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    });
</script>
</body>