<?php
include_once '../autoLoader/classAutoLoader.php';

//posting product detail to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // File upload path
    $targetDir = "../uploads/";

    $fileName = basename($_FILES["file"]["name"]);

    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $size = isset($_POST["size"]) && $_POST["size"] ?? null;
    $weight = isset($_POST["weight"]) && $_POST["weight"] ?? null;
    $width = isset($_POST["width"]) && $_POST["width"] ?? null;
    $length = isset($_POST["length"]) && $_POST["length"] ?? null;
    $height = isset($_POST["height"]) && $_POST["height"] ?? null;

    //validating empty input values
    $skuErr = $nameErr = $priceErr = $sizeErr = $weightErr = "";
    $sku = $name = $price = $size = $weight = "";

    (empty($_POST["sku"])) ? $skuErr = "SKU is required" : $sku = ($_POST["sku"]);
    (empty($_POST["file"])) ? $fileErr = "image is required" : $fileName = ($_POST["file"]);

    (empty($_POST["name"])) ? $nameErr = "name is required" : $name = ($_POST["name"]);
    (empty($_POST["price"])) ? $priceErr = "price is required" : $price = ($_POST["price"]);
    (empty($_POST["size"])) ? $sizeErr = "size is required" : $size = ($_POST["size"]);
    (empty($_POST["weight"])) ? $weightErr = "weight is required" : $weight = ($_POST["weight"]);
    (empty($_POST["length"])) ? $lengthErr = "length is required" : $length = ($_POST["length"]);
    (empty($_POST["width"])) ? $widthErr = "width is required" : $width = ($_POST["width"]);
    (empty($_POST["height"])) ? $heightErr = "height is required" : $height = ($_POST["height"]);

    //validating input characters
    $reg_exp = "/[^a-zA-Z0-9-:]+/"; // permitted expression for name input

    $reg_exp2 = "/[^a-zA-Z0-9-:@ ]+/"; // permitted expression for name input

    $invName = $invSku = ""; // Error message for invalid input type

    if (preg_match($reg_exp2, $name)) {

        $invName = "Only letters,numbers,:,@ or - is allowed";

    } else if (preg_match($reg_exp, $sku)) {

        $invSku = "Only letters,numbers,:,or - is allowed";

    } else {
        if ($sku && $name && $price && $size && $fileName) {
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                echo $targetFilePath;
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    $dvd = new dvd($sku, $name, $price, $size, $fileName);
                    $dvd->setConnection();
                    $dvd->insert();

                }
            }

        } elseif ($sku && $name && $price && $height && $length && $width && $fileName) {
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                echo $targetFilePath;
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    $furniture = new furniture($sku, $name, $price, $height, $length, $width, $fileName);
                    $furniture->setConnection();
                    $furniture->insert();

                }
            }

        } elseif ($sku && $name && $price && $weight && $fileName) {

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                echo $targetFilePath;
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

                    $book = new book($sku, $name, $price, $weight, $fileName);
                    $book->setConnection();
                    $book->insert();
                }

            }

        }
    }

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//creating users information
    $user_name = $_POST["user_name"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($user_name && $first_name && $last_name && $email && $password) {
        $user = new users($user_name, $first_name, $last_name, $email, $password);
        $user->setConnection();
        $user->createUser();

    }
}
