<?php

session_start();

if( isset($_POST['register'])) {
    require './resources/php/registerScript.php';

    header("Location: /login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Kasey Eljoundi">

    <title>New user registration</title>

    <!-- jquery 2.1.4 -->
    <script src="./vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 core JS, Bootstrap 3.3.5 CSS-->
    <script src="./vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">

    <!-- General Job Gossip styling -->
    <link rel="stylesheet" type="text/css" href="./resources/css/jossstyle.css" />
    <link rel="stylesheet" href="./resources/css/jgStyle.css">


    <style type="text/css">

    </style>

</head>

<body>
<?php
    include './resources/php/navbar.php';
?>



<?php
if( isset($_POST['register'])) {

    if( !isset($_POST['first_name']) || $_POST['first_name'] == ""  ){
        echo '<div class="alert alert-warning text-center">First Name Missing!</div>';
    }
    if( !isset($_POST['last_name']) || $_POST['last_name'] == ""  ){
        echo '<div class="alert alert-warning text-center">Last Name Missing!</div>';
    }
    if( !isset($_POST['username']) || $_POST['username'] == ""  ){
        echo '<div class="alert alert-warning text-center">Username Missing!</div>';
    }

    if( !isset($_POST['password']) || $_POST['password'] == ""  ){
        echo '<div class="alert alert-warning text-center">Password Missing!</div>';
    }
    if( !isset($_POST['confirmPassword']) || $_POST['confirmPassword'] == ""  ){
        echo '<div class="alert alert-warning text-center">Confirm Password Missing!</div>';
    }

    if( $_POST['password'] !== $_POST['confirmPassword'] ){
        echo '<div class="alert alert-warning text-center">Passwords Do Not Match!</div>';
    }

}
?>

<div class="container">

    <h1 class="page-header">New user registration</h1>

    <div class="panel panel-dark">
<!--        <div class="panel-heading"><h3>User Information</h3></div> -->
        <div class="panel-body">
            <div class="col-sm-6 col-sm-offset-3">

                <form method="POST" action="./register.php">

                    <div class="form-group">
                        <label>Name - First, Last</label>
                        <div class="row">
                            <div class="col-sm-6"><input type="text" class="form-control" name="first_name" /></div>
                            <div class="col-sm-6"><input type="text" class="form-control" name="last_name" /></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" name="email" placeholder="Email Address" />
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" />
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" />
                    </div>

                    <br />
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary btn-block" name="register" >Register</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>

</body>
</html>
