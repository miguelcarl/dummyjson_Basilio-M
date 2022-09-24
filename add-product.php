<?php
require "vendor/autoload.php";
use GuzzleHttp\Client;

$client = new Client([
'base_uri' => 'https://dummyjson.com/'
]);

$products = [
'json' => [

'title' => 'PlayStation 5',
'description' => 'The PS5 console unleashes new gaming possibilities that you never anticipated. Experience lightning fast loading with an ultra-high speed SSD, deeper immersion with support for haptic feedback, adaptive triggers, and 3D Audio, and an all-new generation of incredible PlayStation games.',
'price' => '1699',
'brand' => 'Sony',
'category' => 'Gaming',
'thumbnail' => 'https://lzd-img-global.slatic.net/g/p/mdc/ca9a52add5fe542958af6b32838f06dd.jpg_2200x2200q80.jpg_.webp'
]
];

$response = $client->post('https://dummyjson.com/products/add', $products);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    </head>
    <body>
            <div class = "container">
        <table class="table table-success table-striped-columns">
        
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Brand</th>
            <th scope="col">Category</th>
            <th scope="col">Thumbnail</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" href="single-product.php"><?= $product->id ?></th>
                <td><?=$product->title?></td>
                <td><?=$product->description?></td>
                <td><?=$product->price?></td>
                <td><?=$product->brand?></td>
                <td><?=$product->category?></td>
                <td><img src="<?=$product->thumbnail?>"width="100px"></td>
            </tr>
        </tbody>
        </table>
    </body>
</html>