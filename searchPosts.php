<?php

session_start();

$mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip search page</title>

    <link rel="stylesheet" type="text/css" href="/resources/css/jossstyle.css" />
    <script src="/vendors/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 JS, Bootstrap 3.3.5 CSS-->
    <script src="/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css">

    <!-- General Job Gossip styling -->
    <link rel="stylesheet" href="/resources/css/jgStyle.css">

    <!-- browsecos css styling -->
    <link rel="stylesheet" href="/resources/css/browsecos.css">

    <script>
        $(document).ready(function() {

            /* make navbar, sidebar list link display as active for current page */
            $("#navbar a[href=\"/searchPosts.php\"]").parent("li").addClass("active");
            $("#sidebarList a[href=\"/searchPosts.php\"]").addClass("active");

        });
    </script>


</head>

<body>
<?php
include '/resources/php/navbar.php';
?>

<div class = "container">

    <h1 class="page-header">Search Jossip posts</h1>

    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>
    </div>

    <div class = "col-sm-9">
        <h4>You may search by one of the following criteria: </h4><br>

        <div class="form-group">
            <label for="post_position">Job title: </label>
            <input type="text" class="form-control" id="post_position" />
        </div>

        <div class="form-group">
            <label for="company_name">Company name: </label>
            <input type="text" class="form-control" id="company_name" />
        </div>

        <div class="form-group">
            <label for="user_id">Jossip poster: </label>
            <input type="text" class="form-control" id="user_id" />
        </div>
        <br>
        <div class="form-group">
            <span class="pull-left"><button type="submit" class="form-control btn btn-primary btn-block"  id="submitButton"></span>
                Search
            </button>
        </div>


    </div>

</div>

</body>
</html>