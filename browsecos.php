
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip company rankings page</title>

    <link rel="stylesheet" type="text/css" href="./resources/css/jossstyle.css" />
    <script src="./vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="./vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/css/jgStyle.css">

    <!-- General Job Gossip styling -->


</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Praveen G
 * Date: 10/27/2015
 */
session_start();                    //call at very begining of all pages

include './resources/php/navbar.php';
?>

<div class = "container">
    <div class="jumbotron">
        <h1>Jossip!</h1>
    <!--    <p>Some words here. <a href="#">A Link.</a></p>  -->
    </div>


    <!-- <div id = "header">
        <h1>Jossip</h1>
    </div> -->

<!--    <div id = "nav">

        <ul>
            <li><a class="selected" href="index.php">Home</a></li><br>
            <li><a class="selected" href="register.php">New user?<br>Create an<br>account by<br>clicking here</a></li><br>
        </ul>
    </div> -->

    <!-- Again, the following division is just mocked up for appearance, needs to be hooked to the database to produce the live
    results we are looking for -bb -->

<!--    <div class="col-sm-3">
        <div class="list-group">
            <a href="./Post_company.php"> Post Jobs </a>

        </div>
    </div> -->

    <div class="col-sm-3">
        <div class="list-group">
            <?php
            if( !isset( $_SESSION['JobGossipLogin'] ) ) {
                echo "<a class=\"list-group-item\" href=\"./login.php\">Login</a>";
            }
            ?>
            <a class="list-group-item" href="./register.php">New user? Create an account by clicking here</a>
            <a class="list-group-item" href="./browsecos.php">Browse company rankings</a>
        </div>
    </div>

    <div id = "main">
        <h3>Top-ranked trending companies</h3>
        <?php
        $companies = array (
            array ("IBM", 4.5),
            array ("Wells Fargo", 3),
            array ("Bank of America", 3),
            array ("Swisher", 2),
        );

        for ($row = 0; $row <  4; $row++) {
            echo "<br><br><b>";
            echo $row+1;
            echo ". ";
            echo $companies[$row][0]."</b><br>";
            echo "Rating: ".$companies[$row][1];
        }
        ?>
    </div>

    <!-- This, again, needs to be relevant to whether the user is logged in or not. -bb -->

    <!-- <div id = "logout">

        <form action="login.php">
            <input type="submit" value="Login">
        </form>

    </div> -->

</div>


</body>
</html>
