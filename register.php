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

    <script>
        $(document).ready(function(){

            $("#register").click(function(){

                if( !$("#first_name").val() || !$("#first_name").val() ){
                    //no name!
                }else {

                    var registrationData = {};
                    registrationData["first_name"] = $("#first_name").val();
                    registrationData["last_name"] = $("#last_name").val();
                    registrationData["email"] = $("#email").val();
                    registrationData["username"] = $("#username").val();
                    registrationData["password"] = $("#password").val();

                    $.ajax({
                        url: "/resources/php/registerScript.php",
                        type: "POST",
                        data: registrationData,
                        success:
                            function(queryResult){
                                if(queryResult == 1){
                                    $("body>.container").prepend('<div class="alert alert-success">User Created!</div>');
                                }
                            }
                    });

                }
            });

            /*  check if username exists in DB already
            $("#username").change(function(){
                $.post("", {}, function(){});
            });
            */

        });
    </script>

</head>

<body>
<?php
    include './resources/php/navbar.php';
?>


<div class="container">

    <h1 class="page-header">User registration</h1>

    <div class="panel panel-dark">
<!--        <div class="panel-heading"><h3>User Information</h3></div> -->
        <div class="panel-body">
            <div class="col-sm-6 col-sm-offset-3">

                <!--<form method="POST" action="./register.php">-->

                    <div class="form-group has-feedback">
                        <label>Name - First, Last</label>
                        <div class="row">
                            <div class="col-sm-6"><input type="text" class="form-control" name="first_name" id="first_name" /></div>
                            <div class="col-sm-6"><input type="text" class="form-control" name="last_name" id="last_name" /></div>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" />
                    </div>

                    <div class="form-group has-feedback">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" />
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" />
                    </div>

                    <div class="form-group has-feedback">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" />
                    </div>

                    <br />
                    <div class="form-group">
                        <button type="button" class="form-control btn btn-primary btn-block" name="register" id="register" >Register</button>
                    </div>

                <!--</form>-->

            </div>
        </div>
    </div>
</div>

</body>
</html>
