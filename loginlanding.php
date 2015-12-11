
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

    <!-- login landing styling -->
    <link rel="stylesheet" href="./resources/css/loginLanding.css">

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


    <div class="col-sm-9">
        <h3 class="text-center">
            You've successfully logged in!
            <br /><small>What would you like to do?</small>
        </h3>
        <div class="row landing-header-row">
            <div class="col-sm-6 landing-header">
                <div class="large-circle"><p><span class="glyphicon glyphicon-user"></span></p></div>
                <h4><a href="/profile.php">Change account details</a></h4>
            </div>
            <div class="col-sm-6 landing-header">
                <div class="large-circle"><p><span class="glyphicon glyphicon-user"></span></p></div>
                <h4><a href="/createJobPost.php">Post and Rate an employer</a></h4>
            </div>
        </div>

    </div>
</div>

</body>
</html>
