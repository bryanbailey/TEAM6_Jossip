
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip login landing page</title>

    <link rel="stylesheet" type="text/css" href="./resources/css/jossstyle.css" />
    <!-- jquery 2.1.4 -->
    <script src="./vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="./vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/css/jgStyle.css">

    <!-- General Job Gossip styling -->

</head>
<body>

<?php
session_start();                    //call at very begining of all pages

include './resources/php/navbar.php';
?>
<div class = "container">


    <!-- <div id = "header">
        <h1>Jossip</h1>
    </div> -->
    <div class="jumbotron">
        <h1>Jossip!</h1>
        <p>Some words here. <a href="#">A Link.</a></p>
    </div>

    <div id = "nav">

        <!-- <ul>
            <li><a class="selected" href="index.php">Home</a></li><br>
        </ul> -->

    </div>

    <div id = "main">
        <h3>Welcome to Jossip</h3>
        <p>You've successfully created an account with Jossip!</p><br>
        <p>Would you like to:</p>
        <ol>
            <li><a href=#>Change your account details?</a></li>
            <li><a href="browsecos.php">Post and rate a position/company?</a></li>
        </ol>

    </div>

    <div id = "login">

        <!-- <form action="index.php">
            <input class="btn btn-primary" type="submit" value="Logout">
        </form> -->

    </div>
</div>

</body>
</html>
