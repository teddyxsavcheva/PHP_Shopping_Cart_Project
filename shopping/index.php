<?php

// Starting session in which the cart products will be stored 
session_start();

require_once('./php/createdb.php');
require_once('./php/perfume.php');

// Creating instance of CreateDB class
$database = new CreateDB("ShoppingCart_DB", "shoppingcart_table");

// If the button named "Add" is clicked, I want to execute this
if (isset($_POST['add'])) {

    // Check if the cart session variable is set (exists). If it exists, then there are already products in the cart
    if (isset($_SESSION['cart'])) {

        //array_column() returns the values from a single product_id column in the input array
        $product_array_id = array_column($_SESSION['cart'], "product_id");

        // If the product is already in the cart, then don't add it again -> POST used to get the product_id from the form in this session
        if (in_array($_POST['product_id'], $product_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }
        // If the product is not in the cart, then add it
        else {
            $perfumesInCart = count($_SESSION['cart']);
            $perfume_array = array(
                'product_id' => $_POST['product_id']
            );

            // Create new session variable with the new count of objects in the cart
            $_SESSION['cart'][$perfumesInCart] = $perfume_array;
            //print_r($_SESSION['cart']);
        }
    } else {

        $perfume_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $perfume_array;
        //print_r($_SESSION['cart']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LovelyScent</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- CSS Link -->
    <link rel="stylesheet" href="./style.css">

    <!-- SVG code for the shopping cart icon -->
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='16' width='16' viewBox='0 0 512 512'%3E%3Cpath fill='%23FFFFFF' d='M96 32v96H224V32c0-17.7-14.3-32-32-32H128C110.3 0 96 14.3 96 32zm0 128c-53 0-96 43-96 96V464c0 26.5 21.5 48 48 48H272c26.5 0 48-21.5 48-48V256c0-53-43-96-96-96H96zm64 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160zM384 48c0-1.4-1-3-2.2-3.6L352 32 339.6 2.2C339 1 337.4 0 336 0s-3 1-3.6 2.2L320 32 290.2 44.4C289 45 288 46.6 288 48c0 1.4 1 3 2.2 3.6L320 64l12.4 29.8C333 95 334.6 96 336 96s3-1 3.6-2.2L352 64l29.8-12.4C383 51 384 49.4 384 48zm76.4 45.8C461 95 462.6 96 464 96s3-1 3.6-2.2L480 64l29.8-12.4C511 51 512 49.4 512 48c0-1.4-1-3-2.2-3.6L480 32 467.6 2.2C467 1 465.4 0 464 0s-3 1-3.6 2.2L448 32 418.2 44.4C417 45 416 46.6 416 48c0 1.4 1 3 2.2 3.6L448 64l12.4 29.8zm7.2 100.4c-.6-1.2-2.2-2.2-3.6-2.2s-3 1-3.6 2.2L448 224l-29.8 12.4c-1.2 .6-2.2 2.2-2.2 3.6c0 1.4 1 3 2.2 3.6L448 256l12.4 29.8c.6 1.2 2.2 2.2 3.6 2.2s3-1 3.6-2.2L480 256l29.8-12.4c1.2-.6 2.2-2.2 2.2-3.6c0-1.4-1-3-2.2-3.6L480 224l-12.4-29.8zM448 144c0-1.4-1-3-2.2-3.6L416 128 403.6 98.2C403 97 401.4 96 400 96s-3 1-3.6 2.2L384 128l-29.8 12.4c-1.2 .6-2.2 2.2-2.2 3.6c0 1.4 1 3 2.2 3.6L384 160l12.4 29.8c.6 1.2 2.2 2.2 3.6 2.2s3-1 3.6-2.2L416 160l29.8-12.4c1.2-.6 2.2-2.2 2.2-3.6z'/%3E%3C/svg%3E" type="image/svg+xml">

</head>

<body>

    </head>

    <body>

        <?php require_once('./php/header.php'); ?>
        <div class="container">
            <div class="row text-center py-5">
                <!-- Creating perfume 1,2,3,4 by using data from the database-->
                <?php
                $result = $database->displayTable();
                while ($row = mysqli_fetch_assoc($result)) {
                    perfume($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
                ?>


            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>

</html>