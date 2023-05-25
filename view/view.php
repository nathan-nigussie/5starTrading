<?php

include_once "../controller/post.php";
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>ADDIS-UPDATE-STOCK</title>
    <link rel="home icon" type="image/jpg" href="../img/books.png" />
</head>

<body id="body-viewStock">
    <!--header-->

    <header id="header-viewStock">
        <nav>
            <div class="container">
                <div class="text-center">
                    <h2> Stock Management </h2>
                </div>
            </div>
        </nav>
    </header>

    <div class="form-title">
        <div>
            <a onclick="location.href = 'addProduct.php';" id="back-btn-addStock"><i
                    class="fas fa-angle-double-left"></i>add-newStock</a>
            <a href="/home-page"><i class=" fas fa-user"></i> Log Out </a>
        </div>


    </div>





    <!--/header-->
    <?php
include_once '../autoLoader/classAutoLoader.php';
include_once "../controller/post.php";

//Template for DVD
$dvd = new dvd($sku, $name, $price, $size, $fileName);
$rows = $dvd->getDvd();
$dvd->deleteRecord();

//Template for Book

$book = new book($sku, $name, $price, $weight, $fileName);
$rows2 = $book->getBook();
$book->deleteRecord();

// //Template for Furniture

$furniture = new furniture($sku, $name, $price, $height, $length, $width, $fileName);
$rows3 = $furniture->getFurniture();
$furniture->deleteRecord();
?>

    <!-- form handling -->
    <main id="site-main">
        <dv class="main-container">
            <form action="/" method="POST">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>ID</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Remove</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
foreach ($rows2 as $row) {

    $imageURL1 = '../uploads/' . $row["file_name"];

    ?>



                        <tr>
                            <td> <img src=<?php echo $imageURL1 ?> height='100px' width='100px'>

                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["sku"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["price"] ?></td>



                            <td>

                                <a class="btn border-shadow delete2" data-id=<?php echo $row["id"] ?> <span
                                    class="text-gradient"><i class="fas fa-times"></i></span>
                                </a>
                            </td>
                        </tr>
                        <?php
}

foreach ($rows as $row) {

    $imageURL2 = '../uploads/' . $row["file_name"];

    ?>



                        <tr>
                            <td> <img src=<?php echo $imageURL2 ?> height='100px' width='100px'>

                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["sku"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["price"] ?></td>



                            <td>

                                <a class="btn border-shadow delete2" data-id=<?php echo $row["id"] ?> <span
                                    class="text-gradient"><i class="fas fa-times"></i></span>
                                </a>
                            </td>
                        </tr>
                        <?php
}
foreach ($rows3 as $row) {

    $imageURL3 = '../uploads/' . $row["file_name"];

    ?>

                        <tr>
                            <td> <img src=<?php echo $imageURL3 ?> height='100px' width='100px'>

                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["sku"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td>

                                <a class="btn border-shadow delete2" id=product-delete-id> <span
                                        class="text-gradient"><i class="fas fa-times"></i></span>
                                </a>
                            </td>
                        </tr>
                        <?php
}?>



                    </tbody>
                </table>


            </form>
            </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/index.js"></script>
</body>

</html>