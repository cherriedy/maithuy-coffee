<section class="navigation-wrapper">
    <header>
        <div class="navigation-content">
            <div class="img-wrapper">
                <a href="index.php">
                    <img src="./img/logo_3.png" alt="">
                </a>
            </div>

            <ul>
                <li class="active"><a href="index.php">Trang chủ</a></li>
                <div class="vertical-line"></div>
                <li><a href="index.php?page=3">Sản phẩm</a></li>
                <div class="vertical-line"></div>
                <li><a href="index.php?page=4">Liên hệ</a></li>
                <div class="vertical-line transparent"></div>
                <li class="loginBtn"><a href="index.php?page=5">Đăng nhập</a></li>
            </ul>
        </div>
        <div class="banner-content">
            <div class="inner">
                <h2>moring</h2>
                <h2>coffee</h2>
                <p>Wake Up and Smell the Coffee! and Start Your Morning Right with a Cup of Delicious Coffee!</p>

                <div class="button-space">
                    <button class="normal"><a href="#">Đặt Hàng Ngay !</a></button>
                    <button class="normal"><a href="#">Giảm 75%</a></button>
                </div>
            </div>
        </div>
    </header>
</section>

<section id="about" class="section-p1">
    <img src="./img/about.png" alt="about-pic">
    <div class="about-text-box">
        <!-- TEXT SECTION -->
        <div class="about-text">
            <h4>Về chúng tôi</h4>
            <h1>MAITHUY COFFEE</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed egestas justo. Nullamaximus, nunc at
                luctus maximus, sem felis ultricie lectus, non consectetur ligulaeros eu dui. Donec faucibus
                pellentesque
                lorem, et laoreet purus vestibulum</p>
        </div>

        <div class="smaller-about-text">
            <h3>Cà phê hữu cơ</h3>
            <p>Ntrinsicly re-engineer exceptional niches for high standards in supply chainsources where</p>
        </div>

        <div class="smaller-about-text">
            <h3>Cà phê hữu cơ</h3>
            <p>Ntrinsicly re-engineer exceptional niches for high standards in supply chainsources where</p>
        </div>

        <!-- BUTTON SECTION -->
        <a href="index.php?page=2" class="btn">Tìm hiểu thêm</a>
    </div>
</section>

<section class="testimonial-container">
    <div class="testimonial mySwiper">
        <div class="testi-content swiper-wrapper">
            <div class="slide swiper-slide">
                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                    alt="por1">
                <p>Sed molestie eget elit in bibendum. Nulla cursus nulla ac aliquet rutrum. Ut sem mi, finibus at erat
                    ac, egestas commodo augue. Proin lacinia faucibus metus, dictum pretium arcu rhoncus vel. Maecenas
                    tincidunt, ex eu congue consectetur, ligula nibh rhoncus urna, id cursus tellus sapien convallis
                    sapien.</p>
                <i class='bx bxs-quote-alt-left quote-icon'></i>
                <div class="details">
                    <span class="name">Marine Lotter</span>
                    <span class="job">Web Developer</span>
                </div>
            </div>


            <div class="slide swiper-slide">
                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                    alt="por1">
                <p>Sed molestie eget elit in bibendum. Nulla cursus nulla ac aliquet rutrum. Ut sem mi, finibus at erat
                    ac, egestas commodo augue. Proin lacinia faucibus metus, dictum pretium arcu rhoncus vel. Maecenas
                    tincidunt, ex eu congue consectetur, ligula nibh rhoncus urna, id cursus tellus sapien convallis
                    sapien.</p>
                <i class='bx bxs-quote-alt-left quote-icon'></i>
                <div class="details">
                    <span class="name">Marine Lotter</span>
                    <span class="job">Web Developer</span>
                </div>
            </div>


            <div class="slide swiper-slide">
                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80"
                    alt="por1">
                <p>Sed molestie eget elit in bibendum. Nulla cursus nulla ac aliquet rutrum. Ut sem mi, finibus at erat
                    ac, egestas commodo augue. Proin lacinia faucibus metus, dictum pretium arcu rhoncus vel. Maecenas
                    tincidunt, ex eu congue consectetur, ligula nibh rhoncus urna, id cursus tellus sapien convallis
                    sapien.</p>
                <i class='bx bxs-quote-alt-left quote-icon'></i>
                <div class="details">
                    <span class="name">Marine Lotter</span>
                    <span class="job">Web Developer</span>
                </div>
            </div>
        </div>
        <!-- SWIPER BUTTON -->
        <div class="swiper-button-next swiper-btn"></div>
        <div class="swiper-button-prev swiper-btn"></div>
        <div class="swiper-pagination"></div>
    </div>

</section>

<?php include_once(realpath(dirname(__FILE__)) . DS . '../layout/footer.php'); ?>