<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip login page</title>

    <!-- jquery 2.1.4 -->
    <script src="./vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="./vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">

    <!-- General Job Gossip styling -->
    <link rel="stylesheet" href="./resources/css/jgStyle.css">

    <style type="text/css">
        button[type="submit"]{
            margin-top: 30px;
        }
    </style>

</head>

<body>

<?php
include '/resources/php/navbar.php';
?>

<div class="container">

    <div class="jumbotron">
        <h1>Jossip!</h1>
        <p>Some words here. <a href="#">A Link.</a></p>
    </div>

    <div class="col-sm-8">
        <form class="form-signin" method="POST" action="./resources/php/loginScript.php">
            <h2 class="form-signin-heading">Please sign in</h2>

            <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label><br>
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label><br>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <!-- The following submit button or whatever the php runs should also dump the user onto loginlanding.php.     -bb -->

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>

    <div class="col-sm-offset-1 col-sm-3">
        <div class="list-group">
            <a class="list-group-item" href="./index.php">Home</a>
            <a class="list-group-item" href="./register.php">New user? Create an account</a>
        </div>
    </div>

</div>


</body>
</html>
