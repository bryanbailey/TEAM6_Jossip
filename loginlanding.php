
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

    <!-- General Jossip styling -->

</head>
<body>

<?php
session_start();                    //call at very begining of all pages

include './resources/php/navbar.php';
?>
<div class = "container">

    <h1 class="page-header">Welcome to Jossip!</h1>

    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>
    </div>

    <div id = "main">
        <h3>You've successfully logged in to Jossip!</h3>
        <p>Would you like to:</p>
        <ol>
            <li><a href="/register.php">Change your account details?</a></li>
            <li><a href="/resources/legacy/createCompanyPost.php">Post and rate a position/company?</a></li>
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
