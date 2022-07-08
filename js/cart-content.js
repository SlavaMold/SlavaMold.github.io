var cart = {};
let totalSum = 0;
$.getJSON('goods.json', function (data) {
    var goods = data;
    console.log(goods);
    checkCart();
    console.log(cart);
    showCart();
    function showCart() {
        if ($.isEmptyObject(cart)) {
            var out = '';
            out += '<div class="about__header header-block">';
            out += '<h2 class="header-block__title"> Сoș gol </h2>';
            comanda();
            $('#cart-content').html(out);


        }

        else {
            var out = '';
            for (var key in cart) {

                if (data[key]['video'] != null) {

                    out += '<article class="about__column-produs_column2 col">';
                    out += '<div class="about__items product">';
                    out += '<button class="delete" data-art="' + key + '"><img class="delete_img" src="../img/trash.png"></button>';
                    out += '<div class="container_imgvid">';
                    out += '<div class="container_img">';
                    out += '<img class="about_photo2" alt="photos" src="' + data[key].image1 + '">';
                    out += '<img class="about_photo2" alt="photos" src="' + data[key].image2 + '">';
                    out += '</div>';
                    out += '<div class="video2">';
                    out += '<video class="video_item video-roi" controls preload="auto" src="' + data[key]['video'] + '"> </video>';
                    out += '</div>';
                    out += '</div>';

                    out += ' <span class="about"> <h1 class="name">' + data[key]['name'] + '</h1>' + data[key]['description'];
                    out += '<div class="main_block__buttons">'
                    out += '<h3 class="cost">' + data[key]['cost'] + ' MLD</h3>';

                    out += '<button class="plus" data-art="' + key + '">+</button>';
                    out += cart[key];

                    out += '<button class="minus" data-art="' + key + '">-</button>';




                    out += '</div>';
                    out += '<h3 class="cost">Total</h3>';
                    out += cart[key] * goods[key].cost;
                    out += '</span>';
                    out += '</div>';
                    out += '</article>';

                }
                else {

                    out += '<article class="about__column-produs_column2">';

                    out += '<div class="about__items product">';
                    out += '<button class="delete" data-art="' + key + '"><img class="delete_img" src="../img/trash.png"></button>';
                    out += '<img class="about_photo1" alt="photos" src="' + data[key].image + '">';
                    out += ' <span class="about"> <h1 class="name">' + data[key]['name'] + '</h1>' + data[key]['description'];
                    out += '<div class="main_block__buttons">'
                    out += '<h3 class="cost">' + data[key]['cost'] + ' MLD</h3>';

                    out += '<button class="plus" data-art="' + key + '">+</button>';
                    out += cart[key];

                    out += '<button class="minus" data-art="' + key + '">-</button>';




                    out += '</div>';
                    out += '<h3 class="cost">Total</h3>';
                    out += cart[key] * goods[key].cost;
                    out += '</span>';
                    out += '</div>';
                    out += '</article>';
                    comanda();
                }

            }





        }
        function comanda() {
            if (!$.isEmptyObject(cart)) { 
            
                var out2 = '';
               
                
                out2 += '<div class="form-group">';
                out2 += '<a href="../comanda-ro.html" class="main_block__button_red2 input">Face o comanda</button>';
                out2 += '</div>';
               
                
            }
            else{
                var out2 = '';
              
            }
            $('div.header-block__subtitle').html(out2);

        }
        $('#cart-content').html(out);

        $('.plus').on('click', plusGoods);
        $('.minus').on('click', minusGoods);
        $('.delete').on('click', deleteGoods);

    }

    function showMiniCart() {
        //показываю содержимое корзины
        var out = '';
        out += cartQuantity;
    
        $('span.cart_quantity').html(out);
    }

    function plusGoods() {
        var articul = $(this).attr('data-art');
        cart[articul]++;
        cartQuantity++;
        saveCartToStorage();
        showCart();
        showMiniCart();
        saveQuantityToStorage();

    }

    function minusGoods() {
        var articul = $(this).attr('data-art');
        if (cart[articul] > 1) {
            cart[articul]--;
            cartQuantity--;
        }
        else {
            delete cart[articul];
            cartQuantity--;
        }
        saveCartToStorage();
        showCart();

        showMiniCart();
        saveQuantityToStorage();
    
    }

    function saveQuantityToStorage() {
        localStorage.setItem('cartQuantity', JSON.stringify(cartQuantity));
    }

    function deleteGoods() {
        var articul = $(this).attr('data-art');
        cartQuantity = cartQuantity - cart[articul];
        delete cart[articul];
        saveCartToStorage();
        showCart();
        showMiniCart();
        saveQuantityToStorage();
    }

    function saveCartToStorage() {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    $.getJSON('goods2.json', function (data) {
        var goods = data;
        console.log(goods);
        checkCart();
        console.log(cart);
        showCart();
    })
})

function checkCart() {
    //проверяю наличие корзины в localStorage;
    if (localStorage.getItem('cart') != null) {
        cart = JSON.parse(localStorage.getItem('cart'));
    }


}