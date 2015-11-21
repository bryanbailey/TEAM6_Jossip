<?php

session_start();

$mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

$postListSQL = "  SELECT `p`.`position_title`,`p`.`post_content`,`c`.`company_name`,`u`.`first_name`
                FROM `position_post` `p`,`company` `c`,`user` `u`
                WHERE `p`.`fk_company_id`=`c`.`company_id` AND `p`.`fk_user_id` = `u`.`user_id`
                      ";
$postListSQLQuery = $mysqli->query($postListSQL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip view posts page</title>

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
            $("#navbar a[href=\"/browseJobPosts.php\"]").parent("li").addClass("active");
            $("#sidebarList a[href=\"/browseJobPosts.php\"]").addClass("active");

        });
    </script>


</head>

<body>
<?php
include '/resources/php/navbar.php';
?>

<div class = "container">

    <h1 class="page-header">Jossip rated positions</h1>

    <div class="col-sm-3">
        <?php
        include '/resources/php/sidebarList.php';
        ?>

        <br>

        <div class="pull-left">Ratings of <b>1 to 5 stars</b> a re assigned to the posts by individuals rating the usefulness of the information from those who have been employed by the respective firms.</div>

    </div>

    <div class = "col-sm-9">
        <?php
        while( $post = $postListSQLQuery->fetch_assoc() ) {
            echo '
            <div class="well company-well">
                <h3><b>', $post['position_title'], '</b>
                <div class="pull-right" style="font-size: small">Company: <b>', $post['company_name'], '</b></div></h3>
                <p><b>Comments: </b>', $post['post_content'], '</b></p>
            ';

            //print star rating in glyphicons
            //for( $i=1; $i<=$rating; $i++ ){
            //    echo '<span class="glyphicon glyphicon-star"></span>';
            //}

            //if decimal of rating avg is within .25-.75 print a half star
            //if( fmod($rating,1.0) >= 0.25 && fmod($rating,1.0) <= 0.75 ){
            //    echo '<span class="glyphicon glyphicon-star glyphicon-star-half"></span>';


            echo '
                 <div class="text-right"><a href="#">See the whole ', $post['position_title'], ' post and its rating.</a></div>
            </div>
            ';
        }
        ?>

        <!-- end of list message
        <div class="well text-center text-muted">
            <h3>Want to see more? So do we! Rate your employers!</h3>
        </div>
-->
    </div>

</div>

</body>
</html>