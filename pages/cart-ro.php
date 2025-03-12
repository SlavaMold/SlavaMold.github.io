<?php 
    // require_once '../functions/connect.php';
    // function getIp(){
    // $couses = [
    //     'HTTP_CLIENT_IP',
    //     'HTTP_X_FORWARDED_FOR',
    //     'REMOTE_ADDR'
    // ];

    // foreach ($couses as $couse) {
    //     if (!empty($_SERVER[$couse])){
    //         // $ip = trim(end(explode(',', $_SERVER[$couse])));
    //         if (filter_var($ip, FILTER_VALIDATE_IP)){
    //             return $ip;
    //         }
    //     }
    // }
    
// }
    // $currentip = getIp();

    // $idlist = mysqli_query($connect, "SELECT * FROM `blacklist`");
    // $phpdata = mysqli_fetch_all($idlist, MYSQLI_ASSOC);

    // foreach ($phpdata as $key) {
    //     if($currentip == $key['user_ip']){
    //         echo "Вы находитесь в чёрном списке сайта :( <br> ";
    //         echo "Чтобы вновь использовать функционал сайта - обратитесь в тех. поддержку ";
    //         echo "+(373) 621-65-200 (viber) ";
    //         die('<a href="../index.php"> вернуться </a>');
    //     }
    // }

    // if (isset($_POST['response'])){
    //     if(json_decode($_POST['response'])['status'] == 'ok'){
    //         header('Location: thanks.html');
    //     }
        
    // }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/mainstyle.css">
    <link rel="stylesheet" href="../css/support.css">
    <link rel="stylesheet" href="../css/products-style.css">

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <title>Take a Order</title>
</head>

