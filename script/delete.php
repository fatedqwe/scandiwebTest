<?php
include('../product.php');

$product = new Product;
$ids = [];
if (isset($_POST['deleteId'])) {
    $ids = $_POST['deleteId'];
}
if (!empty($ids)) {
    $product->delete($ids);
}

header('Location: /index.php');
