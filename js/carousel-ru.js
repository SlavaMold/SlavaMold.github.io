"use strict"

document.addEventListener("DOMContentLoaded", function () {
    const products = [
        { img: "../img/products/med_v_sotah.jpg", price: "112 MDL", descr: "Мёд в сотах", data_art: "7" },
        { img: "../img/products/multifloral.png", price: "149 MDL", descr: "Мёд мультицветочный", data_art: "2" },
        { img: "../img/products/propolis.jpg", price: "89 MDL", descr: "Прополис", data_art: "6" },
        { img: "../img/products/vax.jpg", price: "71 MDL", descr: "Пчелиный воск", data_art: "5" },
        { img: "../img/products/pollen.png", price: "124 MDL", descr: "Пыльца", data_art: "3" },
        { img: "../img/products/lipoviy_med.png", price: "100 MDL", descr: "Липовый мёд", data_art: "1" }
    ];

    function createProductHTML(product) {
        return `
            <div class="col col-flex-my">
                <div class="product-item">
                    <img src="${product.img}" class="product-img">
                    <div class="insertPrice">${product.price}</div>
                    <div class="button-add"><button id="add-to-cart" data=${product.data_art} class="add-to-cart">Купить</button></div>
                    <div class="product-txt1">
                        <div class="product-descr">${product.descr}</div>
                    </div>
                </div>
            </div>
        `;
    }

    function updateCarousel() {
        const screenWidth = window.innerWidth;
        let itemsPerSlide = 3;

        if (screenWidth < 576) {
            itemsPerSlide = 1; // Мобильный экран → 1 товар на экране
        } else if (screenWidth < 1200) {
            itemsPerSlide = 2; // Планшет → 2 товара
        }

        const carouselInner = document.querySelector(".carousel-inner");
        carouselInner.innerHTML = ""; // Очистка старых элементов

        for (let i = 0; i < products.length; i += itemsPerSlide) {
            const isActive = i === 0 ? "active" : "";
            let productGroup = `<div class="carousel-item ${isActive}"><div class="row">`;

            for (let j = 0; j < itemsPerSlide && (i + j) < products.length; j++) {
                productGroup += createProductHTML(products[i + j]);
            }

            productGroup += `</div></div>`;
            carouselInner.innerHTML += productGroup;
        }
    }

    updateCarousel();
    window.addEventListener("resize", updateCarousel); // Обновлять при изменении экрана
});