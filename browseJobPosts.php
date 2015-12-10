<?php

session_start();

$mysqli = new mysqli("localhost", "root", "eqBZKHCd775HA2fS", "JobGossip");

$postListSQL = "  SELECT `p`.`position_title`,`p`.`post_content`,`c`.`company_name`,`u`.`first_name`,`p`.`post_id`
                FROM `position_post` `p`,`company` `c`,`user` `u`
                WHERE `p`.`fk_company_id`=`c`.`company_id` AND `p`.`fk_user_id` = `u`.`user_id`
                      ";
$postListSQLQuery = $mysqli->query($postListSQL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip browse posts page</title>

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

        <div class="pull-left">Position posts in <b>Jossip</b> are written by registered Jossip users who have actually
            held those positions.</div>

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

            echo '
                 <div class="text-right"><a href="viewPost.php?compna=',$post['post_id'],'">See the whole ', $post['position_title'], ' post and its rating.</a></div>
            </div>
            ';
        }
        ?>

    </div>

</div>

</body>
</html>
