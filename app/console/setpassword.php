<?php
# console/setpassword.php
require "../app/models/Product.php";

$products = \App\Models\Product::all();

foreach ($products as $product) {
    // echo $product->name . "\n";
    echo $product->name . ': ' . $product->setPassword('secret') . "\n";

}