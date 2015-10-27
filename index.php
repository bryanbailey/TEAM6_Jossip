<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip home page</title>
    <!-- This is the "Landing page" for the website, which will serve as the first page people see and the introduction to the product.
        All the pages are broken up into roughly the same divisions, and the "header" and "nav" ones will rarely change except to change
        the navigation within the site. -->

    <!-- jquery 2.1.4 -->
    <script src="/vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">

    <!-- general Job Gossip styling -->

    <link rel="stylesheet" type="text/css" href="/resources/css/jgStyle.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />

</head>

<body>

<?php
session_start();
include '/resources/php/navbar.php';
?>

<div class = "container">
    <div class="jumbotron">
        <h1>Jossip!</h1>
        <p>Some words here. <a href="#">A Link.</a></p>
    </div>

    <div class="col-sm-3">
        <div class="list-group">
            <?php
            if( !isset( $_SESSION['JobGossipLogin'] ) ) {
                echo "<a class=\"list-group-item\" href=\"./login.php\">Login</a>";
            }
            ?>
            <a class="list-group-item" href="/register.php">New user? Create an account by clicking here</a>
            <a class="list-group-item" href="/browsecos.php">Browse company rankings</a>
        </div>
    </div>

    <!-- The "main" is where the majority of the php is going to take place, so look here on each page if you are looking for placement -bb -->

    <div class="col-sm-offset-1 col-sm-8">
        <h3>Welcome to Jossip</h3>
        <p>Jossip ("jobs" + "gossip") is devoted to spreading the scuttlebutt about employers and positions that you won't find anywhere else!</p>
        <p>To take full advantage of Jossip's features, create an <a href="/register.php"><b>account</b></a> so that you can access rated info on employers and positions.</p>
        <p>As a casual site visitor, you can browse a list of companies rated by Jossip users <a href="/browsecos.php"><b>here</b></a>.</p>

    </div>

</div>

</div>

</body>
</html>
