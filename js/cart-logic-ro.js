var cart = {};
let cartQuantity = 0;
let spanQuantity = document.querySelector('.cart-quantity');
let spanQuantityBurger = document.querySelector('.cart-quantity-burger');
$('document').ready(function () {
    checkCart();
    checkQuantity();
    showMiniCart();
    document.addEventListener("click", function (event) {
        if (event.target && event.target.id === "add-to-cart") {
            addToCart(event.target);
        }
    })
})


// const observer = new MutationObserver((mutations) => {
//     mutations.forEach((mutation) => {
//         mutation.addedNodes.forEach((node) => {
//             if (node.id === "add-to-cart") {
//                 console.log("Кнопка добавлена в DOM!");
//                 node.addEventListener("click", () => alert("Нажата!"));
//             }
//         });
//     });
// });

// observer.observe(document.body, { childList: true, subtree: true });


function showMiniCart() {
    let out = '';
    if (cart != null) {
        out = '!';
        spanQuantityBurger.classList.remove('shown');
        spanQuantity.classList.remove('shown');
        spanQuantityBurger.innerHTML = out;
        spanQuantity.innerHTML = out;
    }
    if (cart == null) {
        spanQuantityBurger.classList.add('shown');
        spanQuantity.classList.add('shown');
    }

}

function checkCart() {
    if (localStorage.getItem('cart') != undefined) {
        cart = JSON.parse(localStorage.getItem('cart'));
    }
    else {
        cart = null;
        localStorage.setItem('cart', JSON.stringify(null));
    }
}

function checkQuantity() {

    if (localStorage.getItem('cartQuantity') != null) {
        cartQuantity = JSON.parse(localStorage.getItem('cartQuantity'));
    }

    if (localStorage.getItem('cartQuantity') != undefined) {
        cartQuantity = JSON.parse(localStorage.getItem('cartQuantity'));
    }

    if (localStorage.getItem('cartQuantity') == undefined) {
        localStorage.setItem('cartQuantity', 0);
    }

}

function addToCart(el) {
    //добавляем товар в корзину
    if (cart == null) {
        cart = {};
    }
    if(cartQuantity == 3){
        alert('Puteți selecta maximum 3 tipuri de produse simultan!');
        return;
    }

    cart[cartQuantity] = {[$(el).attr('data')] : 1};
    cartQuantity++;
    localStorage.setItem('cart', JSON.stringify(cart));
    localStorage.setItem('cartQuantity', JSON.stringify(cartQuantity));
    showMiniCart();
}
