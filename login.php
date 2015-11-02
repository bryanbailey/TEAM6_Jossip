<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip login page</title>

    <!-- jquery 2.1.4 -->
    <script src="/vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">

    <!-- General Jossip styling -->
    <link rel="stylesheet" href="/resources/css/jgStyle.css">

    <style type="text/css">
        button[type="submit"]{
            margin-top: 30px;
        }

        .container > .alert{
            position: absolute;
            left: 30%;
            right: 30%;
            margin: 10px auto;
            text-align: center;
        }
    </style>

    <script>
        $(document).ready(function(){

            $("#submit").click(function(e){
                if( $("#username").val() == "" || $("#password").val() == "" ){
                    e.preventDefault();
                    e.stopPropagation();

                    if( $("#username").val() == ""){
                        $("#username").parent(".form-group").addClass("has-error");
                    }
                    if( $("#password").val() == ""){
                        $("#password").parent(".form-group").addClass("has-error");
                    }
                }
            });

        });
    </script>

</head>

<body>

    <?php
        include '/resources/php/navbar.php';
    ?>

    <div class="container">

        <?php
            if( isset($_GET["retry"]) ){
                echo '<div class="alert alert-warning">Incorrect Info! Please try again.</div>';
            }
        ?>

        <h1 class="page-header">Jossip login</h1>

        <div class="col-sm-3">

            <div class="list-group">
                <a class="list-group-item" href="/register.php">New user? Create an account</a>
            </div>

        </div>

        <div class="col-sm-offset-1 col-sm-4">
            <form class="form-signin" method="POST" action="/resources/php/loginScript.php">
                <h2 class="form-signin-heading">Please sign in</h2>

                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus" />
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required" />
                </div>

                <!-- The following submit button or whatever the php runs should also dump the user onto loginlanding.php.     -bb -->

                <button class="btn btn-lg btn-primary btn-block" id="submit" type="submit">Sign in</button>
            </form>
        </div>


    </div>


</body>
</html>
