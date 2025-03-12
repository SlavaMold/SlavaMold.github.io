"use strict"
let spanQuantity = document.querySelector('.cart-quantity');
let spanQuantityBurger = document.querySelector('.cart-quantity-burger');

function getFirstKey(obj) {
    return Object.keys(obj)[0];
}

function getValue(obj) {
    return obj[Object.keys(obj)[0]];
}

document.addEventListener('DOMContentLoaded', function () {
    let cart = JSON.parse(localStorage.getItem('cart')) || {}; // Загружаем корзину
    cart = Object.entries(cart);
    let cartQuantity = 0;
    checkQuantity();
    checkCart();
    const form = document.getElementById('form');
    form.classList.remove('.shown');

    $.getJSON('../sources/products-ro.json', function (data) {
        showMiniCart();
        showCart();
        getGoods();
        function showCart() {
            let out = '';
            if (cart == null) {
                out = '';
                out += `<div class="container">
                        <div class="thanks">
                        <div class="thank-tex">
                        Nu ați selectat niciun produs.
                        </div>
                        <div class="back-butt-div">
                        <a class="back-butt" href="../pages/about-page.html">Înapoi</a>
                        </div> </div> </div>`;
            
                $('#cart-content').html(out);
            }
            else {
                for (var key in cart) {
                    let data_art = getFirstKey(cart[key]);
                    out += `
                        <div class="col col-flex-my">
                            <div class="product-item product-item2">
                                <button class="delete" data-art=" ${key} "><img class="delete_img" src="../img/trash.png"></button>
                                <img class="product-img" src="../sources/imgs/${data[data_art]['imglink']}" class="product-img">
                                <div class="insertPrice">${data[data_art]['price']}</div>
                                <div class="product-txt1">
                                    <div class="product-descr">${data[data_art]['description']}</div>
                                </div>
            
                                <button class="increase" data-art=" ${data_art} " > +  </button>
                                <button class="decrease" data-art=" ${data_art} "> - </button>
                                <span class='product-qty'> Cantitate: ${getValue(cart[key])} </span>
                            </div>
                        </div>
                    `;
                }
            }
            $('#cart-content').html(out);

            $('.delete').on('click', deleteGoods);
            $('.increase').on('click', increaseGood);
            $('.decrease').on('click', decreaseGood)

        }

        function showMiniCart() {
            let out2 = '';
            if (cart != null) {
                out2 = '!';
                spanQuantityBurger.classList.remove('shown');
                spanQuantity.classList.remove('shown');
                spanQuantityBurger.innerHTML = out2;
                spanQuantity.innerHTML = out2;
            }
            if (cart == null) {
                spanQuantityBurger.classList.add('shown');
                spanQuantity.classList.add('shown');
            }

        }

        function saveQuantityToStorage() {
            localStorage.setItem('cartQuantity', JSON.stringify(cartQuantity));
        }

        function saveCartToStorage() {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function deleteGoods() {
            let articul = $(this).attr('data-art');
            cartQuantity--;
        
            // Преобразуем объект в массив пар [ключ, значение]
            let entries = Object.entries(cart);
        
            // Удаляем элемент с нужным ключом
            entries.splice(Number(articul), 1);
        
            // Создаем новый объект с обновленными ключами
            cart = Object.fromEntries(entries.map((item, index) => [index, item[1]]));
        
            if (cartQuantity == 0) {
                cart = null;
                let form1 = document.querySelector('.forma');
                form1.classList.add('shown');
                spanQuantityBurger.classList.add('shown');
                spanQuantity.classList.add('shown');
            }
        
            saveCartToStorage();
            saveQuantityToStorage();
            showCart();
            showMiniCart();  
            getGoods();
        }

        function getGoods(){
            let goodslist = '';
          goods = document.querySelectorAll('.product-descr').forEach((el) => {
            goodslist += el.firstChild.data + ', ';
          })  
            localStorage.setItem('goodslist', null);
            localStorage.setItem('goodslist', JSON.stringify(goodslist));
          }

        function increaseGood(){
            let article = Number($(this).attr('data-art'));
            // Перебираем вложенные объекты и ищем ключ
            for (let key in cart) {
                let numKey = Number(key);
                if (cart[numKey].hasOwnProperty(article)) {
                    cart[numKey][article]++; // Увеличиваем значение
                    saveCartToStorage();
                    showCart();
                    return;
                }
            }
            
        }

        function decreaseGood() {
            let article = Number($(this).attr('data-art'));

            for (let key in cart) {
                let numKey = Number(key);
                if (cart[numKey].hasOwnProperty(article)) {
                    if (cart[numKey][article] == 1) {
                        cartQuantity--;

                        // Преобразуем в массив, удаляем элемент, пересоздаем объект
                        let entries = Object.entries(cart).filter(([k]) => k != numKey);
                        cart = Object.fromEntries(entries.map((item, index) => [index, item[1]]));

                        if (cartQuantity == 0) {
                            cart = null;
                            let form1 = document.querySelector('.forma');
                            form1.classList.add('shown');
                            spanQuantityBurger.classList.add('shown');
                            spanQuantity.classList.add('shown');
                        }

                        saveCartToStorage();
                        saveQuantityToStorage();
                        showCart();
                        showMiniCart();  
                        getGoods();
                        return;
                    }
                    cart[numKey][article]--; // Уменьшаем значение
                    saveCartToStorage();
                    showCart();
                    return;
                }
            }
        }
    })

    function checkCart() {
        if (localStorage.getItem('cart') != undefined) {
            cart = JSON.parse(localStorage.getItem('cart'));
        }
        else {
            localStorage.setItem('cart', JSON.stringify(null));
            cart = null;
        }
    }


    function checkQuantity() {

        if (localStorage.getItem('cartQuantity') != null) {
            cartQuantity = JSON.parse(localStorage.getItem('cartQuantity'));
        }
        else {
            localStorage.setItem('cartQuantity', JSON.stringify(cartQuantity));

        }

    }

})