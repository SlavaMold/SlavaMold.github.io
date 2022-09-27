var cart = {};
let cartQuantity = 0;

$('document').ready(function () {

    LoadGoods();
    checkCart();
    checkQuantity()
    showMiniCart();
   
});


function checkCart() {
    
    if (localStorage.getItem('cart') != null) {
        cart = JSON.parse(localStorage.getItem('cart'));
    }
}

function checkQuantity() {

    if (localStorage.getItem('cartQuantity') != null) {
        cartQuantity = JSON.parse(localStorage.getItem('cartQuantity'));
        
    }

    

}

function showMiniCart() {
   
    var out = '';
    out += cartQuantity;

    $('span.cart_quantity').html(out);
}

function LoadGoods() {

    $.getJSON('goods.json', function (data) {

        console.log(data);
        var out = '';
        for (var key in data) {
            if (data[key]['video'] != null) {

                out += '<article class="about__column-produs_column col">';
                out += '<div class="about__items product">';
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
                out += '<button class="main_block__button_red" data-art="' + key + '">în coș</button>';
                out += '</div>';

                out += '</span>';
                out += '</div>';
                out += '</article>';

            }

            else {
                out += '<article class="about__column-produs_column">';
                out += '<div class="about__items product">';
                out += '<img class="about_photo" alt="photos" src="' + data[key].image + '">';
                out += ' <span class="about"> <h1 class="name">' + data[key]['name'] + '</h1>' + data[key]['description'];
                out += '<div class="main_block__buttons">'
                out += '<h3 class="cost">' + data[key]['cost'] + ' MLD</h3>';
                out += '<button class="main_block__button_red" data-art="' + key + '">în coș</button>';
                out += '</div>';

                out += '</span>';
                out += '</div>';
                out += '</article>';
            }
        }
        $('#goods').html(out);
        $('button.main_block__button_red').on('click', addToCart);


    });



    function addToCart() {
        
        var articul = $(this).attr('data-art');
        if (cart[articul] != undefined) {
            cart[articul]++;
            cartQuantity++;
        }
        else {
            cart[articul] = 1;
            cartQuantity++;
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        localStorage.setItem('cartQuantity', JSON.stringify(cartQuantity));
        //console.log(cart);
        showMiniCart();
    }







}
