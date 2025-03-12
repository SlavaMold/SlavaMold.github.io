document.addEventListener('DOMContentLoaded', () => {
    // Обработчик для кнопок внутри acc-cont
    document.querySelectorAll('.acc-cont button').forEach(button => {
        button.addEventListener('click', () => {
            const type = button.getAttribute('name'); // Получаем type
            loadProductsByType(type);
        });
    });

    // Обработчик для категорий (span name="category")
    document.querySelectorAll('.product-header').forEach(span => {
        span.addEventListener('click', () => {
            const category = span.getAttribute('name'); // Получаем category
            loadProductsByCategory(category);
        });
    });

    function loadProductsByType(type) {
        fetch(`../functions/loadProducts.php?type=${encodeURIComponent(type)}`)
            .then(response => response.text())
            .then(html => {
                document.querySelector('.main-content').innerHTML = html;
            })
            .catch(error => console.error('Ошибка:', error));
    }

    function loadProductsByCategory(category) {
        fetch(`../functions/loadProducts.php?category=${encodeURIComponent(category)}`)
            .then(response => response.text())
            .then(html => {
                document.querySelector('.main-content').innerHTML = html;
            })
            .catch(error => console.error('Ошибка:', error));
    }
});
