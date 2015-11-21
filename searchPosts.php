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
        <?php
        while( $company = $companyListQuery->fetch_assoc() ){
            $rating = floatval($company["rating"]);
            echo '
                            <div class="well company-well">
                                <h3>
                                    <b>',$company['company_name'],'</b>
                                    <div class="pull-right">';

            //print star rating in glyphicons
            for( $i=1; $i<=$rating; $i++ ){
                echo '<span class="glyphicon glyphicon-star"></span>';
            }

            //if decimal of rating avg is within .25-.75 print a half star
            if( fmod($rating,1.0) >= 0.25 && fmod($rating,1.0) <= 0.75 ){
                echo '<span class="glyphicon glyphicon-star glyphicon-star-half"></span>';
            }


            echo '    </div>
                                </h3>
                                <div class="text-right"><a href="#">See what people are saying about ',$company['company_name'],'</a></div>
                            </div>
                        ';
        }
        ?>

        <!-- end of list message -->
        <div class="well text-center text-muted">
            <h3>Want to see more? So do we! Rate your employers!</h3>
        </div>

    </div>

</div>

</body>
</html>