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
]
];


$response = $client->delete('https://dummyjson.com/products/1');
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
    <title>Delete Product</title>
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
            </tr>
        </thead>
            <tbody>
            <tr>
                <th scope="row" href="single-product.php"><?= $product->id ?></th>
                <td><?= $product->title?></td>
                <td><?= $product->description?></td>
                <td><?= $product->price?></td>
                <td><?= $product->isDeleted?></td>
                <td><?= $product->deletedOn?></td>
            </tr>
            </tbody>
            </table>
        </body>
</html>