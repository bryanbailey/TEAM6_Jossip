<?php
/**
 * Created by PhpStorm.
 * User: Praveen G
 * Date: 10/27/2015
 */
session_start();

if( isset($_POST['post_company'])) {
    require './resources/php/postcompanyscript.php';

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Praveen Kumar G">
    <title>New User Registration</title>
    <!-- jquery 2.1.4 -->
    <script src="/vendors/jquery-2.1.4.min.js"></script>
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
include '/resources/php/navbar.php';
?>



<?php
if( isset($_POST['post_company'])) {

    if( !isset($_POST['post_title']) || $_POST['post_title'] == ""  ){
        echo '<div class="alert alert-warning text-center">post title Missing!</div>';
    }


    }
?>

<div class="container">

    <h1 class="page-header">New Company Registration</h1>

    <div class="panel panel-dark">
        <div class="panel-heading"><h3>Company Information</h3></div>
        <div class="panel-body">
            <div class="col-sm-6 col-sm-offset-3">

                        <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Company Name
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#" name ="cname" value="3">Bank of America</a></li>
                            <li><a href="#" name="cname" value="4" >IBM</a></li>
                            <li><a href="#" name="cname" value="5">Wells Fargo</a></li>
                        </ul>
                    </div>
                    <br>

                        <div class="form-group">
                        <label for="post_title">Post Title</label>
                        <input type="text" class="form-control" name="post_title" id="post_title" />
                    </div>

                    <div class="form-group">
                        <label for="pos_content">Post Content</label>
                        <input type="text" class="form-control" name="pos_content" id="pos_content"/>
                    </div>
                    <label for="rating">Rating</label>
                    <span class="starRating">
                        <input id="rating5" type="radio" name="rating" value="5">
                        <label for="rating5">5</label>
                        <input id="rating4" type="radio" name="rating" value="4">
                        <label for="rating4">4</label>
                        <input id="rating3" type="radio" name="rating" value="3">
                        <label for="rating3">3</label>
                        <input id="rating2" type="radio" name="rating" value="2">
                        <label for="rating2">2</label>
                        <input id="rating1" type="radio" name="rating" value="1">
                        <label for="rating1">1</label>
                        </span>

                    <br />
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary btn-block" name="post_company" >Post</button>
                    </div>

                    </div>
        </div>
    </div>

</div>

</body>
</html>
