<?php

include_once "../controller/post.php";
error_reporting(E_ALL ^ E_NOTICE);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chamb - Responsive E-commerce HTML5 Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--enable mobile device-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!--bootstrap css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--animate css-->
    <link rel="stylesheet" href="../css/animate-wow.css">
    <!--main css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style copy.css">
    <link rel="stylesheet" href="../css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../css/slick.min.css">
    <!--responsive css-->
    <link rel="stylesheet" href="../css/responsive.css">
</head>

<body>
    <header id="header" class="top-head">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-12 left-rs">
                        <div class="navbar-header">
                            <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="index copy.php" class="navbar-brand"><img class="logo" src="../images/logo_w.png"
                                    alt="" /></a>
                        </div>
                        <form class="navbar-form navbar-left web-sh">
                            <div class="form">
                                <input type="text" class="form-control" placeholder="Search for your products">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="right-nav">
                            <div class="login-sr">
                                <div class="login-signup">
                                    <ul>
                                        <li><a href='addProduct.php' ;>Admin</a></li>
                                        <li><a class="custom-b" href="signUp.php">Sign up</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="help-r hidden-xs">
                                <div class="help-box">
                                    <ul>
                                        <li> <a data-toggle="modal" data-target="#myModal" href="#"> <span>Change</span>
                                    </ul>
                                </div>
                            </div>
                            <div class="nav-b hidden-xs">
                                <div class="nav-box">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.container-fluid -->
        </nav>
    </header>
    <!-- Modal -->
    <div class="modal fade lug" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li><a href="#"><img src="../images/ethiopian-flag.png" alt="" /> Ethiopia</a></li>
                        <li><a href="#"><img src="../images/finnish-flag.png" alt="" /> Finland </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar" class="top-nav">
        <ul id="sidebar-nav" class="sidebar-nav">
            <li><a href="#">Help</a></li>
            <li><a href="howitworks.html">How it works</a></li>
            <li><a href="#">chamb for Business</a></li>
        </ul>
    </div>
    <div class="page-content-product">
        <div class="main-product">
            <div class="container">
                <div class="row clearfix">
                    <div class="find-box">
                        <h1>Find your next product</h1>
                        <h4>It has never been easier.</h4>
                        <div class="product-sh">
                            <div class="col-sm-6">
                                <div class="form-sh">
                                    <input type="text" placeholder="Search something you love">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-sh">
                                    <select class="selectpicker">
                                        <option>Furniture</option>
                                        <option>Electronics</option>
                                        <option>Books</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-sh"> <a class="btn" href="#">Search</a> </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
include_once '../autoLoader/classAutoLoader.php';
include_once "../controller/post.php";

//Template for DVD
$dvd = new dvd($sku, $name, $price, $size, $fileName);
$rows1 = $dvd->getDvd();
$dvd->deleteRecord();

//Template for Book

$book = new book($sku, $name, $price, $weight, $fileName);
$rows2 = $book->getBook();
$book->deleteRecord();

//Template for Furniture

$furniture = new furniture($sku, $name, $price, $height, $length, $width, $fileName);
$rows3 = $furniture->getFurniture();
$furniture->deleteRecord();

echo "  <div class='row clearfix'>";

foreach ($rows3 as $row) {
    $imageURL3 = '../uploads/' . $row["file_name"];
    echo "    <div class='col-lg-3 col-sm-6 col-md-3'>
                        <a href='productpage.html'>
                            <div class='box-img'>
                                <h4>" . $row["name"] . "</h4>
                                <img   src='" . $imageURL3 . "' height='250rem' width='350rem' />
                                <div>" . $row["sku"] . "</div>
                            <div>" . $row["name"] . "</div>
                            <div>$" . $row["price"] . "</div>";

    echo " <div>Dimension:" . $row["height"] . "x" . $row["length"] . "x" . $row["width"] . "</div>";

    echo "                  </div>
                        </a>
                    </div>";

}
echo "</div>";

echo "  <div class='row clearfix'>";
foreach ($rows2 as $row) {
    $imageURL2 = '../uploads/' . $row["file_name"];
    echo "    <div class='col-lg-3 col-sm-6 col-md-3'>
                        <a href='productpage.html'>
                            <div class='box-img'>
                                <h4>" . $row["name"] . "</h4>
                                <img   src='" . $imageURL2 . "' height='250rem' width='350rem' />
                                <div>" . $row["sku"] . "</div>
                            <div>" . $row["name"] . "</div>
                            <div>$" . $row["price"] . "</div>";

    echo " <div>Weight:" . $row["weight"] . "KG</div>";
    echo "                  </div>
                        </a>
                    </div>";

}
echo "</div>";

echo "  <div class='row clearfix'>";
foreach ($rows1 as $row) {
    $imageURL1 = '../uploads/' . $row["file_name"];
    echo "    <div class='col-lg-3 col-sm-6 col-md-3'>
                        <a href='productpage.html'>
                            <div class='box-img'>
                                <h4>" . $row["name"] . "</h4>
                                <img   src='" . $imageURL1 . "' height='250rem' width='350rem' />
                                <div>" . $row["sku"] . "</div>
                            <div>" . $row["name"] . "</div>
                            <div>$" . $row["price"] . "</div>";

    echo " <div>Size:" . $row["size"] . "GB</div>";
    echo "                  </div>
                        </a>
                    </div>";

}
echo "</div>";

?>;

                <div class="main-footer">
                    <div class="container">
                        <div class="row">
                            <div class="footer-top clearfix">
                                <div class="col-md-2 col-sm-6">
                                    <h2>Start a free
                                        account today
                                    </h2>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-box">
                                        <input type="text" placeholder="Enter your e-mail" />
                                        <button>Continue</button>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="help-box-f">
                                        <h4>Call us on +251885 for help</h4>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <p><img width="90" src="../images/logo_w.png" alt="#" style="margin-top: -5px;" /> All
                                    Rights reserved. 5 Star Seller © 2023</p>
                            </div>

                        </div>
                    </div>
                </div>
                </footer>
                <!--main js-->
                <script src="../js/jquery-1.12.4.min.js"></script>
                <!--bootstrap js-->
                <script src="../js/bootstrap.min.js"></script>
                <script src="../js/bootstrap-select.min.js"></script>
                <script src="../js/slick.min.js"></script>
                <script src="../js/wow.min.js"></script>
                <!--custom js-->
                <script src="../js/custom.js"></script>


</body>

</html>