<?php
include_once "../controller/post.php";
session_start();
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

    <!--main css-->
    <link rel="stylesheet" href="../css/style3.css">


</head>

<body>
    <p class="texto">Please fill the form to Register</p>
    <div class="Registro">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            enctype="multipart/form-data">

            <span class="fontawesome-user"></span><input type="text" name="first_name" required placeholder="First name"
                autocomplete="off">
            <span class="fontawesome-user"></span><input type="text" name="last_name" required placeholder="Last name"
                autocomplete="off">
            <span class="fontawesome-user"></span><input type="text" name="user_name" required placeholder="User name"
                autocomplete="off">
            <span class="fontawesome-envelope-alt"></span><input type="text" name="email" id="email" required
                placeholder="Your Email" autocomplete="off">
            <span class="fontawesome-lock"></span><input type="password" name="password" id="password" required
                placeholder="Your passowrd" autocomplete="off">
            <input type="submit" value="Register" title="Registra tu cuenta">
            <div class="login">
                <button>LOGIN</button>
            </div>
</body>

</html>