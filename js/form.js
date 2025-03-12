let cart = 0;
let fileCount = 0;
let trigger = true;
let imagesHtml = {};
let imagesJs = [];
let out = '';
let button = '';
let GoodsList = "";
let goods = '';
let outerror = 0;
checkCart();
function checkCart() {

    if (localStorage.getItem('cart') != null) {
        cart = JSON.parse(localStorage.getItem('cart'));
    }
    return;
}

// const formImage = document.getElementById('formImage');
// const imagePreview = document.getElementById('imagePreview');
const Ordered = document.getElementById('formOrdered');
const NoOrdered = document.getElementById('formNoOrdered');

async function getGoods2() {
    checkCart();
    
    return new Promise((resolve, reject) => {
        $.getJSON('../sources/products.json', function (data) {
            GoodsList = ""; // Очищаем перед заполнением
            for (var key in cart) {
                let data_art = getFirstKey(cart[key]);
                GoodsList += data[data_art]['name'] + " {";
                GoodsList += getValue(cart[key]) + "} ";
            }
            resolve(GoodsList); // Теперь функция не завершится, пока данные не загрузятся
        }).fail((jqXHR, textStatus, errorThrown) => {
            reject(errorThrown);
        });
    });
}

function delImg() {
    out = ``;
    fileCount = 0;
    $('#formImage').val('');
    $(imagePreview).html(out);
    document.querySelector('.delete-img').classList.remove('visible')
    getImages();
}



function getButton() {
    document.querySelector('.delete-img').addEventListener('click', () => {
        delImg();
    });

}


function getImages() {
    imagesHtml = document.querySelectorAll('.delete-img');
}


