<?php

session_start();
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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

    <!-- general Joossip styling -->
    <link rel="stylesheet" type="text/css" href="/resources/css/jgStyle.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/profile.css" />

    <script>
        $(document).ready(function() {


        });
    </script>

</head>

<body>

<?php
include './resources/php/navbar.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar col-sm-3 col-md-2">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Personal Info</a></li>
                <li><a href="#">Employment History</a></li>
                <li><a href="#">More?</a></li>
            </ul>
        </div>

        <div class="col-sm-9col-sm-offset-3 col-md-10 col-md-offset-2">
            <div class="row profile-header-row">
                <div class="col-xs-6 col-sm-3 col-sm-offset-3 profile-header">
                    <div class="large-circle"><p>35</p></div>
                    <h4>Posts created</h4>
                    <span class="text-muted">Power User!</span>
                </div>
                <div class="col-xs-6 col-sm-3 profile-header">
                    <div class="large-circle"><p>4.3</p></div>
                    <h4>Avg Post Score</h4>
                    <span class="text-muted">4.3/5</span>
                </div>
            </div>
        </div>
    </div>
</div>




</body>
</html>

