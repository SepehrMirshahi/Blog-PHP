<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <title><?=$page_title?></title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/owl.carousel.css">
    <link rel="stylesheet" href="./css/owl.theme.default.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/resopnsive.css">
</head>

<body>
<!-- scroll-up -->
<button id="scroll-up">
    <i class="fa fa-2x fa-chevron-up" aria-hidden="true"></i>
</button>
<!-- header -->
<header>
    <!-- nav -->
    <nav id="nav">
        <div class="nav-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="navbar">
            <li> <?=$hello?></li>
            <li class="blog-item blog-item1 ">
            <a href="./index.php">خانه</a>
            </li>
            <li class="blog-item blog-item1 ">
            <a href="#">طبیعت</a>
            </li>
            <li class="blog-item">
            <a href="#">مردم</a>
            </li>
            <li class="blog-item">
            <a href="#">سفرها</a>
            </li>
            <li class="blog-item">
            <a href="#">فناوری</a>
            </li>
            <li id="nav-btn" class="nav-item w-25">
                <?=$logsection?>
            </li>
            <form action="" class="search">
                <input class="search-box" type="search" placeholder="جستجو">
                <a href="#" class="search-btn" type="submit">
                    <img src="./img/Layer 2.png" alt="search-icon">
                </a>
            </form>
        </ul>
    </nav>
    <!-- slider -->
    <div id="slider" class="owl-carousel owl-theme">
        <div class="item item1">
            <div class="card animated bounceInRight">
                <figure class="figure">
                    <figcaption class="card-text">
                        <h1 class="page-title"><?=$page_title?></h1>
                    </figcaption>
                </figure>
            </div>
        </div>
</header>
<!-- main -->
<main>
<?=$content ?>
</main>
<!-- footer -->
<footer>
    <div class="container">
        <!-- social -->
        <ul id="social">
            <li><a href="#"><i class="fab social-icon fa-telegram"></i></a></li>
            <li><a href="#"><i class="fab social-icon fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab social-icon fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab social-icon fa-twitter"></i></a></li>
        </ul>
        <!-- footer-nav -->
        <nav id="footer-nav">
            <ul class="mini-top">
                <li class="nav-item"><a href="#">صفحه‌اصلی</a></li>
                <li class="nav-item"><a href="#">درباره‌ما</a></li>
                <li class="nav-item"><a href="#">همکاری با‌ما</a></li>
                <li class="nav-item"><a href="#">تماس ‌با‌ما</a></li>
            </ul>
            <ul class="mini-bottom">
                <li class="blog-item"><a href="#">مردم</a></li>
                <li class="blog-item"><a href="#">سفرها</a></li>
                <li class="blog-item"><a href="#">حیوانات</a></li>
                <li class="blog-item"><a href="#">سبک</a></li>
                <li class="blog-item"><a href="#">فن‌آوری</a></li>
            </ul>
        </nav>
        <!-- copyright -->
        <div id="copyright">
            <p>
                از ابزار‌های فوق‌العاده
                <a href="#">link.com</a>
                برای طراحی استفاده کنید
            </p>
            <p>
                تمام حقوق این وب سایت متعلق به ----- است
            </p>
        </div>
    </div>
</footer>
<script src="./js/jquery-3.5.1.min.js"></script>
<script src="./js/jquery.sticky.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script src="./js/wow.min.js"></script>
<script src="./js/all.min.js"></script>
<script src="./js/app.js"></script>
</body>

</html>