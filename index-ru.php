<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/mainstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@1,300&family=Inter:wght@200&family=Open+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@1,300&family=Inter:wght@200&family=Open+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/products-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>HoneyFarm - Главная</title>
</head>

<body>
    <header class="header">
        <div class="container-header">
            <div class="header-line">
                <div class="header-logo">
                    <img src="img/logo.png" class="header-logo-img">
                </div>

                <div class="navigate">
                    <a class="nav-item" href="#">ГЛАВНАЯ</a>
                    <a class="nav-item" href="#whoUs">О НАС</a>
                    <a class="nav-item" href="#production">ПОПУЛЯРНЫЕ ПРОДУКТЫ</a>
                    <a class="nav-item" href="#cont">КОНТАКТЫ</a>
                    <div class="dropdown nav-item">
                        <a class="dropdown-chose" href="#">ru <button class="drop-activator"> <img class="dropdown-img"
                                    src="img/main-page/icons/caret-down.png"> </button></a>
                        <div class="dropdown-content">
                            <a class="dropdown-chose" href="index-ro.php">ro</a>
                        </div>
                    </div>
                </div>

                <div class="cart">
                    <a href="pages/cart.php">
                        <img class="cart-img" src="img/cart.svg" alt="">
                    </a>
                    <span class="cart-quantity"></span>
                </div>



                <div class="phone">
                    <div class="phone-img"><img src="img/phone.png"></div>
                    <div class="phone-hold">
                        <div class="number"><a href="#" class="num">+(373) 782-86-811</a></div>
                        <span class="phone-txt">Номер для связи с <br>компанией</span>
                    </div>
                </div>

                <div class="batn"> <a href="pages/about-page.html" class="button">ВЫБОР ПРОДУКЦИИ</a>
                </div>

                <div class="burger-menu">
                    <div class="header-burger"><span></span></div>
                </div>

            </div>

            <div class="header-down">
                <div class="burger-slide active" id="menu-slide">
                    <div class="burger-hold">
                        <a class="nav-item hidd" href="#">ГЛАВНАЯ</a>
                        <a class="nav-item hidd" href="#whoUs">О НАС</a>
                        <a class="nav-item hidd" href="#production">ПОПУЛЯРНЫЕ ПРОДУКТЫ</a>
                        <a class="nav-item hidd" href="#cont">КОНТАКТЫ</a>
                        <a class="nav-item hidd" href="#">ru</a>
                        <a class="nav-item hidd" href="index.php">ro</a>
                        <a class="nav-item hidd" href="pages/cart.php">
                            <img class="cart-img-burger" src="img/cart.svg" alt="">
                            <span class="cart-quantity-burger"></span>
                        </a>
                    </div>

                </div>
                <div class="header-title">
                    Honey Farm

                    <div class="header-subtitle">
                        Вас Приветствует
                    </div>

                    <div class="header-suptitle">
                        Продукты с Пасеки
                    </div>

                    <div class="header-btn">
                        <a href="pages/about-page.html" class="header-button">Перейти</a>
                    </div>
                </div>

            </div>

        </div>
    </header>

    <div class="details">
        <div class="container">
            <div class="details-holder">
                <div class="detail">
                    <div class="detail-images">
                        <img class="det-img" src="img/main-page/4main/Produse.jpg">
                    </div>

                    <div class="detail-title"> Произведено пчёлами </div>
                    <div class="detail-descr"> Предлагаем различные виды меда, соты, прополис и другую продукцию
                    произведённую пчелами.
                    </div>
                </div>

                <div class="detail">
                    <div class="detail-images">
                        <img class="det-img" src="img/main-page/4main/Utilaj.png">
                    </div>

                    <div class="detail-title"> Inventar apicol </div>
                    <div class="detail-descr"> Имеете собственную пасеку? Наша компания поможет вам подобрать оборудование
                    для вашего предприятия!
                    </div>
                </div>

                <div class="detail">
                    <div class="detail-images">
                        <img class="det-img" src="img/main-page/4main/stupi_si_rame.jpg">
                    </div>

                    <div class="detail-title"> Улья и Рамки </div>
                    <div class="detail-descr">
                    Основные конструкции для строительства и расширения вашей пасеки!
                    </div>
                </div>

                <div class="detail">
                    <div class="detail-images">
                        <img class="det-img" src="img/main-page/4main/Investitii.png">
                    </div>

                    <div class="detail-title"> Финансирование проектов </div>
                    <div class="detail-descr"> HoneyFarm поможет вам получить финансирование для собственного
                    бизнеса и наладим логистику!
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="main-idea">
        <div class="container">
            <div class="idea-hold">
                <div class="idea-info">
                    <div class="idea-title" id="whoUs">
                        Что такое Honey Farm Md?
                    </div>

                    <div class="idea-descr">
                        Предпринимательский кооператив ,,Honey Farm,,
                        был создан в июне 2022 года и основан на пчеловодах, которые также работают в этой области.
                        Цель кооператива — расширить доступ к источникам финансирования и обеспечить хорошие
                        развитие всех участников.
                        <br>
                        Мы не просто компания, мы семья пчеловодов из Кантемира,
                        Мы занимаемся пчеловодством уже два поколения.
                        В 2016 году нам удалось зарегистрировать самостоятельный
                        бизнес в этой сфере и основать офис и в Кишиневе.
                        <div class="more-button">
                        </div>

                    </div>

                    <div class="idea-nums">
                        <div class="num-item">
                            500+ <span>Довольных клиентов</span>
                        </div>
                        <div class="num-item">
                            100+ <span>Ульев содержится</span>
                        </div>
                        <div class="num-item">
                            9 <span>Предоставляем услуги</span>
                        </div>
                    </div>
                </div>

                <div class="idea-image">
                    <img src="img/main-page/main-2.jpg" class="idea-img">
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="suggest">
        <div class="container">
            <div class="leftblock-holder">
                <div class="leftside">
                    <div class="leftside-title">
                        У нас скидки <br>
                    </div>
                    <div class="leftside-descr">
                        До конца недели действует скидка в 20% на все услуги!
                    </div>
                </div>

                <div class="rightside">
                    <div class="right-button">
                        <a href="pages/about-page.html" class="right-btn">ПОДРОБНЕЕ</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="production" id="production">

        <div class="container">
            <div class="product-title">
                Популярная продукция
            </div>
            <div class="product-list2">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Сюда будут динамически добавляться товары -->
                    </div>
                    <!-- Кнопки навигации -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="insertCookies">

    </div>

    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <!-- Карта -->
                <div class="col-md-4">
                    <iframe class="map w-100" height="200"
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2747.422441540521!2d28.264502999999998!3d46.479946999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDbCsDI4JzQ3LjgiTiAyOMKwMTUnNTIuMiJF!5e0!3m2!1sru!2s!4v1739368880625!5m2!1sru!2s"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Контакты -->
                <div id="cont" class="col-md-4">
                    <h5 class="footer-title">КОНТАКТЫ</h5>
                    <ul class="list-unstyled">
                        <li>📞 Tel / WhatsApp: <span>+(373) 798-29-848</span></li>
                        <li>📠 Fax: <span>+(373) 299-21-651</span></li>
                        <li>📱 Viber: <span>+(373) 621-65-200</span></li>
                        <li>✉️ Email: <span>honeyfarmlv@gmail.com</span></li>
                        <li>🔵 Facebook:
                            <a class="footer-link text-light"
                                href="https://www.facebook.com/profile.php?id=100092850482614#"
                                target="_blank">Click</a>
                        </li>
                    </ul>
                </div>

                <!-- Навигация -->
                <div class="col-md-4">
                    <h5 class="footer-title">НАВИГАЦИЯ</h5>
                    <nav class="footer-nav d-flex flex-column">
                        <a class="text-light mb-2" href="#">ГЛАВНАЯ</a>
                        <a class="text-light mb-2" href="#whoUs">О НАС</a>
                        <a class="text-light mb-2" href="#production">ПРОДУКЦИЯ</a>
                    </nav>
                </div>
            </div>
            <div class="copyright">
                © HoneyFarm 2025
                All rights secured.
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        $(document).ready(function () {
            $('#productCarousel').carousel({
                interval: 3000 // Автопрокрутка каждые 3 секунды
            });
        });
    </script> -->

    <script src="js/carousel-ru.js"></script>
    <script src="js/burger.js"></script>
    <script src="js/cart-logic.js"></script>
</body>

</html>