document.addEventListener('DOMContentLoaded', function () {

    Ordered.addEventListener('click', () => {
        Ordered.removeAttribute('required');
        Ordered.setAttribute('checked', '');
        NoOrdered.removeAttribute('checked');
        NoOrdered.setAttribute('required', '');
    })

    NoOrdered.addEventListener('click', () => {
        NoOrdered.removeAttribute('required');
        NoOrdered.setAttribute('checked', '');
        Ordered.removeAttribute('checked');
        Ordered.setAttribute('required', '');
    })



    const form = document.getElementById('form');
    if (cart != null) {
        form.classList.remove('shown');
        form.addEventListener('submit', formSend);

        // form.addEventListener('submit', formSend);


        async function formSend(e) {
            e.preventDefault();
        
            let error = formValidate(form);
            let formData = new FormData(form);
        
            if (error == 0) {
                cartQuantity = localStorage.getItem('cartQuantity');
        
                try {
                    await getGoods2(); // Дождёмся завершения getGoods2()
        
                    checkCart();
                    if (GoodsList && cart !== undefined && cartQuantity !== undefined) {
                        cart = null;
                        cartQuantity = 0;
                        localStorage.setItem('cart', JSON.stringify(cart));
                        localStorage.setItem('cartQuantity', JSON.stringify(cartQuantity));
                        showMiniCart();
        
                        formData.append('goodslist', GoodsList);
                        formData.append('acc', "resp");
        
                        $.ajax({
                            url: 'saveform.php',
                            type: 'POST',
                            dataType: 'json',
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: function () {
                                $('#form').find('input, button').prop("disabled", true);
                                localStorage.setItem('goodslist', null);
                        
                                $('.toModal').html(`
                                    <div class="modal">
                                        <div class="modal-vindow">
                                            <h3 class="modal-text">Идёт обработка данных...</h3>
                                        </div>
                                        <div class="overlay"></div>
                                    </div>
                                `);
                            },
                            success: function (data2) {
                                if (data2.status === 'ok') {
                                    window.location.href = 'thanks.html';
                                } else {
                                    alert('Не удалось загрузить вашу заявку, попробуйте ещё раз!');
                                }
                            },
                            error: function () {
                                alert('Ошибка связи с сервером. Попробуйте позже.');
                            }
                        });

                    } 
                    else {
                        console.error("Ошибка: GoodsList пустой перед отправкой формы.");
                    }
                } catch (error) {
                    console.error("Ошибка получения данных из JSON:", error);
                }
            } else {
                alert('Заполните обязательные поля!');
            }
        }


        function formValidate(form) {
            let error = 0;
            let formReq = form.querySelectorAll('.req');

            for (let index = 0; index < formReq.length; index++) {
                const input = formReq[index];
                formRemoveError(input);

                if (input.classList.contains('_email')) {
                    if (emailTest(input)) {
                        formAddError(input);
                        error++;
                    }
                }
                else {
                    if (input.getAttribute("type") === 'checkbox' && input.checked === false) {
                        formAddError(input);
                        error++;
                    } else {
                        if (input.classList.contains('form-phone')) {
                            if (phoneTest(input) == 1) {
                                formAddError(input);
                                error++;
                            }
                        }

                        if (input.value == '') {
                            formAddError(input);
                            error++;
                        }
                        else {
                            formRemoveError(input);

                        }

                    }
                }
                // if (input.classList.contains('file-input')) {
                //     if (fileTest(input)) {
                //         formAddError(input);
                //         error++;
                //     }
                // }

            }
            return error;
        }

        function formAddError(input) {
            input.parentElement.classList.add('error');
            input.classList.add('error');
        }

        function formRemoveError(input) {
            input.parentElement.classList.remove('error');
            input.classList.remove('error');
        }

        // function fileTest(input) {
        //     if (input.value == '') {
        //         alert('Прикрепите файл!');
        //         return;
        //     }
        //     else {
        //         formRemoveError(input);
        //     }
        // }

        function emailTest(input) {
            return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input.value);
        }

        function phoneTest(input) {
            let lengt = input.value;
            if (lengt.length < 17) {
                for (let i = 0; i < lengt.length; i++) {
                    if (!isNaN(parseFloat(lengt[i])) && isFinite(lengt[i])) {
                        formRemoveError(input);
                        outerror = 0;
                    } else {
                        if (lengt[i] == '+' || lengt[i] == ')' || lengt[i] == '(' || lengt[i] == '-') {
                            formRemoveError(input);
                            outerror = 0;
                        } else {
                            formAddError(input);
                            alert('Некорректно введён номер телефона');
                            outerror = 1;
                            return outerror;
                        }
                    }
                }
            }
            else {
                alert('Некорректно введён номер телефона');
                outerror = 1;
                return outerror;
            }
        }


        // formImage.addEventListener('change', () => {

        //     if (formImage.files.length > 10) {
        //         alert('Нельзя прикрепить более 10-ти фотографий за раз');
        //         return;
        //     }
        //     else {
        //         for (let i = 0; i < formImage.files.length; i++) {
        //             uploadFile(formImage.files[i]);
        //         }
        //     }

        // })

        // function uploadFile(file) {
        //     if (!['image/jpeg', 'image/jpg', 'image/png', 'image/svg', 'image/bmp'].includes(file.type)) {
        //         alert('Разрешены только изображения');
        //         formImage.value = '';
        //         return;
        //     }

        //     if (file.size > 8 * 1024 * 1024) {
        //         alert('Файл превышает 8 МБ');
        //         return;
        //     }


        //     let reader = new FileReader();
        //     reader.onload = function (e) {
        //         out += `<div><img class='prev-photo' src="${e.target.result}" alt="photo" id="${fileCount}"></div>`;
        //         $(imagePreview).html(out);
        //         getButton();
        //         document.querySelector('.delete-img').classList.add('visible');
        //         getImages();
        //         imagesJs[fileCount] = file;
        //         console.log(imagesJs);
        //         fileCount++;
        //     };


        //     reader.onerror = function (e) {
        //         alert('Ошибка');
        //     };
        //     reader.readAsDataURL(file);
        // }
    }

    else {
        form.classList.add('shown');

    }

})

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