<?php
include('../product.php');

$product = new Product;
$product->SKU = $_POST['SKU'];
$product->name = $_POST['name'];
$product->price = $_POST['price'];
$product->weight = $_POST['weight'];
$product->size = $_POST['size'];
$product->height = $_POST['height'];
$product->width = $_POST['width'];
$product->length = $_POST['length'];

$product->save();

header('Location: /index.php');
