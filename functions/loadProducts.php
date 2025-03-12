<?php
// vendor/loadProducts.php

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $filePath = '../sources/products.json';

    if (file_exists($filePath)) {
        $jsonContent = file_get_contents($filePath);
        $products = json_decode($jsonContent, true);

        $filteredProducts = [];

        foreach ($products as $article => $product) {
            if (isset($product['type']) && $product['type'] === $type) {
                $filteredProducts[$article] = $product;
            }
        }

        if (!empty($filteredProducts)) {
            foreach ($filteredProducts as $article => $product) {
                echo '
                    <div class="product-item">
                        <img src="../sources/imgs/' . htmlspecialchars($product['imglink']) . '" class="product-img">
                        <div class="insertPrice">' . htmlspecialchars($product['price']) . ' MDL</div>
                        <div class="button-add"><button class="add-to-cart" id="add-to-cart" data="' . htmlspecialchars($article) . '">Купить</button></div>
                        <div class="product-txt1">
                            <div class="product-descr">' . htmlspecialchars($product['description']) . '</div>
                        </div>
                    </div>
                ';
            }
        } else {
        }
    } else {
    }
} else {
}

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $filePath = '../sources/products.json';

    if (file_exists($filePath)) {
        $jsonContent = file_get_contents($filePath);
        $products = json_decode($jsonContent, true);

        $filteredProducts = [];

        foreach ($products as $article => $product) {
            if (isset($product['category']) && $product['category'] === $category) {
                $filteredProducts[$article] = $product;
            }
        }

        if (!empty($filteredProducts)) {
            foreach ($filteredProducts as $article => $product) {
                echo '
                    <div class="product-item">
                        <img src="../sources/imgs/' . htmlspecialchars($product['imglink']) . '" class="product-img">
                        <div class="insertPrice">' . htmlspecialchars($product['price']) . ' MDL</div>
                        <div class="button-add"><button class="add-to-cart" id="add-to-cart" data="' . htmlspecialchars($article) . '">Купить</button></div>
                        <div class="product-txt1">
                            <div class="product-descr">' . htmlspecialchars($product['description']) . '</div>
                        </div>
                    </div>
                ';
            }
        } else {
        }
    } else {
    }
} else {
}
?>