<body>
<header class="header-dop">
        <div class="container">
            <div class="header-line">
                <div class="header-logo">
                    <a href='../index.php'><img src="../img/logo.png" class="header-logo-img"></a>
                </div>

                <div class="navigate">
                    <a class="nav-item" href="../index.php">PRINCIPAL</a>
                    <a class="nav-item" href="../index.php#whoUs">DESPRE NOI</a>
                    <a class="nav-item" href="../index.php#production">PRODUSE POPULARE</a>
                    <a class="nav-item" href="#cont">CONTACTE</a>
                    <div class="dropdown nav-item">
                        <a class="dropdown-chose" href="#">ro <button class="drop-activator"> <img class="dropdown-img" src="../img/main-page/icons/caret-down.png"> </button></a> 
                            <div class="dropdown-content">     
                              <a class="dropdown-chose" href="cart.php">ru</a>
                            </div>
                    </div>
                </div>

                <div class="cart">
                    <a href="cart-ro.php">
                        <img class="cart-img" src="../img/cart.png" alt="">
                    </a>
                    <span class="cart-quantity"></span>
                </div>

                <div class="phone">
                    <div class="phone-img"><img src="../img/phone.png"></div>
                    <div class="phone-hold">
                        <div class="number"><a href="#" class="num">+(373) 782-86-811</a></div>
                        <span class="phone-txt">Numar pentru conectare <br>cu compania</span>
                    </div>
                </div>

                <div class="batn"> <a href="about-page-ro.html" class="button">ALEGE SERVICII</a>
                </div>

                <div class="burger-menu">
                    <div class="header-burger"><span></span></div>
                </div>

            </div>
        </div>
    </header>

    <div class="cart-cont">
        <div class="container">
            <div class="burger-slide active" id="menu-slide">
                <div class="burger-hold other-hold">
                    <a class="nav-item hidd" href="../index.php#">PRINCIPAL</a>
                    <a class="nav-item hidd" href="../index.php#whoUs">DESPRE NOI</a>
                    <a class="nav-item hidd" href="../index.php#production">PRODUSE POPULARE</a>
                    <a class="nav-item hidd" href="#cont">CONTACTE</a>
                    <a class="nav-item hidd" href="#">ro</a>
                    <a class="nav-item hidd" href="cart.php">ru</a>
                    <a class="nav-item hidd" href="#">
                        <img class="cart-img-burger" src="../img/cart.svg" alt="">
                        <span class="cart-quantity-burger"></span>
                    </a>
                </div>
        
            </div>

            <div class="product-list" id="cart-content"> </div>

            <div class="take-a-order">
                <div class="notificat"></div>
                <div class="forma">
                    <form name="haisenberg" action="?" method="POST" class="form-body" id="form"
                        enctype="multipart/form-data">
                        <legend>
                            <h2 class="form-title">
                                Datele de plată
                            </h2>
                        </legend>

                        <div class="notificat">
                        Atenție! Dacă acest formular este completat incorect, comanda dumneavoastră nu va fi procesată!
                        </div>

                        <div class="form-item">
                            <label class="form-label" for="formName">Nume*</label>
                            <input type="text" class="form-input req" id="formName" name="name" placeholder="">
                        </div>

                        <div class="form-item">
                            <label class="form-label" for="formNumber">Număr de telefon*</label>
                            <input type="text" class="form-input form-phone  req" id="formNumber" name="phone" placeholder="">
                            <div class="checkbox">
                                <input id="WhatsApp" type="checkbox" name="WhatsApp" class="checkbox-input">
                                <label class="form-label" for="WhatsApp">WhatsApp</label>
                                <input id="Viber" type="checkbox" name="Viber" class="checkbox-input">
                                <label class="form-label" for="Viber">Viber</label>
                                <input id="Telegram" type="checkbox" name="Telegram" class="checkbox-input">
                                <label class="form-label" for="Telegram">Telegram</label>
                            </div>

                        </div>

                        <div class="form-item">
                            <label class="form-label" for="formEmail">E-mail*</label>
                            <input type="text" class="form-input _email req" id="formEmail" name="email" placeholder="">
                        </div>

                        <div class="form-item">
                            <div class="form-label"> Doriți livrare? </div>
                            <div class="options">
                                <div class="options-item">
                                    <input id="formOrdered" type="radio" checked value="ordered" name="ord"
                                        class="options-input">
                                    <label class="options-label" for="formOrdered"><span>Cu livrare (+150
                                            MDL)</span></label>
                                </div>

                                <div class="options-item">
                                    <input id="formNoOrdered" type="radio" value="noordered" name="ord"
                                        class="options-input">
                                    <label class="options-label" for="formNoOrdered"><span>Fără livrare</span></label>
                                </div>

                            </div>
                        </div>


                        <div class="form-item">
                            <label class="form-label" for="formMessage">Comentariu la comanda</label>
                            <textarea name="Message" id="formMessage" class="form-input"> </textarea>
                        </div>

                        <div class="accept-block">
                            <input id="Accept" type="checkbox" name="Accepted" class="checkbox-input req">
                            <label class="form-label acc-text" for="Accept">Sunt de acord cu prelucrarea și stocarea
                                datele personale din acest formular.
                            </label>
                        </div>
                        <button class="form-button" type="submit"> Trimite </button>
                    </form>

                </div>
            </div>
            <div class="toModal">
                
            </div>

            <div class="insertCookies">
        
            </div>
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
                        <h5 class="footer-title">CONTACTE</h5>
                        <ul class="list-unstyled">
                                <li>📞 Tel / WhatsApp: <span>+(373) 782-86-811</span></li>
                                <li>📠 Fax: <span>+(373) 782-86-811</span></li>
                                <li>📱 Viber: <span>+(373) 782-86-811</span></li>
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
                        <h5 class="footer-title">NAVIGATIE</h5>
                        <nav class="footer-nav d-flex flex-column">
                            <a class="text-light mb-2" href="../index.php#">PRINCIPAL</a>
                            <a class="text-light mb-2" href="../index.php#whoUs">DESPRE NOI</a>
                            <a class="text-light mb-2" href="../index.php#production">LISTA DE PRODUSE</a>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/cart-content-ro.js"></script>
    <script src="../js/burger-side.js"></script>
    <script src="../js/form-ro.js"></script>
</body>

</html>